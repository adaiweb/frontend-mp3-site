	
		<div class="sect">
		
			<h1 class="sect-title sect-header"><?=$h1;?></h1>
			
			<div class="sect-content">
			
				<?php foreach ($songs as $key => $song): 
					$img_src = 'https://i.ytimg.com/vi/'.$song['id'].'/mqdefault.jpg'; ?>
					<div class="track-item fx-row fx-middle js-item" data-audio-id="<?=$song['id'];?>" data-id="<?=$key;?>" data-title="<?=$song['title'];?>" data-artist="Исполнитель" data-img="<?=$img_src;?>"
					>
						<div class="track-play fx-col fx-center anim js-play"><span class="fas fa-play"></span></div>
						<div class="track-img img-fit"><img src="<?=$img_src;?>" alt="<?=$song['title'];?>"></div>
						<div class="track-desc fx-1 nowrap">
							<div class="track-title nowrap"><?=$song['title'];?></div>
							<div class="track-subtitle nowrap">Listened: <?=$song['views'];?>, Liked: <?=$song['likes'];?></div>
						</div>
						<div class="track-time"><?=$song['duration'];?></div>
						<a href="<?=$download_server;?>/<?=$song['id'];?>/<?=$song['title'];?>"  target="_blank" rel="nofollow" class="track-dl"><span class="fas fa-arrow-to-bottom"></span></a>
						<div class="player" style="display:none;"></div>

					</div>
				<?php endforeach ?>
			
			</div>
			
		</div>