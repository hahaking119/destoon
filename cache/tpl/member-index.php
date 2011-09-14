<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', $module);?>
<link rel="stylesheet" type="text/css" href="image/index.css"/>
<div id="warn">
<?php if($_groupid > 5 && !$_edittime) { ?>
	<div class="warn">贵公司尚未完善详细资料！完善的商业信息有助于获得别人的信任，结交潜在的商业伙伴，获取商业机会&nbsp;&nbsp;<a href="edit.php?tab=2" class="t f_b">现在就去完善</a></div>
<?php } ?>
<?php if($vip && $havedays < 11) { ?>
	<div class="warn">尊敬的<?php echo $MG['groupname'];?>，您的<?php echo VIP;?>服务将在 <strong class="f_red"><?php echo $havedays;?></strong> 天后到期，为了不影响您的正常使用，请您尽快续费。&nbsp;&nbsp;<a href="renew.php" class="t f_b">点击续费</a></div>
<?php } ?>
<table cellpadding="0" cellspacing="0" width="100%" height="100%">
<tr>
<td valign="top">
<div class="i_info">
<ul>
<?php if($MOD['vmember']) { ?>
<li>
<img src="image/<?php if($validated) { ?>v<?php } else { ?>u<?php } ?>_member.gif" width="16" height="16" title="<?php if($validated) { ?>已通过<?php echo $validator;?>认证<?php } else { ?>未通过认证<?php } ?>" align="absmiddle"/> 认证：
<?php if($MOD['vemail']) { ?>
<img src="image/<?php if($vemail) { ?>v<?php } else { ?>u<?php } ?>_email.gif" width="16" height="16" title="<?php if($vemail) { ?>已通过<?php } else { ?>未通过<?php } ?>邮件认证" align="absmiddle"/> <a href="validate.php?action=email" class="l">邮件</a> &nbsp;
<?php } ?>
<?php if($MOD['vmobile']) { ?>
<img src="image/<?php if($vmobile) { ?>v<?php } else { ?>u<?php } ?>_mobile.gif" width="16" height="16" title="<?php if($vmobile) { ?>已通过<?php } else { ?>未通过<?php } ?>手机认证" align="absmiddle"/> <a href="validate.php?action=mobile" class="l">手机</a> &nbsp;
<?php } ?>
<?php if($MOD['vbank']) { ?>
<img src="image/<?php if($vbank) { ?>v<?php } else { ?>u<?php } ?>_bank.gif" width="16" height="16" title="<?php if($vbank) { ?>已通过<?php } else { ?>未通过<?php } ?>银行帐号认证" align="absmiddle"/> <a href="validate.php?action=bank" class="l">银行</a> &nbsp;
<?php } ?>
<?php if($MOD['vtruename']) { ?>
<img src="image/<?php if($vtruename) { ?>v<?php } else { ?>u<?php } ?>_truename.gif" width="16" height="16" title="<?php if($vtruename) { ?>已通过<?php } else { ?>未通过<?php } ?>真实姓名认证" align="absmiddle"/> <a href="validate.php?action=truename" class="l">实名</a> &nbsp;
<?php } ?>
<?php if($MOD['vcompany'] && $groupid > 5) { ?>
<img src="image/<?php if($vcompany) { ?>v<?php } else { ?>u<?php } ?>_company.gif" width="16" height="16" title="<?php if($vcompany) { ?>已通过<?php } else { ?>未通过<?php } ?>公司资料认证" align="absmiddle"/> <a href="validate.php?action=company" class="l">公司</a>
<?php } ?>
</li>
<?php } ?>
<li>
<img src="image/ico_message.gif" width="16" height="16" alt="" align="absmiddle"/> 信件：
<strong class="f_red"><?php echo $_message;?></strong> 封 <a href="message.php" class="l">未读站内信</a>
&nbsp;&nbsp;
<a href="message.php?typeid=1" class="l">询价</a> | 
<a href="message.php?typeid=2" class="l">报价</a> | 
<a href="message.php?typeid=3" class="l">留言</a> | 
<a href="message.php?typeid=4" class="l">信使</a> | 
<a href="message.php?action=send" class="l">发信</a>
</li>
<li>
<img src="image/ico_member.gif" width="16" height="16" alt="" align="absmiddle"/> <?php echo $DT['money_name'];?>：
<strong class="f_red"><?php echo $_money;?></strong> <?php echo $DT['money_unit'];?>可用 <span class="f_gray">(<?php echo $locking;?><?php echo $DT['money_unit'];?>锁定)</span>
&nbsp;&nbsp;
<a href="record.php" class="l"><?php echo $DT['money_name'];?>流水</a> | 
<a href="cash.php" class="l">提现</a> | 
<a href="trade.php?action=pay" class="l">付款</a> | 
<a href="charge.php?action=pay" class="l">在线充值</a>
</li>
<li>
<img src="image/ico_credit.gif" width="16" height="16" alt="" align="absmiddle"/> <?php echo $DT['credit_name'];?>：
<strong><?php echo $_credit;?></strong>
&nbsp;&nbsp;
<a href="credits.php" class="l"><?php echo $DT['credit_name'];?>记录</a> | 
<a href="credits.php?action=buy" class="l">购买<?php echo $DT['credit_name'];?></a> | 
<a href="invite.php" class="l">推广赚<?php echo $DT['credit_name'];?></a>
<?php if($MOD['credit_exchange']) { ?>| <a href="credits.php?action=exchange" class="l"><?php echo $DT['credit_name'];?>兑换</a><?php } ?>
</li>
<?php if($DT['sms'] && $MG['sms']) { ?>
<li>
<img src="image/ico_sms.gif" width="16" height="16" alt="" align="absmiddle"/> 短信：
<strong><?php echo $_sms;?></strong> 条可用
&nbsp;&nbsp;
<a href="sms.php?action=add" class="l">发送</a> | 
<a href="sms.php?action=buy" class="l">购买</a> | 
<a href="sms.php?action=record" class="l">接收记录</a> | 
<a href="sms.php?action=send" class="l">发送记录</a> | 
<a href="sms.php" class="l">短信记录</a>
</li>
<?php } ?>
<li>
<img src="image/ico_trade.gif" width="16" height="16" alt="" align="absmiddle"/> 订单：
<strong class="f_red"><?php echo $trade;?></strong>
&nbsp;&nbsp;
<a href="trade.php" class="l">收到的订单(卖)</a> | 
<a href="trade.php?action=order" class="l">发出的订单(买)</a> 
</li>
</ul>
</div>
<div class="i_quick">
	<div>
		<ul>
			<li><a href="message.php" class="b"><img src="image/btn_message.gif" width="32" height="32" alt=""/><br/>站内信</a></li>
			<li><a href="trade.php" class="b"><img src="image/btn_trade.gif" width="32" height="32" alt=""/><br/>交易管理</a></li>
			<li><a href="record.php" class="b"><img src="image/btn_record.gif" width="32" height="32" alt=""/><br/><?php echo $DT['money_name'];?>记录</a></li>
			<li><a href="friend.php" class="b"><img src="image/btn_friend.gif" width="32" height="32" alt=""/><br/>我的商友</a></li>
			<li><a href="favorite.php" class="b"><img src="image/btn_favorite.gif" width="32" height="32" alt=""/><br/>商机收藏</a></li>
			<li><a href="<?php echo $DT['file_my'];?>" class="b"><img src="image/btn_my.gif" width="32" height="32" alt=""/><br/><span class="f_red">发布信息</span></a></li>
			<li><a href="edit.php" class="b"><img src="image/btn_edit.gif" width="32" height="32" alt=""/><br/>完善资料</a></li>
			<li><a href="alert.php" class="b"><img src="image/btn_alert.gif" width="32" height="32" alt=""/><br/>贸易提醒</a></li>
			<li><a href="home.php" class="b"><img src="image/btn_home.gif" width="32" height="32" alt=""/><br/>主页设置</a></li>
			<li><a href="style.php" class="b"><img src="image/btn_style.gif" width="32" height="32" alt=""/><br/>风格模板</a></li>
		</ul>
	</div>
	<div style="clear:both;"></div>
