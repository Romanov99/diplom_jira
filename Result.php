<?php
header("Content-Type: text/html; charset=utf-8");
?>
<!DOCTYPE html>

<?php
$title = 'Добавление данных'; 
include_once 'Head.php';
?>

<?php include 'Header.php'; 
$msg1=$_GET[msg1];
?>
	<div id = "logo">
		<a title="<?=$title?>">
			  <?=$title?><br>
                          <?=$msg1?>
		</a>
	</div>

	<div id="leftCol">
<br><br>
	</div>
	</div>

<?php include 'Footer.php'; ?>


</body>
</html>
	
	