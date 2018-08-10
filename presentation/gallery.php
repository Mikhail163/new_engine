<?php 
class Gallery  extends Content
{
	public $mPhotoArray = [];
	public $mBigIPath;
	public $mSmallIPath;
	
	public $mBigUrl = '/i/gallery/big/';
	public $mSmallUrl = '/i/gallery/small/';
	
	public function __construct()
	{
		$this->mSmallIPath = SITE_ROOT.'';
		$this->mBigIPath = SITE_ROOT.$this->mBigUrl;
		$this->mSmallIPath= SITE_ROOT.$this->mSmallUrl;
		
		$this->mPhotoArray = scandir($this->mBigIPath);//glob("{$this->mBigIPath}*.{jpeg,gif,png,jpg}", GLOB_BRACE);
		
		$this->prepareImageList();
	}
	
	public function getH1() {
		return 'Галерея изображений';
	}
	
	public function getContent() {
	
		
		$content = 
		'
<div class="cssSlider">
	<ul class="slides">';
		
		for ($i = 0; $i < count ($this->mPhotoArray); $i++) {
			$content .= '<li id="slide'.$i.'"><img src="'.$this->mBigUrl.$this->mPhotoArray[$i].'" alt="" /></li>';
		}
		
		$content .=
		'
	</ul>
	<ul class="thumbnails">';
		
		for ($i = 0; $i < count ($this->mPhotoArray); $i++) {
			$content .= '<li><a href="#slide'.$i.'"><img src="'.$this->mSmallUrl.$this->mPhotoArray[$i].'" /></a></li>';
		}
		
		$content .= '
	</ul>
</div>
		';
		
		
		return $content;
	}
	
	
	/**
	 * Проверяем, есть ли иконки наших фотографий - и являются ли 
	 * полученные файлы фотографиями
	 */
	private function prepareImageList() {
		
		$photo = [];
		
		$ext = ['jpg', 'png'];
		
		foreach ($this->mPhotoArray as $img) {
				
			
			
			// Определяем, что это картинка
			foreach ($ext as $e) {
				
				
				//echo mb_strtolower(substr($img, strlen($img)) - strlen($e));
				
				if (mb_strtolower(substr($img, strlen($img) - strlen($e), strlen($img))) == mb_strtolower($e)) {
					
					// проверяем, есть ли такая картинка в иконках 
					if (file_exists($this->mSmallIPath . $img))
						$photo[] = $img;
					
					break;
				}
			}
			
			
		}
		
		$this->mPhotoArray = $photo;
			
	}
	
}
?>