<?php defined('IN_DESTOON') or exit('Access Denied');?><ul>
  <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
   <li>
     <a href="<?php echo $t['linkurl'];?>"<?php if($target) { ?> target="<?php echo $target;?>"<?php } ?> title="<?php echo $t['alt'];?>">&raquo;<?php echo dsubstr($t['title'], $length=24, $suffix = '..');?></a>
   </li>
  <?php } } ?>
</ul>