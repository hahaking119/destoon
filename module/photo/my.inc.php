<?php 
defined('IN_DESTOON') or exit('Access Denied');
require DT_ROOT.'/module/'.$module.'/common.inc.php';
$MG['photo_limit'] > -1 or dalert(lang('message->without_permission_and_upgrade'), 'goback');
require DT_ROOT.'/include/post.func.php';
include load('my.lang');
require MD_ROOT.'/photo.class.php';
$do = new photo($moduleid);

if(in_array($action, array('add', 'edit'))) {
	$FD = cache_read('fields-'.substr($table, strlen($DT_PRE)).'.php');
	if($FD) require DT_ROOT.'/include/fields.func.php';
	isset($post_fields) or $post_fields = array();
}

$sql = $_userid ? "username='$_username'" : "ip='$DT_IP'";
$limit_used = $limit_free = $need_password = $need_captcha = $need_question = $fee_add = 0;
if(in_array($action, array('', 'add'))) {
	$r = $db->get_one("SELECT COUNT(*) AS num FROM {$table} WHERE $sql AND status>1");
	$limit_used = $r['num'];
	$limit_free = $MG['photo_limit'] > $limit_used ? $MG['photo_limit'] - $limit_used : 0;
}

switch($action) {
	case 'add':
		if($MG['photo_limit'] && $limit_used >= $MG['photo_limit']) dalert(lang($L['info_limit'], array($MG[$MOD['module'].'_limit'], $limit_used)), $_userid ? $MODULE[2]['linkurl'].$DT['file_my'].'?mid='.$mid : $MODULE[2]['linkurl'].$DT['file_my']);
		if($MG['day_limit']) {
			$today = strtotime(timetodate($DT_TIME, 3).' 00:00:00');
			$r = $db->get_one("SELECT COUNT(*) AS num FROM {$table} WHERE $sql AND addtime>$today");
			if($r && $r['num'] >= $MG['day_limit']) dalert(lang($L['day_limit'], array($MG['day_limit'])), $_userid ? $MODULE[2]['linkurl'].$DT['file_my'].'?mid='.$mid : $MODULE[2]['linkurl'].$DT['file_my']);
		}

		if($MG['photo_free_limit'] >= 0) {
			$fee_add = ($MOD['fee_add'] && (!$MOD['fee_mode'] || !$MG['fee_mode']) && $limit_used >= $MG['photo_free_limit'] && $_userid) ? dround($MOD['fee_add']) : 0;
		} else {
			$fee_add = 0;
		}
		$fee_currency = $MOD['fee_currency'];
		$fee_unit = $fee_currency == 'money' ? $DT['money_unit'] : $DT['credit_unit'];
		$need_password = $fee_add && $fee_currency == 'money';
		$need_captcha = $MOD['captcha_add'] == 2 ? $MG['captcha'] : $MOD['captcha_add'];
		$need_question = $MOD['question_add'] == 2 ? $MG['question'] : $MOD['question_add'];
		$could_color = check_group($_groupid, $MOD['group_color']) && $MOD['credit_color'] && $_userid;

		if($submit) {
			if($fee_add && $fee_add > ($fee_currency == 'money' ? $_money : $_credit)) dalert($L['balance_lack']);
			if($need_password && !is_payword($_username, $password)) dalert($L['error_payword']);

			if(!$_userid) {
				if(strlen($post['company']) < 10) dalert($L['type_company']);
				if(!isset($AREA[$post['areaid']])) dalert($L['type_area']);
				if(strlen($post['truename']) < 4) dalert($L['type_true']);
				if(strlen($post['mobile']) < 7) dalert($L['type_mobile']);
			}

			if($MG['add_limit']) {
				$last = $db->get_one("SELECT addtime FROM {$table} WHERE $sql ORDER BY itemid DESC");
				if($last && $DT_TIME - $last['addtime'] < $MG['add_limit']) dalert(lang($L['add_limit'], array($MG['add_limit'])));
			}
			$msg = captcha($captcha, $need_captcha, true);
			if($msg) dalert($msg);
			$msg = question($answer, $need_question, true);
			if($msg) dalert($msg);
			if(isset($post['islink'])) unset($post['islink']);
			if($do->pass($post)) {
				$CAT = get_cat($post['catid']);
				if(!$CAT || !check_group($_groupid, $CAT['group_add'])) dalert(lang($L['group_add'], array($CAT['catname'])));
				$post['addtime'] = $post['level'] = $post['fee'] = 0;
				$post['style'] = $post['template'] = $post['note'] = $post['filepath'] = '';
				$need_check =  $MOD['check_add'] == 2 ? $MG['check'] : $MOD['check_add'];
				$post['status'] = get_status(3, $need_check);
				$post['hits'] = 0;
				$post['save_remotepic'] = $MOD['save_remotepic'] ? 1 : 0;
				$post['clear_link'] = $MOD['clear_link'] ? 1 : 0;
				$post['username'] = $_username;
				
				if($could_color && $style && $_credit > $MOD['credit_color']) {
					$post['style'] = $style;
					credit_add($_username, -$MOD['credit_color']);
					credit_record($_username, -$MOD['credit_color'], 'system', $L['title_color'], '['.$MOD['name'].']'.$post['title']);
				}

				if($FD) fields_check($post_fields);
				$do->add($post);
				if($FD) fields_update($post_fields, $table, $do->itemid);

				if($fee_add) {
					if($fee_currency == 'money') {
						money_add($_username, -$fee_add);
						money_record($_username, -$fee_add, $L['in_site'], 'system', lang($L['credit_record_add'], array($MOD['name'])), 'ID:'.$do->itemid);
					} else {
						credit_add($_username, -$fee_add);
						credit_record($_username, -$fee_add, 'system', lang($L['credit_record_add'], array($MOD['name'])), 'ID:'.$do->itemid);
					}
				}
				
				$msg = $post['status'] == 2 ? $L['success_check'] : $L['success_add'];
				if($_userid) {
					set_cookie('dmsg', $msg);
					$forward = $MODULE[2]['linkurl'].$DT['file_my'].'?mid='.$mid.'&action=item&itemid='.$do->itemid;
					dalert('', '', 'parent.window.location="'.$forward.'";');
				} else {
					dalert($msg, '', 'parent.window.location=parent.window.location;');
				}
			} else {
				dalert($do->errmsg, '', ($need_captcha ? reload_captcha() : '').($need_question ? reload_question() : ''));
			}
		} else {
			if($itemid) {
				$MG['copy'] && $_userid or dalert(lang('message->without_permission_and_upgrade'), 'goback');

				$do->itemid = $itemid;
				$r = $do->get_one();
				if(!$r || $r['username'] != $_username) message();
				extract($r);
				$thumb = '';
				$totime = $totime > $DT_TIME ? timetodate($totime, 3) : '';
			} else {
				foreach($do->fields as $v) {
					$$v = '';
				}
				$open = 3;
				$content = '';
			}
			$item = array();
		}
	break;
	case 'edit':
		$itemid or message();
		$do->itemid = $itemid;
		$item = $do->get_one();
		if(!$item || $item['username'] != $_username) message();

		if($MG['edit_limit'] < 0) message($L['edit_refuse']);
		if($MG['edit_limit'] && $DT_TIME - $item['addtime'] > $MG['edit_limit']*86400) message(lang($L['edit_limit'], array($MG['edit_limit'])));

		if($submit) {
			if($do->pass($post)) {
				$CAT = get_cat($post['catid']);
				if(!$CAT || !check_group($_groupid, $CAT['group_add'])) dalert(lang($L['group_add'], array($CAT['catname'])));
				$post['addtime'] = timetodate($item['addtime']);
				$post['level'] = $item['level'];
				$post['style'] = $item['style'];
				$post['template'] = $item['template'];
				$post['filepath'] = $item['filepath'];
				$post['note'] = $item['note'];
				$need_check =  $MOD['check_add'] == 2 ? $MG['check'] : $MOD['check_add'];
				$post['status'] = get_status($item['status'], $need_check);
				$post['hits'] = $item['hits'];
				$post['save_remotepic'] = $MOD['save_remotepic'] ? 1 : 0;
				$post['clear_link'] = $MOD['clear_link'] ? 1 : 0;
				$post['username'] = $_username;
				if($FD) fields_check($post_fields);
				$do->edit($post);
				if($FD) fields_update($post_fields, $table, $do->itemid);

				set_cookie('dmsg', $L['success_edit']);
				dalert('', '', 'parent.window.location="'.$forward.'"');
			} else {
				dalert($do->errmsg);
			}
		} else {
			extract($item);
		}
	break;
	case 'item':
		$itemid or msg();
		$do->itemid = $itemid;
		$item = $do->get_one();
		if(!$item || $item['username'] != $_username) message();

		if(isset($update)) {
			$do->item_update($post);
			$session = new dsession();
			$_SESSION['uploads'] = array();
			if($MOD['show_html']) tohtml('show', $module);
			dmsg($L['success_update'], '?mid='.$mid.'&action='.$action.'&itemid='.$itemid);
		} else {
			$lists = $do->item_list("item=$itemid");
			$item = $do->get_one();
			if($items != $item['items']) $db->query("UPDATE {$table} SET items=$items WHERE itemid=$itemid");
		}
	break;
	case 'item_delete':
		$itemid or msg();
		$item = $db->get_one("SELECT p.username FROM {$table} p,{$DT_PRE}photo_item i WHERE p.itemid=i.item AND i.itemid=$itemid");
		if(!$item || $item['username'] != $_username) message();
		$do->item_delete($itemid);
		dmsg($L['success_delete'], $forward);
	break;
	case 'delete':
		$itemid or message();
		$itemids = $itemid;
		foreach($itemids as $itemid) {
			$do->itemid = $itemid;
			$item = $do->get_one();
			if(!$item || $item['username'] != $_username) message();
			$do->recycle($itemid);
		}
		dmsg($L['success_delete'], $forward);
	break;
	default:
		$status = isset($status) ? intval($status) : 3;
		in_array($status, array(1, 2, 3, 4)) or $status = 3;
		$condition = "username='$_username'";
		$condition .= " AND status=$status";
		if($keyword) $condition .= " AND keyword LIKE '%$keyword%'";
		if($catid) $condition .= ($CATEGORY[$catid]['child']) ? " AND catid IN (".$CATEGORY[$catid]['arrchildid'].")" : " AND catid=$catid";
		$timetype = strpos($MOD['order'], 'add') !== false ? 'add' : '';
		$lists = $do->get_list($condition, $MOD['order']);
	break;
}
$head_title = lang($L['module_manage'], array($MOD['name']));
if($_userid) {
	$nums = array();
	for($i = 1; $i < 5; $i++) {
		$r = $db->get_one("SELECT COUNT(*) AS num FROM {$table} WHERE username='$_username' AND status=$i");
		$nums[$i] = $r['num'];
	}
}
include template('my_'.$module, 'member');
?>