<?php defined('IN_DESTOON') or exit('Access Denied');?><div class="main_head"><div><span class="f_r"><a href="<?php echo userurl($username, 'file=sell', $domain);?>"><img src="<?php echo $MODULE['4']['linkurl'];?>image/more.gif" title="更多"/></a></span><strong><?php echo $main_name[$HM];?></strong></div></div>
<div class="main_body">
<?php $tags=tag("moduleid=5&table=sell&condition=status>2 and username='$username' and elite=1 and thumb!=''&pagesize=".$main_num[$HM]."&order=edittime desc&template=null&fields=itemid,title,linkurl,thumb,edittime");?>
<div id="elite_0" style="height:180px;overflow:hidden;">
<div id="elite_1">
<table cellpadding="0" cellspacing="0" width="100%">
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<?php if($i%5==0) { ?><tr align="center"><?php } ?>
<td valign="top" width="20%" height="180">
<div class="thumb" onmouseover="this.className='thumb thumb_on';" onmouseout="this.className='thumb';">
	<a href="<?php if($homeurl) { ?><?php echo $t['linkurl'];?><?php } else { ?><?php echo userurl($username, 'file=sell&itemid='.$t['itemid'], $domain);?><?php } ?>"><img src="<?php echo imgurl($t['thumb'], 1);?>" width="100" height="100" alt="<?php echo $t['alt'];?>"/></a>
	<div><a href="<?php if($homeurl) { ?><?php echo $t['linkurl'];?><?php } else { ?><?php echo userurl($username, 'file=sell&itemid='.$t['itemid'], $domain);?><?php } ?>" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a></div>
	<p><?php echo timetodate($t['edittime'], 3);?></p>
</div>
</td>
<?php if($i%5==4) { ?></tr><?php } ?>
<?php } } ?>
</table>
</div>
</div>
<script type="text/javascript">
var stopscroll = false;
var scrollElem = $("elite_0");
var marqueesHeight = scrollElem.style.height;
scrollElem.onmouseover = new Function('stopscroll = true');
scrollElem.onmouseout  = new Function('stopscroll = false');
var preTop = 0;
var currentTop = 0;
var stoptime = 0;
var leftElem = $("elite_1");
function init_srolltext(){
	scrollElem.scrollTop = 0;
	setInterval('scrollUp()', 10);
}
function scrollUp(){
	if(stopscroll) return;
	currentTop += 1;
	if(currentTop == 181) {
		stoptime += 1;
		currentTop -= 1;
		if(stoptime == 300) {
			currentTop = 0;
			stoptime = 0;
		}
	} else {
		preTop = scrollElem.scrollTop;
		scrollElem.scrollTop += 1;
		if(preTop == scrollElem.scrollTop){
			scrollElem.scrollTop = 0;
			scrollElem.scrollTop += 1;
		}
	}
}
scrollElem.appendChild(leftElem.cloneNode(true));
init_srolltext();
</script>
</div>