<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?>index.css"/>
<div class="m">
    <table width="100%" cellspacing="0" cellpadding="0">
        <tr align="center">
            <td><?php echo ad(26);?></td>
            <!--<td><?php echo ad(20);?></td>
            <td><?php echo ad(21);?></td>
            <td><?php echo ad(22);?></td>
            <td><?php echo ad(23);?></td>
            <td><?php echo ad(24);?></td>
            <td><?php echo ad(25);?></td>-->
        </tr>
    </table>
</div>

<!--first module begin-->
<div class="m">
	<div class="m_n f_l">&nbsp;</div>
	<div style="width:962px;float:left;">
		<table width="100%" cellspacing="0" cellpadding="0" border="0">
		<tbody><tr>
		<td width="350" valign="top" align="left">
			<!--轮播 begin-->
			<!--广告flash begin-->
		      <div><?php echo ad(14);?></div>
		      <div class="announce"><a href="<?php echo extendurl('announce');?>"><strong>公告栏：</strong></a> <a href=" " id="printAnnounce" target="_blank"></a></div>
              <!--广告flash end-->
			<!--轮播 end-->
		</td>
		<td width="10">&nbsp;</td>
		<td width="350" valign="top">
			<!--tNews begin-->
			<div class="tNews">

             <?php echo tag("moduleid=21&table=article_21&pagesize=1&order=addtime desc&template=only_content_wj");?>

                <!--首页咨询_调用start-->
		           <?php echo tag("moduleid=21&table=article_21&condition=status=3 and thumb<>''&pagesize=3&order=addtime desc&template=photo_list_2&width=110&height=90");?>
                <!--首页咨询_调用end-->
				<table width="95%" align="center" style="margin-top:15px">
					<tbody>

						<tr>
                        		<td width="240" valign="top">
                                <?php if($DT['page_price']) { ?>
                                <div class="quote_head">
                                <span class="f_r">
                                <form action="<?php echo $MODULE['7']['linkurl'];?>price.php" onsubmit="return quote_search();">
                                <input type="text" size="12" value="输入产品名" name="kw" id="quote_kw" class="quote_head_i" onclick="if(this.value=='输入产品名')this.value='';"/> <input type="image" src="<?php echo DT_SKIN;?>image/btn_quote.gif" align="absmiddle"/>
                                </form>
                                </span>
                                <div><a href="<?php echo $MODULE['7']['linkurl'];?><?php echo rewrite('price.php?product=all');?>" class="w"><strong>行情速递</strong></a></div>
                                </div>
                                <div class="quote_body">
                                    <div id="quote_0" style="height:120px; width:335px;overflow:hidden;">
                                    <div id="quote_1">
                                    <?php $tags=tag("moduleid=5&table=sell&condition=tag<>'' and unit<>'' and price>0 and status=3&pagesize=".$DT['page_price']."&order=edittime desc&template=null");?>
                                    <ul>
                                    <?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
                                    <li><span class="f_r">&nbsp;<?php echo $t['price'];?> <?php echo $DT['money_unit'];?> / <?php echo $t['unit'];?></span><a href="<?php echo $t['linkurl'];?>" target="_blank" title="[<?php echo area_pos($t['areaid'], '', 2);?>] <?php echo $t['alt'];?>"><?php echo $t['tag'];?></a></li>
                                    <?php } } ?>
                                    </ul>
                                    </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </td>
                        </tr>
					</tbody>
				</table>
			</div>	
			<!--tNews end-->
		</td>
		<td width="10">&nbsp;</td>
		<td width="260" valign="top">
			<!--登录 begin-->
                <div class="m_r_wujie f_l">
                    <?php if($DT['page_login']) { ?>
                    <?php include template('user', 'chip');?>
                    <?php } ?>
                </div>
             
			<!--登录 end-->
	
			<!--信息 begin-->
                <div class="m_n f_l">&nbsp;</div>
                <div class="m_r_wujie f_l">
                <?php if($DT['page_com']) { ?>
                    <div class="tab_head2">
                        <ul>
                            <li class="tab_2" id="com_t_1" onmouseover="Tb(1, 2, 'com', 'tab');"><a href="<?php echo $MODULE['4']['linkurl'];?>"><?php echo VIP;?>企业</a></li>
                            <li class="tab_1" id="com_t_2" onmouseover="Tb(2, 2, 'com', 'tab');"><a href="<?php echo $MODULE['4']['linkurl'];?>">最新企业</a></li>
                            <li >&nbsp;&nbsp;&nbsp;<a href="<?php echo $MODULE['2']['linkurl'];?>grade.php" class="f_n">我如何加入?</a></li>
                        </ul>
                    </div>
                    <div class="box_body li_dot">
                        <div id="com_c_1" style="display:">
                        <?php echo tag("moduleid=4&condition=vip>0 and catids<>''&pagesize=".$DT['page_com']."&order=fromtime desc&template=list-com");?>
                        </div>
                        <div id="com_c_2" style="display:none">
                        <?php echo tag("moduleid=4&condition=groupid>5 and catids<>''&pagesize=".$DT['page_com']."&order=userid desc&template=list-com");?>
                        </div>
                    </div>
                <?php } ?>
                </div>
			<!--信息 end-->
		</td>
		</tr></tbody>
		</table>
	</div>	
	<div class="clear"></div>
