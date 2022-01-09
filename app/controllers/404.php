<?php
header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
$title = 'Ошибка 404 - страница не найдена';
$desc = '';
$keywords = '';
require_once 'app/functions.php';
$content = 'app/views/404.blade.php';

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    ob_start();
    include($content);
    $content = ob_get_clean();
    ?>{"title":"Ошибка 404","search_query":"","xx1_content":<?php echo json_encode($content); ?>}<?php
} else {
    require_once 'app/views/template.blade.php';
}



