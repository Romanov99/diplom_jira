<?php
header("Content-Type:text/html;charset=UTF-8");
include 'Header.php'
?>
				<div id="main">
			 		<h2 class="heading">ГРАФИК ВЫПОЛНЕНИЯ ВИДОВ РАБОТ</h2>
			 		<div style="clear: both"><br></div>
			 		<!--div class="block"//-->
			 		
			 			<?php
                                                  $FormType='e_scram';
                                                  include 'View_Table_Scram.php';
                                                ?>

			 		<!--/div//-->
				</div>				
<?php
include 'Footer.php';
?>