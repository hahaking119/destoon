<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<li class="px11">
 <a href="<?php echo $t['linkurl'];?>" target="_blank"><span> <?php echo dsubstr($t['title'],$length,$suffix = '...');?></span></a>
</li>
<?php } } ?>