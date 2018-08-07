<?php 

require_once PRESENTATION_DIR . 'content.php';
require_once PRESENTATION_DIR . 'task.php';

$main_tpl_path = TEMPLATE_DIR. '/site.tpl';
$data = file_get_contents($main_tpl_path);

$year = date("Y", time());
$h1 = 'Выполняем задание 3 к базовуму курсу php';

$content = new Content;


$data = str_replace('{{H1}}', $h1, $data);
$data = str_replace('{{CONTENT}}', $content->getContent(), $data);
$data = str_replace('{{YEAR}}', $year, $data);
$data = str_replace('{{TITLE}}', $h1, $data);

echo $data;

?>