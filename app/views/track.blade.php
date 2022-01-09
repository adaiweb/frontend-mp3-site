<article class="article ignore-select">

	<div class="sect fmain">
		<div class="fcols fx-row">
			<div class="fimg img-fit">
				<img src="<?=$song['image'];?>" alt="<?=$h1;?>" />
				<div class="frate fx-row fx-center fx-middle">
					<a href="#" onclick=""><span class="fas fa-thumbs-up"></span> 234</a>
					<a href="#" onclick=""><span class="fas fa-thumbs-down"></span> 23</a>
				</div>
			</div>
			<div class="fdesc fx-1">
				<h1 class="sect-title sect-header"><span><?=$song['artist'];?></span> - <?=$song['name'];?></h1>
				<ul class="finfo">
					<li><span>Слушали:</span> <span><?=$song['views'];?></span></li>
					<li><span>Размер:</span> <span><?=$song['size'];?></span></li>
					<li><span>Длительность:</span> <span><?=$song['duration'];?></span></li>
					<li><span>Качество:</span> <span>320 kbps</span></li>
					<li class="fx-1"><span>Дата релиза:</span> <span><?=$song['date'];?></span></li>
				</ul>
			</div>
		</div>
		<div class="fbtm fx-row js-item" 
			data-track="/assets/images/demo.mp3" data-title="<?=$h1;?>" 
			data-artist="<?=$song['artist'];?>" data-img="<?=$song['image'];?>"
		>
			<div class="fdl fplay js-play">
				<span class="fas fa-play"></span> Слушать
			</div>
			<a href="/assets/images/demo.mp3" class="fdl" target="_blank" download>
				<span class="fal fa-arrow-circle-down"></span> Скачать
			</a>
			<div class="fcaption fx-1">
				<div>На этой странице Вы можете <b>скачать песню <?=$h1;?></b>!. 
				Слушайте онлайн в хорошем качестве, со своего телефона на Android, iphone или пк в любое время.</div>
			</div>
		</div>
	</div>
	
	<div class="sect sect-bg">
		<div class="sect-header sect-title">Клип на песню</div>
		<div class="sect-content video-box">
			<iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$song['video_id'];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
	</div>
	
	<div class="sect sect-bg">
		<div class="sect-header sect-title">Текст песни</div>
		<div class="sect-content ftext full-text clearfix">
			Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam, voluptatum.
		</div>
	</div>

	<div class="sect sect-bg">
		<div class="sect-header sect-title">Похожие песни</div>
		<div class="sect-content">
			
			<?php foreach ($songs as $key => $song): 
				$img_src = 'https://i.ytimg.com/vi/'.$song['id'].'/mqdefault.jpg'; ?>
				<div class="track-item fx-row fx-middle js-item" 
				data-track="/assets/images/demo.mp3" data-title="<?=$song['title'];?>" 
				data-artist="Слушали: <?=$song['views'];?>, Лайков: <?=$song['likes'];?>" data-img="<?=$img_src;?>"
				>
					<div class="track-play fx-col fx-center anim js-play"><span class="fas fa-play"></span></div>
					<div class="track-img img-fit"><img src="<?=$img_src;?>" alt="<?=$song['title'];?>"></div>
					<a class="track-desc fx-1 nowrap" href="#">
						<div class="track-title nowrap"><?=$song['title'];?></div>
						<div class="track-subtitle nowrap">Слушали: <?=$song['views'];?>, Лайков: <?=$song['likes'];?></div>
					</a>
					<div class="track-time"><?=$song['duration'];?></div>
					<a href="/assets/images/demo.mp3" download target="_blank" class="track-dl"><span class="fas fa-arrow-to-bottom"></span></a>
				</div>
			<?php if($key>10) break; endforeach ?>

		</div>
	</div>

</article>