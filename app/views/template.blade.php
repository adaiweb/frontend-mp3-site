<!DOCTYPE html>
<html>
	<head>
		<title><?=$title;?></title>
		<meta content="<?=$description;?>" name="description">
		<meta content="<?=$keywords;?>" name="keywords">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="theme-color" content="#15191f">
		<link rel="shortcut icon" href="/assets/images/logo.svg" />
		<link rel="preload" href="/assets/webfonts/fa-light-300.woff2" as="font" type="font/woff2" crossorigin>
		<link rel="preload" href="/assets/webfonts/fa-solid-900.woff2" as="font" type="font/woff2" crossorigin>
		<link href="/assets/css/styles.css?v=1" type="text/css" rel="stylesheet" />
		<link rel="preconnect" href="https://fonts.gstatic.com"> 
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,800&display=swap&subset=cyrillic" rel="stylesheet"> 
	</head>
<body>
	
	<div class="wrap">

		<div class="wrap-main wrap-center">

			<header class="header fx-row fx-middle">
				<a href="/" class="logo">
					POP<span>tik.top</span>
					<div>Trending music</div>
				</a>
				<div class="search-wrap fx-1">
					<form id="quicksearch" method="get" action="/api/api.search.php">
						<input type="hidden" name="do" value="search" />
						<input type="hidden" name="subaction" value="search" />
						<div class="search-box search-input">
							<input id="story" name="query" placeholder="Find your favorite song..." type="text" />
							<button type="submit" class="search-btn"><span class="fal fa-search"></span></button>
						</div>
					</form>
				</div>
				<div class="hshare fx-row">
					<span class="wbr-fb" data-id="fb"></span>
					<span class="wbr-tw" data-id="tw"></span>
					<span class="wbr-tlg" data-id="tlg"></span>
					<span class="wbr-vk" data-id="vk"></span>
				</div>
				<div class="btn-menu hidden"><span class="fal fa-bars"></span></div>
			</header>

			<nav class="nav to-mob">
				<ul class="main-nav fx-row">
					<li class="submenu">
						<a href="#"><span class="fal fa-list-music"></span>Genres</a>
						<ul class="hidden-menu anim">
						<?php foreach ($genres as $key => $genre) {	?>
							<li><a href="<?=$http_protocol;?>www.<?=$base_domain;?>/<?=$collection_name;?>/<?=$genre['id'];?>"><?=$genre['name'];?></a></li>
						<?php } ?>
							
						</ul>
					</li>
					<li><a href="<?=$http_protocol;?>www.<?=$base_domain;?>/<?=$collection_name;?>/pop"><span class="fal fa-glass-cheers"></span>Dance Music</a></li>
					<li><a href="<?=$http_protocol;?>www.<?=$base_domain;?>/<?=$collection_name;?>/toplists"><span class="fal fa-trophy"></span>Popular Songs</a></li>
					<li><a href="<?=$http_protocol;?>www.<?=$base_domain;?>/<?=$collection_name;?>/in_the_car"><span class="fal fa-compact-disc"></span>Car Music</a></li>
 				</ul>
			</nav>
	
			<div class="cols fx-row">

				<aside class="col-right">
					<div class="side-box">
						<div class="side-bt">Latest songs:</div>
						<div class="side-bc side-items">
						<?php

            foreach ($queries as $key=> $item):
                $zapros = preg_replace("/[^ A-Za-z0-9?!]/",'',$item);
                $url = str_replace(' ','-',$zapros);
                $zapros = $function->strTitle($zapros);

                if(strlen($url) < 3) continue; ?>
               <a title="<?=$zapros;?> MP3 Download" class="side-item nowrap" href="<?=$http_protocol;?><?=$url;?>.<?=$base_domain;?>/">
								<div class="nowrap"><?=$zapros;?></div>
								download mp3
							</a>
<?php      if($key>20) break; endforeach; ?>
						</div>
					</div>
				</aside>

				<div class="col-main fx-1">
					<main class="main" id="">
					
						<?php require_once($body);?>
						
					</main>
					<div class="site-desc fx-row fx-middle">
						<div class="logo">
							POP<span>tik.top</span>
					<div>Трендовая музыка</div>
						</div>
						<div class="site-desc-in fx-1">
							 Discover and play over 265 million music tracks. Join the world's largest online community of artists, bands, DJs, and audio creators.
							<br>
							  <a href="/">POPTIK.TOP</a> - is the world's largest music and audio streaming platform – 200 million tracks and growing. With a buzzing community of artists and musicians
							<div class="site-copyright">© POPTIK.TOP 2021. eMail for dmca: <span>poptiktop@gmail.com</span></div>
						</div>
					</div>
				</div>

			</div>

			<!-- END COLS -->

			<footer class="footer fx-row fx-middle">
				<ul class="footer-menu fx-row fx-start fx-1">
					<li><a href="<?=$http_protocol;?>www.<?=$base_domain;?>/">Main page</a></li>
 					<li><a href="<?=$http_protocol;?>www.<?=$base_domain;?>/terms">Terms of use</a></li>
					<li><a href="<?=$http_protocol;?>www.<?=$base_domain;?>/policy">Privacy Policy</a></li>
				</ul>
				<div class="footer-counter"><!--LiveInternet counter--><img id="licntB23C" width="88" height="31" style="border:0" 
title="LiveInternet"
src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAEALAAAAAABAAEAAAIBTAA7"
alt=""/><script>(function(d,s){d.getElementById("licntB23C").src=
"https://counter.yadro.ru/hit;popTikTop?t22.4;r"+escape(d.referrer)+
((typeof(s)=="undefined")?"":";s"+s.width+"*"+s.height+"*"+
(s.colorDepth?s.colorDepth:s.pixelDepth))+";u"+escape(d.URL)+
";h"+escape(d.title.substring(0,150))+";"+Math.random()})
(document,screen)</script><!--/LiveInternet-->
</div>
				<div id="gotop"><span class="fal fa-arrow-up"></span></div>
			</footer>
	
			<!-- END FOOTER -->

		</div>

		<!-- END WRAP-MAIN -->

	</div>
	
	<!-- END WRAP -->
	 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="/assets/js/libs.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/assets/css/additional.css">
	<script src="/assets/js/player.js"></script></body> 
</html>