<?php 

require_once PRESENTATION_DIR . 'content.php';

class PageLink {
	public $mText = '';
	public $mUrl = '';
	
	public function __construct($text, $url)
	{
		$this->mText = $text;
		$this->mUrl = $url;
	}
}

class Task3  extends Content
{
	public $mCities = [
			"Московская область" => ["Москва", "Зеленоград", "Клин"],
			"Ленинградская область" => ["Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"]
	];
	
	public function __construct()
	{
		;
	}
	
	public function getContent() {
		
		return $this->task0() . $this->task1() . $this->task2() . $this->task3() . $this->task4() . $this->task5();
		
	}
	
	private function task0() {
		
		$task = new Task(1, "С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.");
		
		
		$result = '';
		
		$i = 0;
		
		while ($i <= 100){
			
			if ($i % 3 == 0)
				$result .= "{$i} ";
				
			$i++;
		} 
		
		return $task->getContent($result);
	}
	
	private function task1() {
		
		$task = new Task(2, "С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:
0 – это ноль.
1 – нечетное число.
2 – четное число.
3 – нечетное число.
…
10 – четное число.");
		
		
		$result = '';
		
		$i = 0;
		
		do {
			if ($i == 0)
				$result .= "0 - это ноль<br>";
			else {
				$result .= $i . " - ";
				
				if ($i % 2 == 0)
					$result .= 'четное ';
				else 
					$result .= 'нечетное ';
				
				$result .= '<br>';
			}
			
		} while ($i++ < 10);
		
		return $task->getContent($result);
	}
	
	private function task2() {
		$task = new Task(3, "Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений – массивы с названиями городов из соответствующей области. Вывести в цикле значения массива, чтобы результат был таким:
Московская область:
Москва, Зеленоград, Клин
Ленинградская область:
Санкт-Петербург, Всеволожск, Павловск, Кронштадт
Рязанская область … (названия городов можно найти на maps.yandex.ru)");
		
		$result = '';
		
		$cities = $this->mCities;
		
		foreach ($cities as $key => $value) {
			$result .= "{$key}:<br>";
			
			for ($i = 0; $i < count($value); $i++) {
				$result .= $value[$i];
				
				if ($i != count($value)-1)
					$result .= ", ";
			}

			$result .= "<br>";
		}
		
		
		
		return $task->getContent($result);
	}
	
	private function task3() {
		$task = new Task(4, "Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
Написать функцию транслитерации строк.");
		
		$result = '';
		
		return $task->getContent($result);
	}
	public static function translitIt($str)
	{
		$tr = array(
				"А"=>"A","Б"=>"B","В"=>"V","Г"=>"G",
				"Д"=>"D","Е"=>"E","Ж"=>"J","З"=>"Z","И"=>"I",
				"Й"=>"Y","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N",
				"О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T",
				"У"=>"U","Ф"=>"F","Х"=>"H","Ц"=>"TS","Ч"=>"CH",
				"Ш"=>"SH","Щ"=>"SCH","Ъ"=>"","Ы"=>"YI","Ь"=>"",
				"Э"=>"E","Ю"=>"YU","Я"=>"YA","а"=>"a","б"=>"b",
				"в"=>"v","г"=>"g","д"=>"d","е"=>"e","ж"=>"j",
				"з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
				"м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
				"с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
				"ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
				"ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya", " " => "_"
		);
		return strtr($str,$tr);
	}
	
	private function task4() {
		$task = new Task(5, "Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.");
		
		$result = '';
		
		$data = 'this is rock`n`roll';
		$data_replace = str_replace(' ', '_', $data);
		
		$result = "Строка до замены: {$data}; строка после замены: {$data_replace}";	
		
		
		
		return $task->getContent($result);
	}
	
	private function task5() {
		$task = new Task(6, "В имеющемся шаблоне сайта заменить статичное меню (ul – li) на генерируемое через PHP. Необходимо представить пункты меню как элементы массива и вывести их циклом. Подумать, как можно реализовать меню с вложенными подменю? Попробовать его реализовать.");
		
		$menu = [
					["Главная", "/", 
						[
							["о нас", "/aboutus", 
								[ 
									["офис", "/aboutus/office", []], 
									["склад", "/aboutus/sklad", []]
								]
							], 
					        ["реквизиты", "/requisits",  []]
						]
					],
					["Каталог товаров", "/catalog", []]
				];
		
		$result = $this->renderMenu($menu);
		
		return $task->getContent($result);
	}
	
	private function renderMenu(array $menu) {
		
		if (count($menu) == 0)
			return '';
		
		$result = "<ul>";
		
		for ($i = 0; $i < count($menu); $i++)
		{
			$result .= "<li><a href='{$menu[$i][1]}'>{$menu[$i][0]}</a>".$this->renderMenu($menu[$i][2])."</li>";			
		}
		
		$result .= "</ul>";
		
		
		return $result;
		
	}
	
	
}

?>
