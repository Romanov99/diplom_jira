<?php
header("Content-Type:text/html;charset=UTF-8");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>RVProger управление проектами</title>
	<link rel="stylesheet" type="text/css" href="../../ContrIT/css/main.css" charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../ContrIT/css/main_page.css" charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../ContrIT/css/form.css" charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../ContrIT/css/gantt.css" charset="utf-8">
	<meta name="description" content="управление проектами ">
	<meta name="keywords" content="управление проектами,Scrum доска ">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet"  href="../../ContrIT/css/fontawesome.min.css">
	
</head>
<body>
	<div id="wrapper">
		<div id="content">
			<header>
				<div id="logo"> 
					<a href="index.php" title="На главную">
						<img src="../../ContrIT/img/logo.png" title="RVProger" alt="RVProger">
						<span>RVProger</span>
					</a>
				</div>
				<div id="about">
					<a href="project.php" title="Проекты">Проекты</a>
					<a href="" title="Scrum доска">Scrum доска</a>
					<a href="otjot.php" title="Отчеты">Отчеты</a>
					<a href="gantt.php" title="Отчеты">Диаграмма Ганта</a>
				</div>
				
				<!--Понадобится пойже в регистрации -->
				<div id="reg_auth">
					
					<a href="" title="Войти в кабинет пользователя">
						<div class="btn">
							Войти
						</div>
					</a>
					<a href="" title="Зарегистрироваться на сайте ">
						<div class="btn">
							Регистрация
						</div>
					</a>
					<a href="index.php" title="Создать проект">
						<div class="btn">
							Создать проект
						</div>
					</a>
				</div>
			</header>

			<nav>
				<div id="main">
			 		<h2 class="heading">Создание проектов </h2>
			 		<div style="clear: both"><br></div>
			 		<div class="block">
			 			<form method="post" action="index.php">
			 				<div>
				 				<p>Имя</p><input type="text" name='Name_p' placeholder="Имя">
				 				<br>
				 				<p>ID</p><input type="text" name="ID_a" placeholder="ID">	
				 				<p>Руководитель</p><input type="text" name="Head_p" placeholder="Руководитель">
				 				<p>Начальный номер</p><input type="number" name="Number_p" placeholder="Номер">
				 				<input type="hidden" name="Date_p" value="<?php echo date('Y-m-d');?>">
				 				<input type="hidden" name="Time_p" value="<?php echo date('H-1-a');?>">
				 			</div>
				 				<div class="bl_1">
				 				<p>Описание</p><textarea name="Text_p" placeholder="Введите само сообщение"></textarea>
				 				</div>
				 			
			 				<input type="submit" class="btn_1" name="send"  value="Создать проект">

			 			</form>
			 			<?php
			 			$connection = mysql_connect("localhost","root","");
						$db = mysql_select_db("diplom");
						mysql_query(" SET NAMES 'utf-8' ");
						if(!$connection || !db)
						{
							exit(mysql_error());
						}

			 			if(isset($_POST["send"]))
			 			{
				 			$Name_p = strip_tags(trim($_POST['Name_p']));
				 			$ID_a = strip_tags(trim($_POST['ID_a'])); 
				 			$Head_p = strip_tags(trim($_POST['Head_p']));
				 			$Number_p = strip_tags(trim($_POST['Number_p']));
				 			$Date_p = $_POST['Date_p'];
				 			$Time_p = $_POST['Time_p'];
				 			$Text_p = strip_tags(trim($_POST['Text_p']));

				 			mysql_query(" INSERT INTO project(ID_a, Name_p, Head_p, Date_p, Time_p, Text_p, Number_p) VALUES ('$ID_a','$Name_p','$Head_p','$Date_p','$Time_p','$Text_p','$Number_p')");
				 				mysql_close();
				 				echo "Проект успешно создан можете перейти к вашему проекту <a href='project.php' >Проект</a>";
			 			}

			 			?>

			 		</div>
				</div>				
			</nav>
				
		</div>


		<footer>
			<div id="site_name">
				<span>RVProger</span>
			</div>
			<div id='clear'></div>
			<div id="footer_menu">
				<a href="" title="Поддержать проект ">Поддержка</a>
				<a href="" title="Написать письмо">Обратная связь</a>
			</div>
			<div id="rights">
				<a href="">Все права защищены &copy; <?=date ('Y')?></a>
			</div>
			

		</footer>
	</div>
</body>
</html>