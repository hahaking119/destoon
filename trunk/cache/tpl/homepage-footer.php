<?php defined('IN_DESTOON') or exit('Access Denied');?></td>
<?php if($side_pos==1) { ?>
<td width="10"></td>
<td width="<?php echo $side_width;?>" valign="top" id="side"><?php include template('side', $template);?></td>
<?php } ?>
</tr>
</table>
</div>
<div class="m">
	<div class="foot" id="foot">
		<div>
			<a href="<?php echo $COM['linkurl'];?>">网站首页</a>
			<?php if(is_array($MENU)) { foreach($MENU as $k => $v) { ?>
			&nbsp; | &nbsp;<a href="<?php echo $v['linkurl'];?>"><?php echo $v['name'];?></a>
			<?php } } ?>
			&nbsp; | &nbsp;<a href="<?php echo $MODULE['2']['linkurl'];?>">管理入口</a>
			<br/>
			&copy;<?php echo timetodate($DT_TIME, 'Y');?> <?php echo $COM['company'];?> 版权所有&nbsp;&nbsp;&nbsp;技术支持：<a href="<?php echo DT_PATH;?>" target="_blank"><?php echo $DT['sitename'];?></a><?php if($show_stats) { ?>&nbsp;&nbsp;&nbsp;&nbsp;访问量：<?php echo $COM['hits'];?><?php } ?><?php if($COM['icp']) { ?><br/><a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $COM['icp'];?></a><?php } ?>
		</div>
	</div>
</div>
<script type="text/javascript">$('position').innerHTML = $('pos_show').innerHTML;</script>
<?php include template('stats', 'chip');?>
</body>
</html>