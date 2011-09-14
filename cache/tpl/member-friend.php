<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if($action == 'my') { ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo DT_CHARSET;?>" />
<title><?php if($head_title) { ?><?php echo $head_title;?><?php echo $DT['seo_delimiter'];?><?php } ?><?php echo $DT['sitename'];?></title>
<link rel="stylesheet" type="text/css" href="image/style.css" />
<script type="text/javascript" src="<?php echo DT_PATH;?>lang/<?php echo DT_LANG;?>/lang.js"></script>
<script type="text/javascript" src="<?php echo DT_PATH;?>file/script/config.js"></script>
<script type="text/javascript" src="<?php echo DT_PATH;?>file/script/common.js"></script>
<script type="text/javascript" src="<?php echo DT_PATH;?>file/script/admin.js"></script>
</head>
<body>
<div id="friend" style="background:#EBF0F6;">
<?php if($lists) { ?>
<table cellpadding="3" cellspacing="3" width="100%">
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<?php if($k%5==0) { ?><tr><?php } ?>
<td title="<?php echo $v['company'];?><?php if($v['note']) { ?>(<?php echo $v['note'];?>)<?php } ?>" width="20%"><a href="javascript:send('<?php if($from=='sms') { ?><?php echo $v['mobile'];?><?php } else { ?><?php echo $v['username'];?><?php } ?>');" class="t"><span style=""><?php if($v['truename']) { ?><?php echo $v['truename'];?><?php } else { ?><?php echo $v['username'];?><?php } ?></span></a></td>
<?php if($k%5==4) { ?></tr><?php } ?>
<?php } } ?>
</table>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">
function send(name) {
	parent.$('<?php echo $obj;?>').value=name;
	window.parent.cDialog();
}
</script>
<?php } else { ?>
<p style="padding:10px;"><a href="friend.php?action=add" class="t" target="_top">您还没有添加商友...点这里添加</a></p>
<?php } ?>
</div>
<script type="text/javascript">
try{parent.$('dload').style.display='none';parent.$('diframe').style.height = $('friend').scrollHeight+'px';} catch(e){}
</script>
</body>
</html>
<?php } else { ?>
<?php include template('header', $module);?>
<script type="text/javascript">c(1);</script>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="add"><a href="friend.php?action=add"><span>添加商友</span></a></td>
<td class="tab_nav">&nbsp;</td>
<td class="tab" id="home"><a href="friend.php"><span>我的商友</span></a></td>
<td class="tab_nav">&nbsp;</td>
<td class="tab" id="type"><a href="type.php?item=friend"><span>商友分类</span></a></td>
</tr>
</table>
</div>
<?php if($action == 'add') { ?>
<form method="post" action="friend.php" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<table cellpadding="5" cellspacing="1" class="tb">
<tr>
<td class="tl">分类</td>
<td class="tr"><?php echo $type_select;?>&nbsp; <a href="type.php?item=friend" class="t">[管理分类]</a></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 姓 名</td>
<td class="tr"><input type="text" size="20" name="post[truename]" id="truename" value="<?php echo $truename;?>"/> <?php echo dstyle('post[style]');?> <span id="dtruename" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">会员名</td>
<td class="tr"><input type="text" size="20" name="post[username]" id="username" value="<?php echo $username;?>"/> <input type="button" class="btn" value="显示资料" onclick="window.location='friend.php?action=add&username='+$('username').value;"/></td>
</tr>
<tr>
<td class="tl">公司名称</td>
<td class="tr"><input type="text" size="40" name="post[company]" id="company" value="<?php echo $company;?>"/></td>
</tr>
<tr>
<td class="tl">职位</td>
<td class="tr"><input type="text" size="20" name="post[career]" id="career" value="<?php echo $career;?>"/></td>
</tr>
<tr>
<td class="tl">电话</td>
<td class="tr"><input type="text" size="20" name="post[telephone]" id="telephone" value="<?php echo $telephone;?>"/></td>
</tr>
<tr>
<td class="tl">手机</td>
<td class="tr"><input type="text" size="20" name="post[mobile]" id="mobile"/></td>
</tr>
<tr>
<td class="tl">主页</td>
<td class="tr"><input type="text" size="40" name="post[homepage]" id="homepage" value="<?php echo $homepage;?>"/></td>
</tr>
<tr>
<td class="tl">Email</td>
<td class="tr"><input type="text" size="30" name="post[email]" id="email"/></td>
</tr>
<?php if($DT['im_qq']) { ?>
<tr>
<td class="tl">QQ</td>
<td class="tr"><input type="text" size="20" name="post[qq]" id="qq" value="<?php echo $qq;?>"/></td>
</tr>
<?php } ?>
<?php if($DT['im_ali']) { ?>
<tr>
<td class="tl">阿里旺旺</td>
<td class="tr"><input type="text" size="20" name="post[ali]" id="ali" value="<?php echo $ali;?>"/></td>
</tr>
<?php } ?>
<?php if($DT['im_msn']) { ?>
<tr>
<td class="tl">MSN</td>
<td class="tr"><input type="text" size="30" name="post[msn]" id="msn" value="<?php echo $msn;?>"/></td>
</tr>
<?php } ?>
<?php if($DT['im_skype']) { ?>
<tr>
<td class="tl">Skype</td>
<td class="tr"><input type="text" size="20" name="post[skype]" id="skype" value="<?php echo $skype;?>"/></td>
</tr>
<?php } ?>
<tr>
<td class="tl">备注</td>
<td class="tr"><input type="text" size="40" name="post[note]" id="note"/></td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="50"><input type="submit" name="submit" value=" 确 定 " class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value=" 重 置 " class="btn"/></td>
</tr>
</table>
</form>
<script type="text/javascript">s('friend');m('add');</script>
<?php } else if($action == 'edit') { ?>
<form method="post" action="friend.php" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<table cellpadding="5" cellspacing="1" class="tb">
<tr>
<td class="tl">分类</td>
<td class="tr"><?php echo $type_select;?>&nbsp; <a href="type.php?item=friend" class="t">[管理分类]</a></td>
</tr>
<tr>
<td class="tl">显示顺序</td>
<td class="tr f_gray"><input type="text" size="3" name="post[listorder]" id="listorder" value="<?php echo $listorder;?>"/> 请填写数字，数字越大越靠前</td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 姓名</td>
<td class="tr"><input type="text" size="20" name="post[truename]" id="truename" value="<?php echo $truename;?>"/> <?php echo dstyle('post[style]', $style);?> <span id="dtruename" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">会员名</td>
<td class="tr"><input type="text" size="20" name="post[username]" id="username" value="<?php echo $username;?>"/></td>
</tr>
<tr>
<td class="tl">公司名称</td>
<td class="tr"><input type="text" size="40" name="post[company]" id="company" value="<?php echo $company;?>"/></td>
</tr>
<tr>
<td class="tl">职位</td>
<td class="tr"><input type="text" size="20" name="post[career]" id="career" value="<?php echo $career;?>"/></td>
</tr>
<tr>
<td class="tl">电话</td>
<td class="tr"><input type="text" size="20" name="post[telephone]" id="telephone" value="<?php echo $telephone;?>"/></td>
</tr>
<tr>
<td class="tl">手机</td>
<td class="tr"><input type="text" size="20" name="post[mobile]" id="mobile" value="<?php echo $mobile;?>"/></td>
</tr>
<tr>
<td class="tl">主页</td>
<td class="tr"><input type="text" size="40" name="post[homepage]" id="homepage" value="<?php echo $homepage;?>"/></td>
</tr>
<tr>
<td class="tl">Email</td>
<td class="tr"><input type="text" size="30" name="post[email]" id="email" value="<?php echo $email;?>"/></td>
</tr>
<?php if($DT['im_qq']) { ?>
<tr>
<td class="tl">QQ</td>
<td class="tr"><input type="text" size="20" name="post[qq]" id="qq" value="<?php echo $qq;?>"/></td>
</tr>
<?php } ?>
<?php if($DT['im_ali']) { ?>
<tr>
<td class="tl">阿里旺旺</td>
<td class="tr"><input type="text" size="20" name="post[ali]" id="ali" value="<?php echo $ali;?>"/></td>
</tr>
<?php } ?>
<?php if($DT['im_msn']) { ?>
<tr>
<td class="tl">MSN</td>
<td class="tr"><input type="text" size="30" name="post[msn]" id="msn" value="<?php echo $msn;?>"/></td>
</tr>
<?php } ?>
<?php if($DT['im_skype']) { ?>
<tr>
<td class="tl">Skype</td>
<td class="tr"><input type="text" size="20" name="post[skype]" id="skype" value="<?php echo $skype;?>"/></td>
</tr>
<?php } ?>
<tr>
<td class="tl">备注</td>
<td class="tr"><input type="text" size="40" name="post[note]" id="note" value="<?php echo $note;?>"/></td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="50"><input type="submit" name="submit" value=" 修 改 " class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 返 回 " class="btn" onclick="history.back(-1);"/></td>
</tr>
</table>
</form>
<script type="text/javascript">s('friend');m('home');</script>
<?php } else { ?>
<form action="friend.php">
<div class="tt">
&nbsp;<?php echo $fields_select;?>&nbsp;
<input type="text" size="50" name="kw" value="<?php echo $kw;?>" title="关键词"/>&nbsp;
<?php echo $type_select;?>&nbsp;
<input type="submit" value=" 搜 索 " class="btn"/>
<input type="button" value=" 重 置 " class="btn" onclick="window.location='friend.php';"/>
</div>
</form>
<table cellpadding="5" cellspacing="1" width="100%" bgcolor="#9CB8CC">
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<?php if($k%2==0) { ?><tr><?php } ?>
<td valign="top" width="50%" bgcolor="#FFFFFF" onmouseover="this.style.backgroundColor='#F2F6FB';" onmouseout="this.style.backgroundColor='#FFFFFF';" title="<?php echo $v['note'];?>">
<?php if($v) { ?>
<table cellpadding="2" cellspacing="2" width="96%" align="center">
<tr>
<td height="24"><strong style="color:#444444;"><?php echo $v['dcompany'];?></strong></td>
</tr>
<tr>
<td height="22"><?php echo $v['truename'];?><?php if($v['career']) { ?> (<?php echo $v['career'];?>)<?php } ?></td>
</tr>
<tr>
<td height="20">电话：<?php echo $v['telephone'];?></td>
</tr>
<tr>
<td height="20">手机：<?php echo $v['mobile'];?></td>
</tr>
<tr>
<td height="20">
<span class="f_r" title="添加时间 <?php echo $v['adddate'];?>">
<a href="friend.php?typeid=<?php echo $v['typeid'];?>" class="t">[<?php echo $v['type'];?>]</a>&nbsp;
<a href="friend.php?action=edit&itemid=<?php echo $v['itemid'];?>" class="t">[修改]</a>&nbsp;
<a href="friend.php?action=delete&itemid=<?php echo $v['itemid'];?>" onclick="return confirm('确定要删除吗？此操作将不可撤销');" class="t">[删除]</a>&nbsp;
</span>
<?php if($v['homepage']) { ?><a href="<?php echo $v['homepage'];?>" target="_blank"><img width="16" height="16" src="<?php echo DT_SKIN;?>image/homepage.gif" title="公司主页" alt=""/></a>&nbsp;<?php } ?>
<?php if($DT['sms'] && $v['mobile']) { ?><a href="sms.php?action=add&mob=<?php echo $v['mobile'];?>"><img width="16" height="16" src="<?php echo DT_SKIN;?>image/mobile.gif" title="发送短信"/></a>&nbsp;<?php } ?>
<?php if($v['username']) { ?><a href="message.php?action=send&touser=<?php echo $v['username'];?>"><img width="16" height="16" src="<?php echo DT_SKIN;?>image/msg.gif" title="发送站内信" alt=""/></a>&nbsp;<?php } ?>
<?php if($v['email']) { ?><a href="sendmail.php?email=<?php echo $v['email'];?>"><img width="16" height="16" src="<?php echo DT_SKIN;?>image/email.gif" title="发送Email <?php echo $v['email'];?>" alt=""/></a>&nbsp;<?php } ?>
<?php if($v['qq'] && $DT['im_qq']) { ?><?php echo im_qq($v['qq']);?>&nbsp;<?php } ?>
<?php if($v['ali'] && $DT['im_ali']) { ?><?php echo im_ali($v['ali']);?>&nbsp;<?php } ?>
<?php if($v['msn'] && $DT['im_msn']) { ?><?php echo im_msn($v['msn']);?>&nbsp;<?php } ?>
<?php if($v['skype'] && $DT['im_skype']) { ?><?php echo im_skype($v['skype']);?>&nbsp;<?php } ?>
</td>
</tr>
</table>
<?php } else { ?>
&nbsp;
<?php } ?>
</td>
<?php if($k%2==1) { ?></tr><?php } ?>
<?php } } ?>
</table>
<?php if($MG['friend_limit']) { ?>
<div class="limit">商友上限 <span class="f_b f_red"><?php echo $MG['friend_limit'];?></span> 人&nbsp;&nbsp;&nbsp;当前已加 <span class="f_b"><?php echo $limit_used;?></span> 人&nbsp;&nbsp;&nbsp;还可以加 <span class="f_b f_blue"><?php echo $limit_free;?></span> 人</div>
<?php } ?>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">s('friend');m('home');</script>
<?php } ?>
<?php if($action=='add' || $action=='edit') { ?>
<script type="text/javascript">
function check() {
	if($('truename').value == '') {
		Dmsg('请填写姓名', 'truename');
		return false;
	}
	return true;
}
</script>
<?php } ?>
<?php include template('footer', $module);?>
<?php } ?>