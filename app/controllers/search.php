<?php 

$action = trim($action); 

$file = $myredis->get($action);

if(empty($file)){
  $file = YoutubeCrawler::search($action);

	$myredis->set($action,$file);

}
$data = json_decode($file, true);

$songs = $data['data'];

// $data = json_decode(get_web_page(getApiUrl($action,'search')), true);
// dd($data);
// if(!empty($data['error'])) {
// 	if($data['error']['id'] == 555){
// 		header("HTTP/1.0 404 Not Found");
// 		require_once('blocked.php');
// 		die();
// 	}
// }
 
$routes = explode('/', $_SERVER['REQUEST_URI']);
 
if(!empty($songs)){
	$function->addQuery($action,40,$_SERVER['DOCUMENT_ROOT'].'/storage/searches.txt');
}

if(!empty($routes[1])) {
	$actual_link = str_replace($routes[1], '', $actual_link);
}
 
$action = str_replace('-',' ',$action);   
 
$title = sprintf($title_search,
    $function->strTitle($action));

$h1 = sprintf($title_search,
    $function->strTitle($action));


$description = sprintf($description_search,
    $function->strTitle($action), count($data['data']),  $function->strTitle($action));
 $keywords = strtolower(str_replace(' ',',',$title).','.str_replace(' ',',',$h1)); 

// ob_start("compress_htmlcode");

if(empty($songs)) header("Location: https://google.com/search?q={$action}");

 	$body = 'app/views/search.blade.php';
    require_once 'app/views/template.blade.php';

// ob_end_flush();


