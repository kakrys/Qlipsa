<?php
global $APPLICATION;

/**
 * @var array $arResult
 * @var array $arParams
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>

<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ввод рабочих дней</title>
</head>
<body>
<?php if (isset($arResult['RESULT'])): ?>
<h1>Результат: <?=$arResult['RESULT']?></h1>
<?php endif;?>
<h2>Введите количество рабочих дней</h2>
<form action="/" method="post">
	<label for="workdays">Количество рабочих дней:</label>
	<input type="number" id="workdays" name="workdays" min="1" required>
	<button type="submit">Отправить</button>
</form>
</body>
</html>