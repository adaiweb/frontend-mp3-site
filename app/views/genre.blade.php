	
		<div class="sect">
		
			<h1 class="sect-title sect-header"><?=$h1;?></h1>
			
			<div class="sect-content"> 
				<?php foreach ($songs as $key => $item):

				$track = $item['track'];
                $artists = '';
                if(isset($track['artists'])){
                  foreach ($track['artists'] as $k => $artist) {
                  $artists .= '<a href="'.$http_protocol.str_replace(" ","-",trim($function->clearTitle($function->strLower($artist['name'])))).'.'.$base_domain.'">'.$artist['name'].'</a>';
                  if(isset($track['artists'][$k+1])) $artists .= ', ';
                }
              } else continue;
                $link_query = str_replace(' ','-',preg_replace("/[^a-zA-Z0-9\s]/", "",trim($function->clearTitle($function->strLower($track['artists'][0]['name'].' '.$track['name'])))));
                $trackLink = $http_protocol. $link_query.'.'.$base_domain;
				$song = $item['track'];
				$artist_name = '';
				$img_src = $song["album"]["images"][1]['url'];
				foreach ($song['artists'] as $k => $artist) {
					$artist_name .= $artist['name'];
					if(isset($song['artists'][$k+1])) $artist_name .= ', ';
				}
				?>
					<div class="track-item fx-row fx-middle js-item" data-id="<?=$key;?>" data-title="<?=strlower($track['artists'][0]['name']. ' '.$song['name']);?>" data-img="<?=$img_src;?>">
						<div class="track-play fx-col fx-center anim js-play"><span class="fas fa-play"></span></div>
						<div class="track-img img-fit"><img src="<?=$img_src;?>" alt="<?=$song['name'];?>"></div>
						<div class="track-desc fx-1 nowrap" href="<?=$trackLink;?>">
							<div class="track-title nowrap"><?=$song['name'];?></div>
							<div class="track-subtitle nowrap"><?=$artists;?></div>
						</div>
						<div class="track-time"><?=gmdate("i:s",$song['duration_ms']/1000);?></div>
						<a href="<?=$trackLink;?>" rel="nofollow" class="track-dl"><span class="fas fa-arrow-to-bottom"></span></a>
						<div class="player" style="display:none;"></div>
					</div>

				<?php endforeach ?>
			
			</div>
			
		</div> 