</div>
<!--first module end-->


<div class="m b10">&nbsp;</div>

<!--信息中心title begin-->
<div class="m_wujie">
	<div class="m_n f_l">&nbsp;</div>
	<div class="title_box1 white">
		<div class="title_box2_1">
			<a href="" class="fr">更多&gt;&gt;</a> 
			<span class="fr p0_30"><a href="#">信息文字</a> <a href="#">信息文字</a> <a href="#">信息文字</a> <a href="#">信息文字</a></span> 
		</div>
	</div>
</div>
<!--信息中心title end-->



<!--信息中心con begin-->
<div class="m_wujie">
	<div class="m_n f_l">&nbsp;</div>
	
	<!--精彩专题 begin-->
	<div class="m_r_2 f_l">
		<div class="modBoxA">
			<div class="thA thA_bg">
				<span class="mark"><a href="#">图文视频</a></span>
				<span class="f_r_p"><a href="#">更多&gt;&gt;</a></span>
			</div>
			<div class="box_body c_b">
			   <?php echo tag("moduleid=12&table=photo&condition=status=3 and thumb<>''&pagesize=2&width=135&height=100&order=addtime desc&template=-index_photo_wujie");?>
				
				<div style="padding-top:10px;padding-bottom:0px;" class="newsr2"></div>
				<div class="li_dot f_gray">
					<?php echo tag("moduleid=12&table=photo&pagesize=7&order=addtime desc&template=index_list_data_wujie");?>
                    <li><span class="f_r">2011-10-07</span><a class="konw_a" title="童年的时光" target="_blank" href="/photo/show.php?itemid=4"><span style="color:#800000">童年的时光</span></a></li>
                    <li><span class="f_r">2011-10-07</span><a class="konw_a" title="童年的时光" target="_blank" href="/photo/show.php?itemid=4"><span style="color:#800000">童年的时光</span></a></li>
                    <li><span class="f_r">2011-10-07</span><a class="konw_a" title="童年的时光" target="_blank" href="/photo/show.php?itemid=4"><span style="color:#800000">童年的时光</span></a></li>

				</div>
			</div>
		</div>
	</div>
	<!--精彩专题 end-->
	
	<div class="m_n f_l">&nbsp;</div>
	
	<!--招商代理 begin-->
	<div class="m_r_2 f_l">
		<div class="modBoxA">
			<div class="thA thA_bg"><span class="mark"><a href="#">招商代理</a></span><span class="f_r_p"><a href="#">更多&gt;&gt;</a></span></div>
		
			<div class="box_body c_b">
				<div class="headline">
					<?php echo tag("moduleid=22&table=info_22&pagesize=1&order=addtime desc&template=-index_zs_only_wj");?>
				</div>
				<table width="100%" cellspacing="2" cellpadding="2" class="newsr">
				<tbody><tr>
					<td width="120" valign="top" class="imb">
						<table width="100%">
						<tbody>
						<tr align="center">
							<td width="100%" valign="top">
								<?php echo tag("moduleid=22&table=info_22&pagesize=1&width=120&height=90&order=addtime desc&template=thumb-table");?>
							</td>
						</tr>
						</tbody>
						</table>
					</td>
		
					<td valign="top">
                        <?php echo tag("moduleid=22&table=info_22&pagesize=4&length=24&order=addtime desc&template=-index_ptlist_wujie");?>
					</td>
				</tr></tbody></table>
				<div class="li_dot f_gray">
					<ul>
						<?php echo tag("moduleid=22&table=info_22&pagesize=5&order=hits desc&template=index_list_data_wujie");?>

					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--招商代理 end-->
	
	<div class="m_n f_l">&nbsp;</div>
	

	<!--行业会展 begin-->
	<div class="m_r_3 f_l">
		<div class="modBoxA">
			<div class="thA thA_bg"><span class="mark"><a href="#">最新专题</a></span><span class="f_r_p"><a href="#">更多&gt;&gt;</a></span></div>
			<div class="box_body c_b">
				<div style="margin-bottom:5px;" class="headline">
              
					<h2><span>行业最新展会报道</span></h2>
					<ul>
                    <?php echo tag("moduleid=8&table=exhibit&condition=status=3&pagesize=5&order=addtime desc&length=40&template=-index_zhanhui_wujie");?>
					</ul>		
				</div>
				
				<div class="newsr2"></div>
				
				<table width="100%" cellspacing="2" cellpadding="2"><tbody><tr><td valign="top" class="imb"><table width="100%"></table></td></tr></tbody></table>
				
				<div class="li_dot f_gray">
					<ul>
						<?php echo tag("moduleid=6&condition=status=3&pagesize=8&order=addtime desc&template=-index_qigou_wujie");?>
                        <li title="">
                        <span class="f_r">[求购]</span><a href="/buy/show.php?itemid=2"><span style="color:#000000">我想求购一台2收笔记本</span></a>
                        </li>
                            <li title="">
                        <span class="f_r">[求购]</span><a href="/buy/show.php?itemid=2"><span style="color:#000000">我想求购一台2收笔记本</span></a>
                        </li>
                            <li title="">
                        <span class="f_r">[求购]</span><a href="/buy/show.php?itemid=2"><span style="color:#000000">我想求购一台2收笔记本</span></a>
                        </li>

					</ul>			
				</div>
			</div>
		</div>
	</div>
	<!--行业会展 end-->
	<div class="clear"></div>
