<?php 
 
// $filename = 'cache/tiktok.json';

// if(filemtime($filename)<time()-(86400*5)){
// 	$url = 'https://m.tiktok.com/api/item_list/?count=30&id=1&type=5&secUid=&maxCursor=0&minCursor=0&sourceType=12&appId=1233&region=US&language=en&verifyFp=&_signature=XFM2xAAgEBon1xZWxxNxmlxTN9AAAL.';
// 	$file = get_web_page($url);
// 	$tiktok = json_decode($file, true);
// 	$music_array = [];
// 	foreach ($tiktok['items'] as $key => $item) {
// 		$music = $item['music'];

// 		$music_array[] = ["artist"=>$music['authorName'],"title"=>$music['title'],"url"=>$music["playUrl"]];

// 		# code...
// 	}

// 	$json = json_encode($music_array);

// 	file_put_contents($filename,$json);

// } else 
// $music_array = json_decode(file_get_contents($filename), true);
 

$title = 'TikTok Music 2020: best tiktok songs, tiktok trends';
$description = 'Here Are The Songs TikTok Got Stuck In Your Head In 2020. From Roddy Ricch to Doja Cat, here\'s every popular song that\'s gone viral on TikTok in 2020, including the original creators of the dance!  Download TikTok Music free!';
$h1 = 'TikTok Songs';

$content = 'app/views/tiktok.blade.php';
require_once('app/views/template.blade.php');

?>