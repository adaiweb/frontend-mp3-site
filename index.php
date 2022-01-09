<?php  
ini_set('error_reporting',E_ALL);
ini_set('display_errors',1);
ini_set('display_startup_errors',1);


require_once('/var/www/MyApiFetcher/core.php');

require_once('app/config.php'); 

$queries = explode(PHP_EOL, file_get_contents('storage/searches.txt'));
$genres = json_decode(file_get_contents('storage/categories/genres.json'), true);


require_once('app/router.php'); 
?>