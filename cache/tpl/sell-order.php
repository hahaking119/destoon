<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div class="m">
	<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<td valign="top" class="left_menu">
		<ul>
		<li><a href="<?php echo DT_PATH;?>">网站首页</a></li>
		<li><a href="<?php echo $MODULE['2']['linkurl'];?>trade.php">我收到的订单</a></li>
		<li><a href="<?php echo $MODULE['2']['linkurl'];?>trade.php?action=order">我发出的订单</a></li>
		<li id="type_order"><a href="<?php echo $MOD['linkurl'];?>">订购产品</a></li>
		</ul>
	</td>
	<td width="8"> </td>
	<td valign="top">
		<div class="left_box">		
			<div class="pos">当前位置: <a href="<?php echo DT_PATH;?>">首页</a> &raquo; <a href="<?php echo $MOD['linkurl'];?>"><?php echo $MOD['name'];?></a> &raquo; <?php echo cat_pos($catid, ' &raquo; ');?> &raquo; 订购产品</div>
			<div style="padding:20px;">
				<?php if($submit) { ?>
					<form method="post" action="<?php echo $MODULE['2']['linkurl'];?>trade.php" id="dform" onsubmit="return Dcheck();">
					<input type="hidden" name="submit" value="1"/>
					<input type="hidden" name="action" value="pay"/>
					<input type="hidden" name="type" value="0"/>
					<input type="hidden" name="seller" value="<?php echo $username;?>"/>
					<input type="hidden" name="amount" value="<?php echo $order_amount;?>"/>
					<input type="hidden" name="title" value="<?php echo $title;?>"/>
					<input type="hidden" name="linkurl" value="<?php echo $linkurl;?>"/>
					<input type="hidden" name="thumb" value="<?php echo $thumb;?>"/>
					<input type="hidden" name="note" value="单价:<?php echo $price;?><?php echo $DT['money_unit'];?>/<?php echo $unit;?> 订购:<?php echo $number;?><?php echo $unit;?>"/>
					<table cellpadding="8" cellspacing="1" width="100%" bgcolor="#CDDCE4">
					<tr>
					<td bgcolor="#FBFCFD" width="120" align="right">产品/服务：</td>
					<td bgcolor="#FFFFFF" class="f_b"><a href="<?php echo $linkurl;?>" target="_blank"><?php echo $title;?></a></td>
					</tr>
					<?php if($thumb) { ?>
					<tr>
					<td bgcolor="#FBFCFD" align="right">产品图片：</td>
					<td bgcolor="#FFFFFF"><a href="<?php echo $linkurl;?>" target="_blank"><img src="<?php echo $thumb;?>" width="80" height="80" alt="<?php echo $title;?>"/></a></td>
					</tr>
					<?php } ?>
					<tr>
					<td bgcolor="#FBFCFD" align="right">供应商：</td>
					<td bgcolor="#FFFFFF"><a href="<?php echo $userurl;?>" target="_blank" class="t"><?php echo $company;?></a><?php if($vip) { ?> <img src="<?php echo DT_SKIN;?>image/vip.gif"/> <img src="<?php echo DT_SKIN;?>image/vip_<?php echo $vip;?>.gif"/><?php } ?></td>
					</tr>
					<tr>
					<td bgcolor="#FBFCFD" align="right">产品/服务单价：</td>
					<td bgcolor="#FFFFFF" class="f_b f_orange"><?php if($price) { ?><?php echo $price;?><?php echo $DT['money_unit'];?>/<?php echo $unit;?><?php } ?>&nbsp;</td>
					</tr>
					<tr>
					<td bgcolor="#FBFCFD" align="right">最小起订量：</td>
					<td bgcolor="#FFFFFF" class="f_b f_orange"><?php if($minamount) { ?><?php echo $minamount;?> <?php echo $unit;?><?php } ?>&nbsp;</td>
					</tr>
					<tr>
					<td bgcolor="#FBFCFD" align="right">供货总量：</td>
					<td bgcolor="#FFFFFF" class="f_b f_orange"><?php if($amount) { ?><?php echo $amount;?> <?php echo $unit;?><?php } else { ?>不限<?php } ?></td>
					</tr>
					<tr>
					<td bgcolor="#FBFCFD" align="right">发货期限：</td>
					<td bgcolor="#FFFFFF">自买家付款之日起  <span class="f_b f_orange"><?php if($days) { ?><?php echo $days;?><?php } ?></span> 天内发货</td>
					</tr>
					<tr>
					<td bgcolor="#FBFCFD" align="right">收货邮编：</td>
					<td bgcolor="#FFFFFF"><input type="text" size="10" name="buyer_postcode" id="buyer_postcode" value="<?php echo $user['postcode'];?>"/>&nbsp;<span id="dbuyer_postcode" class="f_red"></span></td>
					</tr>
					<tr>
					<td bgcolor="#FBFCFD" align="right">收货地址：</td>
					<td bgcolor="#FFFFFF"><input type="text" size="50" name="buyer_address" id="buyer_address" value="<?php echo $user['address'];?>"/>&nbsp;<span id="dbuyer_address" class="f_red"></span></td>
					</tr>
					<tr>
					<td bgcolor="#FBFCFD" align="right">收货人：</td>
					<td bgcolor="#FFFFFF"><input type="text" size="10" name="buyer_name" id="buyer_name" value="<?php echo $user['truename'];?>"/>&nbsp;<span id="dbuyer_name" class="f_red"></span></td>
					</tr>
					<tr>
					<td bgcolor="#FBFCFD" align="right">联系电话：</td>
					<td bgcolor="#FFFFFF"><input type="text" size="20" name="buyer_phone" id="buyer_phone" value="<?php echo $user['mobile'];?>"/>&nbsp;<span id="dbuyer_phone" class="f_red"></span></td>
					</tr>
					<tr>
					<td bgcolor="#FBFCFD" align="right">期望物流：</td>
					<td bgcolor="#FFFFFF">
					<input type="text" size="10" name="buyer_receive" id="buyer_receive"/>
					<select onchange="$('buyer_receive').value=this.value;">
					<option value="">常用物流类型</option>
					<?php if(is_array($send_types)) { foreach($send_types as $v) { ?>
					<option value="<?php echo $v;?>"><?php echo $v;?></option>
					<?php } } ?>
					</select>
					</td>
					</tr>
					<tr>
					<td bgcolor="#FBFCFD" align="right">订货总量：</td>
					<td bgcolor="#FFFFFF" class="f_b f_blue"><?php echo $number;?> <?php echo $unit;?></td>
					</tr>
					<tr>
					<td bgcolor="#FBFCFD" align="right">订单总额：</td>
					<td bgcolor="#FFFFFF" class="f_b f_red"><?php echo $order_amount;?> <?php echo $DT['money_unit'];?></td>
					</tr>
					<?php if($_userid && $DT['sms']) { ?>
					<tr>
					<td bgcolor="#FBFCFD" align="right">短信通知：</td>
					<td bgcolor="#FFFFFF"><input type="checkbox" name="sendsms" value="1"/> 发送短信通知至商家手机 (<a href="<?php echo $MODULE['2']['linkurl'];?>sms.php" target="_blank">我的可用短信 <strong class="f_blue"><?php echo $_sms;?></strong> 条</a>)</td>
					</tr>
					<?php } ?>
					<tr>
					<td bgcolor="#FBFCFD"> </td>
					<td bgcolor="#FFFFFF"><input type="submit" name="submit" value=" 确定 " class="btn"/>&nbsp;&nbsp;<input type="reset" name="reset" value=" 重置 " class="btn"/></td>
					</tr>
					</table>
					</form>					
					<script type="text/javascript">
					function Dcheck() {
						return confirm('确认此订单信息无误，立即发送吗？');
					}
					</script>
				<?php } else { ?>
					<form method="post" action="<?php echo $MOD['linkurl'];?>order.php" id="dform" onsubmit="return Dcheck();">
					<input type="hidden" name="submit" value="1"/>
					<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
					<table cellpadding="8" cellspacing="1" width="100%" bgcolor="#CDDCE4">
					<tr>
					<td bgcolor="#FBFCFD" width="120" align="right">产品/服务：</td>
					<td bgcolor="#FFFFFF" class="f_b"><a href="<?php echo $linkurl;?>" target="_blank"><?php echo $title;?></a></td>
					</tr>
					<?php if($thumb) { ?>
					<tr>
					<td bgcolor="#FBFCFD" align="right">缩略图：</td>
					<td bgcolor="#FFFFFF"><a href="<?php echo $linkurl;?>" target="_blank"><img src="<?php echo $thumb;?>" width="80" height="80" alt="<?php echo $title;?>"/></a></td>
					</tr>
					<?php } ?>
					<tr>
					<td bgcolor="#FBFCFD" align="right">供应商：</td>
					<td bgcolor="#FFFFFF"><a href="<?php echo $userurl;?>" target="_blank" class="t"><?php echo $company;?></a><?php if($vip) { ?> <img src="<?php echo DT_SKIN;?>image/vip.gif"/> <img src="<?php echo DT_SKIN;?>image/vip_<?php echo $vip;?>.gif"/><?php } ?></td>
					</tr>
					<tr>
					<td bgcolor="#FBFCFD" align="right">产品/服务单价：</td>
					<td bgcolor="#FFFFFF" class="f_b f_orange"><?php if($price) { ?><?php echo $price;?><?php echo $DT['money_unit'];?>/<?php echo $unit;?><?php } ?>&nbsp;</td>
					</tr>
					<tr>
					<td bgcolor="#FBFCFD" align="right">最小起订量：</td>
					<td bgcolor="#FFFFFF" class="f_b f_orange"><?php if($minamount) { ?><?php echo $minamount;?> <?php echo $unit;?><?php } ?>&nbsp;</td>
					</tr>
					<tr>
					<td bgcolor="#FBFCFD" align="right">供货总量：</td>
					<td bgcolor="#FFFFFF" class="f_b f_orange"><?php if($amount) { ?><?php echo $amount;?> <?php echo $unit;?><?php } else { ?>不限<?php } ?></td>
					</tr>
					<tr>
					<td bgcolor="#FBFCFD" align="right">发货期限：</td>
					<td bgcolor="#FFFFFF">自买家付款之日起  <span class="f_b f_orange"><?php if($days) { ?><?php echo $days;?><?php } ?></span> 天内发货</td>
					</tr>
					<tr>
					<td bgcolor="#FBFCFD" align="right"><span class="f_red">*</span> 订货总量：</td>
					<td bgcolor="#FFFFFF"><input type="text" size="8" name="number" id="number"/> <?php echo $unit;?></td>
					</tr>
					<tr>
					<td bgcolor="#FBFCFD"> </td>
					<td bgcolor="#FFFFFF"><input type="submit" name="submit" value=" 确定 " class="btn"/>&nbsp;&nbsp;<input type="reset" name="reset" value=" 重置 " class="btn"/></td>
					</tr>
					</table>
					</form>					
					<script type="text/javascript">
					function Dcheck() {
						var min_a = <?php if($minamount) { ?><?php echo $minamount;?><?php } else { ?>0<?php } ?>;
						var max_a = <?php if($amount) { ?><?php echo $amount;?><?php } else { ?>0<?php } ?>;
						var n = $('number');
						if(!n.value) {
							confirm('请填写订货总量');
							n.focus();
							return false;
						}
						if(min_a && n.value < min_a) {
							confirm('订货总量不能小于最小起订量');
							n.focus();
							return false;
						}
						if(max_a && n.value > max_a) {
							confirm('订货总量不能大于供货总量');
							n.focus();
							return false;
						}
					}
					</script>
				<?php } ?>
			</div>
		<br/>
		</div>
	</td>
	</tr>
	</table>
</div>
<script type="text/javascript">
try {$('type_order').style.backgroundColor = '#CDDCE4';	}catch (e){}
</script>
<?php include template('footer');?>