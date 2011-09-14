<?php defined('IN_DESTOON') or exit('Access Denied');?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-Type" content="text/html;charset=<?php echo DT_CHARSET;?>"/>
<title><?php if($seo_title) { ?><?php echo $seo_title;?><?php } else { ?><?php if($head_title) { ?><?php echo $head_title;?><?php echo $DT['seo_delimiter'];?><?php } ?><?php echo $COM['company'];?><?php } ?></title>
<?php if($head_keywords) { ?><meta name="keywords" content="<?php echo $head_keywords;?>"/><?php } ?>
<?php if($head_description) { ?><meta name="description" content="<?php echo $head_description;?>"/><?php } ?>
<meta name="generator" content="Destoon B2B,www.destoon.com"/>
<meta http-equiv="x-ua-compatible" content="ie=7"/>
<link rel="stylesheet" type="text/css" href="<?php echo $HSPATH;?>style.css"/>
<?php if(!DT_DEBUG) { ?><script type="text/javascript">window.onerror= function(){return true;}</script><?php } ?>
<script type="text/javascript" src="<?php echo DT_PATH;?>lang/<?php echo DT_LANG;?>/lang.js"></script>
<script type="text/javascript">
var DTPath = '<?php echo DT_PATH;?>';
var SKPath = '<?php echo DT_SKIN;?>';
var CKPrex = '<?php echo $CFG['cookie_pre'];?>';
var DTTour = '<?php echo $MODULE['4']['linkurl'];?>tour.php';
<?php if(!$domain && DT_DOMAIN) { ?>
document.domain = '<?php echo DT_DOMAIN;?>';
<?php } ?>
</script>
<script type="text/javascript" src="<?php echo DT_PATH;?>file/script/homepage.js"></script>
<?php if($css) { ?><style type="text/css"><?php echo $css;?></style><?php } ?>
</head>
<body<?php if($bgcolor || $background) { ?> style="background:<?php if($bgcolor) { ?><?php echo $bgcolor;?> <?php } ?><?php if($background) { ?>url('<?php echo $background;?>') no-repeat center 0<?php } ?>;"<?php } ?>>
<div class="m"><div class="top" id="top"><a href="<?php echo $COM['linkurl'];?>" title="<?php echo $COM['company'];?>" rel="sidebar" onclick="window.external.addFavorite(this.href, this.title);return false;">收藏本页</a> | <a href="<?php echo $COM['linkurl'];?>" onclick="javascript:try{this.style.behavior='url(#default#homepage)';this.setHomePage(location.href);}catch(e){}return false;">设为主页</a> | <a href="javascript:Go(DTTour);">随便看看</a></div></div>
<div class="m">
<div class="sign">
<?php if($COM['vip']) { ?>
<div><strong><?php echo $COM['year'];?></strong><span title="指数满分为10"><?php echo $COM['vip'];?></span></div>
<?php } else { ?>
<img src="<?php echo $MODULE['4']['linkurl'];?>image/free_bg.gif" alt="普通会员"/>
<?php } ?>
</div>
<div class="head">
<?php if($logo) { ?><div class="logo"><a href="<?php echo $COM['linkurl'];?>"><img src="<?php echo $logo;?>" alt="<?php echo $COM['company'];?>" onload="if(this.width>300)this.width=300;"/></a></div><?php } ?>
<div>
<h1><?php echo $COM['company'];?></h1>
<h4><?php echo $COM['business'];?></h4>
</div>
</div>
</div>
<div class="m">
<div class="menu" id="menu">
	<ul>
	<li class="<?php if($file=='homepage') { ?>menu_on<?php } else { ?>menu_li<?php } ?>"><a href="<?php echo $COM['linkurl'];?>"><span>网站首页</span></a></li>
	<?php if(is_array($MENU)) { foreach($MENU as $k => $v) { ?>
	<li class="<?php if($file==$menu_file[$k]) { ?>menu_on<?php } else { ?>menu_li<?php } ?>"><a href="<?php echo $v['linkurl'];?>"><span><?php echo $v['name'];?></span></a></li>
	<?php } } ?>
	</ul>
</div>
</div>
<div class="m">
<div class="banner"><?php if($COM['banner']) { ?><embed src="<?php echo $COM['banner'];?>" quality="high" extendspage="http://get.adobe.com/flashplayer/" type="application/x-shockwave-flash" wmode="transparent" scale="exactfit" width="100%"></embed><?php } else if($banner) { ?><img src="<?php echo $banner;?>" width="100%"/><?php } ?></div>
</div>
<div class="m">
<div class="pos" id="pos">
<span class="f_r">
<script type="text/javascript">show_date();</script>
</span>
<span id="position"></span>
</div>
</div>
<div class="m">
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<?php if($side_pos==0) { ?>
<td width="<?php echo $side_width;?>" valign="top" id="side"><?php include template('side', $template);?></td>
<td width="10"></td>
<?php } ?>
<td valign="top" id="main">