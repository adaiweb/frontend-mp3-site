<?php 
ini_set('error_reporting',E_ALL);
// ini_set('display_errors',1);
// ini_set('display_startup_errors',1);

mb_internal_encoding ('UTF-8');                 // Устанавливаем кодировку UTF-8
date_default_timezone_set ('Europe/Moscow');    // Устанавливаем временную зону
setlocale(LC_ALL, 'ru_RU.utf-8');               // Устанавливаем локализацию


$today = date("Ymd"); 
  $hash = sha1($_SERVER['HTTP_CF_CONNECTING_IP'].'_'.$today.'_'.'mp3hq');
// if(!empty($_GET['token']) && $_GET['token'] == $hash){
 
    require_once('/var/www/MyApiFetcher/core.php');  

  //2592000 = 86400*30 /30days

    $method = $_GET['method'];
    if($method =='search') {
    	$query = $function->strFilter($function->strLower(urldecode($_GET['query'])));
    	$action = urldecode($_GET['query']);
 
    $json = $myredis->get($query);

    if(empty($json)){
      $file = YoutubeCrawler::search($query);
      $json = json_decode($file, true);
        // if(!empty($json['data']) && $song = $json['data'][0]) addNew($song['id'].'&:_:&'.$action,40);

    } else   $json = json_decode($json, true);

  } else {
    // $url = 'http://api.bulbul.su/api.php?query='.$query.'&iaadminept=true&method=playlist';
    $json = json_decode($function->getWebPage($url), true);
  }


if(!empty($json['data'])){
    $function->addQuery($action,40,'/var/www/mp3juicesred/searches.txt');
}
    ?>
                	<?php
        if(empty($json['error'])) {

        	  foreach ($json['data'] as $key=> $item): ?> 
                		
                		<div class="mp3" id="<?=$key;?>-music-file" data-duration="194">
						    <div class="mp3-head" bis_skin_checked="1"><span class="mp3-duration"><?=$item['duration'];?></span>
						        <h3 title="<?=$item['title'];?>"><?=$item['title'];?></h3></div>
						    <div class="mp3-body" bis_skin_checked="1"><span class="mp3-rating"><i class="my-icon icon-star">&#xe803;</i><i class="my-icon icon-star">&#xe803;</i><i class="my-icon icon-star">&#xe803;</i><i class="my-icon icon-star">&#xe803;</i><i class="my-icon icon-star">&#xe803;</i></span><span class="mp3-downloads"><span class="fas fa-headphones"></span><span class="mp3-count"><i class="my-icon icon-download">&#xe804;</i> <?=$function->durToFsz($function->timeInSec($item['duration'])*10000*2);?></span></span>
                            </div>
						    <div class="mp3-foot" bis_skin_checked="1">
						        <ul class="mp3-buttons">
						            <li id="play<?=$key;?>" data-id="<?=$key;?>" data-key="<?=$item['id'];?>"  class="playmusic" data-mp3-act="pm"  onclick="playSONG(<?=$key;?>,'<?=$item['id'];?>')">
						                <div class="btn btn-play">
						                    <strong><i class="my-icon icon-play">&#xe809;</i><span class="btn-txt">Play Mp3</span></strong></div>
						            </li>
						            <li data-mp3-act="sm" id="stop<?=$key;?>" data-id="<?=$key;?>" class="stopmusic">
						                <div class="btn" bis_skin_checked="1"><strong><i class="my-icon icon-stop">&#xe807;</i><span class="btn-txt">Pause</span></strong></div>
						            </li>
						            <li data-mp3-act="dl" class="mp3dl">
                                        <a rel="nofollow noindex noopener" target="_blank" href="https://mp3juice.bulbul.su/<?=$item['id'];?>/<?=$function->clearTitle($item['title']);?>">
						                <div class="btn" data-id="<?=$item['id'];?>" id="dbtn<?=$item['id'];?>">
						                    <div class="buff" bis_skin_checked="1"> 
                                            </div>
                                            <strong>
                                                <i class="my-icon icon-download">&#xe804;</i>
                                                <span class="btn-txt">Download MP3</span>
                                            </strong>
                                        </div><span class="btn-mask"></span>
                                        </a>
                                    </li>
						        </ul>
						        <div class="loader" id="loader-<?=$item['id'];?>" style="display:none;">Loading...</div>
						        <div id="download-<?=$item['id'];?>" class="download-place clearfix" style="margin:10px;display:none;height: 50px;"> 
						        </div>

						        <div id="player-<?=$item['id'];?>" class="player clearfix" style="margin:10px;display:none;"></div>
						    </div>
						</div>  
                <?php endforeach; ?> 
    <?php 

} else { ?>
   
        <h2 class="text-danger">Page is deleted</h2><p style="font-size:120%;" class="text-primary">В соответствии с законами РФ данные по этому запросу удалены!</p><?php 
}

 // } else die("Error:pwlnah"); ?>