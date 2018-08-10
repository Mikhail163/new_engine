<?php 



class Content
{
	
	public $mContent;
	public $mUnknownPage = false;

	
	public function __construct($page_controller)
	{
		
		// определяем на какой мы странице
		$this->mContent = $page_controller->getContentObj();

		$this->mUnknownPage = $page_controller->isUnknownPage();
		
	}
	
	public function getContent() {
		
		if ($this->mUnknownPage)
			return '<p>Неизвестная страница сайта, рекомендуем вернуться на <a href="/">главную страницу</a></p>';
		
		return $this->mContent->getContent();
		
	}
	
	
	public function getH1() {
		
		if ($this->mUnknownPage)
			return 'Такой страници не существует';
		
		return $this->mContent->getH1();
		
	}
}
?>