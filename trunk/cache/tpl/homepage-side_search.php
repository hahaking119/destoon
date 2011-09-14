<?php defined('IN_DESTOON') or exit('Access Denied');?><div class="side_head"><div><strong><?php echo $side_name[$HS];?></strong></div></div>
<div class="side_body">
<form action="<?php echo $MODULE['4']['linkurl'];?>home.php" onsubmit="return check_kw();">
<input type="hidden" name="action" value="search"/>
<input type="hidden" name="homepage" value="<?php echo $username;?>"/>
<input type="text" name="kw" value="<?php if($kw) { ?><?php echo $kw;?><?php } else { ?>输入关键词<?php } ?>" size="25" id="kw" class="inp" onfocus="if(this.value=='输入关键词')this.value='';"/>
<div style="padding:10px 0 0 0;">
<select name="file">
<?php if($menu_show['1']) { ?><option value="sell"<?php if($file=='sell') { ?> selected<?php } ?>><?php echo $menu_name['1'];?></option><?php } ?>
<?php if($menu_show['2']) { ?><option value="buy"<?php if($file=='buy') { ?> selected<?php } ?>><?php echo $menu_name['2'];?></option><?php } ?>
<?php if($menu_show['3']) { ?><option value="news"<?php if($file=='news') { ?> selected<?php } ?>><?php echo $menu_name['3'];?></option><?php } ?>
<?php if($menu_show['4']) { ?><option value="credit"<?php if($file=='credit') { ?> selected<?php } ?>><?php echo $menu_name['4'];?></option><?php } ?>
<?php if($menu_show['5']) { ?><option value="job"<?php if($file=='job') { ?> selected<?php } ?>><?php echo $menu_name['5'];?></option><?php } ?>
<?php if($menu_show['7']) { ?><option value="photo"<?php if($file=='photo') { ?> selected<?php } ?>><?php echo $menu_name['7'];?></option><?php } ?>
<?php if($menu_show['8']) { ?><option value="info"<?php if($file=='info') { ?> selected<?php } ?>><?php echo $menu_name['8'];?></option><?php } ?>
<?php if($menu_show['9']) { ?><option value="brand"<?php if($file=='brand') { ?> selected<?php } ?>><?php echo $menu_name['9'];?></option><?php } ?>
<?php if($menu_show['10']) { ?><option value="video"<?php if($file=='video') { ?> selected<?php } ?>><?php echo $menu_name['10'];?></option><?php } ?>
</select>&nbsp;
<input type="submit" value=" 搜 索 " class="sbm"/>
</div>
</form>
</div>