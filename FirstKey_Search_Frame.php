<?php
header("Content-Type:text/html;charset=UTF-8");
include 'Header.php'
?>
				<div id="main">
			 		<h2 class="heading">Проекты </h2>
			 		<div style="clear: both"><br></div>
			 		<!--div class="block"//-->
			 		
			 			<?php
                                                  $print_table=1;
                                                  if ($_GET[FormType])
                                                           $FormType=$_GET[FormType];
                                                  if ($_GET[KeyValue])
                                                           $KeyValue=$_GET[KeyValue];
                                                  include 'FirstKey_Search.php';
                                                ?>

			 		<!--/div//-->
				</div>				
<?php
include 'Footer.php';
?>