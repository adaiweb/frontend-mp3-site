<?php
$title = 'Правообладателям DMCA ' .$_SERVER['HTTP_HOST'];
$desc = 'Правообладателям DMCA Abuse ' .$_SERVER['HTTP_HOST'];
$keywords = 'Правообладателям, DMCA, Abuse, '.$_SERVER['HTTP_HOST'];
require_once 'app/functions.php';
$content = 'app/views/dmca.blade.php';

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    ob_start();
    include($content);
    $content = ob_get_clean();
    ?>{"title":"Ошибка 404","search_query":"","xx1_content":<?php echo json_encode($content); ?>}<?php
} else {
    require_once 'app/views/template.blade.php';
}