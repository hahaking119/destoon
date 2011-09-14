<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'member');?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="add"><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=<?php echo $mid;?>&action=add"><span>添加<?php echo $MOD['name'];?></span></a></td>
<?php if($_userid) { ?>
<td class="tab_nav">&nbsp;</td>
<td class="tab" id="s3"><a href="<?php echo $DT['file_my'];?>?mid=<?php echo $mid;?>"><span>已发布<span class="px10">(<?php echo $nums['3'];?>)</span></span></a></td>
<td class="tab_nav">&nbsp;</td>
<td class="tab" id="s2"><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=<?php echo $mid;?>&status=2"><span>审核中<span class="px10">(<?php echo $nums['2'];?>)</span></span></a></td>
<td class="tab_nav">&nbsp;</td>
<td class="tab" id="s1"><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=<?php echo $mid;?>&status=1"><span>未通过<span class="px10">(<?php echo $nums['1'];?>)</span></span></a></td>
<td class="tab_nav">&nbsp;</td>
<td class="tab" id="s4"><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=<?php echo $mid;?>&status=4"><span>已过期<span class="px10">(<?php echo $nums['4'];?>)</span></span></a></td>
<?php } ?>
</tr>
</table>
</div>
<?php if($action=='add' || $action=='edit') { ?>
<iframe src="" name="send" id="send" style="display:none;"></iframe>
<form method="post" action="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>" id="dform" target="send" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="mid" value="<?php echo $mid;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<table cellpadding="6" cellspacing="1" class="tb">
<?php if($status==1 && $action=='edit' && $note) { ?>
<tr>
<td class="tl">未通过原因</td>
<td class="tr f_blue"><?php echo $note;?></td>
</tr>
<?php } ?>
<tr>
<td class="tl"><span class="f_red">*</span> 信息类型</td>
<td class="tr">
<?php if(is_array($TYPE)) { foreach($TYPE as $k => $v) { ?>
<input type="radio" name="post[typeid]" value="<?php echo $k;?>" <?php if($k==$typeid) { ?>checked<?php } ?>/> <label for="typeid_<?php echo $k;?>" id="t_<?php echo $k;?>"><?php echo $v;?></label>&nbsp;
<?php } } ?>
</td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 产品名称</td>
<td class="tr f_gray"><input name="post[tag]" type="text" size="20" id="tag" value="<?php echo $tag;?>" onkeyup="_p();"/><span id="reccate" style="display:none;"><?php if($DT['schcate_limit']) { ?> <a href="javascript:" onclick="reccate(<?php echo $moduleid;?>, 'tag');" class="t">[分类建议]</a><?php } ?></span> （2-16个字）<span id="dtag" class="f_red"></span><br/>产品名称方便买家搜索，此处填写产品名称。例如：“电脑桌”。勿填产品型号、规格、品牌等。</td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 信息标题</td>
<td class="tr f_gray"><input name="post[title]" type="text" id="title" size="50" value="<?php echo $title;?>"/> （2-30个字）<span id="dtitle" class="f_red"></span></td>
</tr>
<?php if($action=='add' && $could_color) { ?>
<tr>
<td class="tl">标题颜色</td>
<td class="tr">
<?php echo dstyle('style');?>&nbsp;
设置信息标题颜色需消费 <strong class="f_red"><?php echo $MOD['credit_color'];?></strong> <?php echo $DT['credit_name'];?>
</td>
</tr>
<?php } ?>
<tr>
<td class="tl"><span class="f_red">*</span> 行业分类</td>
<td class="tr"><div id="catesch"></div><?php echo ajax_category_select('post[catid]', '', $catid, $moduleid, 'size="2" style="height:120px;width:180px;"');?><br/><?php if($DT['schcate_limit']) { ?><input type="button" value="搜索分类" onclick="schcate(<?php echo $moduleid;?>);" class="btn"/> <?php } ?><span id="dcatid" class="f_red"></span></td>
</tr>
<?php if($FD) { ?><?php echo fields_html('<td class="tl">', '<td class="tr">', $item);?><?php } ?>
<tr>
<td class="tl"><span class="f_red">*</span> 详细说明</td>
<td class="tr f_gray"><textarea name="post[content]" id="content" class="dsn"><?php echo $content;?></textarea>
<?php echo deditor($moduleid, 'content', $group_editor, '98%', 350);?><br/>
1、请输入15个字以上。最多不超过<span class="f_red">50000</span>字。<br/>
2、建议您描述以下方面：产品的性能及优点、用途、售后服务、包装等；<br/>
3、为避免不必要的纠纷，请使用本企业图片；<br/>
<span id="dcontent" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl">产品图片</td>
<td class="tr">
	<input type="hidden" name="post[thumb]" id="thumb" value="<?php echo $thumb;?>"/>
<?php if($IMVIP) { ?>
	<input type="hidden" name="post[thumb1]" id="thumb1" value="<?php echo $thumb1;?>"/>
	<input type="hidden" name="post[thumb2]" id="thumb2" value="<?php echo $thumb2;?>"/>
<?php } ?>
	<table width="360">
	<tr align="center" height="120" class="c_p">
	<td width="120"><img src="<?php if($thumb) { ?><?php echo $thumb;?><?php } else { ?><?php echo DT_SKIN;?>image/waitpic.gif<?php } ?>" id="showthumb" title="预览图片" alt="" onclick="if(this.src.indexOf('waitpic.gif') == -1){_preview($('showthumb').src, 1);}else{Dalbum('',<?php echo $moduleid;?>,<?php echo $MOD['thumb_width'];?>,<?php echo $MOD['thumb_height'];?>, $('thumb').value, true);}"/></td>
<?php if($IMVIP) { ?>
	<td width="120"><img src="<?php if($thumb1) { ?><?php echo $thumb1;?><?php } else { ?><?php echo DT_SKIN;?>image/waitpic.gif<?php } ?>" id="showthumb1" title="预览图片" alt="" onclick="if(this.src.indexOf('waitpic.gif') == -1){_preview($('showthumb1').src, 1);}else{Dalbum(1,<?php echo $moduleid;?>,<?php echo $MOD['thumb_width'];?>,<?php echo $MOD['thumb_height'];?>, $('thumb1').value, true);}"/></td>

	<td width="120"><img src="<?php if($thumb2) { ?><?php echo $thumb2;?><?php } else { ?><?php echo DT_SKIN;?>image/waitpic.gif<?php } ?>" id="showthumb2" title="预览图片" alt="" onclick="if(this.src.indexOf('waitpic.gif') == -1){_preview($('showthumb2').src, 1);}else{Dalbum(2,<?php echo $moduleid;?>,<?php echo $MOD['thumb_width'];?>,<?php echo $MOD['thumb_height'];?>, $('thumb2').value, true);}"/></td>
<?php } else { ?>
	<td width="120"><a href="<?php echo $MODULE['2']['linkurl'];?>grade.php" target="_blank"><img src="<?php echo DT_SKIN;?>image/vippic.gif"/></a></td>
	<td width="120"><a href="<?php echo $MODULE['2']['linkurl'];?>grade.php" target="_blank"><img src="<?php echo DT_SKIN;?>image/vippic.gif"/></a></td>
<?php } ?>
	</tr>
	<tr align="center" class="c_p">
	<td><img src="image/img_upload.gif" width="12" height="12" title="上传" onclick="Dalbum('',<?php echo $moduleid;?>,<?php echo $MOD['thumb_width'];?>,<?php echo $MOD['thumb_height'];?>, $('thumb').value, true);"/>&nbsp;&nbsp;<img src="image/img_select.gif" width="12" height="12" title="选择" onclick="selAlbum('');"/>&nbsp;&nbsp;<img src="image/img_delete.gif" width="12" height="12" title="删除" onclick="delAlbum('','wait');"/></td>
<?php if($IMVIP) { ?>
	<td><img src="image/img_upload.gif" width="12" height="12" title="上传" onclick="Dalbum(1,<?php echo $moduleid;?>,<?php echo $MOD['thumb_width'];?>,<?php echo $MOD['thumb_height'];?>, $('thumb1').value, true);"/>&nbsp;&nbsp;<img src="image/img_select.gif" width="12" height="12" title="选择" onclick="selAlbum(1);"/>&nbsp;&nbsp;<img src="image/img_delete.gif" width="12" height="12" title="删除" onclick="delAlbum(1,'wait');"/></td>
	<td><img src="image/img_upload.gif" width="12" height="12" title="上传" onclick="Dalbum(2,<?php echo $moduleid;?>,<?php echo $MOD['thumb_width'];?>,<?php echo $MOD['thumb_height'];?>, $('thumb2').value, true);"/>&nbsp;&nbsp;<img src="image/img_select.gif" width="12" height="12" title="选择" onclick="selAlbum(2);"/>&nbsp;&nbsp;<img src="image/img_delete.gif" width="12" height="12" title="删除" onclick="delAlbum(2,'wait');"/></td>
<?php } else { ?>
	<td onclick="if(confirm('此操作仅限<?php echo VIP;?>会员，是否现在申请？')) Go('<?php echo $MODULE['2']['linkurl'];?>grade.php');"><img src="image/img_upload.gif" width="12" height="12" title="上传"/>&nbsp;&nbsp;<img src="image/img_select.gif" width="12" height="12" title="选择"/>&nbsp;&nbsp;<img src="image/img_delete.gif" width="12" height="12" title="删除"/></td>
	<td onclick="if(confirm('此操作仅限<?php echo VIP;?>会员，是否现在申请？')) Go('<?php echo $MODULE['2']['linkurl'];?>grade.php');"><img src="image/img_upload.gif" width="12" height="12" title="上传"/>&nbsp;&nbsp;<img src="image/img_select.gif" width="12" height="12" title="选择"/>&nbsp;&nbsp;<img src="image/img_delete.gif" width="12" height="12" title="删除"/></td>
<?php } ?>
	</tr>
	</table>
	<span id="dthumb" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl">过期时间</td>
<td class="tr f_gray"><?php echo dcalendar('post[totime]', $totime);?>&nbsp;
<select onchange="$('posttotime').value=this.value;">
<option value="">快捷选择</option>
<option value="">长期有效</option>
<option value="<?php echo timetodate($DT_TIME+86400*3, 3);?>">3天</option>
<option value="<?php echo timetodate($DT_TIME+86400*7, 3);?>">一周</option>
<option value="<?php echo timetodate($DT_TIME+86400*15, 3);?>">半月</option>
<option value="<?php echo timetodate($DT_TIME+86400*30, 3);?>">一月</option>
<option value="<?php echo timetodate($DT_TIME+86400*182, 3);?>">半年</option>
<option value="<?php echo timetodate($DT_TIME+86400*365, 3);?>">一年</option>
</select>&nbsp;
不选表示长期有效
<span id="dposttotime" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">交易条件</td>
<td class="tr">
	<table width="100%">
	<tr>
	<td width="70">需求数量</td>
	<td><input name="post[amount]" type="text" size="20" value="<?php echo $amount;?>"/></td>
	</tr>
	<tr>
	<td>价格要求</td>
	<td><input name="post[price]" type="text" size="20" value="<?php echo $price;?>"/></td>
	</tr>
	<tr>
	<td>规格要求</td>
	<td><input name="post[standard]" type="text" size="20" value="<?php echo $standard;?>"/></td>
	</tr>
	<tr>
	<td>包装要求</td>
	<td><input name="post[pack]" type="text" size="20" value="<?php echo $pack;?>"/></td>
	</tr>
	</table>
	<span class="f_gray">建议详细填写交易条件，以便符合要求的卖家与您取得联系</span>
</td>
</tr>
<?php if(!$_userid) { ?>
<?php include template('guest_contact', 'chip');?>
<?php } ?>
<?php if($fee_add) { ?>
<tr>
<td class="tl">发布此信息需消费</td>
<td class="tr"><span class="f_b f_red"><?php echo $fee_add;?></span> <?php echo $fee_unit;?></td>
</tr>
<?php if($fee_currency == 'money') { ?>
<tr>
<td class="tl"><?php echo $DT['money_name'];?>余额</td>
<td class="tr"><span class="f_blue f_b"><?php echo $_money;?><?php echo $fee_unit;?></span> <a href="<?php echo $MODULE['2']['linkurl'];?>charge.php?action=pay" target="_blank" class="t">[充值]</a></td>
</tr>
<?php } else { ?>
<tr>
<td class="tl"><?php echo $DT['credit_name'];?>余额</td>
<td class="tr"><span class="f_blue f_b"><?php echo $_credit;?><?php echo $fee_unit;?></span> <a href="<?php echo $MODULE['2']['linkurl'];?>credits.php?action=buy" target="_blank" class="t">[购买]</a></td>
</tr>
<?php } ?>
<?php } ?>
<?php if($need_password) { ?>
<tr>
<td class="tl"><span class="f_red">*</span> 支付密码</td>
<td class="tr"><?php include template('password', 'chip');?> <span id="dpassword" class="f_red"></span></td>
</tr>
<?php } ?>
<?php if($need_question) { ?>
<tr>
<td class="tl"><span class="f_red">*</span> 验证问题</td>
<td class="tr"><?php include template('question', 'chip');?> <span id="danswer" class="f_red"></span></td>
</tr>
<?php } ?>
<?php if($need_captcha) { ?>
<tr>
<td class="tl"><span class="f_red">*</span> 验证码</td>
<td class="tr"><?php include template('captcha', 'chip');?> <span id="dcaptcha" class="f_red"></span></td>
</tr>
<?php } ?>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="50"><input type="submit" name="submit" value=" 提 交 " class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 返 回 " class="btn" onclick="history.back(-1);"/></td>
</tr>
</table>
</form>
<?php echo load('clear.js');?>
<?php if($action=='add') { ?>
<script type="text/javascript">s('mid_<?php echo $mid;?>');m('<?php echo $action;?>');</script>
<?php } else { ?>
<script type="text/javascript">s('mid_<?php echo $mid;?>');m('s<?php echo $status;?>');</script>
<?php } ?>
<?php } else { ?>
<div class="tt">
<form action="<?php echo DT_PATH;?>member/<?php echo $DT['file_my'];?>">
<input type="hidden" name="mid" value="<?php echo $mid;?>"/>
<input type="hidden" name="status" value="<?php echo $status;?>"/>
&nbsp;<?php echo category_select('catid', '行业分类', $catid, $moduleid);?>&nbsp;
<?php echo dselect($TYPE, 'typeid', '信息类型', $typeid);?>&nbsp;
<input type="text" size="50" name="kw" value="<?php echo $kw;?>" title="关键词"/>&nbsp;
<input type="submit" value=" 搜 索 " class="btn"/>
<input type="button" value=" 重 置 " class="btn" onclick="window.location='<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=<?php echo $mid;?>&status=<?php echo $status;?>';"/>
</form>
</div>
<div class="ls">
<form method="post">
<table cellpadding="0" cellspacing="0" class="tb">
<tr>
<th width="20"><input type="checkbox" onclick="checkall(this.form);"/></th>
<th>标 题</th>
<th>行 业</th>
<th><?php if($timetype=='add') { ?>添加<?php } else { ?>更新<?php } ?>时间</th>
<th>浏览</th>
<th width="40">管理</th>
</tr>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td><input type="checkbox" name="itemid[]" value="<?php echo $v['itemid'];?>"/></td>
<td align="left" title="<?php echo $v['alt'];?>">&nbsp;<?php if($v['status']==3) { ?><a href="<?php echo $v['linkurl'];?>" target="_blank" class="t"><?php } else { ?><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=<?php echo $mid;?>&action=edit&itemid=<?php echo $v['itemid'];?>" class="t"><?php } ?><?php echo $v['title'];?></a><?php if($v['status']==1 && $v['note']) { ?> <a href="javascript:" onclick="alert('<?php echo $v['note'];?>');"><img src="image/why.gif" title="未通过原因"/></a><?php } ?></td>
<td><a href="<?php echo $MOD['linkurl'];?><?php echo $CATEGORY[$v['catid']]['linkurl'];?>" target="_blank"><?php echo $CATEGORY[$v['catid']]['catname'];?></a></td>
<?php if($timetype=='add') { ?>
<td class="f_gray px11" title="更新时间 <?php echo timetodate($v['edittime'], 5);?>"><?php echo timetodate($v['addtime'], 5);?></td>
<?php } else { ?>
<td class="f_gray px11" title="添加时间 <?php echo timetodate($v['addtime'], 5);?>"><?php echo timetodate($v['edittime'], 5);?></td>
<?php } ?>
<td class="f_gray px11"><?php echo $v['hits'];?></td>
<td>
<a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=<?php echo $mid;?>&action=edit&itemid=<?php echo $v['itemid'];?>"><img width="16" height="16" src="image/edit.png" title="修改" alt=""/></a>&nbsp;
<a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=<?php echo $mid;?>&action=add&itemid=<?php echo $v['itemid'];?>&catid=<?php echo $v['catid'];?>"><img width="16" height="16" src="image/new.png" title="复制信息" alt=""/></a>
</td>
</tr>
<?php } } ?>
</table>
</div>
<div class="btns">
<input type="submit" value=" 删除选中 " class="btn" onclick="if(confirm('确定要删除选中信息吗？')){this.form.action='?mid=<?php echo $mid;?>&status=<?php echo $status;?>&action=delete'}else{return false;}"/>
<?php if($timetype!='add') { ?>
<input type="submit" value=" 刷新选中 " class="btn" onclick="this.form.action='?mid=<?php echo $mid;?>&status=<?php echo $status;?>&action=refresh';"/>
<?php if($MOD['credit_refresh']) { ?>
刷新一条信息一次需消费 <strong class="f_red"><?php echo $MOD['credit_refresh'];?></strong> <?php echo $DT['credit_name'];?>，当<?php echo $DT['credit_name'];?>不足时将不可刷新
<?php } ?>
<?php } ?>
</div>
</form>
<?php if($MG['buy_limit'] || (!$MG['fee_mode'] && $MOD['fee_add'])) { ?>
<div class="limit">
<?php if($MG['buy_limit']) { ?>
总共可发 <span class="f_b f_red"><?php echo $MG['buy_limit'];?></span> 条&nbsp;&nbsp;&nbsp;
当前已发 <span class="f_b"><?php echo $limit_used;?></span> 条&nbsp;&nbsp;&nbsp;
还可以发 <span class="f_b f_blue"><?php echo $limit_free;?></span> 条&nbsp;&nbsp;&nbsp;
<?php } ?>
<?php if(!$MG['fee_mode'] && $MOD['fee_add']) { ?>
发布信息收费 <span class="f_b f_red"><?php echo $MOD['fee_add'];?></span> <?php if($MOD['fee_currency'] == 'money') { ?><?php echo $DT['money_unit'];?><?php } else { ?><?php echo $DT['credit_unit'];?><?php } ?>/条&nbsp;&nbsp;&nbsp;
可免费发布 <span class="f_b"><?php if($MG['buy_free_limit']<0) { ?>无限<?php } else { ?><?php echo $MG['buy_free_limit'];?><?php } ?></span> 条&nbsp;&nbsp;&nbsp;
<?php } ?>
</div>
<?php } ?>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">s('mid_<?php echo $mid;?>');m('s<?php echo $status;?>');</script>
<?php } ?>
<?php if($action == 'add' || $action == 'edit') { ?>
<script type="text/javascript">
function _p() {
	if($('tag').value) {
		Ds('reccate');
	}
}
function check() {
	var l;
	var f;
	f = 'tag';
	l = $(f).value.length;
	if(l < 2 || l > 16) {
		Dmsg('产品关键字应为2-16字，当前已输入'+l+'字', f);
		return false;
	}
	f = 'title';
	l = $(f).value.length;
	if(l < 2 || l > 30) {
		Dmsg('信息标题应为2-30字，当前已输入'+l+'字', f);
		return false;
	}
	f = 'catid_1';
	if($(f).value == 0) {
		Dmsg('请选择所属行业', 'catid', 1);
		return false;
	}
	f = 'content';
	l = FCKLen();
	if(l < 15 || l > 50000) {
		Dmsg('详细说明应为15-50000字，当前已输入'+l+'字', f);
		return false;
	}
	<?php if($FD) { ?><?php echo fields_js();?><?php } ?>
<?php if($need_password) { ?>
	f = 'password';
	l = $(f).value.length;
	if(l < 6) {
		Dmsg('请填写支付密码', f);
		return false;
	}
<?php } ?>
<?php if($need_question) { ?>
	f = 'answer';
	l = $(f).value.length;
	if(l < 1) {
		Dmsg('请填写验证问题', f);
		return false;
	}
	if($('c'+f).innerHTML.indexOf('error') != -1) {
		$(f).focus();
		return false;
	}
<?php } ?>
<?php if($need_captcha) { ?>
	f = 'captcha';
	l = $(f).value;
	if(!is_captcha(l)) {
		Dmsg('请填写正确的验证码', f);
		return false;
	}
	if($('c'+f).innerHTML.indexOf('error') != -1) {
		$(f).focus();
		return false;
	}
<?php } ?>
	return true;
}
</script>
<?php } ?>
<?php include template('footer', 'member');?>