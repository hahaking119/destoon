<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div class="m">
	<div class="left_box">		
		<div class="pos"><span class="f_r"><a href="javascript:window.close();">[关闭窗口]</a>&nbsp;&nbsp;</span>当前位置: <a href="<?php echo DT_PATH;?>">首页</a> &raquo; 查看大图</div>
		<br/><br/><center><img src="<?php echo $img;?>" onerror="alert('图片不存在');try{window.close();}catch(e){Go(DTPath);}" onload="if(this.width>900) this.width=900;" style="border:#CCCCCC 1px solid;padding:5px;" ondblclick="window.close();" oncontextmenu="return false;" /></center><br/><br/>
	</div>
</div>
<script type="text/javascript">
// onmousewheel="return zoomimg(this);" 
function zoomimg(o) {
  var zoom = parseInt(o.style.zoom, 10) || 100;
  zoom += event.wheelDelta/12;
  if(zoom > 0) o.style.zoom = zoom+'%';
  return false;
}
</script>
<?php include template('footer');?>