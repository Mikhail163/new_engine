<?php 

require_once PRESENTATION_DIR . 'task3.php';

class Content
{
	
	public $mContent;
	
	public function __construct()
	{
		$this->mContent = new Task3;
	}
	
	public function getContent() {
		
		return $this->mContent->getContent();
		
	}
}

function getTimeString() {
	$houre_string = "часов";
	$minute_string = "минут";
	
	$houre = (int)date("G", time());
	$min = (int)date("i", time());
	
	switch($houre%10)
	{
		case 1: $houre_string = 'час'; break;
		
		case 2:
		case 4:
		case 3: $houre_string = 'часа'; break;
	}
	
	switch($min%10)
	{
		case 1: $minute_string = 'минута'; break;
		
		case 2:
		case 4:
		case 3: $minute_string = 'минуты'; break;
	}
	
	return "{$houre} {$houre_string} {$min} {$minute_string}";
	
}

?>