<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Sorada's Thai Take Away, fantastisk Thaimat på Stord" />
<meta name="keywords" content="Soradas, Thai take away, thaimat, orientalsk mat, eksotisk mat, asiatisk mat, thaimat på stord, Heiane storsenter" />
<meta name="robots" content="index, follow" />
<meta name="viewport" content="width=device-width" user-scalable="yes" />
<link rel="stylesheet" media="all" href="styles.css" />
<link rel="shortcut icon" href="media/favicon.ico" />
<?php
$site = pathinfo($_SERVER['PHP_SELF'],PATHINFO_BASENAME);
if($site == "meny.php"){
	include("includes/add_fancybox.php");
}
?>
<script type='text/javascript'>
window.onload = function(){
	bg = document.getElementById("bg");
	width = window.innerWidth;
	height = window.innerHeight;
	bg.style.width = width + "px";
	bg.style.height = height + "px";
};
</script>
<title>Sorada's Thai Take Away</title>
</head>

<body>
	<div id="bg"><img src="media/ris_bg.jpg" alt="back ground" /></div>


	<div id="wrapper">

		<div id="menu">
			<ul>
				<?php  
					$pages = array(
						array("name" => "Hjem", "slug" => 'index.php', "active" => $site === "index.php" ? 'current' : ''), 
						array("name" => "Meny", "slug" => 'meny.php', "active" => $site === "meny.php" ? 'current' : ''), 
						array("name" => "Nytt", "slug" => 'nytt.php', "active" => $site === "nytt.php" ? 'current' : ''), 
						array("name" => "Kontakt", "slug" => 'kontakt.php', "active" => $site === "kontakt.php" ? 'current' : '')
					);
					// dislapy meny items
					foreach ($pages as $page) {
						echo sprintf('<li><a class="%s" href="%s">%s</a></li>', $page['active'], $page['slug'], $page['name'] );
					}
				?>
			</ul>
		</div>

		<div id="header">
			<div id="bar"></div>
			<img src="media/logo_orig_top.png" alt="logo" />
			<img src="media/logo_orig_bott.png" alt="logo" />
		</div><!-- End header -->