<?php 
 
ini_set('error_reporting',E_ALL);
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
 
  
// if(!empty($_GET['url']) && !empty($_GET['type'])) {

// 	// $redis_query = 'billboard_'.$_GET['url'].'-'.$_GET['type'];	

	

// } else die("ERROR");
function getBillJson($type, $url){ 

	$filename = $_SERVER['DOCUMENT_ROOT'].'/cache/billboard_'.$type.'.json';
			    
	if (time()-filemtime($filename) > 24 * 3600 * 3) {

		$array = BillBoard::getChart($type,$url);
		if(!empty($array)){

		$json = json_encode($array);

 		file_put_contents($filename, $json);
		}

	} else {
		$json = file_get_contents($filename);
		$array = json_decode($json, true);
	}
	return $array;
}

switch ($routes[2]) {
	case 'songs':

		$chart_title = 'The Hot 100 Chart: download the most popular songs';
		$chart_h1 = '100 Songs On The Chart'; 
		$chart_items = getBillJson('songs','charts%2Fhot-100')["songs"];  
	 
		break;
	
	case 'artists':
		$chart_title = 'Artist 100 Chart: the most famous artists';
		$chart_h1 = 'The Most Popular Artists';

		$chart_items = getBillJson('artists','charts%2Fartist-100')['artists'];  

		break;
	
	default:
		# code...
		break;
}
// $chart_artists = getJson('https://api.bulbul.su/billboard.php?type=artists&url=charts%2Fartist-100');

$title = $chart_title. ' - MP3 JUICES';
$description = '';

$content = 'app/views/library.blade.php';
require_once('app/views/template.blade.php');
 ?>
