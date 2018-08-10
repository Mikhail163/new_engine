<?php 

require_once PRESENTATION_DIR . 'content.php';
require_once PRESENTATION_DIR . 'page_controller.php';

$main_tpl_path = TEMPLATE_DIR. '/site.tpl';
$data = file_get_contents($main_tpl_path);

$year = date("Y", time());

$page_controller = new PageController;
$content = new Content($page_controller);


$data = str_replace('{{H1}}', $content->getH1(), $data);
$data = str_replace('{{MENU}}', $page_controller->getMenu(), $data);
$data = str_replace('{{CONTENT}}', $content->getContent(), $data);
$data = str_replace('{{YEAR}}', $year, $data);
$data = str_replace('{{TITLE}}', $content->getH1(), $data);

echo $data;

?>