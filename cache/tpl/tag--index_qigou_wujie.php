<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
<li title=""><span class="f_r">[求购]</span> <a href="<?php if($t['domain']) { ?><?php echo $t['domain'];?><?php } else { ?><?php echo $t['linkurl'];?><?php } ?>"><?php echo $t['title'];?></a> </li>
<?php } } ?>