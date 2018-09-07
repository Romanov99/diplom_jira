<?php
header("Content-Type:text/html;charset=UTF-8");
include 'Header.php'
?>
<?php
if    ($_GET[msg1])
$msg1= $_GET[msg1];
?>
				<div id="main">
			 		<h2 class="heading"><?=$msg1?></h2>
			 		<div style="clear: both"><br></div>
			 		<!--div class="block"//-->
			 		
			 			<?php
                                                  $msg='';
                                                  include 'Tables_Handler.php';
                                                ?>

			 		<!--/div//-->
				</div>				
<?php
include 'Footer.php';
?>