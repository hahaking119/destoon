<?php defined('IN_DESTOON') or exit('Access Denied');?><div class="m_new">
	<div class="b10">&nbsp;</div>
	<div class="foot_search">
		<div class="foot_search_m" id="foot_search_m">
		<?php if(is_array($MODULE)) { foreach($MODULE as $m) { ?><?php if($m['ismenu'] && !$m['islink']) { ?><span id="foot_search_m_<?php echo $m['moduleid'];?>" onclick="setFModule(<?php echo $m['moduleid'];?>)" class="<?php if($m['moduleid']==$searchid) { ?>f_b<?php } else { ?><?php } ?>"><?php echo $m['name'];?></span> | <?php } ?><?php } } ?>
		</div>
		<div>
		<form id="foot_search" action="<?php echo DT_PATH;?>search.php" onsubmit="return Fsearch();">
		<input type="hidden" name="moduleid" value="<?php echo $searchid;?>" id="foot_moduleid"/>
		<input type="text" name="kw" class="foot_search_i" id="foot_kw" value="<?php if($kw) { ?><?php echo $kw;?><?php } else { ?>请输入关键词<?php } ?>" onfocus="if(this.value=='请输入关键词') this.value='';"/>&nbsp;&nbsp;
		<input type="submit" class="foot_search_s" id="foot_search_s" value="搜索"/>
		</form>
		</div>
	</div>
	<div class="b10">&nbsp;</div>
</div>
<div class="m_new">
	<div class="foot">
		<div>
		<a href="<?php echo DT_PATH;?>">网站首页</a>
		<?php echo tag("table=webpage&condition=item=1&order=listorder desc,itemid desc&template=list-webpage");?>
		| <a href="<?php echo DT_PATH;?>sitemap/">网站地图</a>
		<?php if(extend_setting('link_enable')) { ?> | <a href="<?php echo extendurl('link');?>">友情链接</a><?php } ?>
		<?php if(extend_setting('guestbook_enable')) { ?> | <a href="<?php echo extendurl('guestbook');?>">网站留言</a><?php } ?>
		<?php if(extend_setting('ad_enable')) { ?> | <a href="<?php echo extendurl('ad');?>">广告服务</a><?php } ?>
		<?php if($DT['icpno']) { ?>
		| <a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $DT['icpno'];?></a>
		<?php } ?>
		</div>
		<?php echo $DT['copyright'];?><br/><span id="powered"><a href="http://www.destoon.com" target="_blank"><strong>Powered by Destoon <?php echo DT_VERSION;?></strong></a></span>
	</div>
</div>
<script type="text/javascript">
	document.write('<script type="text/javascript" src="<?php echo DT_PATH;?>api/task.js.php?<?php echo $destoon_task;?>&refresh='+Math.random()+'.js"></sc'+'ript>');
</script>
<?php include template('stats', 'chip');?>
</body>
</html>