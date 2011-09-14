<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', $module);?>
<script type="text/javascript">c(2);</script>
<script type="text/javascript">var errimg = '<?php echo DT_SKIN;?>image/nopic50.gif';</script>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="action_pay"><a href="<?php echo $MOD['linkurl'];?>trade.php?action=pay"><span>我要付款</span></a></td>
<td class="tab_nav">&nbsp;</td>
<td class="tab" id="action"><a href="<?php echo $MOD['linkurl'];?>trade.php"><span>收到的订单</span></a></td>
<td class="tab_nav">&nbsp;</td>
<td class="tab" id="action_order"><a href="<?php echo $MOD['linkurl'];?>trade.php?action=order"><span>发出的订单</span></a></td>
</tr>
</table>
</div>
<?php if($action == 'pay') { ?>
<form method="post" action="<?php echo $MOD['linkurl'];?>trade.php" onsubmit="return check();" id="dform">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<table cellspacing="1" cellpadding="6" class="tb">
<tr>
<td class="tl">帐户可用余额</td>
<td class="tr"><strong class="f_blue"><?php echo $_money;?></strong></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 付款方式</td>
<td class="tr">
<input type="radio" name="type" value="1" onclick="Ds('pay');Dh('order');" checked id="type"/> <label for="type">直接付款</label>
<span class="f_gray">付款后您的钱将直接进入对方账户</span>
<br/>
<input type="radio" name="type" value="0" onclick="Dh('pay');Ds('order');" id="type_0"/> <label for="type_0">货到付款</label>
<span class="f_gray">付款后您的钱将暂时付给网站，待收货确认后再付款给卖家</span>
</td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 收款会员名</td>
<td class="tr"><input type="text" size="15" name="seller" id="seller" onblur="get_company();"/>&nbsp; <a href="javascript:Diframe('<?php echo $MOD['linkurl'];?>friend.php?action=my&obj=seller', '450', 0, 1, '我的商友');" class="t">[我的商友]</a> &nbsp;<span id="dseller" class="f_red"></span>&nbsp;<span id="company" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 付款金额</td>
<td class="tr"><input type="text" size="10" name="amount" id="amount"/> <?php echo $DT['money_unit'];?>&nbsp;<span id="damount" class="f_red"></span></td>
</tr>
<tbody id="order" style="display:none;">
<tr>
<td class="tl"><span class="f_red">*</span> 产品或服务</td>
<td class="tr"><input type="text" size="30" name="title" id="title"/>&nbsp;<span id="dtitle" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">产品地址URL</td>
<td class="tr"><input type="text" size="50" name="linkurl" value="http://"/></td>
</tr>
<tr>
<td class="tl">产品缩略图</td>
<td class="tr"><input type="text" size="50" name="thumb" id="thumb" readonly/>&nbsp;&nbsp;<span onclick="Dthumb(<?php echo $moduleid;?>,50,50,$('thumb').value,true);" class="jt">[上传]</span>&nbsp;&nbsp;<span onclick="_preview($('thumb').value);" class="jt">[预览]</span>&nbsp;&nbsp;<span onclick="$('thumb').value='';" class="jt">[删除]</span></td>
</tr>
<tr>
<td class="tl">收货邮编</td>
<td class="tr"><input type="text" size="10" name="buyer_postcode" id="buyer_postcode" value="<?php echo $m['postcode'];?>"/>&nbsp;<span id="dbuyer_postcode" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">收货地址</td>
<td class="tr"><input type="text" size="50" name="buyer_address" id="buyer_address" value="<?php echo $m['address'];?>"/>&nbsp;<span id="dbuyer_address" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">收货人</td>
<td class="tr"><input type="text" size="10" name="buyer_name" id="buyer_name" value="<?php echo $m['truename'];?>"/>&nbsp;<span id="dbuyer_name" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">期望物流：</td>
<td class="tr">
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
<td class="tl">联系电话</td>
<td class="tr"><input type="text" size="20" name="buyer_phone" id="buyer_phone" value="<?php echo $m['mobile'];?>"/>&nbsp;<span id="dbuyer_phone" class="f_red"></span></td>
</tr>
</tbody>
<tbody id="pay" style="display:;">
<tr>
<td class="tl"><span class="f_red">*</span> 支付密码</td>
<td class="tr"><?php include template('password', 'chip');?>&nbsp;<span id="dpassword" class="f_red"></span></td>
</tr>
</tbody>
<tr>
<td class="tl"><span class="f_red">*</span> 付款说明</td>
<td class="tr"><input type="text" size="50" name="note" id="note"/>&nbsp;<span id="dnote" class="f_red"></span></td>
</tr>
<?php if($_userid && $DT['sms']) { ?>
<tr>
<td class="tl">短信通知</td>
<td class="tr"><input type="checkbox" name="sendsms" value="1"/> 发送短信通知至收款人 (<a href="<?php echo $MODULE['2']['linkurl'];?>sms.php" target="_blank">我的可用短信 <strong class="f_blue"><?php echo $_sms;?></strong> 条</a>)</td>
</tr>
<?php } ?>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="50"><input type="submit" name="submit" value=" 确 定 " class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value=" 重 置 " class="btn"/></td>
</tr>
</table>
</form>
<?php echo load('clear.js');?>
<script type="text/javascript">
function check() {
	if($('seller').value == '') {
		Dmsg('请填写收款会员名', 'seller');
		return false;
	}
	if($('amount').value == '') {
		Dmsg('请填写付款金额', 'amount');
		return false;
	}
	if($('note').value == '') {
		Dmsg('请填写付款说明', 'note');
		return false;
	}
	if(!$('type').checked && $('title').value == '') {
		Dmsg('请填写商品或服务名称', 'title');
		return false;
	}
	if($('type').checked) {
		if($('password').value.length < 6) {
			Dmsg('请填写支付密码', 'password');
			return false;
		}
		return confirm('注意:会员 '+$('seller').value+' 将直接收到您的付款\n\n确认填写无误，提交此请求吗？');
	} else {
		return confirm('确认填写无误，提交此订单吗？');
	}
}
function get_company() {
	if($('seller').value) {
		makeRequest('moduleid=<?php echo $moduleid;?>&action=member&job=get_company&value='+$('seller').value, 'ajax.php', '_get_company');
	}
}
function _get_company() {    
	if(xmlHttp.readyState==4 && xmlHttp.status==200) {
		if(xmlHttp.responseText == 1) {
			$('seller').value = '';
			$('company').innerHTML = '会员不存在,请确认';
		} else {
			$('company').innerHTML = xmlHttp.responseText;
		}
	}
}
</script>
<script type="text/javascript">s('trade');m('action_pay');</script>
<?php } else if($action == 'update') { ?>
	<?php if($step == 'edit_price') { ?>
	<form method="post" action="<?php echo $MOD['linkurl'];?>trade.php" onsubmit="return check();" id="dform">
	<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
	<input type="hidden" name="action" value="<?php echo $action;?>"/>
	<input type="hidden" name="step" value="<?php echo $step;?>"/>
	<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
	<table cellspacing="1" cellpadding="6" class="tb">
	<tr>
	<td class="tl">当前操作</td>
	<td class="tr f_red f_b">修改价格</td>
	</tr>
	<tr>
	<td class="tl">订单编号</td>
	<td class="tr">T<?php echo $td['itemid'];?></td>
	</tr>
	<tr>
	<td class="tl">商品或服务</td>
	<td class="tr"><?php if($td['linkurl']) { ?><a href="<?php echo $td['linkurl'];?>" target="_blank" class="t"><?php echo $td['title'];?></a><?php } else { ?><?php echo $td['title'];?><?php } ?></td>
	</tr>
	<tr>
	<td class="tl">缩略图</td>
	<td class="tr"><img src="<?php if($td['thumb']) { ?><?php echo $td['thumb'];?><?php } else { ?><?php echo DT_SKIN;?>image/nopic50.gif<?php } ?>" width="50" height="50" alt="流水号:<?php echo $td['itemid'];?>"/></td>
	</tr>
	<tr>
	<td class="tl">买 家</td>
	<td class="tr"><a href="<?php echo $MODULE['3']['linkurl'];?>redirect.php?username=<?php echo $td['buyer'];?>" target="_blank" class="t"><?php echo $td['buyer'];?></a></td>
	</tr>
	<tr>
	<td class="tl">邮编</td>
	<td class="tr"><?php echo $td['buyer_postcode'];?></td>
	</tr>
	<tr>
	<td class="tl">地址</td>
	<td class="tr"><?php echo $td['buyer_address'];?></td>
	</tr>
	<tr>
	<td class="tl">收货人</td>
	<td class="tr"><?php echo $td['buyer_name'];?></td>
	</tr>
	<tr>
	<td class="tl">电话</td>
	<td class="tr"><?php echo $td['buyer_phone'];?></td>
	</tr>
	<tr>
	<td class="tl">期望物流</td>
	<td class="tr"><?php echo $td['buyer_receive'];?></td>
	</tr>
	<tr>
	<td class="tl">下单时间</td>
	<td class="tr"><?php echo $td['adddate'];?></td>
	</tr>
	<tr>
	<td class="tl">备注说明</td>
	<td class="tr"><?php echo $td['note'];?></td>
	</tr>
	<tr>
	<td class="tl">订单金额</td>
	<td class="tr f_blue f_b"><?php echo $td['amount'];?> <?php echo $DT['money_unit'];?></td>
	</tr>
	<tr>
	<td class="tl"><span class="f_red">*</span>附加金额名称</td>
	<td class="tr f_gray"><input type="text" size="10" name="fee_name" id="fee_name" value="<?php echo $td['fee_name'];?>"/> 例如运费、退款、优惠等&nbsp;<span id="dfee_name" class="f_red"></span></td>
	</tr>
	<tr>
	<td class="tl"><span class="f_red">*</span>附加金额</td>
	<td class="tr f_gray"><input type="text" size="5" name="fee" id="fee" value="<?php echo $td['fee'];?>"/>  <?php echo $DT['money_unit'];?> 可以为负值&nbsp;<span id="dfee" class="f_red"></span></td>
	</tr>
	<tr>
	<td class="tl"></td>
	<td class="tr"><input type="checkbox" name="confirm_order" value="1"/> 同时确认订单 <span class="f_red">[请谨慎，订单一经确定，将不可再修改]</span></td>
	</tr>
	<?php if($_userid && $DT['sms']) { ?>
	<tr>
	<td class="tl"></td>
	<td class="tr"><input type="checkbox" name="sendsms" value="1"/> 短信通知买家订单确认 (<a href="<?php echo $MODULE['2']['linkurl'];?>sms.php" target="_blank" class="t">我的可用短信 <strong class="f_blue"><?php echo $_sms;?></strong> 条</a>)</td>
	</tr>
	<?php } ?>
	<tr>
	<td class="tl"> </td>
	<td class="tr">
	<input type="submit" name="submit" value=" 确 定 " class="btn"/>&nbsp;&nbsp;<input type="button" value=" 返 回 " class="btn" onclick="history.back(-1);"/>
	</td>
	</tr>
	</table>
	</form>
	<script type="text/javascript">
	function check() {
		if(!$('fee_name').value) {
			Dmsg('请填写附加金额名称', 'fee_name');
			return false;
		}
		if(!$('fee').value) {
			Dmsg('请填写附加金额', 'fee');
			return false;
		}
		return true;
	}
	</script>
	<script type="text/javascript">s('trade');m('action');</script>
	<?php } else if($step == 'detail') { ?>
	<table cellspacing="1" cellpadding="6" class="tb">
	<tr>
	<td class="tl">当前操作</td>
	<td class="tr f_red f_b">订单详情</td>
	</tr>
	<tr>
	<td class="tl">订单编号</td>
	<td class="tr">T<?php echo $td['itemid'];?></td>
	</tr>
	<tr>
	<td class="tl">商品或服务</td>
	<td class="tr"><?php if($td['linkurl']) { ?><a href="<?php echo $td['linkurl'];?>" target="_blank" class="t"><?php echo $td['title'];?></a><?php } else { ?><?php echo $td['title'];?><?php } ?></td>
	</tr>
	<tr>
	<td class="tl">缩略图</td>
	<td class="tr"><img src="<?php if($td['thumb']) { ?><?php echo $td['thumb'];?><?php } else { ?><?php echo DT_SKIN;?>image/nopic50.gif<?php } ?>" width="50" height="50" alt="流水号:<?php echo $td['itemid'];?>"/></td>
	</tr>
	<?php if($td['seller'] == $_username) { ?>
	<tr>
	<td class="tl">买 家 </td>
	<td class="tr"><a href="<?php echo $MODULE['3']['linkurl'];?>redirect.php?username=<?php echo $td['buyer'];?>" target="_blank" class="t"><?php echo $td['buyer'];?></a></td>
	</tr>
	<?php } else if($td['buyer'] == $_username) { ?>
	<tr>
	<td class="tl">卖 家</td>
	<td class="tr"><a href="<?php echo $MODULE['3']['linkurl'];?>redirect.php?username=<?php echo $td['seller'];?>" target="_blank" class="t"><?php echo $td['seller'];?></a></td>
	</tr>
	<?php } ?>
	<tr>
	<td class="tl">邮编</td>
	<td class="tr"><?php echo $td['buyer_postcode'];?></td>
	</tr>
	<tr>
	<td class="tl">地址</td>
	<td class="tr"><?php echo $td['buyer_address'];?></td>
	</tr>
	<tr>
	<td class="tl">收货人</td>
	<td class="tr"><?php echo $td['buyer_name'];?></td>
	</tr>
	<tr>
	<td class="tl">电话</td>
	<td class="tr"><?php echo $td['buyer_phone'];?></td>
	</tr>
	<tr>
	<td class="tl">期望物流</td>
	<td class="tr"><?php echo $td['buyer_receive'];?></td>
	</tr>
	<tr>
	<td class="tl">下单时间</td>
	<td class="tr"><?php echo $td['adddate'];?></td>
	</tr>
	<tr>
	<td class="tl">最后更新</td>
	<td class="tr"><?php echo $td['updatedate'];?></td>
	</tr>
	<tr>
	<td class="tl">备注说明</td>
	<td class="tr"><?php echo $td['note'];?></td>
	</tr>
	<tr>
	<td class="tl">订单金额</td>
	<td class="tr f_red"><?php echo $td['amount'];?> <?php echo $DT['money_unit'];?></td>
	</tr>
	<?php if($td['fee_name'] && $td['fee']) { ?>
	<tr>
	<td class="tl"><?php echo $td['fee_name'];?></td>
	<td class="tr f_blue"><?php echo $td['fee'];?> <?php echo $DT['money_unit'];?></td>
	</tr>
	<?php } ?>
	<tr>
	<td class="tl">订单总额</td>
	<td class="tr f_blue f_b"><?php echo $td['total'];?> <?php echo $DT['money_unit'];?></td>
	</tr>
	<tr>
	<td class="tl">物流类型</td>
	<td class="tr"><?php echo $td['send_type'];?></td>
	</tr>
	<tr>
	<td class="tl">物流号码</td>
	<td class="tr"><?php echo $td['send_no'];?></td>
	</tr>
	<tr>
	<td class="tl">发货时间</td>
	<td class="tr"><?php echo $td['send_time'];?></td>
	</tr>
	<tr>
	<td class="tl">订单状态</td>
	<td class="tr"><?php echo $_status[$td['status']];?></td>
	</tr>
	<?php if($td['buyer_reason']) { ?>
	<tr>
	<td class="tl">退款理由</td>
	<td class="tr"><?php echo $td['buyer_reason'];?></td>
	</tr>
	<?php } ?>
	<tr>
	<td class="tl"> </td>
	<td class="tr"><input type="button" value=" 返 回 " class="btn" onclick="history.back(-1);"/>
	</td>
	</tr>
	</table>
	</form>
	<script type="text/javascript">s('trade');<?php if($td['seller']==$_username) { ?>m('action');<?php } else { ?>m('action_order');<?php } ?></script>
	<?php } else if($step == 'pay') { ?>
	<form method="post" action="<?php echo $MOD['linkurl'];?>trade.php" onsubmit="return check();" id="dform">
	<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
	<input type="hidden" name="action" value="<?php echo $action;?>"/>
	<input type="hidden" name="step" value="<?php echo $step;?>"/>
	<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
	<table cellspacing="1" cellpadding="6" class="tb">
	<tr>
	<td class="tl">当前操作</td>
	<td class="tr f_red f_b">订单支付</td>
	</tr>
	<tr>
	<td class="tl">商品或服务</td>
	<td class="tr"><?php if($td['linkurl']) { ?><a href="<?php echo $td['linkurl'];?>" target="_blank" class="t"><?php echo $td['title'];?></a><?php } else { ?><?php echo $td['title'];?><?php } ?></td>
	</tr>
	<tr>
	<td class="tl">缩略图</td>
	<td class="tr"><img src="<?php if($td['thumb']) { ?><?php echo $td['thumb'];?><?php } else { ?><?php echo DT_SKIN;?>image/nopic50.gif<?php } ?>" width="50" height="50" alt="流水号:<?php echo $td['itemid'];?>"/></td>
	</tr>
	<tr>
	<td class="tl">卖 家</td>
	<td class="tr"><a href="<?php echo $MODULE['3']['linkurl'];?>redirect.php?username=<?php echo $td['seller'];?>" target="_blank" class="t"><?php echo $td['seller'];?></a></td>
	</tr>
	<tr>
	<td class="tl">下单时间</td>
	<td class="tr"><?php echo $td['adddate'];?></td>
	</tr>
	<tr>
	<td class="tl">备注说明</td>
	<td class="tr"><?php echo $td['note'];?></td>
	</tr>
	<tr>
	<td class="tl">订单金额</td>
	<td class="tr f_blue f_b"><?php echo $td['amount'];?> <?php echo $DT['money_unit'];?></td>
	</tr>
	<?php if($td['fee']) { ?>
	<tr>
	<td class="tl"><?php echo $td['fee_name'];?></td>
	<td class="tr f_blue f_b"><?php echo $td['fee'];?> <?php echo $DT['money_unit'];?></td>
	</tr>
	<?php } ?>
	<tr>
	<td class="tl">实付金额</td>
	<td class="tr f_red f_b"><?php echo $money;?> <?php echo $DT['money_unit'];?></td>
	</tr>
	<tr>
	<td class="tl">帐户余额</td>
	<td class="tr f_b"><?php echo $_money;?> <?php echo $DT['money_unit'];?></td>
	</tr>
	<tr>
	<td class="tl"><span class="f_red">*</span> 支付密码</td>
	<td class="tr"><?php include template('password', 'chip');?>&nbsp;<span id="dpassword" class="f_red"></span></td>
	</tr>
	<?php if($_userid && $DT['sms']) { ?>
	<tr>
	<td class="tl"></td>
	<td class="tr"><input type="checkbox" name="sendsms" value="1"/> 短信通知卖家发货 (<a href="<?php echo $MODULE['2']['linkurl'];?>sms.php" target="_blank" class="t">我的可用短信 <strong class="f_blue"><?php echo $_sms;?></strong> 条</a>)</td>
	</tr>
	<?php } ?>
	<tr>
	<td class="tl"> </td>
	<td class="tr">
	<input type="submit" name="submit" value=" 确 定 " class="btn"/>&nbsp;&nbsp;<input type="button" value=" 返 回 " class="btn" onclick="history.back(-1);"/>
	</td>
	</tr>
	</table>
	</form>
	<script type="text/javascript">
	function check() {
		if($('password').value == '') {
			Dmsg('请填写支付密码', 'password');
			return false;
		}
		return confirm('您确认此订单，并立即支付吗？');
	}
	</script>
	<script type="text/javascript">s('trade');m('action_order');</script>
	<?php } else if($step == 'send_goods') { ?>
	<form method="post" action="<?php echo $MOD['linkurl'];?>trade.php" onsubmit="return check();" id="dform">
	<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
	<input type="hidden" name="action" value="<?php echo $action;?>"/>
	<input type="hidden" name="step" value="<?php echo $step;?>"/>
	<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
	<table cellspacing="1" cellpadding="6" class="tb">
	<tr>
	<td class="tl">当前操作</td>
	<td class="tr f_red f_b">确认发货</td>
	</tr>
	<tr>
	<td class="tl">物流类型</td>
	<td class="tr f_gray"><input type="text" size="10" name="send_type" id="send_type"/>
	<select onchange="$('send_type').value=this.value;">
	<option value="">常用物流类型</option>
	<?php if(is_array($send_types)) { foreach($send_types as $v) { ?>
	<option value="<?php echo $v;?>"><?php echo $v;?></option>
	<?php } } ?>
	</select>
	</td>
	</tr>
	<tr>
	<td class="tl">物流号码</td>
	<td class="tr f_gray"><input type="text" size="30" name="send_no" id="send_no"/></td>
	</tr>
	<tr>
	<td class="tl">发货时间</td>
	<td class="tr f_gray"><input type="text" size="20" name="send_time" id="send_time" value="<?php echo $send_time;?>"/></td>
	</tr>
	<?php if($_userid && $DT['sms']) { ?>
	<tr>
	<td class="tl"></td>
	<td class="tr"><input type="checkbox" name="sendsms" value="1"/> 短信通知买家已发货 (<a href="<?php echo $MODULE['2']['linkurl'];?>sms.php" target="_blank" class="t">我的可用短信 <strong class="f_blue"><?php echo $_sms;?></strong> 条</a>)</td>
	</tr>
	<?php } ?>
	<tr>
	<td class="tl"> </td>
	<td class="tr">
	<input type="submit" name="submit" value=" 确 定 " class="btn"/>&nbsp;&nbsp;<input type="button" value=" 返 回 " class="btn" onclick="history.back(-1);"/>
	</td>
	</tr>
	</table>
	</form>
	<script type="text/javascript">
	function check() {
		return confirm('您确认货物已经发出，并且以上信息填写无误吗？\n\n此操作将不可撤销');
	}
	</script>
	<script type="text/javascript">s('trade');m('action');</script>
	<?php } else if($step == 'add_time') { ?>
	<form method="post" action="<?php echo $MOD['linkurl'];?>trade.php" onsubmit="return check();" id="dform">
	<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
	<input type="hidden" name="action" value="<?php echo $action;?>"/>
	<input type="hidden" name="step" value="<?php echo $step;?>"/>
	<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
	<table cellspacing="1" cellpadding="6" class="tb">
	<tr>
	<td class="tl">当前操作</td>
	<td class="tr f_red f_b">延长买家确认时间</td>
	</tr>
	<tr>
	<td class="tl"><span class="f_red">*</span>延长时间</td>
	<td class="tr f_gray"><input type="text" size="10" name="add_time" id="add_time" value="<?php echo $td['add_time'];?>"/> 单位:小时 1天=24小时 只能为整数&nbsp;<span id="dadd_time" class="f_red"></span></td>
	</tr>
	<tr>
	<td class="tl"> </td>
	<td class="tr">
	<input type="submit" name="submit" value=" 确 定 " class="btn"/>&nbsp;&nbsp;<input type="button" value=" 返 回 " class="btn" onclick="history.back(-1);"/>
	</td>
	</tr>
	</table>
	</form>
	<script type="text/javascript">
	function check() {
		return confirm('您确认延长'+$('add_time').value+'小时吗？');
	}
	</script>
	<script type="text/javascript">s('trade');m('action');</script>
	<?php } else if($step == 'refund') { ?>
	<form method="post" action="<?php echo $MOD['linkurl'];?>trade.php" onsubmit="return check();" id="dform">
	<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
	<input type="hidden" name="action" value="<?php echo $action;?>"/>
	<input type="hidden" name="step" value="<?php echo $step;?>"/>
	<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
	<table cellspacing="1" cellpadding="6" class="tb">
	<tr>
	<td class="tl">当前操作</td>
	<td class="tr f_red f_b">申请退款</td>
	</tr>
	<tr>
	<td class="tl">商品或服务</td>
	<td class="tr"><?php if($td['linkurl']) { ?><a href="<?php echo $td['linkurl'];?>" target="_blank" class="t"><?php echo $td['title'];?></a><?php } else { ?><?php echo $td['title'];?><?php } ?></td>
	</tr>
	<tr>
	<td class="tl">缩略图</td>
	<td class="tr"><img src="<?php if($td['thumb']) { ?><?php echo $td['thumb'];?><?php } else { ?><?php echo DT_SKIN;?>image/nopic50.gif<?php } ?>" width="50" height="50" alt="流水号:<?php echo $td['itemid'];?>"/></td>
	</tr>
	<tr>
	<td class="tl">卖 家</td>
	<td class="tr"><a href="<?php echo $MODULE['3']['linkurl'];?>redirect.php?username=<?php echo $td['seller'];?>" target="_blank" class="t"><?php echo $td['seller'];?></a></td>
	</tr>
	<tr>
	<td class="tl">下单时间</td>
	<td class="tr"><?php echo $td['adddate'];?></td>
	</tr>
	<tr>
	<td class="tl">发货时间</td>
	<td class="tr"><?php echo $td['updatedate'];?></td>
	</tr>
	<tr>
	<td class="tl">备注说明</td>
	<td class="tr"><?php echo $td['note'];?></td>
	</tr>
	<tr>
	<td class="tl">订单金额</td>
	<td class="tr f_blue f_b"><?php echo $td['amount'];?> <?php echo $DT['money_unit'];?></td>
	</tr>
	<?php if($td['fee']) { ?>
	<tr>
	<td class="tl"><?php echo $td['fee_name'];?></td>
	<td class="tr f_blue f_b"><?php echo $td['fee'];?> <?php echo $DT['money_unit'];?></td>
	</tr>
	<?php } ?>
	<tr>
	<td class="tl">实付金额</td>
	<td class="tr f_red f_b"><?php echo $money;?> <?php echo $DT['money_unit'];?></td>
	</tr>
	<tr>
	<td class="tl"><span class="f_red">*</span> 理由及证据</td>
	<td class="tr"><textarea name="content" id="content" class="dsn"></textarea>
	<?php echo deditor($moduleid, 'content', 'Simple', '98%', 200);?><span id="dcontent" class="f_red"></span></td>
	</tr>
	<tr>
	<td class="tl"><span class="f_red">*</span> 支付密码</td>
	<td class="tr"><?php include template('password', 'chip');?>&nbsp;<span id="dpassword" class="f_red"></span></td>
	</tr>
	<tr>
	<td class="tl"> </td>
	<td class="tr">
	<input type="submit" name="submit" value=" 确 定 " class="btn"/>&nbsp;&nbsp;<input type="button" value=" 返 回 " class="btn" onclick="history.back(-1);"/>
	</td>
	</tr>
	</table>
	</form>
	<script type="text/javascript">
	function check() {
		var len = FCKLen();
		if(len < 10) {
			Dmsg('理由及证据不能少于10个字，当前已输入'+len+'个字', 'content');
			return false;
		}
		if($('password').value == '') {
			Dmsg('请填写支付密码', 'password');
			return false;
		}
		return confirm('您确认您提供的理由及证据无误，并申请退款吗？');
	}
	</script>
	<script type="text/javascript">s('trade');m('action_order');</script>
	<?php } ?>
<?php } else if($action == 'order') { ?>
<div class="tt">
<form action="<?php echo $MOD['linkurl'];?>trade.php">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<?php echo $fields_select;?>&nbsp;
<input type="text" size="10" name="kw" value="<?php echo $kw;?>" title="关键词"/>&nbsp;
<?php echo $status_select;?>&nbsp;
<?php echo dcalendar('fromtime', $fromtime);?> 至 <?php echo dcalendar('totime', $totime);?>&nbsp;
<input type="submit" value=" 搜 索 " class="btn"/>&nbsp;
<input type="button" value=" 重 置 " class="btn" onclick="window.location='<?php echo $MOD['linkurl'];?>trade.php?action=<?php echo $action;?>';"/>
</div>
</form>
<div class="bd">
<table cellpadding="1" cellspacing="0" class="tb">
<tr>
<th width="60">缩略图</th>
<th>商品或服务</th>
<th width="60">金额</th>
<th width="50">附加</th>
<th width="60">总额</th>
<th width="80">卖家</th>
<th width="16">&nbsp;</th>
<th width="75">下单时间</th>
<th width="75">更新时间</th>
<th width="90">状态</th>
</tr>
<?php if(is_array($trades)) { foreach($trades as $k => $v) { ?>
<tr align="center" title="流水号:<?php echo $v['itemid'];?>"<?php if($k%2==1) { ?> bgcolor="#FAFAFA"<?php } ?>>
<td rowspan="2" height="70"><img src="<?php if($v['thumb']) { ?><?php echo $v['thumb'];?><?php } else { ?><?php echo DT_SKIN;?>image/nopic50.gif<?php } ?>" width="50" height="50" onerror="this.src=errimg;"/></td>
<td align="left" style="padding:0 8px 0 8px;" class="f_b f_dblue"><?php if($v['linkurl']) { ?><a href="<?php echo $v['linkurl'];?>" target="_blank" class="t"><?php echo $v['title'];?></a><?php } else { ?><?php echo $v['title'];?><?php } ?></td>
<td class="f_red px11"><?php echo $v['amount'];?></td>
<td class="f_blue px11" title="<?php echo $v['fee_name'];?>"><?php echo $v['fee'];?></td>
<td class="f_red f_b px11"><?php echo $v['money'];?></td>
<td class="px11"><a href="<?php echo userurl($v['seller']);?>" target="_blank"><?php echo $v['seller'];?></a></td>
<td><a href="message.php?action=send&touser=<?php echo $v['seller'];?>" target="_blank"><img src="image/ico_message.gif" title="发送站内信"/></a></td>
<td class="px11"><?php echo $v['addtime'];?></td>
<td class="px11"><?php echo $v['updatetime'];?></td>
<td><?php echo $v['dstatus'];?></td>
</tr>
<tr<?php if($k%2==1) { ?> bgcolor="#FAFAFA"<?php } ?>>
<td colspan="10" class="f_gray">
<span class="f_r">
<?php if($v['status'] == 0) { ?>
<input type="button" value="删 除" class="btn" onclick="if(confirm('确实要删除此交易吗？此操作将不可撤销')) window.location='<?php echo $MOD['linkurl'];?>trade.php?itemid=<?php echo $v['itemid'];?>&action=update&step=close&forward=<?php echo $forward;?>';"/>
<?php } else if($v['status'] == 1) { ?>
<input type="button" value="付 款" class="btn" onclick="window.location='<?php echo $MOD['linkurl'];?>trade.php?itemid=<?php echo $v['itemid'];?>&action=update&step=pay&forward=<?php echo $forward;?>';"/>
<input type="button" value="关闭交易" class="btn" onclick="if(confirm('确实要关闭此交易吗？此操作将不可撤销')) window.location='<?php echo $MOD['linkurl'];?>trade.php?itemid=<?php echo $v['itemid'];?>&action=update&step=close&forward=<?php echo $forward;?>';"/>
<?php } else if($v['status'] == 3) { ?>

	<?php if($v['lefttime']) { ?>
	<span class="f_blue" title="如果逾期未处理，系统将自动付款给卖家"><img src="<?php echo DT_SKIN;?>image/clock.gif" width="12" height="12"/> 距处理此订单还剩<?php echo $v['lefttime'];?></span>&nbsp;
	<input type="button" value="确认到货" class="btn" onclick="if(confirm('确认已收到货且质量与数量无误吗？\n\n请注意:确认后您的钱将直接支付给卖家')) window.location='<?php echo $MOD['linkurl'];?>trade.php?itemid=<?php echo $v['itemid'];?>&action=update&step=receive_goods&forward=<?php echo $forward;?>';"/>
	<input type="button" value="申请退款" class="btn" onclick="window.location='<?php echo $MOD['linkurl'];?>trade.php?itemid=<?php echo $v['itemid'];?>&action=update&step=refund&forward=<?php echo $forward;?>';"/>
	<?php } else { ?>
	<span class="f_red">订单处理已超时，等待卖家收款</span>&nbsp;
	<?php } ?>
<?php } else if($v['status'] == 9) { ?>
<input type="button" value="删 除" class="btn" onclick="window.location='<?php echo $MOD['linkurl'];?>trade.php?itemid=<?php echo $v['itemid'];?>&action=update&step=close&forward=<?php echo $forward;?>';"/>
<?php } ?>
<input type="button" value="详 情" class="btn" onclick="window.location='<?php echo $MOD['linkurl'];?>trade.php?itemid=<?php echo $v['itemid'];?>&action=update&step=detail';"/>
&nbsp;
</span>
&nbsp;<strong>编号：</strong>T<?php echo $v['itemid'];?>&nbsp;&nbsp;&nbsp;&nbsp;<strong>备注：</strong><?php echo $v['note'];?>
</td>
</tr>
<?php } } ?>
<?php if($trades) { ?>
<tr align="center">
<td height="30">&nbsp;</td>
<td><strong>小计</strong></td>
<td class="f_red px11"><?php echo $amount;?></td>
<td class="f_blue px11"><?php echo $fee;?></td>
<td class="f_red f_b px11"><?php echo $money;?></td>
<td colspan="5">&nbsp;</td>
</tr>
<?php } ?>
</table>
</div>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">s('trade');m('action_order');</script>
<?php } else { ?>
<div class="tt">
<form action="<?php echo $MOD['linkurl'];?>trade.php">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<?php echo $fields_select;?>&nbsp;
<input type="text" size="10" name="kw" value="<?php echo $kw;?>" title="关键词"/>&nbsp;
<?php echo $status_select;?>&nbsp;
<?php echo dcalendar('fromtime', $fromtime);?> 至 <?php echo dcalendar('totime', $totime);?>&nbsp;
<input type="submit" value=" 搜 索 " class="btn"/>&nbsp;
<input type="button" value=" 重 置 " class="btn" onclick="window.location='<?php echo $MOD['linkurl'];?>trade.php?action=<?php echo $action;?>';"/>
</form>
</div>
<div class="bd">
<table cellpadding="1" cellspacing="0" class="tb">
<tr>
<th width="60">缩略图</th>
<th>商品或服务</th>
<th width="60">金额</th>
<th width="50">附加</th>
<th width="60">总额</th>
<th width="80">买家</th>
<th width="16">&nbsp;</th>
<th width="75">下单时间</th>
<th width="75">更新时间</th>
<th width="90">状态</th>
</tr>
<?php if(is_array($trades)) { foreach($trades as $k => $v) { ?>
<tr align="center"<?php if($k%2==1) { ?> bgcolor="#FAFAFA"<?php } ?>>
<td rowspan="2" height="70"><img src="<?php if($v['thumb']) { ?><?php echo $v['thumb'];?><?php } else { ?><?php echo DT_SKIN;?>image/nopic50.gif<?php } ?>" width="50" height="50"  onerror="this.src=errimg;"/></td>
<td align="left" style="padding:0 8px 0 8px;" class="f_b f_dblue"><?php if($v['linkurl']) { ?><a href="<?php echo $v['linkurl'];?>" target="_blank" class="t"><?php echo $v['title'];?></a><?php } else { ?><?php echo $v['title'];?><?php } ?><?php if($v['status'] == 0) { ?> <img src="image/new.gif"/><?php } ?></td>
<td class="f_red px11"><?php echo $v['amount'];?></td>
<td class="f_blue px11" title="<?php echo $v['fee_name'];?>"><?php echo $v['fee'];?></td>
<td class="f_blue f_b px11"><?php echo $v['money'];?></td>
<td class="px11"><a href="<?php echo userurl($v['buyer']);?>" target="_blank"><?php echo $v['buyer'];?></a></td>
<td><a href="message.php?action=send&touser=<?php echo $v['buyer'];?>" target="_blank"><img src="image/ico_message.gif" title="发送站内信"/></a></td>
<td class="px11"><?php echo $v['addtime'];?></td>
<td class="px11"><?php echo $v['updatetime'];?></td>
<td><?php echo $v['dstatus'];?></td>
</tr>
<tr<?php if($k%2==1) { ?> bgcolor="#FAFAFA"<?php } ?>>
<td colspan="10" class="f_gray">
<span class="f_r">
<?php if($v['status'] == 0) { ?>
<input type="button" value="确认订单" class="btn" onclick="if(confirm('确实要确认此订单吗？此操作将不可撤销')) window.location='<?php echo $MOD['linkurl'];?>trade.php?itemid=<?php echo $v['itemid'];?>&action=update&step=confirm_order&forward=<?php echo $forward;?>';"/>
<input type="button" value="修改价格" class="btn" onclick="window.location='<?php echo $MOD['linkurl'];?>trade.php?itemid=<?php echo $v['itemid'];?>&action=update&step=edit_price';"/>
<input type="button" value="关闭交易" class="btn" onclick="if(confirm('确实要关闭此交易吗？此操作将不可撤销')) window.location='<?php echo $MOD['linkurl'];?>trade.php?itemid=<?php echo $v['itemid'];?>&action=update&step=close&forward=<?php echo $forward;?>';"/>
<?php } else if($v['status'] == 1) { ?>
<input type="button" value="关闭交易" class="btn" onclick="if(confirm('确实要关闭此交易吗？此操作将不可撤销')) window.location='<?php echo $MOD['linkurl'];?>trade.php?itemid=<?php echo $v['itemid'];?>&action=update&step=close&forward=<?php echo $forward;?>';"/>
<?php } else if($v['status'] == 2) { ?>
<input type="button" value="确认发货" class="btn" onclick="window.location='<?php echo $MOD['linkurl'];?>trade.php?itemid=<?php echo $v['itemid'];?>&action=update&step=send_goods';"/>
<input type="button" value="关闭交易" class="btn" onclick="if(confirm('确实要关闭此交易吗？此操作将不可撤销')) window.location='<?php echo $MOD['linkurl'];?>trade.php?itemid=<?php echo $v['itemid'];?>&action=update&step=close&forward=<?php echo $forward;?>';"/>
<?php } else if($v['status'] == 3) { ?>
	<?php if($v['lefttime']) { ?>
	<span class="f_blue"><img src="<?php echo DT_SKIN;?>image/clock.gif" width="12" height="12"/> 距买家处理订单还剩<?php echo $v['lefttime'];?></span>&nbsp;
	<input type="button" value="延长时间" class="btn" onclick="window.location='<?php echo $MOD['linkurl'];?>trade.php?itemid=<?php echo $v['itemid'];?>&action=update&step=add_time&forward=<?php echo $forward;?>';"/>
	<?php } else { ?>
	<span class="f_blue">买家处理订单超时</span>
	<input type="button" value="直接收款" class="btn" onclick="window.location='<?php echo $MOD['linkurl'];?>trade.php?itemid=<?php echo $v['itemid'];?>&action=update&step=get_pay&forward=<?php echo $forward;?>';"/>
	<?php } ?>
<?php } else if($v['status'] == 8) { ?>
<input type="button" value="删 除" class="btn" onclick="window.location='<?php echo $MOD['linkurl'];?>trade.php?itemid=<?php echo $v['itemid'];?>&action=update&step=close&forward=<?php echo $forward;?>';"/>
<?php } ?>
<input type="button" value="详 情" class="btn" onclick="window.location='<?php echo $MOD['linkurl'];?>trade.php?itemid=<?php echo $v['itemid'];?>&action=update&step=detail';"/>
&nbsp;
</span>
&nbsp;<strong>编号：</strong>T<?php echo $v['itemid'];?>&nbsp;&nbsp;&nbsp;&nbsp;<strong>备注：</strong><?php echo $v['note'];?>
</td>
</tr>
<?php } } ?>
<?php if($trades) { ?>
<tr align="center">
<td height="30">&nbsp;</td>
<td><strong>小计</strong></td>
<td class="f_red px11"><?php echo $amount;?></td>
<td class="f_blue px11"><?php echo $fee;?></td>
<td class="f_blue f_b px11"><?php echo $money;?></td>
<td colspan="5">&nbsp;</td>
</tr>
<?php } ?>
</table>
</div>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">s('trade');m('action');</script>
<?php } ?>
<?php include template('footer', $module);?>