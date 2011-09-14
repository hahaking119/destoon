<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', $template);?>
<div class="dsn" id="pos_show">您当前的位置：<a href="<?php echo $COM['linkurl'];?>">首页</a> &raquo; <a href="<?php echo $MENU[$menuid]['linkurl'];?>"><?php echo $MENU[$menuid]['name'];?></a><?php if($itemid) { ?> &raquo; <?php echo $title;?><?php } ?></div>
<div class="main_head"><div><strong><?php echo $MENU[$menuid]['name'];?></strong></div></div>
<div class="main_body">
<?php if($itemid) { ?>	
	<div class="title"><?php echo $title;?></div>
	<div class="info">更新时间：<?php echo $editdate;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;有效期至</strong>：<?php if($todate) { ?><?php echo $todate;?><?php } else { ?>长期有效<?php } ?><?php if($expired) { ?> <span class="f_red">[已过期]</span><?php } ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;浏览次数：<?php echo $hits;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $MENU[$menuid]['linkurl'];?>">返回列表</a></div>
	<div class="content" id="content"><?php echo $content;?></div>
	<script type="text/javascript">
	var content_id = 'content';
	var img_max_width = 600;
	</script>
	<script type="text/javascript" src="<?php echo DT_PATH;?>file/script/content.js"></script>
</div>
	<?php if($could_comment && in_array($moduleid, explode(',', get_module_setting(3, 'comment_module')))) { ?>
	<div id="comment_div" style="display:;">
		<div class="main_head"><div><span class="f_r px12">共<span id="comment_count">0</span>条&nbsp;&nbsp;</span><strong><span id="message_title">相关评论</span></strong></div></div>
		<div class="main_body"><iframe src="<?php echo $MODULE['3']['linkurl'];?>comment.php?mid=<?php echo $moduleid;?>&itemid=<?php echo $itemid;?>" id="destoon_comment" style="width:100%;" scrolling="no" frameborder="0"></iframe>
		</div>
	</div>
	<?php } ?>
<?php } else { ?>
	<table cellpadding="2" cellspacing="1" width="100%" align="center">
	<?php if(is_array($lists)) { foreach($lists as $v) { ?>
	<tr>
	<td class="px13" height="25">&middot;<a href="<?php echo $v['linkurl'];?>"><?php echo $v['title'];?></a></td>
	<td align="center" width="80" class="f_gray px11"><?php echo timetodate($v['edittime'], 3);?></td>
	</tr>
	<?php } } ?>
	</table>
	<div class="pages"><?php echo $pages;?></div>
<?php } ?>
</div>
<?php include template('footer', $template);?>