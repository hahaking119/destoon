<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', $module);?>
<script type="text/javascript">c(2);</script>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="action"><a href="<?php echo $MOD['linkurl'];?>cash.php"><span>申请提现</span></a></td>
<td class="tab_nav">&nbsp;</td>
<td class="tab" id="action_setting"><a href="<?php echo $MOD['linkurl'];?>cash.php?action=setting"><span>帐号设置</span></a></td>
<td class="tab_nav">&nbsp;</td>
<td class="tab" id="action_record"><a href="<?php echo $MOD['linkurl'];?>cash.php?action=record"><span>提现记录</span></a></td>
</tr>
</table>
</div>
<?php if($action == 'record') { ?>
<form action="?">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<div class="tt">
<select name="bank">
<option value="">收款方式</option>
<?php if(is_array($BANKS)) { foreach($BANKS as $v) { ?>
<option value="<?php echo $v;?>" <?php if($bank == $v) { ?>selected<?php } ?>><?php echo $v;?></option>;
<?php } } ?>
</select>
&nbsp;
<?php echo dcalendar('fromtime', $fromtime);?> 至 <?php echo dcalendar('totime', $totime);?>
&nbsp;
<input type="submit" value=" 搜 索 " class="btn"/>&nbsp;
<input type="button" value=" 重 置 " class="btn" onclick="window.location='?action=<?php echo $action;?>';"/>
</div>
</form>
<div class="bd">
<table cellpadding="1" cellspacing="0" class="tb">
<tr>
<th>流水号</th>
<th>金额</th>
<th>手续费</th>
<th>收款方式</th>
<th>收款帐号</th>
<th>收款人</th>
<th width="130">申请时间</th>
<th width="130">受理时间</th>
<th>状态</th>
</tr>
<?php if(is_array($cashs)) { foreach($cashs as $k => $v) { ?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td height="30"class="px11"><?php echo $v['itemid'];?></td>
<td class="px11 f_red"><?php echo $v['amount'];?></td>
<td class="px11 f_blue"><?php echo $v['fee'];?></td>
<td><?php echo $v['bank'];?></td>
<td class="px11"><?php echo $v['account'];?></td>
<td><?php echo $v['truename'];?></td>
<td class="px11 f_gray"><?php echo $v['addtime'];?></td>
<td class="px11 f_gray"><?php echo $v['edittime'];?></td>
<td<?php if($v['note']) { ?> title="原因及备注:<?php echo $v['note'];?>"<?php } ?>><?php echo $v['dstatus'];?></td>
</tr>
<?php } } ?>
<tr align="center">
<td height="35"><strong>小计</strong></td>
<td class="px11 f_red"><?php echo $amount;?></td>
<td class="px11 f_blue"><?php echo $fee;?></td>
<td colspan="6">&nbsp;</td>
</tr>
</table>
</div>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">s('cash');m('action_record');</script>
<?php } else if($action == 'setting') { ?>
<?php if($vbank) { ?>
<table cellspacing="1" cellpadding="6" class="tb">
<tr>
<td class="tl">收款方式</td>
<td class="tr"><?php echo $member['bank'];?></td>
</tr>
<tr>
<td class="tl"> 收款帐号</td>
<td class="tr"><?php echo $member['account'];?></td>
</tr>
<tr>
<td class="tl"> 收款人</td>
<td class="tr"><?php echo $member['truename'];?></td>
</tr>
<tr>
<td class="tl">认证状态</td>
<td class="tr f_green">已认证</td>
</tr>
</table>
<?php } else { ?>
<form method="post" action="<?php echo $MOD['linkurl'];?>cash.php">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<table cellspacing="1" cellpadding="6" class="tb">
<tr>
<td class="tl"> <span class="f_red">*</span>收款方式</td>
<td class="tr"><?php echo $bank_select;?></td>
</tr>
<tr>
<td class="tl"> <span class="f_red">*</span>收款帐号</td>
<td class="tr"><input type="text" size="30" name="account" value="<?php echo $member['account'];?>"/> [注意] 此帐号开户名必须为 <strong><?php echo $member['truename'];?></strong></td>
</tr>
<tr>
<td class="tl"> <span class="f_red">*</span>支付密码</td>
<td class="tr"><?php include template('password', 'chip');?></td>
</tr>
<tr>
<td class="tl"> </td>
<td class="tr">
<input type="submit" name="submit" value=" 确 定 " class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value=" 重 置 " class="btn"/>
</td>
</tr>
</table>
</form>
<?php } ?>
<script type="text/javascript">s('cash');m('action_setting');</script>
<?php } else if($action == 'confirm') { ?>
<form method="post" action="<?php echo $MOD['linkurl'];?>cash.php">
<input type="hidden" name="action" value="confirm"/>
<input type="hidden" name="amount" value="<?php echo $amount;?>"/>
<table cellspacing="1" cellpadding="6" class="tb">
<tr>
<td class="tl">金额确认</td>
<td class="tr" style="line-height:180%;">
提现金额：<strong><?php echo $amount;?></strong><br/>
手 续 费：<strong><?php echo $fee;?></strong><br/>
实收金额：<strong class="f_red"><?php echo $money;?></strong><br/>
可用金额：<strong class="f_blue"><?php echo $_money;?></strong><br/>
</td>
</tr>
<tr>
<td class="tl"> <span class="f_red">*</span>支付密码</td>
<td class="tr"><?php include template('password', 'chip');?></td>
</tr>
<tr>
<td class="tl"> </td>
<td class="tr">
<input type="submit" name="submit" value=" 确 定 " class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value=" 重 置 " class="btn"/>
</td>
</tr>
</table>
</form>
<script type="text/javascript">s('cash');m('action');</script>
<?php } else { ?>
<form method="post" action="<?php echo $MOD['linkurl'];?>cash.php">
<input type="hidden" name="action" value="confirm"/>
<table cellspacing="1" cellpadding="6" class="tb">
<tr>
<td class="tl">我的帐户</td>
<td class="tr">可用余额 <span class="f_red"><?php echo $_money;?></span> <?php echo $DT['money_unit'];?></td>
</tr>
<tr>
<td class="tl">提现说明</td>
<td class="tr f_gray">
<?php if($MOD['cash_times']) { ?>- 24小时可提现次数<?php echo $MOD['cash_times'];?>次<br/><?php } ?>
<?php if($MOD['cash_min']) { ?>- 单次提现最小金额<?php echo $MOD['cash_min'];?><?php echo $DT['money_unit'];?><br/><?php } ?>
<?php if($MOD['cash_max']) { ?>- 单次提现最大金额<?php echo $MOD['cash_max'];?><?php echo $DT['money_unit'];?><br/><?php } ?>
<?php if($MOD['cash_fee']) { ?>- 提现费率<?php echo $MOD['cash_fee'];?>%<br/><?php } ?>
<?php if($MOD['cash_fee_min']) { ?>- 提现费率最小值<?php echo $MOD['cash_fee_min'];?><?php echo $DT['money_unit'];?><br/><?php } ?>
<?php if($MOD['cash_fee_max']) { ?>- 提现费率封顶值<?php echo $MOD['cash_fee_max'];?><?php echo $DT['money_unit'];?><br/><?php } ?>
</td>
</tr>
<tr>
<td class="tl"> <span class="f_red">*</span>提现金额</td>
<td class="tr"><input type="text" size="10" name="amount"/></td>
</tr>
<tr>
<td class="tl"> </td>
<td class="tr">
<input type="submit" value=" 确 定 " class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value=" 重 置 " class="btn"/>
</td>
</tr>
</table>
</form>
<script type="text/javascript">s('cash');m('action');</script>
<?php } ?>
<?php include template('footer', $module);?>