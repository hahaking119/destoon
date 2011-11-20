<?php defined('IN_DESTOON') or exit('Access Denied');?> <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
      <div class="iTit"> 
           <a href="<?php echo $t['linkurl'];?>"<?php if($target) { ?> target="<?php echo $target;?>"<?php } ?>><?php echo $t['title'];?></a>
      </div>
      <div class="iTitcontent"> <a href="<?php echo $t['linkurl'];?>"<?php if($target) { ?> target="<?php echo $target;?>"<?php } ?>><?php echo dsubstr($t['introduce'],'124','...');?></a>         </div>
  <?php } } ?>
           