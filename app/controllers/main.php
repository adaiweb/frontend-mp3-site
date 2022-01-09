<?php 
$action = 'download mp3';
$title = $title_main;
$h1 = $title_main;
$description = $description_main;
 $keywords = '';
 $file = $myredis->get($action);

if(empty($file)){
  $file = YoutubeCrawler::search($action);

	$myredis->set($action,$file);

}
$data = json_decode($file, true);

$songs = $data['data'];

 	$body = 'app/views/main.blade.php';
    require_once 'app/views/template.blade.php'; 
?>
