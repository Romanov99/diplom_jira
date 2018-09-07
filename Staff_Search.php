<?php
header("Content-Type:text/html;charset=UTF-8");
include 'Header.php'                    // общий заголовок для всех страниц проекта 
?>
<?php 
####################################################################################
# Модуль производит расширенный поиск по полям - Doljnost (это навыки), Date_In    #
# (дата начала работы), Serteficat (ВУЗА)                                          #
#                                                                                  #
####################################################################################
#
$Arr_w                  =  array();
$Row_w                  =  array();
$FormType               = 'b_personal';
if ($_POST[Proj_Id])
    $Proj_Id            =  $_POST[Proj_Id];
if ($_POST[Proj_Nm])
    $Proj_Nm            =  $_POST[Proj_Nm];
$dbtable                =  $FormType;
#
# в ранних версиях был файл require_once 'Table_Headers_DB.php';
# Заголовки всех таблиц БД проекта, на английском формируются динамически
require_once 'DB_Tables_Fields.php';
#                 
# Класс для построения таблиц по заголовкам и содержанию таблиц
require_once 'Any_Table_HTML_New.php';

# Класс для работы с базой данных MySQL, описание в теле модуля   
require_once 'DB_Class.php';             
# 
# Заголовки всех таблиц веб проекта, которые появляются на экране 
include_once 'Table_Headers.php';
#
# Так мы делаем софт более независимым от конкретных таблиц БД
#
$headers    = $Table_Headers   [$FormType];// наименования столбцов таблицe 
$headers_db = $Table_Headers_DB[$FormType];// наименования доменов в таблице 
#                                          // БД и <input name's в формах
### ДОПОЛНИТЕЛЬНЫЙ СТОЛБЕЦ ДЛЯ ЗАКАЗА ###
$headers[]  = 'ВЫБРАТЬ';                       // наименованиЕ столбца для заказа 
#
# Создаем объекты класса для вывода таблиц, вызываем конструктор
#$handler     = $FormType.'_Handler';      // обработчик настоящей формы

#
# Объект класса работы с базой данных создается внутри модуля DB_Class.php
//$dbObj                 =  new MySQL_db(DB_HOST, DB_USER, DB_PWD, DB_NAME); 
#
#include 'Client_form_valid.php  // проверяет введенные данные

#******************************* Поиск по ключам ********************************
# то только записи соответствующие ввденным ключам будут найдены и выданы на экран 
#
if     (!($_POST["skils"]))                    // навыки
       $KeyValue1    = '%';                    // может быть пустым   
else   
       {
       $KeyValue1    = trim($_POST["skils"]); 
       $KeyValue1    = '%'.$KeyValue1.'%';
       }
#
if     (!($_POST["staj"]))                     // стаж, год начала работы
       $KeyValue2    = '%';                    // может быть пустым  
else                                           // 
       {
       	$KeyValue2    = trim($_POST["staj"]);
       	$KeyValue2    = '%'.$KeyValue2.'%'; 
       }
#
if     (!($_POST["sert"]))  
       $KeyValue3     = '%';
else   
       {
       	$KeyValue3    = trim($_POST["sert"]);// сертификат-вуз
                                             // 
       	$KeyValue3    = '%'.$KeyValue3.'%';  // 
       }
# 
if (($KeyValue1=="%")&&($KeyValue2=="%")&&($KeyValue3=="%"))
   {
	$msq  ='<font color="Red"> Ошибка! Введите данные для поиска</font>'; 
	include_once 'Entry_Search.php';
	exit;
   }
# поиск по нескольким ключам
else
   { 
   	 $KeyName0  =  $headers_db[0];
   	 $KeyName1  =  $headers_db[6];
   	 $KeyName2  =  $headers_db[4];
   	 $KeyName3  =  $headers_db[5];
	 $$FormType = $dbObj->query("SELECT * FROM  $dbtable 
	                                      WHERE $KeyName1 LIKE '$KeyValue1'
	                                      AND   $KeyName2 LIKE '$KeyValue2'
                                              AND   $KeyName3 LIKE '$KeyValue3'
	                                      ORDER BY '$KeyName0' ");	                                      

   }
# возвращает массив ассоциативных массивов (см. класс DB_Class.php)   
# по сути двумерный массив, поэтому используем конструкцию foreach
# это можно увидеть убрав знак # перед print см. ниже. Таким образом
# формируются массивы для вывода на экран, даже если таблица состоит
# из одной строки (как в случае поиска)
#
if ($$FormType==false)
   {
	$msq  ='<font color="Red"> Запись не найдена в таблице</font>'; 
	include_once 'View_Table_Personal.php';                   //!!!!!//
	exit;
   }
else              
   {       
    $NC  = count($$FormType);
//  print '$NC='.$NC;
//  print '<pre>'; print_r($$FormType); print '</pre>'; 
   } 
$head_color   = 'silver';
$Table_view   =  new HTML_Table($headers , $head_color);         
foreach ($$FormType as $row    => $Arr_w)
    	{
    	 $i=0;	
    	 foreach ($headers_db as $element) 
    	         {
    	 	  $Row_w = array_merge($Row_w, array($headers[$i] => $Arr_w[$headers_db[$i]]) );
    	 	  $$headers_db[$i] = $Arr_w[$headers_db[$i]];
    	          $i++;
    	 	 }
         $Sotrudnik_Id  =   $Arr_w[$headers_db[0]];
         $Sotrudnik_FIO =   $Arr_w[$headers_db[1]];
         $Doljnost      =   $Arr_w[$headers_db[2]];
         $order_link    = "<a href='../../ContrIT/Add_In_Group.php?Proj_Id=$Proj_Id&Proj_Nm=$Proj_Nm&Sotrudnik_Id=$Sotrudnik_Id&Sotrudnik_FIO=$Sotrudnik_FIO&Doljnost=$Doljnost'>включить в группу</a>";
         $Row_w = array_merge($Row_w, array($headers[$i] => $order_link));		
    	 $Table_view ->  AddRowAssArr($Row_w);
        }
print "				<div id=\"main\">
			 		<h2 class=\"heading\">ФОРМИРОВАНИЕ ГРУППЫ ПРОЕКТА $Proj_Id</h2>
                                        <br><br><h3>$msg</h3> 
			 		<div style=\"clear: both\"><br></div>
      ";
#                     
//print "<p><font color='red'><strong>Сотрудники</strong>&nbsp$msg1&nbsp</font></p>";
$Table_view -> PrintArr();          // таблица 'Staff' - все назначения на текущий момент
print '</div>';  
include 'Form_Buttons_Staff.php';
//print "<p><a href='Tables_Handler.php?FormType=$FormType'>Просмотр всей таблицы персонала</a>";
include 'Footer.php';               // стандартная нижняя строка каждой страницы
#        
?>