</div>	
<!--信息中心con end-->





<!--网上商城title begin-->
<div class="m_wujie">
	<div class="m_n f_l">&nbsp;</div>
	<div class="title_box2 white">
		<div class="title_box2_1">
			<a href="<?php echo $MODULE['5']['linkurl'];?>" class="fr">更多&gt;&gt;</a> 
			<span class="fr p0_30"></span> 
		</div>
	</div>
</div>
<!--网上商城title end-->





<!--设计鉴赏 begin-->
<div class="m_wujie">
	<div class="m_n f_l">&nbsp;</div>
	<div class="m_r_14">
		<div class="modBoxA">
			<div class="thB2 wj_b1"><span class="f_r_p"><a href="#">更多&gt;&gt;</a></span></div>
			<div class="box_body2 c_b">
				<div class="headline">
					<div class="thumb2">
						<table width="100%">
						<tbody>
						<tr align="center">
					     	<?php echo tag("moduleid=5&table=sell&condition=status=3 and thumb<>''&pagesize=5&order=addtime desc&width=135&height=100&template=-wuji_goods_list");?>							
						</tr>
						</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<!--设计鉴赏 end-->


<!--设计鉴赏 begin-->
<div class="m_wujie">
	<div class="m_n f_l">&nbsp;</div>
	<div class="m_r_14">
		<div class="modBoxA">
			<div class="thB2 wj_b2"><span class="f_r_p"><a href="#">更多&gt;&gt;</a></span></div>
			<div class="box_body2 c_b">
				<div class="headline">
					<div class="thumb2">
						<table width="100%">
						<tbody>
						<tr align="center">
						<?php echo tag("moduleid=5&table=sell&condition=status=3 and thumb<>''&pagesize=5&order=addtime desc&width=135&height=100&template=-wuji_goods_list");?>
							
						</tr>
						</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<!--设计鉴赏 end-->

<!--设计鉴赏 begin-->
<div class="m_wujie">
	<div class="m_n f_l">&nbsp;</div>
	<div class="m_r_14">
		<div class="modBoxA">
			<div class="thB2 wj_b3"><span class="f_r_p"><a href="#">更多&gt;&gt;</a></span></div>
			<div class="box_body2 c_b">
				<div class="headline">
					<div class="thumb2">
						<table width="100%">
						<tbody>
						<tr align="center">
							<?php echo tag("moduleid=5&table=sell&condition=status=3 and thumb<>''&pagesize=5&order=addtime desc&width=135&height=100&template=-wuji_goods_list");?>
						</tr>
						</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<!--设计鉴赏 end-->

