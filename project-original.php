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
			 		<h2 class="heading">Проекты </h2>
			 		<div style="clear: both"><br></div>
			 		<div class="block">
			 		
			 			<?php
			 			$connection = mysql_connect("localhost","root","");
						$db = mysql_select_db("diplom");
						mysql_query(" SET NAMES 'utf-8' ");
						if(!$connection || !db)
						{
							exit(mysql_error());
						}

			 			$result = mysql_query("SELECT * FROM project");
			 			mysql_close();

			 			while($row = mysql_fetch_array($result))
			 			{?>
			 				<h1><?php echo $row['Name_p'] ?> </h1> 
			 				<p><?php echo $row['ID_a'] ?></p>
			 				<p>Руководитель проекта: <?php echo $row['Head_p'] ?></p> 
			 				<p><?php echo $row['Number_p'] ?></p> 
			 				<p>Дата создания проекта: <?php echo $row['Date_p'] ?> / <?php echo $row['Time_p'] ?></p> 
			 				<p><?php echo $row['Text_p'] ?></p> 

			 			<?php } ?>

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