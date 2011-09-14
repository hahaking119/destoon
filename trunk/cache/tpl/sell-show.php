<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div class="m">
<div class="left_box">		
		<div class="pos"><span class="f_r"><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=<?php echo $moduleid;?>&action=add&catid=<?php echo $catid;?>"><img src="<?php echo DT_SKIN;?>image/btn_add.gif" width="81" height="20" alt="发布信息" style="margin:3px 0 0 0;"/></a></span>当前位置: <a href="<?php echo DT_PATH;?>">首页</a> &raquo; <a href="<?php echo $MOD['linkurl'];?>"><?php echo $MOD['name'];?></a> &raquo; <?php echo cat_pos($catid, ' &raquo; ');?> &raquo;</div>
		<div class="b10 c_b"></div>
		<table width="100%">
		<tr>
		<td width="10"> </td>
		<td>
			<table width="100%">
			<tr>
			<td colspan="3">
				<h1 class="title_trade"><?php echo $title;?></h1></td>
			</tr>
			<tr>
			<td width="250" valign="top">
				<div class="album">
					<table width="100%" cellpadding="0" cellspacing="0">
					<tr align="center">
					<td width="250" valign="top"><div><span id="abm" title="点击查看大图"><img src="<?php echo $albums['0'];?>" onload="if(this.width>240){this.width=240;}" onmouseover="SAlbum(this.src);" onmouseout="HAlbum();" onclick="PAlbum(this);" id="DIMG"/></span></div></td>
					</tr>
					<tr>
					<td>
					<?php if(is_array($thumbs)) { foreach($thumbs as $k => $v) { ?><img src="<?php echo $v;?>" width="60" height="60" onmouseover="if(this.src.indexOf('nopic60.gif')==-1)Album(<?php echo $k;?>, '<?php echo $albums[$k];?>');"class="<?php if($k) { ?>ab_im<?php } else { ?>ab_on<?php } ?>" id="t_<?php echo $k;?>"/><?php } } ?></td>
					</tr>
					<tr align="center">
					<td height="30" onclick="PAlbum($('DIMG'));"><img src="<?php echo DT_SKIN;?>image/ico_zoom.gif" width="16" height="16" align="absmiddle"/> 点击图片查看原图</td>
					</tr>
					</table>
				</div>
			</td>
			<td width="15"> </td>
			<td valign="top">
				<div id="imgshow" style="display:none;"></div>
				<table width="100%" cellpadding="5" cellspacing="5">
				<tr>
				<td width="80" class="f_dblue">产品/服务：</td>
				<td colspan="2"><strong><?php echo $tag;?></strong>&nbsp;</td>
				</tr>
				<?php if($brand) { ?>
				<tr>
				<td class="f_dblue">品 牌：</td>
				<td colspan="2"><?php echo $brand;?>&nbsp;</td>
				</tr>
				<?php } ?>
				<?php if($model) { ?>
				<tr>
				<td class="f_dblue">型 号：</td>
				<td colspan="2"><?php echo $model;?>&nbsp;</td>
				</tr>
				<?php } ?>
				<?php if($standard) { ?>
				<tr>
				<td class="f_dblue">规 格：</td>
				<td colspan="2"><?php echo $standard;?>&nbsp;</td>
				</tr>
				<?php } ?>
				<tr>
				<td class="f_dblue">单 价：</td>
				<td class="f_b f_orange"><?php if($price>0) { ?><?php echo $price;?><?php echo $DT['money_unit'];?>/<?php echo $unit;?><?php } else { ?>面议<?php } ?>&nbsp;</td>
				<td width="70"><?php if($username && !$expired) { ?><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('inquiry.php?itemid='.$itemid);?>"><img src="<?php echo DT_SKIN;?>image/btn_inquiry.gif" alt="询价"/></a><?php } ?></td>
				</tr>
				<tr>
				<td class="f_dblue">最小起订量：</td>
				<td class="f_b f_orange"><?php if($minamount) { ?><?php echo $minamount;?> <?php echo $unit;?><?php } ?>&nbsp;</td>
				<td width="70"><?php if($username && $price>0 && $unit && !$expired) { ?><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('order.php?itemid='.$itemid);?>"><img src="<?php echo DT_SKIN;?>image/btn_order.gif" alt="订购"/></a><?php } ?></td>
				</tr>
				<tr>
				<td class="f_dblue">供货总量：</td>
				<td class="f_b f_orange" colspan="2"><?php if($amount) { ?><?php echo $amount;?> <?php echo $unit;?><?php } ?></td>
				</tr>
				<tr>
				<td class="f_dblue">发货期限：</td>
				<td colspan="2">自买家付款之日起  <span class="f_b f_orange"><?php if($days) { ?><?php echo $days;?><?php } ?></span> 天内发货</td>
				</tr>
				<tr>
				<td class="f_dblue">有效期至：</td>
				<td colspan="2"><?php if($todate) { ?><?php echo $todate;?><?php } else { ?>长期有效<?php } ?><?php if($expired) { ?> <span class="f_red">[已过期]</span><?php } ?></td>
				</tr>
				<tr>
				<td class="f_dblue">最后更新：</td>
				<td colspan="2"><?php echo $editdate;?></td>
				</tr>
				<tr>
				<td class="f_dblue">浏览次数：</td>
				<td colspan="2"><span id="hits"><?php echo $hits;?></span></td>
				</tr>
				</table>
			</td>
			</tr>
		</table>
		</td>
		<td width="10"> </td>
		<td width="300" valign="top">		
			<div class="contact_head">公司基本资料信息</div>
			<div class="contact_body" id="contact"><?php include template('contact', 'chip');?></div>
			<?php if(!$username) { ?>
			<br/>
			&nbsp;<strong class="f_red">注意</strong>:发布人未在本站注册，建议优先选择<a href="<?php echo $MODULE['2']['linkurl'];?>grade.php"><strong><?php echo VIP;?>会员</strong></a>
			<?php } ?>
			</div>
		</td>
		<td width="10"> </td>
		</tr>
		</table>
		<div class="b10">&nbsp;</div>
</div>
</div>

<?php if($MOD['product_option']) { ?>
<?php if($options && $values) { ?>
<div class="m">
<div class="b10">&nbsp;</div>
<div class="box_head_2"><div>产品属性参数</div></div>
<div class="box_body">
	<div id="product_option" class="product_option">
	<table cellpadding="5" cellspacing="1" width="100%" bgcolor="#CCCCCC">
	<?php if(is_array($options)) { foreach($options as $o) { ?>
	<?php if($o['type']) { ?>
	<tr bgcolor="#FFFFFF">
	<td width="160">&nbsp;<?php echo $o['name'];?></td>
	<td class="px13">&nbsp;<?php if(isset($values[$o['oid']])) { ?><?php echo nl2br($values[$o['oid']]);?><?php } ?></td>
	</tr>
	<?php } else { ?>
	<tr bgcolor="#FAFAFA">
	<td colspan="2">&nbsp;<strong><?php echo $o['name'];?></strong></td>
	</tr>
	<?php } ?>
	<?php } } ?>
	</table>
	</div>
</div>
</div>
<?php } ?>
<?php } ?>

<div class="m">
<div class="b10">&nbsp;</div>
<div class="box_head_2">
<div>
<span class="f_r">
<form method="post" action="<?php echo $MODULE['2']['linkurl'];?>favorite.php">
<input type="hidden" name="action" value="add"/>
<input type="hidden" name="title" value="<?php echo $title;?>"/>
<input type="hidden" name="url" value="<?php echo $linkurl;?>"/>
<input type="image" src="<?php echo DT_SKIN;?>image/btn_fav.gif" class="c_p" style="margin-top:5px;"/>
</form>
</span>
<strong>产品详细说明</strong>
</div>
</div>
<div class="box_body" style="padding:0;">
<div class="content c_b" id="content"><?php echo $content;?></div>
<?php include template('comment', 'chip');?>
</div>
</div>
<?php if($username) { ?>
<div class="m">
<div class="b10">&nbsp;</div>
<div class="box_head_2"><div><span class="f_r"><a href="<?php echo userurl($username, 'file=sell');?>">更多..</a></span><strong>本企业其它产品</strong></div></div>
<div class="box_body">
<div class="thumb" style="padding:10px;">
<?php echo tag("moduleid=$moduleid&length=20&condition=status=3 and thumb<>'' and username='$username'&pagesize=8&order=edittime&width=80&height=80&cols=8&template=thumb-table", -2);?>
</div>
</div>
<?php } ?>
<div class="m">
	<form method="post" action="<?php echo $MODULE['2']['linkurl'];?>sendmail.php" name="sendmail" id="sendmail" target="_blank">
	<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/> 
	<input type="hidden" name="title" value="<?php echo $title;?>"/>
	<input type="hidden" name="linkurl" value="<?php echo $linkurl;?>"/>
	</form>
	<br/>
	<center>
	[ <a href="<?php echo $MOD['linkurl'];?>search.php"><?php echo $MOD['name'];?>搜索</a> ]&nbsp;
	[ <script type="text/javascript">addFav('加入收藏');</script> ]&nbsp;
	[ <a href="javascript:$('sendmail').submit();void(0);">告诉好友</a> ]&nbsp;
	[ <a href="javascript:Print();">打印本文</a> ]&nbsp;
	[ <a href="javascript:window.close()">关闭窗口</a> ]&nbsp;
	[ <a href="javascript:window.scrollTo(0,0);">返回顶部</a> ]
	</center>
	<br/>
</div>
<?php include template('zoom', 'chip');?>
<?php include template('footer');?>