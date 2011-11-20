<?php defined('IN_DESTOON') or exit('Access Denied');?><table width="100%">
      <?php if($i%$cols==0) { ?><tr align="center"><?php } ?>
	 <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
		
		<td width="50%" valign="top"><a href="<?php echo $t['linkurl'];?>"<?php if($target) { ?> target="<?php echo $target;?>"<?php } ?>><img src="<?php echo $t['thumb'];?>" width="<?php echo $width;?>" height="<?php echo $height;?>" alt="<?php echo $t['alt'];?> (<?php echo $t['items'];?>图)"/></a>
			<ul>
			<li><a href="<?php echo $t['linkurl'];?>"<?php if($target) { ?> target="<?php echo $target;?>"<?php } ?>><?php echo dsubstr($t['title'],'14','...');?></a></li>
			<?php if($datetype) { ?><li class="px11 f_gray"><?php echo timetodate($t['addtime'], $datetype);?></li><?php } ?>
			</ul>
		</td>
	  <?php } } ?>
	<?php if($i%$cols==($cols-1)) { ?></tr><?php } ?>
</table>
<?php if($showpage && $pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
