<?php defined('IN_DESTOON') or exit('Access Denied');?><div class="main_head"><div><span class="f_r"><a href="<?php echo userurl($username, 'file=introduce', $domain);?>"><img src="<?php echo $MODULE['4']['linkurl'];?>image/more.gif" title="更多"/></a></span><strong><?php echo $main_name[$HM];?></strong></div></div>
<div class="main_body">
	<div class="lh18 px13 pd10">
	<img src="<?php echo $COM['thumb'];?>" align="right" style="margin:5px 0 5px 10px;padding:5px;border:#C0C0C0 1px solid;"/><?php echo $COM['intro'];?> [<a href="<?php echo userurl($username, 'file=introduce', $domain);?>" class="t">详细介绍</a>]
	<div class="c_b"></div>
	</div>
</div>