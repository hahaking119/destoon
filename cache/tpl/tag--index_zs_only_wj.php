<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
<h2><a target="_blank" href="#"><span><?php echo $t['title'];?></span></a></h2>
<div style="padding-left:5px;padding-right:5px;padding-bottom:15px;padding-top:9px; line-height:18px;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $t['introduce'];?> ...</div>
<?php } } ?>		