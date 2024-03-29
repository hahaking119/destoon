<?php defined('IN_DESTOON') or exit('Access Denied');?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo DT_CHARSET;?>"/>
<title><?php if($seo_title) { ?><?php echo $seo_title;?><?php } else { ?><?php if($head_title) { ?><?php echo $head_title;?><?php echo $DT['seo_delimiter'];?><?php } ?><?php echo $DT['sitename'];?><?php } ?></title>
<?php if($head_keywords) { ?>
<meta name="keywords" content="<?php echo $head_keywords;?>"/>
<?php } ?>
<?php if($head_description) { ?>
<meta name="description" content="<?php echo $head_description;?>"/>
<?php } ?>
<meta name="generator" content="Destoon B2B,www.destoon.com"/>
<meta http-equiv="x-ua-compatible" content="ie=7"/>
<link rel="shortcut icon" href="<?php echo DT_PATH;?>favicon.ico"/>
<link rel="bookmark" href="<?php echo DT_PATH;?>favicon.ico"/>
<link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?>style.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?>wuji_header.css"/>
<?php if($moduleid>4) { ?><link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?><?php echo $module;?>.css"/><?php } ?>
<?php if(!DT_DEBUG) { ?><script type="text/javascript">window.onerror= function(){return true;}</script><?php } ?>
<script type="text/javascript" src="<?php echo DT_PATH;?>lang/<?php echo DT_LANG;?>/lang.js"></script>
<script type="text/javascript" src="<?php echo DT_PATH;?>file/script/config.js"></script>
<script type="text/javascript" src="<?php echo DT_PATH;?>file/script/common.js"></script>
<script type="text/javascript" src="<?php echo DT_PATH;?>file/script/page.js"></script>
</head>
<body>
<div class="top">
	<div class="top_div">
		<div class="f_r" id="destoon_member"></div>
		<div>
		<img src="<?php echo DT_SKIN;?>image/vip.gif" alt="<?php echo VIP;?>标识" align="absmiddle"/><a href="<?php echo $MODULE['2']['linkurl'];?>grade.php"><span class="f_red">上网做生意，首选<?php echo VIP;?>会员</span></a>
		 | <script type="text/javascript">addFav('收藏本页');</script>
		<?php if(extend_setting('wap_enable')) { ?> | <a href="<?php echo extendurl('wap');?>">WAP浏览</a><?php } ?>
		<?php if(extend_setting('feed_enable')) { ?> | <a href="<?php echo extendurl('feed');?>">RSS订阅</a> <img src="<?php echo DT_SKIN;?>image/free.gif" width="23" height="12" alt=""/><?php } ?>
		</div>
	</div>
</div>



<!--head begin-->
<div class="head">
	<div class="head_left">
		<div class="logo ">
		  <a href="<?php echo DT_PATH;?>">
           <img src="<?php if($MODULE[$moduleid]['logo']) { ?><?php echo DT_SKIN;?>image/logo_<?php echo $moduleid;?>.gif<?php } else if($DT['logo']) { ?><?php echo $DT['logo'];?><?php } else { ?><?php echo DT_SKIN;?>image/logo.gif<?php } ?>" >
          </a>
		</div>
	</div>
	<div class="head_right">
		<div class="search-barhead">
			<div class="searchboxhead">
				<div class="search">
					<div class="search_t">
						<ul>
							<li <?php if($moduleid==1 || $moduleid==5) { ?> class="cur"<?php } ?>> <a href="<?php echo DT_PATH;?>sell/" title="供应 " >商品</a></li>
							<li <?php if($moduleid==6) { ?> class="cur"<?php } ?>> <a href="<?php echo DT_PATH;?>buy/"     title="求购" >求购</a></li>
							<li <?php if($moduleid==4) { ?> class="cur"<?php } ?>> <a href="<?php echo DT_PATH;?>company/" title="公司" >商家</a></li>
							<li <?php if($moduleid==21) { ?> class="cur"<?php } ?>><a href="<?php echo DT_PATH;?>news/"    title="资讯" >资讯</a></li>
                            <li <?php if($moduleid==10) { ?> class="cur"<?php } ?>><a href="<?php echo DT_PATH;?>know/"    title="知道" >知道</a></li>
						</ul>
						<div class="search_ph">
                           <a href="<?php echo $MODULE[$searchid]['linkurl'];?>search.php" id="destoon_search_m"><img src="<?php echo DT_SKIN;?>image/gaoji_search.jpg" width="80" height="20" align="absmiddle"/></a>
                        </div>
					</div>
					<div class="searchC">
                    <form id="destoon_search" action="<?php echo DT_PATH;?>search.php" onsubmit="return Dsearch();">
                    	<?php if($MODULE[$moduleid]['ismenu'] && !$MODULE[$moduleid]['islink']) { ?>
			             	<?php $searchid = $moduleid;?>
				        <?php } else { ?>
				            <?php $searchid = 5;?>
				        <?php } ?>
                        <input type="hidden" name="moduleid" value="<?php echo $searchid;?>" id="destoon_moduleid"/>	
                        <input name="kw" id="destoon_kw" type="text" class="word" size="48" value="<?php if($kw) { ?><?php echo $kw;?><?php } else { ?>请输入关键字<?php } ?>" onfocus="if(this.value=='请输入关键字') this.value='';"<?php if($DT['search_tips']) { ?> onkeyup="STip(this.value);" autocomplete="off"<?php } ?>/>						
						<input type="submit" value="" class="image_button" >
                    </form>
					</div>
				</div>
			</div>
			<p class="memo">
                <strong>热门搜索：</strong>
				 <?php echo tag("moduleid=$searchid&table=keyword&condition=moduleid=$searchid and status=3&pagesize=10&order=total_search desc&template=list-search_kw");?>
            </p>
		</div>	
	</div>
        <div class="f_l btntool">
            <a href="<?php echo $MODULE['2']['linkurl'];?>"><img src="<?php echo DT_SKIN;?>image/btn_biz.gif" width="32" height="32" alt="商务中心"/><br/>
            <span>商务中心</span></a>
        </div>
        <div class="f_l btntool">
            <a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>"><img src="<?php echo DT_SKIN;?>image/btn_edit.gif" width="32" height="32" alt="发布信息"/><br/>
            <span>发布信息</span></a>
        </div>
        <div class="f_l btntool">
            <a href="<?php echo extendurl('spread');?>"><img src="<?php echo DT_SKIN;?>image/btn_word.gif" width="32" height="32" alt="排名推广"/><br/>
            <span>排名推广</span></a>
        </div>
	<div class="clear"></div>
</div>
<!--head end-->





<!--nav begin-->
<div class="m_wujie">
	<div class="m_n f_l">&nbsp;</div>
	<div class="menu_l">&nbsp;</div>
	<div class="menu_b">
		<!--mainmenu begin-->
		<div class="menu">
	     <ul>
           <li<?php if($moduleid<4) { ?> class="menuon"<?php } ?>><a href="<?php echo DT_PATH;?>"><span>首页</span></a></li><?php if(is_array($MODULE)) { foreach($MODULE as $m) { ?><?php if($m['ismenu']) { ?><li<?php if($m['moduleid']==$moduleid) { ?> class="menuon"<?php } ?>><a href="<?php echo $m['linkurl'];?>"<?php if($m['isblank']) { ?> target="_blank"<?php } ?>>
           <span<?php if($m['style']) { ?> style="color:<?php echo $m['style'];?>;"<?php } ?>><?php echo $m['name'];?></span></a></li><?php } ?><?php } } ?>
         </ul>
		</div>
		<!--mainmenu end-->
		
		<!-- 小类栏目列表开始 -->
		<div class="zlm">
			<ul>
				<li><a target="_blank" href="#">栏目名称</a></li>
				<li><a target="_blank" href="#">栏目名称</a></li>
				<li><a target="_blank" href="#">栏目名称</a></li>
				<li><a target="_blank" href="#">栏目名称</a></li>
				<li><a target="_blank" href="#">栏目名称</a></li>
				<li><a target="_blank" href="#">栏目名称</a></li>
				<li><a target="_blank" href="#">栏目名称</a></li>
				<li><a target="_blank" href="#">栏目名称</a></li>
				<li><a target="_blank" href="#">栏目名称</a></li>
				<li><a target="_blank" href="#">栏目名称</a></li>
				<li><a target="_blank" href="#">栏目名称</a></li>
			</ul>
		
			<ul>
				<li><a target="_blank" href="#">栏目名称</a></li>
				<li><a target="_blank" href="#">栏目名称</a></li>
				<li><a target="_blank" href="#">栏目名称</a></li>
				<li><a target="_blank" href="#">栏目名称</a></li>
				<li><a target="_blank" href="#">栏目名称</a></li>
				<li><a target="_blank" href="#">栏目名称</a></li>
				<li><a target="_blank" href="#">栏目名称</a></li>
				<li><a target="_blank" href="#">栏目名称</a></li>
				<li><a target="_blank" href="#">栏目名称</a></li>
				<li><a target="_blank" href="#">栏目名称</a></li>
				<li><a target="_blank" href="#">栏目名称</a></li>
			</ul>
		</div>
		<!-- 小类栏目列表结束 -->
	</div>
	<div class="menu_r">&nbsp;</div>
	<div class="clear"></div>
</div>
<!--nav end-->




<!--<div class="m">
	<div class="menu_l">&nbsp;</div>
	<div class="menu_b">
		<div class="menu">
		<ul>
          <li<?php if($moduleid<4) { ?> class="menuon"<?php } ?>><a href="<?php echo DT_PATH;?>"><span>首页</span></a></li><?php if(is_array($MODULE)) { foreach($MODULE as $m) { ?><?php if($m['ismenu']) { ?><li<?php if($m['moduleid']==$moduleid) { ?> class="menuon"<?php } ?>><a href="<?php echo $m['linkurl'];?>"<?php if($m['isblank']) { ?> target="_blank"<?php } ?>>
          <span<?php if($m['style']) { ?> style="color:<?php echo $m['style'];?>;"<?php } ?>><?php echo $m['name'];?></span></a></li><?php } ?><?php } } ?>
        </ul>
		</div>
		<div>
			<div class="search_l">
				<?php if($MODULE[$moduleid]['ismenu'] && !$MODULE[$moduleid]['islink']) { ?>
				<?php $searchid = $moduleid;?>
				<?php } else { ?>
				<?php $searchid = 5;?>
				<?php } ?>
				<script type="text/javascript">var searchid = <?php echo $searchid;?>;</script>
				<div id="search_module" style="display:none;" onmouseout="Dh('search_module');" onmouseover="Ds('search_module');">
				<?php if(is_array($MODULE)) { foreach($MODULE as $m) { ?><?php if($m['ismenu'] && !$m['islink']) { ?><a href="javascript:void(0);" onclick="setModule('<?php echo $m['name'];?>','<?php echo $m['moduleid'];?>')"><?php echo $m['name'];?></a><?php } ?><?php } } ?>
				</div>
				<div id="search_tips" style="display:none;"></div>
				<form id="destoon_search" action="<?php echo DT_PATH;?>search.php" onsubmit="return Dsearch();">
				<input type="hidden" name="moduleid" value="<?php echo $searchid;?>" id="destoon_moduleid"/>
				&nbsp;&nbsp;&nbsp;
				<input type="text" id="destoon_select" class="search_s" value="<?php echo $MODULE[$searchid]['name'];?>" readonly onfocus="this.blur();" onclick="Ds('search_module');"/>
				&nbsp;&nbsp;
				<input name="kw" id="destoon_kw" type="text" class="search_i" value="<?php if($kw) { ?><?php echo $kw;?><?php } else { ?>请输入关键字<?php } ?>" onfocus="if(this.value=='请输入关键字') this.value='';"<?php if($DT['search_tips']) { ?> onkeyup="STip(this.value);" autocomplete="off"<?php } ?>/>
				&nbsp;&nbsp;
				<input type="image" src="<?php echo DT_SKIN;?>image/search.gif" align="absmiddle"/>
				&nbsp;
				<a href="<?php echo $MODULE[$searchid]['linkurl'];?>search.php" id="destoon_search_m"><img src="<?php echo DT_SKIN;?>image/search_m.gif" width="50" height="20" align="absmiddle"/></a>
				</form>
			</div>
			<div class="search_r">
				<div id="search_word"><strong>热门搜索：</strong> <?php echo tag("moduleid=$searchid&table=keyword&condition=moduleid=$searchid and status=3&pagesize=10&order=total_search desc&template=list-search_kw");?><!--</div>
			</div>
		</div>
	</div>
	<div class="menu_r">&nbsp;</div>
</div>-->
<div class="m b10">&nbsp;</div>


