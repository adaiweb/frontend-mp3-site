<?php
date_default_timezone_set ('Europe/Moscow');    // Устанавливаем временную зону
setlocale(LC_ALL, 'ru_RU.utf-8');               // Устанавливаем локализацию

$today = date("Ymd"); 

$hash = sha1($today.'_'.'mp3hq');

$subdomain = str_replace($base_domain,'',$_SERVER['HTTP_HOST']);

$subdomain=(stripos($subdomain, 'xn--')!==false) ? $idn->decode($subdomain) : $subdomain;

$routes = explode('/', $_SERVER['REQUEST_URI']);

$protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http");
 if(!empty($subdomain) && $protocol !='https') {
    header("HTTP/1.1 301 Moved Permanently");
    header("location:https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
}



//если нет поддомена и запрос есть
//то просто переадресовываем на гл стр
if(empty($subdomain) || (empty($subdomain) && strlen($_SERVER['REQUEST_URI']) > 2)) { 
     header("Location: /",TRUE,301);
} // если субдомен www. и есть запрос - показываем определенную страницу
 elseif($subdomain=='www.' && strlen($_SERVER['REQUEST_URI']) > 2) { 

    if($routes[1] == $collection_name) $p = 'genre';
    else $p = $routes[1];

    (@include 'controllers/' . $p . '.php') or include('controllers/404.php');
} // если поддомен www и нет запроса - показываем главную страницу
 elseif($subdomain=='www.'){
    require_once 'controllers/main.php';
}   //если есть поддомен - > это поиск
elseif (!empty($subdomain) && $subdomain != 'main' && $subdomain != 'router' && $subdomain != '404') {

    $p = 'search';  

    if (!empty($subdomain)) {
         $action =  str_replace(array('-','.'),' ',$subdomain);
    }

    require_once('controllers/'.$p.'.php');
}



?>