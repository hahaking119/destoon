<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<style type="text/css">
.tl{width:150px;text-align:right;padding-right:20px;}
.reg_title {border-bottom:#CCCCCC 1px solid;font-weight:bold;padding:0 0 10px 10px;margin:15px 55px 0 55px;font-size:14px;color:#FF6600;}
.reg_inp {border:#7F9DB9 1px solid;padding:3px 0 3px 0;}
.tips {position:absolute;z-index:1000;width:300px;background:url('image/tips_bg.gif') no-repeat 0 bottom;overflow:hidden;margin:-5px 0 0 -10px;}
.tips div{background:url('image/tips_top.gif') no-repeat;line-height:22px;padding:8px 10px 8px 35px;}
</style>
<div class="m">
	<div class="left_box">
	<div class="pos">当前位置: <a href="<?php echo DT_PATH;?>">首页</a> &raquo; <a href="<?php echo $MOD['linkurl'];?><?php echo $DT['file_register'];?>">会员注册</a></div>
	<div style="padding:20px 50px 20px 50px;">
		<div style="background:#FAFAFA;padding:10px 20px 10px 20px;line-height:24px;">
		<span class="f_b">
		&raquo; 已经是会员？请<a href="<?php echo $MOD['linkurl'];?><?php echo $DT['file_login'];?>">点这里登录</a>&nbsp;
		&raquo; 忘记了密码？请<a href="<?php echo $MOD['linkurl'];?>send.php">点这里找回</a>&nbsp;
		<?php if($MOD['checkuser'] == 2) { ?>
		&raquo; <span class="f_red">未收到验证信？</span>请<a href="<?php echo $MOD['linkurl'];?>send.php?action=check">点这里重发</a>
		<?php } ?>
		</span>
		<br/>
		<span class="f_gray">请认真、仔细地填写以下信息，严肃的商业信息有助于您获得别人的信任，结交潜在的商业伙伴，获取商业机会！<span class="f_red">*</span>为必填项		
		</span>
		</div>
		<br/>
			<iframe src="" name="send" id="send" style="display:none;"></iframe>
			<form action="<?php echo $MOD['linkurl'];?><?php echo $DT['file_register'];?>" method="post" target="send" onsubmit="return check();">
			<input name="action" type="hidden" id="action" value="<?php echo crypt_action('register');?>">
			<div class="reg_title">帐户信息</div>
			<table cellpadding="5" cellspacing="5" width="100%">
			<tr>
			<td class="tl">会员类型 <span class="f_red">*</span></td>
			<td>
			<input type="radio" name="post[regid]" value="6" id="g_6"onclick="reg(1);" checked/><label for="g_6"> <?php echo $GROUP['6']['groupname'];?></label>&nbsp;&nbsp;&nbsp;&nbsp;
			<?php if(is_array($GROUP)) { foreach($GROUP as $k => $v) { ?>
			<?php if($k>6 && $v['vip']==0) { ?><input type="radio" name="post[regid]" value="<?php echo $k;?>" id="g_<?php echo $k;?>"onclick="reg(1);"/><label for="g_<?php echo $k;?>"> <?php echo $GROUP[$k]['groupname'];?></label>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
			<?php } } ?>
			<input type="radio" name="post[regid]" value="5" id="g_5"onclick="reg(0);"/><label for="g_5"> <?php echo $GROUP['5']['groupname'];?></label>
			</td>
			</tr>
			<table cellpadding="5" cellspacing="5" width="100%">
			<tr onmouseover="Ds('tusername');" onmouseout="Dh('tusername');">
			<td class="tl">会员名 <span class="f_red">*</span></td>
			<td width="220"><input type="text" class="reg_inp" style="width:200px;" name="post[username]" id="username" onblur="validator('username');"<?php if($username) { ?> value="<?php echo $username;?>" readonly<?php } ?>/>
			</td>
			<td>
			<div class="tips" id="tusername" style="display:none;">
				<div><?php echo $MOD['minusername'];?>-<?php echo $MOD['maxusername'];?>个字符，只能使用小写字母(a-z)、数字(0-9)，且以字母开头</div>
			</div>
			<span id="dusername" class="f_red"></span>
			</td>
			</tr>
			<?php if($MOD['passport']) { ?>
			<tr onmouseover="Ds('tpassport');" onmouseout="Dh('tpassport');">
			<td class="tl">通行证用户名 &nbsp;</td>
			<td><input type="text" class="reg_inp" style="width:200px;" name="post[passport]" id="passport" onblur="validator('passport');"<?php if($passport) { ?> value="<?php echo $passport;?>" readonly<?php } ?>/></td>
			<td>
			<div class="tips" id="tpassport" style="display:none;">
				<div>支持中文名，可用于论坛等系统用户名<br/>如果不填写，则和会员名一致</div>
			</div>
			<span id="dpassport" class="f_red"></span>
			</td>
			</tr>
			<?php } ?>
			<tr onmouseover="Ds('tpassword');" onmouseout="Dh('tpassword');">
			<td class="tl">登录密码 <span class="f_red">*</span></td>
			<td><input type="password" class="reg_inp" style="width:200px;" name="post[password]" id="password" onblur="validator('password');"<?php if($password) { ?> value="<?php echo $password;?>" readonly<?php } ?>/></td>
			<td>
			<div class="tips" id="tpassword" style="display:none;">
				<div><?php echo $MOD['minpassword'];?>-<?php echo $MOD['maxpassword'];?>个字符，区分大小写，推荐使用数字、字母和特殊符号组合</div>
			</div>
			<span id="dpassword" class="f_red"></span>
			</td>
			</tr>
			<tr onmouseover="Ds('tcpassword');" onmouseout="Dh('tcpassword');">
			<td class="tl">重复输入密码 <span class="f_red">*</span></td>
			<td><input type="password" class="reg_inp" style="width:200px;" size="30" name="post[cpassword]" id="cpassword" onblur="validate('cpassword');"<?php if($password) { ?> value="<?php echo $password;?>" readonly<?php } ?>/></td>
			<td>
			<div class="tips" id="tcpassword" style="display:none;">
				<div>请再输入一遍上面填写的密码</div>
			</div>
			<span id="dcpassword" class="f_red"></span>
			</td>
			</tr>
			</table>
			<div class="reg_title">联系方式</div>

			<table cellpadding="5" cellspacing="5" width="100%">
			<tr onmouseover="Ds('ttruename');" onmouseout="Dh('ttruename');">
			<td class="tl">真实姓名 <span class="f_red">*</span></td>
			<td width="220">
			<input type="text" class="reg_inp" style="width:100px;" name="post[truename]" id="truename" onblur="validate('truename');"/>
			<input type="radio" name="post[gender]" value="1" checked id="gender_1"/><label for="gender_1"> 先生</label>
			<input type="radio" name="post[gender]" value="2" id="gender_2"/><label for="gender_2"> 女士</label>
			</td>
			<td>
			<div class="tips" id="ttruename" style="display:none;">
				<div>请与有效身份证件上的姓名保持一致</div>
			</div>
			<span id="dtruename" class="f_red"></span>
			</td>
			</tr>
			<tr>
			<td class="tl">所在地区 <span class="f_red">*</span></td>
			<td><?php echo ajax_area_select('post[areaid]', '请选择', 0, '', 2);?></td>
			<td><span id="dareaid" class="f_red"></span></td>
			</tr>
			<tr onmouseover="Ds('temail');" onmouseout="Dh('temail');">
			<td class="tl">电子邮箱 <span class="f_red">*</span></td>
			<td><input type="text" class="reg_inp" style="width:200px;" name="post[email]" id="email" onblur="validator('email');"<?php if($email) { ?> value="<?php echo $email;?>" readonly<?php } ?>/></td>
			<td>
			<div class="tips" id="temail" style="display:none;">
				<div>
				<?php if($MOD['checkuser'] == 2) { ?>
				<span class="f_red">系统设置了邮件验证注册，请确保当前的邮件地址真实有效<br/></span>
				<?php } ?>
				请使用常用邮箱地址，地址不会被公开且可用于登录网站			
				</div>
			</div>
			<span id="demail" class="f_red"></span>	
			</td>
			</tr>
			<?php if($could_emailcode) { ?>
			<tr onmouseover="Ds('temailcode');" onmouseout="Dh('temailcode');">
			<td class="tl">邮件验证码 <span class="f_red">*</span></td>
			<td><input type="text" class="reg_inp" style="width:80px;" name="post[emailcode]" id="emailcode" onblur="validator('emailcode');"/>
			<input type="button" value="立即发送" id="send_code" onclick="SendCode();"/>
			</td>
			<td>
			<div class="tips" id="temailcode" style="display:none;">
				<div>
				点击“立即发送”按钮，系统将会发送一组6位数字验证码至您填写的电子邮箱，请接收邮件获取验证码后，填写在左侧的输入框内，继续完成注册
				</div>
			</div>
			<span id="demailcode" class="f_red"></span>	
			</td>
			</tr>
			<?php } ?>
			<tr onmouseover="Ds('tmobile');" onmouseout="Dh('tmobile');">
			<td class="tl">移动电话 &nbsp;</td>
			<td><input type="text" class="reg_inp" style="width:200px;" name="post[mobile]" id="mobile"/></td>
			<td>
			<div class="tips" id="tmobile" style="display:none;">
				<div>推荐填写，以便即时与您取得联系</div>
			</div>
			<span id="dmobile" class="f_red"></span>	
			</td>
			</tr>
			</table>

			<div id="company_detail">
			<div class="reg_title">公司信息</div>
			<table cellpadding="5" cellspacing="5" width="100%">
			<tr onmouseover="Ds('tcompany');" onmouseout="Dh('tcompany');">
			<td class="tl">公司名称 <span class="f_red">*</span></td>
			<td width="300"><input type="text" class="reg_inp" style="width:280px;" name="post[company]" id="company" onblur="validator('company');"/></td>
			<td>
			<div class="tips" id="tcompany" style="display:none;">
				<div>请填写公司全称，确保真实有效</div>
			</div>
			<span id="dcompany" class="f_red"></span>
			</td>
			</tr>
			<tr onmouseover="Ds('ttype');" onmouseout="Dh('ttype');">
			<td class="tl">公司类型 <span class="f_red">*</span></td>
			<td><?php echo dselect($COM_TYPE, 'post[type]', '请选择', '', 'id="type"', 0);?></td>
			<td>
			<div class="tips" id="ttype" style="display:none;">
				<div>如果没有匹配的类型，请选择其它</div>
			</div>
			<span id="dtype" class="f_red"></span>
			</td>
			</tr>
			<tr onmouseover="Ds('ttelephone');" onmouseout="Dh('ttelephone');">
			<td class="tl">公司电话 <span class="f_red">*</span></td>
			<td><input type="text" class="reg_inp" style="width:200px;" name="post[telephone]" id="telephone" onblur="validate('telephone');"/></td>
			<td>
			<div class="tips" id="ttelephone" style="display:none;">
				<div>国内用户请加区号，国外用户请加国家码<br/>格式范例：86-010-88889999</div>
			</div>
			<span id="dtelephone" class="f_red"></span>
			</td>
			</tr>
			</table>
			</div>
			<table cellpadding="5" cellspacing="5" width="100%">
			<?php if($MOD['question_register']) { ?>
			<tr onmouseover="Ds('tanswer');" onmouseout="Dh('tanswer');">
			<td class="tl">验证问题 <span class="f_red">*</span></td>
			<td><?php include template('question', 'chip');?></td>
			<td>
			<div class="tips" id="tanswer" style="display:none;">
				<div>请把问题的答案填写到输入框中</div>
			</div>
			<span id="danswer" class="f_red"></span>
			</td>
			</tr>
			<?php } ?>
			<?php if($MOD['captcha_register']) { ?>
			<tr onmouseover="Ds('tcaptcha');" onmouseout="Dh('tcaptcha');">
			<td class="tl">验证码 <span class="f_red">*</span></td>
			<td><?php include template('captcha', 'chip');?></td>
			<td>
			<div class="tips" id="tcaptcha" style="display:none;">
				<div>请把图形中的字符填写到输入框中<br/>如果看不清楚，请点击图片刷新</div>
			</div>
			<span id="dcaptcha" class="f_red"></span>
			</td>
			</tr>
			<?php } ?>
			<tr>
			<td class="tl">&nbsp;</td>
			<td width="300"><input type="submit" name="submit" value="同意以下服务条款，提交" style="font-size:14px;padding:3px;"/></td>
			<td>&nbsp;</td>
			</tr>
			</table>
			</form>
			<br/>
			<div style="width:700px;height:100px;overflow-y:scroll;border:#9DBFDA 1px solid;background:#FAFAFA;margin:auto;line-height:180%;padding:10px;" id="agreement">
			<center class="px14 f_b">请阅读本站服务条款</center>
			<?php include template('agreement', $module);?>
			</div>
			<div style="text-align:right;padding:10px 100px 20px 0;"><a href="?print=1" target="_blank">可打印版本</a></div>
		</div>
		<br/>
		<script type="text/javascript">
		$('username').focus();
		var vid = '';
		function validator(id) {
			vid = id;
			makeRequest('moduleid=<?php echo $moduleid;?>&action=member&job='+id+'&value='+$(id).value, 'ajax.php', '_validator');
		}
		function _validator() {
			if(xmlHttp.readyState==4 && xmlHttp.status==200) {
				$('d'+vid).innerHTML = xmlHttp.responseText ? '<img src="<?php echo DT_SKIN;?>image/check_error.gif" align="absmiddle"/> '+xmlHttp.responseText : '<img src="<?php echo DT_SKIN;?>image/check_right.gif" align="absmiddle"/> ';
			}
		}
		function err_msg(str, id) {
			$('d'+id).innerHTML = '<img src="<?php echo DT_SKIN;?>image/check_'+(str ? 'error' : 'right')+'.gif" align="absmiddle"/> '+str;
		}
		function validate(type) {
			if(type == 'cpassword') {
				if($('cpassword').value != $('password').value) {
					err_msg('两次输入的密码不一致', type);
				} else {
					err_msg('', type);
				}
			}
			if(type == 'truename') {
				if($('truename').value.length < 2) {
					err_msg('请输入真实姓名', type);
				} else {
					err_msg('', type);
				}
			}
			if(type == 'telephone') {
				if($('telephone').value.length < 7) {
					err_msg('请输入公司电话', type);
				} else {
					err_msg('', type);
				}
			}
		}
		function reg(type) {
			if(type) {
				Ds('company_detail');
			} else {
				Dh('company_detail');
			}
		}
		function Df(ID) {
			$(ID).focus();
		}
		function check() {
			var f,p;
			f = 'username';
			if($(f).value == '') {
				err_msg('请填写会员登录名', f);
				Df(f);
				return false;
			}
			if($('d'+f).innerHTML.indexOf('error') != -1) {
				Df(f);
				return false;
			}
			f = 'password';
			if($(f).value.length < 6) {
				err_msg('请填写会员登录密码', f);
				Df(f);
				return false;
			}
			if($('d'+f).innerHTML.indexOf('error') != -1) {
				Df(f);
				return false;
			}
			f = 'cpassword';
			if($(f).value == '') {
				err_msg('请重复输入密码', f);
				Df(f);
				return false;
			}
			if($('password').value != $(f).value) {
				err_msg('两次输入的密码不一致', f);
				Df(f);
				return false;
			}
			f = 'truename';
			if($(f).value == '') {
				err_msg('请填写真实姓名', f);
				Df(f);
				return false;
			}
			f = 'email';
			if($(f).value.length < 6) {
				err_msg('请填写电子邮箱', f);
				Df(f);
				return false;
			}
			if($('d'+f).innerHTML.indexOf('error') != -1) {
				Df(f);
				return false;
			}
			if($('areaid_1').value == 0) {
				Dmsg('请选择所在地', 'areaid');
				return false;
			}
			<?php if($could_emailcode) { ?>
				f = 'emailcode';
				if(!$(f).value.match(/^[0-9]{6}$/)) {
					Dmsg('请填写邮件验证码', f);
					return false;
				}
			<?php } ?>
			if($('g_5').checked == false) {
				f = 'company';
				if($(f).value == '') {
					err_msg('请填写公司名称', f);
					Df(f);
					return false;
				}
				if($('d'+f).innerHTML.indexOf('error') != -1) {
					Df(f);
					return false;
				}
				if($('type').value == '') {
					Dmsg('请选择公司类型', 'type');
					return false;
				}
				f = 'telephone';
				if($(f).value.length < 7) {
					err_msg('请填写公司电话', f);
					Df(f);
					return false;
				}
			}
			<?php if($MOD['question_register']) { ?>
			f = 'answer';
			if($(f).value == '') {
				Dmsg('请回答验证问题', f);
				return false;
			}
			<?php } ?>
			<?php if($MOD['captcha_register']) { ?>
			f = 'captcha';
			if(!is_captcha($(f).value)) {
				Dmsg('请填写验证码', f);
				return false;
			}
			<?php } ?>
			return true;
		}
		function SendCode() {
			if($('demail').innerHTML.indexOf('right') == -1) {
				$('email').focus();
				return;
			}
			makeRequest('action=<?php echo $action_sendcode;?>&value='+$('email').value, '<?php echo $MOD['linkurl'];?><?php echo $DT['file_register'];?>', '_SendCode');
			$('send_code').value = '正在发送';
			$('send_code').disabled = true;
		}
		function _SendCode() {
			var f = 'email';
			if(xmlHttp.readyState==4 && xmlHttp.status==200) {			
				$('send_code').value = xmlHttp.responseText == 1 ? '发送成功' : '立即发送';
				$('send_code').disabled = xmlHttp.responseText == 1 ? true : false;
				if(xmlHttp.responseText == 1) {
					setTimeout('StopCode()', 5000);
					window.open('<?php echo $MOD['linkurl'];?>goto.php?action=emailcode&email='+$(f).value);
				} else if(xmlHttp.responseText == 2) {
					err_msg('邮件格式错误，请检查', f);
					Df(f);
				} else if(xmlHttp.responseText == 3) {
					err_msg('邮件地址已存在，请更换', f);
					Df(f);
				} else {
					alert('未知错误，请重试');
				}
			}
		}
		function StopCode() {
			$('send_code').disabled = true;
			var i = 60;
			var interval=window.setInterval(
				function() {
					if(i == 0) {
						$('send_code').value = '立即发送';
						$('send_code').disabled = false;
						clearInterval(interval);
					} else {
						$('send_code').value = '重新发送('+i+')';
						i--;
					}
				},
			1000);
		}
		</script>
		<br/>
		</div>
	</div>
	</div>
	</div>
</div>
<?php include template('footer');?>