<!--设计鉴赏 begin-->
<div class="m_wujie">
	<div class="m_n f_l">&nbsp;</div>
	<div class="m_r_14">
		<div class="modBoxA">
			<div class="thB2 wj_b4"><span class="f_r_p"><a href="#">更多&gt;&gt;</a></span></div>
			<div class="box_body2 c_b">
				<div class="headline">
					<div class="thumb2">
						<table width="100%">
						<tbody>
						<tr align="center">
							<?php echo tag("moduleid=5&table=sell&condition=status=3 and thumb<>''&pagesize=5&order=addtime desc&width=135&height=100&template=-wuji_goods_list");?>
							
						</tr>
						</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<!--设计鉴赏 end-->

<!--设计鉴赏 begin-->
<div class="m_wujie">
	<div class="m_n f_l">&nbsp;</div>
	<div class="m_r_14">
		<div class="modBoxA">
			<div class="thB2 wj_b5"><span class="f_r_p"><a href="#">更多&gt;&gt;</a></span></div>
			<div class="box_body2 c_b">
				<div class="headline">
					<div class="thumb2">
						<table width="100%">
						<tbody>
						<tr align="center">
							<?php echo tag("moduleid=5&table=sell&condition=status=3 and thumb<>''&pagesize=5&order=addtime desc&width=135&height=100&template=-wuji_goods_list");?>
						</tr>
						</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<!--设计鉴赏 end-->


<!--设计鉴赏 begin-->
<div class="m_wujie">
	<div class="m_n f_l">&nbsp;</div>
	<div class="m_r_14">
		<div class="modBoxA">
			<div class="thB2 wj_b6"><span class="f_r_p"><a href="#">更多&gt;&gt;</a></span></div>
			<div class="box_body2 c_b">
				<div class="headline">
					<div class="thumb2">
						<table width="100%">
						<tbody>
						<tr align="center">
							<?php echo tag("moduleid=5&table=sell&condition=status=3 and thumb<>''&pagesize=5&order=addtime desc&width=135&height=100&template=-wuji_goods_list");?>
						</tr>
						</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<!--设计鉴赏 end-->





<!--设计鉴赏 begin-->
<div class="m_wujie">
	<div class="m_n f_l">&nbsp;</div>
	<div class="m_r_14">
		<div class="modBoxA">
			<div class="thB2 wj_b7"><span class="f_r_p"><a href="#">更多&gt;&gt;</a></span></div>
			<div class="box_body2 c_b">
				<div class="headline">
					<div class="thumb2">
						<table width="100%">
						<tbody>
						<tr align="center">
							<?php echo tag("moduleid=5&table=sell&condition=status=3 and thumb<>''&pagesize=5&order=addtime desc&width=135&height=100&template=-wuji_goods_list");?>
						</tr>
						</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<!--设计鉴赏 end-->






<!--设计鉴赏 begin-->
<div class="m_wujie">
	<div class="m_n f_l">&nbsp;</div>
	<div class="m_r_14">
		<div class="modBoxA">
			<div class="thB2 wj_b8"><span class="f_r_p"><a href="#">更多&gt;&gt;</a></span></div>
			<div class="box_body2 c_b">
				<div class="headline">
					<div class="thumb2">
						<table width="100%">
						<tbody>
						<tr align="center">
							<?php echo tag("moduleid=5&table=sell&condition=status=3 and thumb<>''&pagesize=5&order=addtime desc&width=135&height=100&template=-wuji_goods_list");?>
						</tr>
						</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<!--设计鉴赏 end-->




<!--设计鉴赏 begin-->
<div class="m_wujie">
	<div class="m_n f_l">&nbsp;</div>
	<div class="m_r_14">
		<div class="modBoxA">
			<div class="thB2 wj_b9"><span class="f_r_p"><a href="#">更多&gt;&gt;</a></span></div>
			<div class="box_body2 c_b">
				<div class="headline">
					<div class="thumb2">
						<table width="100%">
						<tbody>
						<tr align="center">
							<?php echo tag("moduleid=5&table=sell&condition=status=3 and thumb<>''&pagesize=5&order=addtime desc&width=135&height=100&template=-wuji_goods_list");?>
							
						</tr>
						</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<!--设计鉴赏 end-->

























