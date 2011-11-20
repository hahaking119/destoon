<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if($pass) { ?>
<?php include template('header');?>
<!--[if IE]>
<style type="text/css">
#cursor_a {cursor:url('<?php echo DT_SKIN;?>image/prev.cur'),default;}
#cursor_b {cursor:url('<?php echo DT_SKIN;?>image/next.cur'),default;}
</style>
<![endif]-->
<div class="m_new">
<div class="photo_pos">当前位置: <a href="<?php echo DT_PATH;?>">首页</a> &raquo; <a href="<?php echo $MOD['linkurl'];?>"><?php echo $MOD['name'];?></a> &raquo; <?php echo cat_pos($catid, ' &raquo; ');?> &raquo;</div>
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td valign="top" class="photo_l">
<a name="p"></a>
<div class="photo_info">
<div class="photo_info_r"><span class="count_a"><?php echo $page;?></span> <span class="count_b">/ <?php echo $items;?></span></div>
<div>
<h1 class="title"><?php echo $title;?></h1>
日期：<span class="px11"><?php echo $adddate;?></span>&nbsp;&nbsp;&nbsp;
点击：<span id="hits" class="px11"><?php echo $hits;?></span>&nbsp;&nbsp;&nbsp;
<span onclick="View($('destoon_photo').src);" class="c_p">查看原图</span>
</div>
</div>
<div class="b10"></div>
<div id="photo"><?php include template('content', 'chip');?></div>
<?php if($P['introduce']) { ?><div class="photo_intro"><?php echo nl2br($P['introduce']);?></div><?php } ?>
<div class="b10"></div>
</td>
<td valign="top" class="photo_r">
<br/><br/><br/>
<a href="<?php echo $prev_photo;?>#p"><img src="<?php echo DT_SKIN;?>image/photo_prev.gif" title="上一张"/></a>
<br/><br/>
<div id="side">
<?php if($user_status == 3) { ?>
<?php $action = 'side';?>
<?php include template('content', 'chip');?>
<?php $action = '';?>
<?php } else { ?>
<div style="height:200px;">&nbsp;</div>
<?php } ?>
</div>
<br/><br/>
<a href="<?php echo $next_photo;?>#p"><img src="<?php echo DT_SKIN;?>image/photo_next.gif" title="下一张"/></a>
<br/><br/>
</td>
</tr>
</table>
</div>

<div class="m_new">
<div class="b10">&nbsp;</div>
<div class="box_head_2">
	<div><strong><?php echo $MOD['name'];?>说明</strong></div>
</div>
<div class="box_body" style="padding:0;">
<div class="content c_b" id="content"><?php echo $content;?></div>
<div class="left_head"><span class="f_r"><a href="<?php echo $MOD['linkurl'];?><?php echo $CAT['linkurl'];?>">更多..</a></span>推荐<?php echo $MOD['name'];?></div>
<div class="b5">&nbsp;</div>
<div class="thumb"><?php echo tag("moduleid=$moduleid&condition=status=3 and open=3 and level=1 and items>0&catid=$catid&order=".$MOD['order']."&length=20&width=120&height=90&pagesize=6&cols=6&template=list-photo");?></div>
<?php include template('comment', 'chip');?>
</div>
</div>

<div class="m_new">
	<form method="post" action="<?php echo $MODULE['2']['linkurl'];?>sendmail.php" name="sendmail" id="sendmail" target="_blank">
	<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/> 
	<input type="hidden" name="title" value="<?php echo $title;?>"/>
	<input type="hidden" name="linkurl" value="<?php echo $linkurl;?>"/>
	</form>
	<br/>
	<center>
	[ <a href="<?php echo $MOD['linkurl'];?>search.php"><?php echo $MOD['name'];?>搜索</a> ]&nbsp;
	[ <script type="text/javascript">addFav('加入收藏');</script> ]&nbsp;
	[ <a href="javascript:$('sendmail').submit();void(0);">告诉好友</a> ]&nbsp;
	[ <a href="javascript:Print();">打印本文</a> ]&nbsp;
	[ <a href="javascript:window.close()">关闭窗口</a> ]&nbsp;
	[ <a href="javascript:window.scrollTo(0,0);">返回顶部</a> ]
	</center>
	<br/>
</div>
<script type="text/javascript">
window.onload = function() { try{$('cursor_a').style.height = $('cursor_b').style.height =  $('destoon_photo').height+'px';} catch(e) {} }
</script>
<?php include template('footer');?>
<?php } else { ?>
<meta http-equiv="refresh" content="0;url=<?php echo $MOD['linkurl'];?>private.php?itemid=<?php echo $itemid;?>&page=<?php echo $page;?>">
<?php } ?>