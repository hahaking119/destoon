<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if(is_array($HSIDE)) { foreach($HSIDE as $HS => $SIDE) { ?>
<?php include template('side_'.$side_file[$HS], $template);?>
<?php } } ?>