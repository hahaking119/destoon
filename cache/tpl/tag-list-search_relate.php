<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if($tags) { ?>
<div class="sch_find">
您是不是在找?
</div>
<div class="sch_relate">
<ul>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<li><span class="f_r">&nbsp;&nbsp;约<span class="f_orange"><?php echo $t['items'];?></span>条</span><a href="<?php echo $path;?><?php echo rewrite('search.php?kw='.urlencode($t['word']));?>"<?php if($target) { ?> target="<?php echo $target;?>"<?php } ?>><?php echo $t['word'];?></a></li>
<?php } } ?>
</ul>
</div>
<?php } ?>