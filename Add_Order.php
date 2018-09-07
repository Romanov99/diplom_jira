<?php
header("Content-Type: text/html; charset=utf-8");
?>
<?php// include 'Tables_Handler1.php'; - так не работает?>

<!DOCTYPE html>
<html>
<head>
	<title>Добавление и отправка заявки/БПО Сервис</title>
	<meta charset="utf-8">
	<title><?=$title?></title>
	<link href="../RemOborICT/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include 'Add_Record.php'; ?>
<?php include 'Header.php'; 
print "
	<div id = \"logo\">
		<a title=\"Добавление и отправка заявки\">
			   Добавление и отправка заявки
                          <br>$msg1
		</a>
	</div>";
?>
	<div id="leftCol">

<?php //include 'Tables_Handler1.php'; Эту часть можно использовать для вывода таблиц, если понадобиться?>
<br><br>
	</div>
	</div>

<?php include 'Footer.php'; ?>


</body>
</html>
	
	