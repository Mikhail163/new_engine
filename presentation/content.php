<?php 



class Content
{
	
	public $mContent;
	public $mUnknownPage = false;
	public $mPageController;

	
	public function __construct($page_controller)
	{
		
		// определяем на какой мы странице
		$this->mContent = $page_controller->getContentObj();

		$this->mUnknownPage = $page_controller->isUnknownPage();
		
		$this->mPageController = $page_controller;
		
	}
	
	public function getContent() {
		
		if ($this->mUnknownPage)
			return '<p>Неизвестная страница сайта, рекомендуем вернуться на <a href="/">главную страницу</a></p>';
		elseif (!isset($this->mContent)) {
			return 'Главная старница учебного сайта - выполнены следующие уроки: ' . $this->mPageController->getMenu();
		}
		
		return $this->mContent->getContent();
		
	}
	
	
	public function getH1() {
		
		if ($this->mUnknownPage)
			return 'Такой страници не существует';
		elseif (!isset($this->mContent)) {
			return 'Главная старница учебного сайта';
		}
		
		return $this->mContent->getH1();
		
	}
}
?>