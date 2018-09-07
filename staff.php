<?php
header("Content-Type: text/html; charset=utf-8");
?>


<!DOCTYPE html>
<?php
$title      ='Поиск специалистов'; 
include_once 'Head.php';
?>

<?php include 'Header.php'; ?>
	<div id = "logo">
		<a title="Поиск специалистов">
			  Поиск специалистов
		</a>
	</div>

	<div id="leftCol">

<?php
include_once 'FormMsgs.php';
print "<br><font size='5' color='blue'>$All_Tables_Names[13]</font>";
$FormType='b_Personal_Obslugivanij'; 
include 'View_Table.php'; 
print "<br><a href='equip.php'><font size='5' color='blue'>Поиск оборудования</font></a>"; 
?>
<br><br>
	</div>
	</div>

<?php include 'Footer.php'; ?>


</body>
</html>
	
	