<!--设计鉴赏选项卡 begin-->
<!--script for 设计鉴赏-->
<script type="text/javascript">
function thbb(i){
	for(j=0;j<9;j++){
		if(j!=i){
			document.getElementById("thbb"+j).className="thbbno";
			document.getElementById("thumb"+j).style.display="none";
		}else{
			document.getElementById("thbb"+i).className="thbbhover";
			document.getElementById("thumb"+i).style.display="block";
		}
	}
}
</script>
<!--script for 设计鉴赏-->

<div class="m">
	<div class="m_n f_l">&nbsp;</div>
	<div class="m_r_14">
		<div class="modBoxA">
			<div class="thB2 b13">
				<ul class="thbb">
					<li id="thbb0" class="thbbhover" onmouseover="thbb(0);">液压泵</li>
					<li id="thbb1" class="thbbno" onmouseover="thbb(1);">液压阀</li>
					<li id="thbb2" class="thbbno" onmouseover="thbb(2);">液压缸</li>
					<li id="thbb3" class="thbbno" onmouseover="thbb(3);">液压密封</li>
					<li id="thbb4" class="thbbno" onmouseover="thbb(4);">液压附件</li>
					<li id="thbb5" class="thbbno" onmouseover="thbb(5);">液压机械</li>
					<li id="thbb6" class="thbbno" onmouseover="thbb(6);">气功元件</li>
					<li id="thbb7" class="thbbno" onmouseover="thbb(7);">气源设备</li>
					<li id="thbb8" class="thbbno" onmouseover="thbb(8);">气缸</li>
				</ul>
			
			</div>
			<div class="box_body2 c_b">
				<div class="headline">
					<div class="thumb2" id="thumb0" style="display:block;">
						<table width="100%">
						<tbody>
						<tr align="center">
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字</a></li>
								</ul>
							</td>
							
						</tr>
						</tbody>
						</table>
					</div>
					
					<div class="thumb2" id="thumb1" style="display:none;" >
						<table width="100%">
						<tbody>
						<tr align="center">
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字二</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字二</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字二</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字二</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字二</a></li>
								</ul>
							</td>
							
						</tr>
						</tbody>
						</table>
					</div>
					
					<div class="thumb2" id="thumb2" style="display:none;" >
						<table width="100%">
						<tbody>
						<tr align="center">
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字三</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字三</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字三</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字三</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字三</a></li>
								</ul>
							</td>
							
						</tr>
						</tbody>
						</table>
					</div>
					
					<div class="thumb2" id="thumb3" style="display:none;" >
						<table width="100%">
						<tbody>
						<tr align="center">
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字四</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字四</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字四</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字四</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字四</a></li>
								</ul>
							</td>
							
						</tr>
						</tbody>
						</table>
					</div>
					
					<div class="thumb2" id="thumb4" style="display:none;" >
						<table width="100%">
						<tbody>
						<tr align="center">
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字五</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字五</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字五</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字五</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字五</a></li>
								</ul>
							</td>
							
						</tr>
						</tbody>
						</table>
					</div>
					
					<div class="thumb2" id="thumb5" style="display:none;" >
						<table width="100%">
						<tbody>
						<tr align="center">
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字六</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字六</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字六</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字六</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字六</a></li>
								</ul>
							</td>
							
						</tr>
						</tbody>
						</table>
					</div>
					
					<div class="thumb2" id="thumb6" style="display:none;" >
						<table width="100%">
						<tbody>
						<tr align="center">
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字七</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字七</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字七</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字七</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字七</a></li>
								</ul>
							</td>
							
						</tr>
						</tbody>
						</table>
					</div>
					
					<div class="thumb2" id="thumb7" style="display:none;" >
						<table width="100%">
						<tbody>
						<tr align="center">
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字八</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字八</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字八</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字八</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字八</a></li>
								</ul>
							</td>
							
						</tr>
						</tbody>
						</table>
					</div>
					
					<div class="thumb2" id="thumb8" style="display:none;" >
						<table width="100%">
						<tbody>
						<tr align="center">
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字九</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字九</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字九</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字九</a></li>
								</ul>
							</td>
							
							<td valign="top">
								<ul>
									<li class="protu"><a target="_blank" href="#"><img width="135" height="100" alt=" " src="images/3.jpg"></a></li>
									<li class="protitle"><a target="_blank" href="#">图片下文字九</a></li>
								</ul>
							</td>
							
						</tr>
						</tbody>
						</table>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<!--设计鉴赏 end-->







































