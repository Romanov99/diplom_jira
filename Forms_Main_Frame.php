<?php
header("Content-Type:text/html;charset=UTF-8");
include 'Header.php'
?>
				<div id="main">
			 		<h2 class="heading">Проекты </h2>
			 		<div style="clear: both"><br></div>
			 		<!--div class="block"//-->
			 		
			 			<?php
                                                  $FormType='a_projects';
                                                  include 'Forms_Main.php';
                                                ?>

			 		<!--/div//-->
				</div>				
<?php
include 'Footer.php';
?>