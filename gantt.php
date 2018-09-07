<?php
header("Content-Type:text/html;charset=UTF-8");
include 'Header.php'
?>
				<div id="main">
			 		<h2 class="heading">ДИАГРАММА ГАНТА ПРОЕКТОВ</h2>
			 		<div style="clear: both"><br></div>
			 		<!--div class="block"//-->
			 		
			 			<?php
                                                  $FormType='e_gantt';
                                                  include 'View_Table_Gantt.php';
                                                ?>

			 		<!--/div//-->
				</div>				
<?php
include 'Footer.php';
?>