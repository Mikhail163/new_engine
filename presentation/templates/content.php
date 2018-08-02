<?php 
echo '<h1>Выполняем домашнее задание к уроку 2 курс php основы</h1>';
/*
1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать скрипт, который работает по следующему принципу:
если $a и $b положительные, вывести их разность;
если $а и $b отрицательные, вывести их произведение;
если $а и $b разных знаков, вывести их сумму;
Ноль можно считать положительным числом.
2. Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел от $a до 15.
3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return.
4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).
5. Посмотреть на встроенные функции PHP. Используя имеющийся HTML-шаблон, вывести текущий год в подвале при помощи встроенных функций PHP. Шаблон должен читаться из файла tpl, в нем не должно быть ни строчки php-кода. Весь код в index.php.
6. *С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень.
7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
22 часа 15 минут
21 час 43 минуты
*/

echo '<h2>Задание 1</h2>';

$a = 6;
$b = -3;
$result = 0;

echo '<p>';


if ($a >= 0 && $b >= 0)
	$result = 'разность ('.($a - $b).')';
elseif ($a < 0 && $b < 0)
	$result = 'произведение ('.($a*$b).')';
else 
	$result = 'сумма ('.($a + $b).')';

echo "A = {$a}; B = {$b}; решение: {$result}";
	
echo '</p>';


echo '<h2>Задание 2</h2>';
$a = rand(0, 15);

echo '<p>';
switch ($a) {
	case 0:
		echo 0 . ' ';
	case 1:
		echo 1 . ' ';
	case 2:
		echo 2 . ' ';
	case 3:
		echo 3 . ' ';
	case 4:
		echo 4 . ' ';
	case 5:
		echo 5 . ' ';
	case 6:
		echo 6 . ' ';
	case 7:
		echo 7 . ' ';
	case 8:
		echo 8 . ' ';
	case 9:
		echo 9 . ' ';
	case 10:
		echo 10 . ' ';
	case 11:
		echo 11 . ' ';
	case 12:
		echo 12 . ' ';
	case 13:
		echo 13 . ' ';
	case 14:
		echo 14 . ' ';
	case 15:
		echo 15;
}
echo '</p>';

echo '<h2>Задание 3</h2>';

function add($a, $b) {
	return $a + $b;
}

function sub ($a, $b) {
	return $a - $b;
}

function mult ($a, $b) {
	return $a * $b;
}

function div ($a, $b) {
	if ($b != 0)
		return $a / $b;
}

echo '<h2>Задание 4</h2>';

function mathOperation($arg1, $arg2, $operation) {
	$result = 0;
	
	switch ($operation) {
		case 'add':
			$result = add($arg1, $arg2);
			break;
		case 'sub':
			$result = sub($arg1, $arg2);
			break;
		case 'mult':
			$result = mult($arg1, $arg2);
			break;
		case 'div':
			$result = div($arg1, $arg2);
			break;
	}
	
	return $result;
}

echo '<h2>Задание 5</h2>';

$file_path = SITE_ROOT.'/site.tpl';

echo '<p>';
replaceYearInFile($file_path);
echo '</p>';
function replaceYearInFile($path) {
	
	$data = file_get_contents($path); // Вывести данные из файла в переменную
	$data= preg_replace('#<div id="year_in_footer"[^>]*>.*?</div>#is', '<div id="year_in_footer">'.date("Y", time()).'</div>', $data);
	
	echo $data;
}

echo '<h2>Задание 6</h2>';

function power($val, $pow) {
	
	$result = 1;
	$add_pow = -1;
	
	if ($pow < 0)
		$add_pow = 1;
	
	if ($pow != 0) {		
		$result = ($pow > 0 ? $val : 1/$val) * power($val, $pow + $add_pow);
	}
	
	return $result;
}

echo '<h2>Задание 7</h2>';

echo getTimeString();

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