<?php
header("Content-Type: text/html; charset=utf-8");
?>

<!DOCTYPE html>
<?php 
$Main_Folder='RemOborICT';
include_once($_SERVER["DOCUMENT_ROOT"]."/$Main_Folder/Main_Site_Settings.php");
?>
<html>
 <head>
	<title>Обратная связь/ГКУ МО МОЦ ИКТ</title>
	<meta charset="utf-8">
	<title><?=$title?></title>
	<link href="../<?=$Main_Folder?>/css/style.css" rel="stylesheet" type="text/css">
  
  
<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
  <script  type="text/javascript">
   $(document).ready (function () {
    $("#done").click (function () {
     $('#messageShow').hide ();
     var name = $("#name").val ();
     var email = $("#email").val ();
     var subject = $("#subject").val ();
     var message = $("#message").val ();
     var fail = "";
     if (name.length < 3) fail = "Имя не меньше 3 символов";
     else if (email.split ('@').length - 1 == 0 || email.split ('.').length - 1 == 0)
      fail = "Вы ввели некорректный адрес эл. почты";
     else if (subject.length < 5)
      fail = "Слишком маленькая тема";
     else if (message.length < 25)
      fail = "Слишком маленькое сообщение";
     if (fail != "") {
      $('#messageShow').html (fail + "<div class='clear'><br></div>");
      $('#messageShow').show ();
      return false;
     }
     $.ajax ({
      url: 'ajax/feedback.php',
      type: 'POST',
      cache: false,
      data: {'name': name, 'email': email, 'subject': subject, 'message': message},
      dataType: 'html',
      success: function (data) {
       $('#messageShow').html (data + "<div class='clear'><br></div>");
       $('#messageShow').show ();
      }
     });
    });
   });
  </script>﻿
 </head>
 <body>

 
<?php include 'Header.php';?>
  
  
  <div id = "logo">
		<a title="Обратная связь | Контакты">
			  Обратная связь | Контакты
		</a>
	</div>
	
	
		
  
   <div id="leftCol">
   <div id = "telephones">
		<a>
		Телефон администратора: +7 498 602-83-44, доб. 40-236	
		</a>
		<a>
		<p>Телефон директора: +7 498 602-83-44, доб. 54-505</p> 	
		</a>
	</div>
	
	
    <div id="feedback">
<form name="uniform" action="Add_Quest.php?FormType=d_quest" method="post">
     <input type="text" placeholder="ФИО" id="name" name="name"></input><br><br>
     <input type="text" placeholder="Email" id="email" name="email"></input><br><br>
     <input type="text" placeholder="Тема сообщения" id="subject" name="subject"></input><br><br>
     <textarea name="message" placeholder="Текст сообщения" id="message"></textarea><br>
     <div id="messageShow"></div>
     <input type="submit" name="done" id="done" value="Отправить">
</form>
    </div>
   </div>
 
<?php include 'Banner.php'; ?>
 
  </div>

<?php include 'Footer.php'; ?>
  
 </body>
</html>﻿