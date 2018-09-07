<?php
header("Content-Type:text/html;charset=UTF-8");
?>
<?php include 'Header.php';?>
				<div id="main">
			 		<h2 class="heading">Создание проектов </h2>
			 		<div style="clear: both"><br></div>
			 		<div class="block">
			 			<form method="post" action="Add_Record.php?FormType=a_projects">
			 				<div>
				 				<p>Код проекта</p><input type="text"    name='Proj_Id'    placeholder="Код проекта" required/>
				 				<br>
				 				<p>Код клиента</p> <input type="text"   name="Proj_Nm"    placeholder="Код клиента" required/>
				 				<p>Наименование</p><input type="text"   name='Proj_Id'    placeholder="Наименование" required/>	
				 				<p>Руководитель</p><input type="text"   name="Proj_Admin" placeholder="Руководитель" required/>
				 				<p>Стоимость   </p><input type="number" name="Proj_Price" placeholder="Стоимость" required/>
				 				<input type="hidden" name="Date_p" value="<?php echo date('Y-m-d');?>">
				 				<input type="hidden" name="Time_p" value="<?php echo date('H-1-a');?>">
				 			</div>
				 				<div class="bl_1">
				 				<p>Описание</p><textarea name="Proj_Detail" placeholder="Описание"></textarea>
				 				</div>
				 			
			 				<input type="submit" class="btn_1" name="send"  value="Создать проект">

			 			</form>

			 		</div>
				</div>				
<?php include 'Footer.php';?>