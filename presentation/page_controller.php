<?php 
require_once PRESENTATION_DIR . 'task.php';
require_once PRESENTATION_DIR . 'task3.php';
require_once PRESENTATION_DIR . 'gallery.php';

class PageController
{
	

	public $mPageTypes = [
			'task' => 1,
			'main' => 2
	];
	
	public $mPageType = 0;
	public $mPageNumber = 0;
	public $mPageContent;

	
	public $mTaskArray = [
			['id' => 3, 'name' => 'Задание 3'],
			['id' => 4, 'name' => 'Задание 4: галерея']
	];
	
	public function __construct()
	{
		// Определяем на какой странице находимся
		if (isset ($_GET['TaskId']))
		{
			$this->mPageType = $this->mPageTypes['task'];
			
			$this->mPageNumber = $_GET['TaskId'];
			
			switch ($this->mPageNumber) {
				case 3:
					$this->mPageContent = new Task3;
					break;
				case 4:
					$this->mPageContent = new Gallery;
					break;
				default:
					$this->mPageNumber= 0;
					$this->mPageType = 0;
			}
		}
		else {
			$this->mPageType = $this->mPageTypes['main'];
		}
	}
	
	public function getContentObj() {
		return $this->mPageContent;
	}
	
	public function isUnknownPage() {
			
		if ($this->mPageType === 0)
			return true;
		else 
			return false;
	}
	
	public function getMenu() {
		
		$menu = '<div class="main_menu">';
		
		$menu .= '<a '.($this->mPageType == $this->mPageTypes['main']?'class="active"':'').' href="/">Главная</a>';
		
		foreach ($this->mTaskArray as $task)
		{
			$menu .= '<a '.($this->mPageNumber==$task['id']?'class="active"':'').' href="'.Link::ToTask($task['id']).'">'.$task['name'].'</a>';
		}

	    $menu .= '</div>';
	    
	    return $menu;
	}
	
}

?>