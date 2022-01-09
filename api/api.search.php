<?php
require_once('../app/config.php');
require_once('/var/www/MyApiFetcher/core.php');
$q = isset($_GET["query"]) ? $_GET["query"] : (isset($_POST["query"]) ? $_POST["query"] : "");

if (isset($q)) {
    $q = str_replace('ё', 'е', $q);
    header('Location: '.$http_protocol. str_replace(' ', '-', $function->strFilter($q)) . '.'.$base_domain);
}