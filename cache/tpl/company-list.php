<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div class="m">
<div class="m_l_1 f_l">
	<div class="left_box">		
		<div class="pos">当前位置: <a href="<?php echo DT_PATH;?>">首页</a> &raquo; <a href="<?php echo $MOD['linkurl'];?>"><?php echo $MOD['name'];?></a> &raquo; <?php echo cat_pos($catid, ' &raquo; ');?></div>
		<div class="category" style="border-bottom:#CCCCCC 1px solid;">
			<p><img src="<?php echo DT_SKIN;?>image/arrow.gif" width="17" height="12" alt=""/> <strong>按行业浏览</strong></p>
			<div>
			<table width="100%" cellpadding="3">
			<?php if(is_array($maincat)) { foreach($maincat as $k => $v) { ?>
			<?php if($k%$MOD['page_subcat']==0) { ?><tr><?php } ?>
			<td<?php if($v['catid']==$catid) { ?> class="f_b"<?php } ?>><a href="<?php echo $MOD['linkurl'];?><?php echo $v['linkurl'];?>"><?php echo set_style($v['catname'],$v['style']);?></a> <span class="f_gray px10">(<?php echo $ITEMS[$v['catid']];?>)</span></td>
			<?php if($k%$MOD['page_subcat']==($MOD['page_subcat']-1)) { ?></tr><?php } ?>
			<?php } } ?>
			</table>
			</div>
		</div>
		<?php if($page == 1) { ?><?php echo load('ad_m'.$moduleid.'_c'.$catid.'.htm');?><?php } ?>	
		<?php echo tag("moduleid=$moduleid&condition=groupid>5 and catids like '%,".$catid.",%'&catid=$catid&pagesize=".$MOD['pagesize']."&page=$page&showpage=1&update=1&datetype=5&order=".$MOD['order']."&fields=".$MOD['fields']."&template=list-company");?>
		<br/>
	</div>
</div>
<div class="m_n f_l">&nbsp;</div>
<div class="m_r_1 f_l">
	<div class="sponsor"><?php echo ad($moduleid,$catid,$kw,7);?></div>
	<div class="box_head_1"><div><strong>本周搜索排行</strong></div></div>
	<div class="box_body">
		<div class="rank_list">
			<?php echo tag("moduleid=$moduleid&table=keyword&condition=moduleid=$moduleid and status=3 and updatetime>$today_endtime-86400*7&pagesize=10&order=week_search desc&key=week_search&template=list-search_rank", -2);?>
		</div>		
	</div>
	<div class="b10">&nbsp;</div>
	<div class="box_head_1"><div><strong>按地区浏览</strong></div></div>
	<div class="box_body">
			<table width="100%" cellpadding="3">
			<?php $mainarea = get_mainarea(0, $AREA)?>
			<?php if(is_array($mainarea)) { foreach($mainarea as $k => $v) { ?>
			<?php if($k%2==0) { ?><tr><?php } ?>
			<td><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?areaid='.$v['areaid']);?>"><?php echo $v['areaname'];?></a></td>
			<?php if($k%2==1) { ?></tr><?php } ?>
			<?php } } ?>
			</table>
	</div>	
</div>
</div>
<?php include template('footer');?>