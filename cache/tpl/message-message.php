<?php defined('IN_DESTOON') or exit('Access Denied');?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo DT_CHARSET;?>" />
<title>提示信息<?php echo $DT['seo_delimiter'];?><?php echo $DT['sitename'];?></title>
<style type="text/css">
*{font-size:12px;color:#2B61BA;}
body{font-family: Verdana, Arial, Helvetica, sans-serif;background:#F0F2F7;margin:0;}
input{color:#333333;}
a:link,a:visited,a:active {color:#ABBBD6;text-decoration:none;}
.msg{width:400px;background:#FFFFFF url('<?php echo DT_SKIN;?>image/messagebg.gif') repeat-x;margin:auto;}
.head{letter-spacing:2px;line-height:29px;height:26px;overflow:hidden;font-weight:bold;}
.content{padding:10px 20px 5px 20px;line-height:200%;word-break:break-all;border:#7998B7 1px solid;border-top:none;}
.ml{color:#FFFFFF;background:url('<?php echo DT_SKIN;?>image/message.gif') no-repeat 0 0;padding-left:10px;}
.mr{float:right;background:url('<?php echo DT_SKIN;?>image/message.gif') no-repeat 0 -34px;width:4px;font-size:1px;}
</style>
<script type="text/javascript">try {document.execCommand("BackgroundImageCache", false, true);} catch(e) {}</script>
</head>
<body onkeydown="if(event.keyCode==13) window.history.back();">
<table cellpadding="0" cellspacing="0" width="400"  align="center">
<tr>
<td height="150"></td>
</tr>
<tr>
<td>
	<div class="msg">
		<div class="head"><div class="mr"> </div><div class="ml">提示信息</div></div>
		<div class="content">
		<?php echo $dmessage;?><br/>
		<?php if($dforward == 'goback') { ?>
		<a href="javascript:window.history.back();">[ 点这里返回上一页 ]</a><br/>
		<?php } else { ?>
		<a href="<?php echo $dforward;?>">如果您的浏览器没有自动跳转，请点击这里</a><br/>
		<meta http-equiv="refresh" content="<?php echo $dtime;?>;URL=<?php echo $dforward;?>">
		<?php } ?>
		</div>
	</div>
</td>
</tr>
</table>
</body>
</html>