</div>
<div class="i_find">
	<div><?php if($areaid) { ?><span class="f_r f_gray">[<?php echo area_pos($areaid, '');?>]</span><?php } ?><strong class="px13">您可能在找..</strong></div>
	<table cellspacing="2" cellpadding="2" width="100%">
	<tr>
	<td width="50%" valign="top">
	<?php $tags=tag("moduleid=5&condition=status=3 and username<>'$_username'&areaid=$areaid&pagesize=8&order=edittime desc&template=null")?>
	<?php if($tags) { ?>
	<ul>
	<?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
	<li><span class="f_r px11 f_gray"><?php echo timetodate($t['edittime'], 2);?></span>&nbsp;<a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>" class="b"><?php echo $t['title'];?></a></li>
	<?php } } ?>
	</ul>
	<?php } ?>
	</td>
	<td width="50%" valign="top">
	<?php $tags=tag("moduleid=6&condition=status=3 and username<>'$_username'&areaid=$areaid&pagesize=8&order=edittime desc&template=null")?>
	<?php if($tags) { ?>
	<ul>
	<?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
	<li><span class="f_r px11 f_gray"><?php echo timetodate($t['edittime'], 2);?></span>&nbsp;<a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>" class="b"><?php echo $t['title'];?></a></li>
	<?php } } ?>
	</ul>
	<?php } ?>
	</td>
	</tr>
	</table>
