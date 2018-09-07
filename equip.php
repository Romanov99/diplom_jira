<?php
header("Content-Type: text/html; charset=utf-8");
?>

<!DOCTYPE html>
<?php
$title      ='Поиск оборудования'; 
include_once 'Head.php';
?>
<?php include 'Header.php'; ?>
	<div id = "logo">
		<a title="Поиск оборудования">
			  Поиск оборудования
		</a>
	</div>

	<div id="leftCol">

<?php
include_once 'FormMsgs.php';
print "<br><font size='5' color='blue'>$All_Tables_Names[3]</font>";
$FormType='31_Obor_Net'; 
include 'View_Table.php';
print "<br><font size='5' color='blue'>$All_Tables_Names[4]</font>"; 
$FormType='32_Obor_Comp'; 
include 'View_Table.php';
print "<br><font size='5' color='blue'>$All_Tables_Names[5]</font>";  
$FormType='33_Obor_Mod'; 
include 'View_Table.php'; 
print "<br><font size='5' color='blue'>$All_Tables_Names[6]</font>";  
$FormType='34_Obor_Print'; 
include 'View_Table.php'; 
print "<br><a href='staff.php'><font size='5' color='blue'>Поиск специалистов</font></a>"; 
?>
<br><br>
	</div>
	</div>

<?php include 'Footer.php'; ?>


</body>
</html>
	
	