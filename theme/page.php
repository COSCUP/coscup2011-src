<?php 
include_once "i18n.php";
$theme_assets_uri = "http://coscup.org/2011-theme/assets/";
$lc = new i18n;
$home_uri_l10n = "http://coscup.org/";
$contact_us_l10n = "http://coscup.org/zh-tw/contact-us";
switch($this->current[0])
{
	case "en":
		$lc->lang = "en";
		break;
	case "zh-tw":
		$lc->lang = "zh-TW";
		break;
	case "zh-cn":
		$lc->lang = "zh-CN";
		break;
}
?>

<!DOCTYPE html>
<html lang="<?php echo $lc->lang ?>">
<head>
	<meta charset=UTF-8>
	<title><?php echo $title; ?> | COSCUP 2011</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $theme_assets_uri;?>style.css" />
    <link rel="shortcut icon" href="<?php echo $theme_assets_uri;?>favicon.ico" type="image/x-icon" />
    <meta property="og:image" content="<?php echo $theme_assets_uri;?>coscup.png" />
</head>
<body>
<div id="header">
	<div class="info">
		<h1><a href="<?php echo $lc->_("HOME_URI");?>" title="<?php echo $lc->_("首頁");?>">COSCUP</a></h1>
		<p id="title"><?php echo $lc->_("開源人年會");?></p>
		<p id="title_en">Conference for Open Source <span id="coders">Coders</span>, <span id="users">Users</span> and <span id="promoters">Promoters</span></p>
		<p id="date" title="<?php echo $lc->_("2011 年 8 月 20 - 21 日");?>">8/20 - 21, 2011 :: <?php echo $lc->_("台灣台北"); ?></p>
		<div id="nav">
			<ul>
				<?php echo $this->menu(1,2); ?>
			</ul>
		</div>
		<div id="language">
			<ul>
				<?php echo $this->menu(0); ?>
			</ul>
		</div>
		<div id="message">
			<p>Come on rock with <em>Gadgets beyond Smartphones</em>!</p>
		</div>
		<p id="mascot_icon"></p>
		<div id="connect_box">
			<ul>
				<li><a title="<?php echo $lc->_("加到 Google 日曆");?>" target="_blank" href="https://www.google.com/calendar/event?action=TEMPLATE&amp;text=COSCUP+2011&amp;dates=20110820T010000Z/20110821T100000Z&amp;details=http%3A%2F%2Fcoscup.org/2011/&amp;trp=true&amp;sprop=http%3A%2F%2Fcoscup.org/2011/&amp;sprop=name:COSCUP"><span class="sprite gcal"></span></a></li>
				<li><a title="<?php echo $lc->_("Facebook 粉絲團");?>" href="https://www.facebook.com/coscup" target="_blank"><span class="sprite facebook"></span></a></li>
				<li><a title="<?php echo $lc->_("小啄在 Twitter");?>" href="https://twitter.com/coscup" target="_blank"><span class="sprite twitter"></span></a></li>
				<li><a title="<?php echo $lc->_("小啄在噗浪");?>" href="http://www.plurk.com/coscup" target="_blank"><span class="sprite plurk"></span></a></li>
				<li><a title="<?php echo $lc->_("部落格 RSS Feed");?>" href="http://feeds.feedburner.com/coscup" target="_blank"><span class="sprite rss"></span></a></li>
			</ul>
		</div>
	</div>
</div>
<div id="content">
<?php echo $contents; ?>
</div>
<div id="sidebar">
	<div class="sponsors">
		<?php echo $this->block['sponsors']; ?>
	</div>
</div>
<div id="footer">
	<div class="info">
		<p id="copyright">&copy; 2011 COSCUP. <a href="<?php echo $lc->_("CONTACT_URI"); ?>">Contact us</a>.</p>
		<p id="tagline">We <span class="heart">(heart)</span> Open.</p>
		<p id="archives">
			<a href="http://coscup.org/2006/">2006</a>
			<span class="separator"> | </span><a href="http://coscup.org/2007/">2007</a>
			<span class="separator"> | </span><a href="http://coscup.org/2008/">2008</a>
			<span class="separator"> | </span><a href="http://coscup.org/2009/">2009</a>
			<span class="separator"> | </span><a href="http://coscup.org/2010/">2010</a>
		</p>
	</div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $theme_assets_uri; ?>jquery.imagetile.js"></script>
<script type="text/javascript" src="<?php echo $theme_assets_uri; ?>script.js"></script>
</body>
</html>