</div>
</td>
<td width="8">&nbsp;</td>
<td valign="top" class="i_rt">
<div class="i_head">
<strong>商务便笺</strong>
</div>
<div class="i_body">
	<div class="i_note">
	<form method="post" action="index.php" onsubmit="return check();">
	<table cellspacing="2" cellpadding="2" width="100%">
	<tr>
	<td colspan="2"><textarea name="note" id="note"><?php echo $note;?></textarea></td>
	</tr>
	<tr>
	<td><input type="submit" name="submit" value=" 更 新 " class="btn"/></td>
	<td class="f_gray">[可记录一些文字备忘，限1000字]</td>
	</tr>
	</table>
	</form>
	</div>
</div>
<div class="i_head">
<strong>系统消息</strong>
</div>
<div class="i_body">
<div class="i_sys">
<ul>
<?php if($sys) { ?>
<?php if(is_array($sys)) { foreach($sys as $v) { ?>
<li><span class="f_r px11 f_gray"><?php echo timetodate($v['addtime'], 2);?></span>&nbsp;<a href="message.php?action=show&itemid=<?php echo $v['itemid'];?>" title="<?php echo $v['title'];?>"><?php echo $v['title'];?></a></li>
<?php } } ?>
<?php } else { ?>
<li>&nbsp;暂无消息</li>
<?php } ?>
</ul>
</div>
</div>
<div class="i_head">
<strong>会员信息</strong>
</div>
<div class="i_body">
<div class="i_user">
<table cellpadding="6" cellspacing="0" width="100%">
<tr>
<td class="i_user_l">会员名</td>
<td><?php echo $username;?></td>
</tr>
<tr>
<td class="i_user_l">会员组</td>
<td><?php echo $MG['groupname'];?></td>
</tr>
<?php if($MOD['passport']) { ?>
<tr>
<td class="i_user_l">通行证</td>
<td><?php echo $passport;?></td>
</tr>
<?php } ?>
<tr>
<td class="i_user_l">会员ID</td>
<td><?php echo $userid;?></td>
</tr>
<tr>
<td class="i_user_l">登录时间</td>
<td><?php echo $logintime;?><?php if($DT['login_log']==2) { ?>&nbsp;&nbsp;<a href="record.php?action=login" class="l">登录记录</a><?php } ?></td>
</tr>
<tr>
<td class="i_user_l">注册时间</td>
<td><?php echo $regtime;?></td>
</tr>
<?php if($_groupid > 5) { ?>
<tr>
<td class="i_user_l">公司名称</td>
<td><?php echo $company;?></td>
</tr>
<?php } ?>
<?php if($MG['homepage']) { ?>
<tr>
<td class="i_user_l">我的主页</td>
<td><a href="<?php echo $userurl;?>" target="_blank" class="l">点击访问</a></td>
</tr>
<?php } ?>
<?php if($vip) { ?>
<tr>
<td class="i_user_l"><?php echo VIP;?>级别</td>
<td><img src="<?php echo DT_SKIN;?>image/vip.gif"/> <img src="<?php echo DT_SKIN;?>image/vip_<?php echo $vip;?>.gif"/></td>
</tr>
<tr>
<td class="i_user_l">服务期</td>
<td><?php echo timetodate($fromtime, 3);?> 至 <?php echo timetodate($totime, 3);?></td>
</tr>
<tr>
<td class="i_user_l">剩余时间</td>
<td><strong><?php echo $havedays;?></strong> 天&nbsp;&nbsp;<a href="renew.php" class="l">续费</a></td>
</tr>
<?php } else if($groupid>4) { ?>
<tr>
<td class="i_user_l">会员升级</td>
<td>&nbsp;<a href="grade.php"><span class="f_red">立即升级</span></a></td>
</tr>
<?php } ?>
</table>
</div>
</div>
</td>
</tr>
</table>
<?php include template('footer', $module);?>