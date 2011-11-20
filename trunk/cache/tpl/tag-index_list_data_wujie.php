<?php defined('IN_DESTOON') or exit('Access Denied');?><?php global $PROCESS;?>
<ul>
<?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
	<li>
	<span class="f_r"><?php echo timetodate($t['edittime'], $datetype);?></span>
	<?php if($t['credit']) { ?><span class="know_credit"><?php echo $t['credit'];?></span> <?php } ?>
        <a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>" class="konw_a"><?php echo $t['title'];?></a>
        </li>
<?php } } ?>	
</ul>
	
