<?php
header("Content-Type: text/html; charset=utf-8");
?>

<!DOCTYPE html>
<?php 
$Main_Folder='RemOborICT';
include_once($_SERVER["DOCUMENT_ROOT"]."/$Main_Folder/Main_Site_Settings.php");
?>
<html>
<head>
	<title>Отзывы/<?=$Main_Page[Name_System][Компания]?></title>
	<meta charset="utf-8">
	<title><?=$title?></title>
	<link href="../<?=$Main_Folder?>/css/style.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="../<?=$Main_Folder?>/js/jquery-1.12.4.min.js"></script>

</head>



<body>
<?php include 'Header.php'; ?>
 
  
  <div id = "logo">
		<a title="Отзывы">
			Отзывы
		</a>
	</div>


  <div id="leftCol">
<?php
session_start();
$Status          = $_SESSION['Status'  ];
$username        = $_SESSION['username'];
$FIO             = $_SESSION['FIO'];
$email           = $_SESSION['email'];
?>
<div id="otziv">
<br><br>
<form method="post">
  <label>Как к Вам обращаться:</label><br>
  <input type='text' name='name' value='<?=$FIO?>' required/><br><br>
  <label>Email (не публикуется):</label><br>
  <input type='email' name='email' value='<?=$email?>' required/><br><br>
  <label>Oтзыв:</label><br>
  <textarea name='content' required rows="5"></textarea><br><br>
  <input type='submit' value='публикация'/>
</form>

<?php
// занести в массив значение полей
$z = array(
  1 => $_POST['name'],
  2 => $_POST['email'],
  3 => $_POST['content']
);
$dl = '';
if($z[1] && $z[2] && $z[3]){
  mail("alexkold@mail.ru", "заполнена форма site.ru", $z[1] . "\n" . $z[2] . "\n" . $z[3]); // сообщение на ваш email о новом отзыве
  if(strpos($z[3], 'http://') === false){ // если в тексте отзыва нет http://
    $fp = fopen("comments.txt", "a+"); // режим записи
    $mytext = "<dt><a href='" . $z[2] . "'>" . $z[1] . "</a><dd>" . $z[3] ;
    $save = fwrite($fp, $mytext); // запись в файл
    fclose($fp); // закрытие файла
# Добавляем запись в БД, таблица d_review
    $FormType='d_review';
    include 'Add_Record.php';
# 
    Header("Location: ".$_SERVER['PHP_SELF']); // обновить страницу; обновлённая версия содержит опубликованный комментарий
    exit;
  } else { // если в тексте есть http://
    $dl = '<b style="color: red;">Ваш отзыв будет опубликован после проверки автором сайта</b>'; // показан этот текст
  }
} else { 
  $fp = @fopen("comments.txt", "r"); // режим чтения
  if ($fp) {
    while (!feof($fp)) {
      $dl .= fgetss($fp, 8000, "<dl>,<dt>,<dd>"); // <dl>,<dt>,<dd> - это список тегов, разрешённых для публикации
    }
  }
} 
?>	


<dl>
<?php// echo $dl; ?> <!-- PHP -->
</dl>
  <div id = "logo">
		<a title="Все отзывы">
			  Все отзывы
		</a>
  </div>
<p></p>
<br>
<br><br>
<?php 
$FormType='d_review';
include 'View_Table.php';
?>
<br>

</div>
</div>


<!-- Здесь был банер. Убрал. //-->
 
  </div>

  
<?php include 'Footer.php'; ?>
  
 </body>
</html>﻿