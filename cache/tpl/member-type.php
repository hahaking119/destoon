<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', $module);?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<?php if($item == 'friend') { ?>
	<td class="tab" id="add"><a href="<?php echo $MOD['linkurl'];?>friend.php?action=add"><span>添加商友</span></a></td>
	<td class="tab_nav">&nbsp;</td>
	<td class="tab" id="home"><a href="<?php echo $MOD['linkurl'];?>friend.php"><span>我的商友</span></a></td>
	<td class="tab_nav">&nbsp;</td>
	<td class="tab" id="type"><a href="<?php echo $MOD['linkurl'];?>type.php?item=<?php echo $item;?>"><span>商友分类</span></a><script type="text/javascript">c(1);</script></td>
<?php } else if($item == 'favorite') { ?>
	<td class="tab" id="add"><a href="<?php echo $MOD['linkurl'];?>favorite.php?action=add"><span>添加收藏</span></a></td>
	<td class="tab_nav">&nbsp;</td>
	<td class="tab" id="home"><a href="<?php echo $MOD['linkurl'];?>favorite.php"><span>商机收藏</span></a></td>
	<td class="tab_nav">&nbsp;</td>
	<td class="tab" id="type"><a href="<?php echo $MOD['linkurl'];?>type.php?item=<?php echo $item;?>"><span>收藏分类</span></a><script type="text/javascript">c(1);</script></td>
<?php } else if($item == 'product') { ?>
	<td class="tab" id="add"><a href="<?php echo $MOD['linkurl'];?><?php echo $DT['file_my'];?>?mid=5&action=add"><span>添加产品</span></a></td>
	<td class="tab_nav">&nbsp;</td>
	<td class="tab" id="home"><a href="<?php echo $MOD['linkurl'];?><?php echo $DT['file_my'];?>?mid=5"><span>管理产品</span></a></td>
	<td class="tab_nav">&nbsp;</td>
	<td class="tab" id="type"><a href="<?php echo $MOD['linkurl'];?>type.php?item=<?php echo $item;?>"><span>产品分类</span></a></td>
<?php } else if($item == 'news') { ?>
	<td class="tab" id="add"><a href="<?php echo $MOD['linkurl'];?>news.php?action=add"><span>添加新闻</span></a></td>
	<td class="tab_nav">&nbsp;</td>
	<td class="tab" id="home"><a href="<?php echo $MOD['linkurl'];?>news.php"><span>管理新闻</span></a></td>
	<td class="tab_nav">&nbsp;</td>
	<td class="tab" id="type"><a href="<?php echo $MOD['linkurl'];?>type.php?item=<?php echo $item;?>"><span>新闻分类</span></a><script type="text/javascript">c(3);</script></td>
<?php } ?>
</tr>
</table>
</div>
<script type="text/javascript">
var _del = 0;
</script>
<form method="post" action="<?php echo $MOD['linkurl'];?>type.php">
<input type="hidden" name="item" value="<?php echo $item;?>"/>
<div class="ls">
<table cellpadding="0" cellspacing="0" class="tb">
<tr>
<th width="60">删</th>
<th width="80">排序</th>
<th>名称</th>
</tr>
<?php if(is_array($types)) { foreach($types as $k => $v) { ?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';">
<td align="center"><input name="type[<?php echo $v['typeid'];?>][delete]" type="checkbox" value="1" onclick="if(this.checked){_del++;}else{_del--;}"/></td>
<td align="center"><input name="type[<?php echo $v['typeid'];?>][listorder]" type="text" size="5" value="<?php echo $v['listorder'];?>" maxlength="3"/></td>
<td>&nbsp;&nbsp;<input name="type[<?php echo $v['typeid'];?>][typename]" type="text" size="20" value="<?php echo $v['typename'];?>" maxlength="50" style="width:200px;color:<?php echo $v['style'];?>"/> <?php echo $v['style_select'];?></td>
</tr>
<?php } } ?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';">
<td class="f_red" align="center">新增</td>
<td align="center"><input name="type[0][listorder]" type="text" size="5" value="" maxlength="3"/></td>
<td>&nbsp;&nbsp;<input name="type[0][typename]" type="text" size="20" value="" maxlength="50" style="width:200px;"/> <?php echo $new_style;?></td>
</tr>
<tr>
<td>&nbsp;</td>
<td height="50" colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value=" 提 交 " onclick="if(_del && !confirm('提示:您选择删除'+_del+'个分类？确定要删除吗？')) return false;" class="btn"/>
<?php if($MG['type_limit']) { ?>&nbsp;最多可定义 <strong class="f_red"><?php echo $MG['type_limit'];?></strong> 个分类&nbsp;&nbsp;&nbsp;当前已定义 <strong class="f_blue"><?php echo count($types);?></strong> 个&nbsp;&nbsp;&nbsp;<?php } ?>
</td>
</tr>
</table>
</div>
</form>
<script type="text/javascript">s('<?php echo $item;?>');m('type');</script>
<?php include template('footer', $module);?>