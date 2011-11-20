<?php defined('IN_DESTOON') or exit('Access Denied');?><table width="100%" cellspacing="2" cellpadding="2">
    <tbody>
       <tr><td valign="top" class="imb">
	<table width="100%">
	    <tbody>
		<tr align="center">
		<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
		   <?php if($i%$cols==0) { ?> <td width="50%" valign="top"><?php } ?>
		       <a href="<?php echo $t['linkurl'];?>"<?php if($target) { ?> target="<?php echo $target;?>"<?php } ?>>
		           <img src="<?php echo $t['thumb'];?>" width="<?php echo $width;?>" height="<?php echo $height;?>" alt="<?php echo $t['alt'];?> (<?php echo $t['items'];?>图)"/>
		       </a>
		       <ul><li><a href="<?php echo $t['linkurl'];?>"<?php if($target) { ?> target="<?php echo $target;?>"<?php } ?>><?php echo $t['title'];?></a></li></ul>
		    <?php if($i%$cols==($cols-1)) { ?></td><?php } ?>
		 <?php } } ?>
	         </tr>
	     </tbody>
          </table>
	</td></tr>
     </tbody>
</table>