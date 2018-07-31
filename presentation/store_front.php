<?php 

class StoreFront
{
	

	public $mCurrentUrl;
	public $mPageTitle;
	public $mPageDescription;
	
	// Class constructor
	public function __construct()
	{
		$this->mPageTitle = 'Главная страница сайта';
		$this->mCurrentUrl = Link::Build('');
		$this->mPageDescription = "Это прототип обновленного движка к интернет магазину";
	}
}

?>