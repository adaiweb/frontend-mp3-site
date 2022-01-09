<?php 

function findGenreById($id){
	global $genres;
	foreach ($genres as $key => $genre) {
		if($genre['id'] == $id) return $genre;
	}

	return null;
}
 
$genre = findGenreById($routes[2]);

$playlist_json = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'].'/storage/'.$genre['file_directory']), true);

$playlist = $playlist_json["data"]["playlists"]["items"][$collection_number];
$id = $playlist["id"];


$playlistName = $genre['name'];

$url = 'https://www.yt.ninja/api/spotify/api.php?query=playlists/'.$id.'/tracks';

$file = $function->getWebPage($url);

$json = json_decode($file, true);
$songs = $json['items'];

$title = $playlistName.' tracks download music free';
		 $h1 = 'Download '. $playlistName.' music';
		 $description = 'In this page you can download '. $playlistName. ' mp3 for free!';
		 $keywords = ''. $playlistName. ' music,'. $playlistName. ',mp3 '. $playlistName. ', free '. $playlistName. ' mp3s, download music '. $playlistName. ', music,mp3,online,download'; 

$body = "app/views/genre.blade.php";
require_once("app/views/template.blade.php");
  ?>
