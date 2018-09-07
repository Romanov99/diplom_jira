<?php
include      'Header.php';
print "
<p></p>
<table bgcolor='#999999' border='0' height='8' width='1240' cellpadding='1' cellspacing='1' align='center'>
  <tr>
  <td align='center'  bgcolor='#FFFFFF'>
";
/*
$areaname  =$_GET["areaname"];
$username  =$_SERVER["PHP_AUTH_USER"];
$passwd    =$_SERVER["PHP_AUTH_PW"];
$Status    ='Руководитель';
$username=$_SERVER['REMOTE_USER'];
*/
###
if (!$msq)
     print "<br><strong>Добро пожаловать ".$username.'!</strong>';
else print "<br><strong>$msq</strong>";
//print "<br><strong>Hello ".$name.'<br>You have been successfully authorized!</strong>';
//print "<br><strong>Hello ".$server_remote_user.'<br>You have been successfully authorized!</strong>';
print "<br><img src = '../../Control_RegDoc/Pictures/lock_gre.gif'>&nbsp;";
include 'Form_Buttons_Staff.php'; 
print   '<strong><font color="Silver"> ( Примеры: 1. инсп , 6 - инспекторы со стажем 6 лет
                                                  2. мен - все менеджеры
                                       )           
         </font></strong>';
print   "<br><img src = '../../Control_RegDoc/Pictures/lock_gre.gif'>&nbsp;";
include 'Form_Buttons_Equip.php'; 
print   '<strong><font color="Silver"> ( Примеры: 1. Mitr, 2016      - Mitridat за 2016 год
                                         <br>Если только дата, то за определенный период 2016-01 - январь
                                       )
         </font></strong>';
print   "<br><img src = '../../Control_RegDoc/Pictures/lock_gre.gif'>&nbsp;";
include 'Form_Buttons_AllDB.php'; 
print   '<strong><font color="Silver"> ( Примеры: 1. Урбан  - поиск по части слова, фамилия
                                                  2. Диоф   - входит в название компании клиента банка  
                                       )
         </font></strong>';
      
print   "<br><br>---
</td>
</tr>
</table>";
include 'Footer.php';
?>