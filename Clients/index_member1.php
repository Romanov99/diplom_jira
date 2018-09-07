<?php
session_start();
$areaname  =$_GET["areaname"];
$Status    ='Клиент';
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
include  ($_SERVER["DOCUMENT_ROOT"]."/RemOborICT/FirstKey_Search.php");
#
### Эта часть зависит от структуры таблицы клиентов. Сохраняем все, что надо ###
#
$FIO                        = $$headers_db[4];
$_SESSION['FIO'           ] = $$headers_db[4];
$_SESSION['Object_Type_Id'] = $$headers_db[2];
$_SESSION['Object_Nm'     ] = $$headers_db[3]; 
$_SESSION['email'         ] = $$headers_db[7]; 
# 
print '
       <p></p>
       <p></p>       
       <table bgcolor="#999999" border="0" height=8 width="860" cellpadding="1" cellspacing="1" align="center">
           <tr>
              <td align="left"  bgcolor="#FFFFFF">
      ';
print '
       <center> 
               <img src = "../../RemOborICT/img/lock_gre.gif">&nbsp;
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
<img src = '../../RemOborICT/img/OneClientSmall.jpg'>
<br>
<a href  = "../../RemOborICT/1Key_Search_Frame.php?FormType=c_orders&IndSearch=1&KeyValue=<?=$username;?>&FIO=<?=$FIO?>">
       Просмотр&nbsp;&nbsp моих&nbsp;&nbsp;заявок 
</a>
<!--   //-->
<br>
<img src = '../../RemOborICT/img/ClientsSmall.jpg'>
<br>
<a href="../../RemOborICT/categories.php">
       Информация об оборудовании и формление заказа-заявки.<br> Выберите оборудование и кликните по ссылке. 
</a>
<!--   //-->
<br>
<img src = '../../RemOborICT/img/Comments.jpg'>
<br>
<a href  = "../../RemOborICT/1Key_Search_Frame.php?FormType=d_review&IndSearch=0&KeyValue=<?=$FIO;?>&FIO=<?=$FIO?>">
       Просмотр моих сообщений 
</a>   
</p>
</font> 

</p>
       </center>
</td>
 </tr>
</table>
