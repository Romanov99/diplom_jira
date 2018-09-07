<?php
header("Content-Type: text/html; charset=utf-8");
?>

<!DOCTYPE html>
<?php
session_start();
$FIO            = $_SESSION['FIO'           ];
$Object_Type_Id = $_SESSION['Object_Type_Id'];
$Object_Nm      = $_SESSION['Object_Nm'     ];
$email          = $_SESSION['email'         ];
#
$Main_Folder='RemOborICT';
$title      ='Оборудование'; 
include_once($_SERVER["DOCUMENT_ROOT"]."/$Main_Folder/Head.php");
?>

<?php 
include      'Header.php'; 
include_once 'FormMsgs.php';
?>
	<div id = "logo">
		<a title="Заявка на ремонт">
			  Заявка на ремонт<br><?=$Object_Nm?>
		</a>
	</div>

	<div id="leftCol">

<?php include 'Form_Order.php'; ?>
<br><br>
	</div>
	</div>

<?php include 'Footer.php'; ?>


</body>
</html>
	
	