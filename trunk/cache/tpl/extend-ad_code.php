<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if($typeid==1) { ?>
<?php echo $code;?>
<?php } else if($typeid==2) { ?>
<a href="<?php echo $url;?>" title="<?php echo $text_title;?>" target="_blank"><?php echo $text_name;?></a>
<?php } else if($typeid==3) { ?>
<?php if($url) { ?><a href="<?php echo $url;?>" target="_blank"><?php } ?><img src="<?php echo $image_src;?>" width="<?php echo $width;?>" height="<?php echo $height;?>" alt="<?php echo $image_alt;?>"/><?php if($url) { ?></a><?php } ?>
<?php } else if($typeid==4) { ?>
<?php if($url) { ?><a href="<?php echo $url;?>" target="_blank"><img src="<?php echo DT_SKIN;?>image/spacer.gif" width="<?php echo $width;?>" height="<?php echo $height;?>" alt="" style="position:absolute;z-index:2;"/></a><?php } ?><embed src="<?php echo $flash_src;?>" quality="high" loop="false" extendspage="http://get.adobe.com/flashplayer/" type="application/x-shockwave-flash" wmode="transparent" width="<?php echo $width;?>" height="<?php echo $height;?>"></embed>
<?php } else if($typeid == 5) { ?>
<script type="text/javascript">
var pics = "<?php if(is_array($tags)) { foreach($tags as $k => $v) { ?><?php if($k) { ?>|<?php } ?><?php echo $v['thumb'];?><?php } } ?>";
var links = "<?php if(is_array($tags)) { foreach($tags as $k => $v) { ?><?php if($k) { ?>|<?php } ?><?php echo $v['linkurl'];?><?php } } ?>";
var texts = "<?php if(is_array($tags)) { foreach($tags as $k => $v) { ?><?php if($k) { ?>|<?php } ?><?php echo $v['title'];?><?php } } ?>";
document.write('<embed src="<?php echo DT_PATH;?>file/flash/player.swf" wmode="opaque" FlashVars="pics='+pics+'&links='+links+'&texts=&borderwidth=<?php echo $width;?>&borderheight=<?php echo $height;?>&textheight=0" menu="false" bgcolor="#FFFFFF" quality="high" width="<?php echo $width;?>" height="<?php echo $height;?>" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" extendspage="http://get.adobe.com/flashplayer/"></embed>');
</script>
<?php } else if($typeid==6) { ?>
	<?php if($tags) { ?>
		<div id="adword">
		<div class="adword"><?php include template('list-'.$ad_module, 'tag');?></div>
		</div>
	<?php } ?>
<?php } ?>