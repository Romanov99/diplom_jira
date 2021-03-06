﻿<?php
header("Content-Type:text/html;charset=UTF-8");
include_once 'Header.php'
?>
<?php 
####################################################################################
# Модуль выводит на экран содержимое таблицы БД персонала с формами для поиска по  #
# навыкам программирования по языкам с тремя полями для каждой формы               #
# Первая форма предполагает поиск по сумме навыков: например, html И php И perl    #
# Вторая форма предполагает поиск по альтернативным: html ИЛИ php ИЛИ perl, т.е.   #
# хотя бы по одному из этих языков.                                                # 
# Отличие от предыдущего модуля, таким образом, только в форме для поиска.         #
# Если ввести дополнительный параметр при вызове, то можно сохранить обычный поиск #
# с этим новым поиском                                                             #        
####################################################################################
#
include_once              'DB_Tables_Fields.php';  //!!!//
$Arr_acc                =  array();
$Row                    =  array();
if ($_GET[Proj_Id])
    $Proj_Id            =  $_GET[Proj_Id];
if ($_GET[Proj_Nm])
    $Proj_Nm            =  $_GET[Proj_Nm];
#
$FormType               = 'b_personal';
$dbtable                =  $FormType;
#
$head_color   = 'silver';
# Класс для построения таблиц по заголовкам и содержанию таблиц
require_once 'Any_Table_HTML_New.php';

# Класс для работы с базой данных MySQL, описание в теле модуля   
# require_once 'DB_Class.php'. Внутри DB_Tables_Fields.php;
# Объект класса работы с базой данных создается внутри модуля DB_Class.php
# $dbObj                 =  new MySQL_DB(DB_HOST, DB_USER, DB_PWD, DB_NAME); 
### 
# Так мы делаем софт более независимым от конкретных таблиц БД
#
# Заголовки всех таблиц веб проекта, которые появляются на экране 
include_once 'Table_Headers.php';              //!!!// если уже созданы русские заголовки
#
# Заголовки всех таблиц БД проекта, на английском 
# require_once 'Table_Headers_DB.php';         //!!! В этой версии загружаются из БД
#                                              // на лету рограммой DB_Tables_Fields.php 
#require_once 'Header.php';                    // заголовок для страниц проекта 
require_once 'FormMsgs.php';                   // Заголовки таблиц БД на русском
#
$headers    = $Table_Headers   [$FormType];    // наименования столбцов таблицe 
$headers_db = $Table_Headers_DB[$FormType];    // наименования доменов в таблице 
#                                              // БД и <input name's в формах
### ДОПОЛНИТЕЛЬНЫЙ СТОЛБЕЦ ДЛЯ ЗАКАЗА ###
$headers[]  = 'ВЫБРАТЬ';                       // наименованиЕ столбца для заказа 
#    
###
# Создаем объекты класса для вывода таблиц, вызываем конструктор
# $handler     = $FormType.'_Handler'; // обработчик настоящей формы
#
$Table_view =  new HTML_Table($headers , $heard_color); 
#
#запрос на выдачу всей таблицы  
#
$QueryResult = $dbObj->query("SELECT * FROM $dbtable ORDER BY Sotrudnik_FIO ");
# возвращает массив ассоциативных массивов (см. класс DB_Class.php)   
# по сути двумерный массив, поэтому используем конструкцию foreach
# это можно увидеть убрав знак # перед print см. ниже. Таким образом
# формируются массивы для вывода на экран для каждой таблицы
#
if ($QueryResult==false)   
   {
    $msg = 'Нет записей в базе данных!';
   }
else              
   {       
    //$NA  = count($QueryResult);
    //print '$NA='.$NA;
    //print '<pre>'; print_r($QueryResult); print '</pre>'; 
   }
$j=1;   // счетчик количества записей     
foreach ($QueryResult as $row    => $Arr_acc)
    	{
    	 $i=0;	
    	 foreach ($headers_db as $element) 
    	         {
    	 	      if ($i==0) 
                      $Row = array_merge($Row, array($headers[$i] => "$j"));  // был код, но часто этого не хотят
                      else
    	 	      $Row = array_merge($Row, array($headers[$i] => $Arr_acc[$headers_db[$i]]) );
    	 	      $i++;
    	 	 }
         $Sotrudnik_FIO =   $Arr_acc[$headers_db[1]];
         $Doljnost      =   $Arr_acc[$headers_db[2]];
         $Skils         =   $Arr_acc[$headers_db[6]];
         $order_link    = "<a href='../../ContrIT/Add_In_Group.php?Proj_Id=$Proj_Id&Proj_Nm=$Proj_Nm&Doljnost=$Doljnost&Sotrudnik_FIO=$Sotrudnik_FIO&Skils=$Skils'>включить в группу</a>";
         $Row = array_merge($Row, array($headers[$i] => $order_link));	
    	 $Table_view   ->  AddRowAssArr($Row);
         $j++;
        } 
print "				<div id=\"main\">
			 		<h2 class=\"heading\">ФОРМИРОВАНИЕ ГРУППЫ ПРОЕКТА $Proj_Id</h2>
                                        <br><br><h3>$msg</h3> 
			 		<div style=\"clear: both\"><br></div>
      ";
$Table_view   ->  PrintArr();
#
include 'Form_Buttons_Staff_Mod.php'; // это новая форма поиска по навыкам
print '</div>';  
//include 'Form_Buttons_Staff_Mod.php'; // это новая форма поиска по навыкам
include 'Footer.php';                 // стандартная нижняя строка каждой страницы
#      
?>