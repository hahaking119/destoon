<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
   <?php if($i%$cols==0) { ?> <td valign="top"><?php } ?>
    <ul>
       <li class="protu">
          <a href="<?php echo $t['linkurl'];?>"<?php if($target) { ?> target="<?php echo $target;?>"<?php } ?>>
	   <img src="<?php echo $t['thumb'];?>" width="<?php echo $width;?>" height="<?php echo $height;?>" alt="<?php echo $t['alt'];?> (<?php echo $t['items'];?>图)"/>
	  </a>
       </li>
       <li class="protitle"><a href="<?php echo $t['linkurl'];?>"<?php if($target) { ?> target="<?php echo $target;?>"<?php } ?>><?php echo $t['title'];?></a></li>
    </ul>
   <?php if($i%$cols==($cols-1)) { ?></td><?php } ?>
<?php } } ?>