<!--网上商城con begin-->

<div class="m_wujie">
	<div class="m_n f_l">&nbsp;</div>
	
	<!--产品上市 begin-->
	<div class="m_l f_l">
		<div class="modBoxA">
			<div class="thB b12"><span class="mark"><a href="#">产品上市</a></span><span class="f_r_p"><a href="#">更多&gt;&gt;</a></span></div>
			<div class="box_body2 c_b">
				<div class="headline">
					<div class="thumb">
						<table width="100%">
						<tbody>
							<tr align="center">
								  <?php echo tag("moduleid=5&table=sell&condition=status=3&pagesize=5&order=hits asc&width=112&template=-index_gy_tupian_wujie");?>
							</tr>
							<tr align="center">
								 <?php echo tag("moduleid=5&table=sell&condition=status=3&pagesize=5&order=hits asc&width=112&template=-index_gy_tupian_wujie");?>
							</tr>
						</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<!--产品上市 end-->
	
	<div class="m_n f_l">&nbsp;</div>

	<!--产品导购 begin-->
	<div class="m_r f_l">
		<div class="modBoxA">
			<div class="thB b12"><span class="mark"><a href="#"><strong>产品导购</strong></a></span><span class="f_r_p"><a href="<?php echo $MODULE['5']['linkurl'];?>">更多&gt;&gt;</a></span>
			</div>
			<div class="box_body2 c_b">
				<div class="li_dot f_gray">
					<ul>
			        	<?php echo tag("moduleid=5&table=sell&condition=status=3&pagesize=14&order=hits desc&template=-index_ptlist_wujie");?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--产品导购 end-->
	
	<div class="clear"></div>
</div>
<!--网上商城con end-->



<?php if($DT['page_logo'] || $DT['page_text']) { ?>
<div class="m">
	<div class="tab_head">
	<ul>
		<li class="tab_2"><a href="<?php echo extendurl('link');?>">友情链接</a></li>
		<li class="tab_1"><a href="<?php echo extendurl('link');?><?php echo rewrite('index.php?action=reg');?>">申请链接</a></li>
	</ul>
	</div>
	<div class="box_body">
	<?php if($DT['page_logo']) { ?>
	<?php echo tag("table=link&condition=status=3 and level>0 and thumb<>'' and username=''&pagesize=".$DT['page_logo']."&order=listorder desc,itemid desc&template=list-link&cols=9");?>
	<?php } ?>
	<?php if($DT['page_text']) { ?>
	<?php echo tag("table=link&condition=status=3 and level>0 and thumb='' and username=''&pagesize=".$DT['page_text']."&order=listorder desc,itemid desc&template=list-link&cols=9");?>
	<?php } ?>
	</div>
</div>
<?php } ?>
<script type="text/javascript">
var curls = ['<?php echo $MODULE['5']['linkurl'];?>','<?php echo $MODULE['6']['linkurl'];?>','<?php echo $MODULE['4']['linkurl'];?>'];
var member_myurl = '<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>';
</script>
<script type="text/javascript" src="<?php echo DT_PATH;?>file/script/index.js"></script>
<script type="text/javascript" src="<?php echo DT_PATH;?>file/script/quote.js"></script>
<?php $tags=tag("table=announce&condition=1&pagesize=3&datetype=2&order=listorder desc,addtime desc&template=null");?>
<script type="text/javascript">
var announcetitle = new Array(); 
var announcehref = new Array(); 
<?php if($tags) { ?>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
announcetitle[<?php echo $i;?>] = '[<?php echo timetodate($t['addtime'], 2);?>] <?php echo str_replace("'", "\'", $t['title']);?>';
announcehref[<?php echo $i;?>] = '<?php echo $t['linkurl'];?>';
<?php } } ?>
<?php } else { ?>
announcetitle[0] = '暂无公告';
announcehref[0] = DTPath;
<?php } ?>
showannounce();
</script>





<?php include template('footer');?>