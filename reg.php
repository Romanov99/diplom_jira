<?php
header("Content-Type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<?php
$title = 'Регистрация пользователей'; 
include_once 'Head.php';
?>

<?php include 'Header.php'; ?>
	<div id = "logo">
		<a title="<?=$title?>">
			  <?=$title?>
		</a>
	</div>

	<div id="leftCol">

<?php
$operation='ADD'; 
include 'Forms_Main.php'; 
?>
<br><br>
	</div>
	</div>

<?php include 'Footer.php'; ?>


</body>
</html>
	
	