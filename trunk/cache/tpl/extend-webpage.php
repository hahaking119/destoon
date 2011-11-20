<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div class="m">
	<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<td valign="top" class="left_menu">
		<ul>
		<li><a href="<?php echo DT_PATH;?>">网站首页</a></li>
		<?php $tags=tag("table=webpage&condition=item='$_item'&order=listorder desc,itemid desc&template=null");?>
		<?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
		<li id="webpage_<?php echo $t['itemid'];?>"><a href="<?php if($t['domain']) { ?><?php echo $t['domain'];?><?php } else { ?><?php echo $t['linkurl'];?><?php } ?>"><?php echo $t['title'];?></a></li>
		<?php } } ?>
		</ul>
	</td>
	<td width="8"> </td>
	<td valign="top">
		<div class="left_box">		
			<div class="pos">当前位置: <a href="<?php echo DT_PATH;?>">首页</a> &raquo; <a href="<?php echo DT_PATH;?><?php echo $linkurl;?>"><?php echo $title;?></a></div>
			<div style="border-bottom:#C0C0C0 1px dotted;margin:5px 15px 5px 15px;line-height:36px;" class="t_c px14"><strong><?php echo $title;?></strong></div>
			<div class="content" id="content"><?php echo $content;?></div>
		<br/>
		</div>
	</td>
	</tr>
	</table>
</div>
<script type="text/javascript">
try {$('webpage_<?php echo $itemid;?>').style.backgroundColor = '#CDDCE4';}catch (e){}
</script>
<?php include template('footer');?>