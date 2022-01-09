<?php
$title = 'Обратная связь '.$_SERVER['HTTP_HOST'];
$desc = 'Обратная связь сайта '.$_SERVER['HTTP_HOST'];
$keywords = 'обратная, связь, '.$_SERVER['HTTP_HOST'];
require_once 'app/functions.php';
$content = 'app/views/feedback.blade.php';

if(isset($_POST['subject']) && $_POST['subject']=='abuse'){
    $file = 'blocked_abusers.txt';
    $current = file_get_contents($file);
    $current .= $ip."\n";
    file_put_contents($file, $current);

}

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    ob_start();
    include($content);
    $content = ob_get_clean();
    ?>{"title":"Ошибка 404","search_query":"","xx1_content":<?php echo json_encode($content); ?>}<?php
} else {
    require_once 'app/views/template.blade.php';
}
