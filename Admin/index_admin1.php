<?php
session_start();
$areaname  =$_GET["areaname"];
$Status    ='Admin';
#
//http://php.benscom.com/manual/ru/features.http-auth.php 
// maybe we have caught authentication data in $_SERVER['REMOTE_USER']
//if((!$_SERVER['PHP_AUTH_USER'] || !$_SERVER['PHP_AUTH_USER'])
//    && preg_match('/Basics+(.*)$/i', $_SERVER['REMOTE_USER'], $matches)) 
//{
//    list($name, $password) = explode(':', base64_decode($matches[1]));
//    $_SERVER['PHP_AUTH_USER'] = strip_tags($name);
//    $_SERVER['PHP_AUTH_PW']   = strip_tags($password);
//    $username  =$_SERVER["PHP_AUTH_USER"];
//    $passwd    =$_SERVER["PHP_AUTH_PW"];
    
//}
$username=$_SERVER['REMOTE_USER'];
$_SESSION['username'] = $username;
$_SESSION['Status'  ] = $Status;
$FormType             = 'c_clients';
$KeyValue             = $username;
include  ($_SERVER["DOCUMENT_ROOT"]."/ContrIT/FirstKey_Search.php");
$FIO                  = $$headers_db[4];
$_SESSION['FIO'     ] = $$headers_db[4];
$_SESSION['email'   ] = $$headers_db[6];  
print '
       <p></p>
       <p></p>       
       <table bgcolor="#999999" border="0" height=8 width="860" cellpadding="1" cellspacing="1" align="center">
           <tr>
              <td align="left"  bgcolor="#FFFFFF">
      ';
print '
       <center> 
               <img src = "../../ContrIT/img/lock_gre.gif">&nbsp;
       </center>
      ';
print "
       <center> 
               <br><font color='Maroon' size='5'>Добро пожаловать <br> ".$FIO.'!</font>
               </font> 

       ';
?>
 
<p>
<font color="Maroon" size="5">  	   
<img src = '../../ContrIT/img/ClientsSmall.jpg'>
<br>
<a href  = "../../ContrIT/Tables_Handler_Frame.php?FormType=a_projects">
       Просмотр и обновление проектов наших клиентов 
</a>
<!-- //-->
<br>
<img src = '../../ContrIT/img/ClientsSmall.jpg'>
<br>
<a href  = "../../ContrIT/Tables_Handler_Frame.php?FormType=8_quest">
       Просмотр сообщений,вопросов посетителей сайта 
</a>
<!-- //-->  
<br>	   
<img src = '../../ContrIT/img/OneClientSmall.jpg'>
<br>
<a href  = "../../ContrIT/Tables_Handler_Frame.php?FormType=7_review">
       Просмотр отзывов клиентов о выолнении заказов
</a>

<!-- //-->
<br>
<img src = '../../ContrIT/img/Comments.jpg'>
<br>
<a href  = "../../ContrIT/All_Tables_Frame.php">
       Просмотр и обработка всей базы данных системы
</a>

<!-- 
<br>
<img src = '../../ContrIT/img/Comments.jpg'>
<br>
<a href  = "../../ContrIT/1Key_Search_Frame.php?FormType=7_review&IndSearch=0&KeyValue=<?=$FIO;?>&FIO=<?=$FIO?>">
       Просмотр моих сообщений 
</a>
//-->   
</p>
</font>

<br>
<br> 

</p>
</center>
</td>
</tr>
</table>
