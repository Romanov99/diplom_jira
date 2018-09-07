<?php
header("Content-Type: text/html; charset=utf-8");
### На основе шаблона,испоьзовался еще в модулях auth.php, reg.php, Tables_Handler.php...###
?>
<!DOCTYPE html>
<?php
$Main_Folder='RemOborICT';
$title      ='Кабинет клиента'; 
include_once($_SERVER["DOCUMENT_ROOT"]."/$Main_Folder/Head.php");
?>
<?php //include 'index_member1.php'; - Сюда помещаем функциональный php-модуль или ниже ?>
<?php    include($_SERVER["DOCUMENT_ROOT"]."/$Main_Folder/Header.php"); 
print "
	<div id = \"logo\">
		<a title=\"Кабинет клиента\">
			   Кабинет клиента
                          <br>$msg1
		</a>
	</div>";
?>
	<div id="leftCol">

<?php include 'index_member1.php'; //Эту часть можно использовать для вывода таблиц, если понадобиться ?>
<br><br>
	</div>
	</div>

<?php include($_SERVER["DOCUMENT_ROOT"]."/RemOborICT/Footer.php");?>


</body>
</html>
	
	