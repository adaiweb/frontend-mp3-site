<?php 	
if(isset($_GET['query'])){

	require_once('/var/www/MyApiFetcher/core.php');

	$array = json_decode($function->getWebPage('https://s'.rand(1,2).'.yt.ninja/api/api.php?query='.$_GET['query'].'&iaadminept=true&method=search'), true);
	$song = $array['data'][0];
	echo json_encode($song);
}

 ?>
