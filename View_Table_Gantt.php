<?php 
####################################################################################
# Модуль выводит на экран содержимое таблицы БД.                                   #
# Входнымv параметрами яляются имя формы таблицы БД                                #
# количество выводимых записей БД-$n, по умолчанию выводятся все записи            #
# формируется дополнительная колонка со ссылкой на заказ                           #
####################################################################################
#
include_once              'DB_Tables_Fields.php';  //!!!//
$Arr_acc                =  array();
$Row                    =  array();
if ($_GET[FormType])
    $FormType           =  $_GET[FormType];
#
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
//$headers[]  = 'ВЫБРАТЬ';                       // наименованиЕ столбца для заказа 
#    
###
# Создаем объекты класса для вывода таблиц, вызываем конструктор
# $handler     = $FormType.'_Handler'; // обработчик настоящей формы
#
$Table_view =  new HTML_Table($headers , $heard_color); 
#
#запрос на выдачу всей таблицы  
#
$QueryResult = $dbObj->query("SELECT * FROM $dbtable");
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
foreach ($QueryResult as $row    => $Arr_acc)
    	{
    	 $i=0;	
    	 foreach ($headers_db as $element) 
    	         {
    	 	      $Row = array_merge($Row, array($headers[$i] => $Arr_acc[$headers_db[$i]]) );
    	 	      $i++;
    	 	 }
         $Proj_Id    =   $Arr_acc[$headers_db[0]];
         $Proj_Nm    =   $Arr_acc[$headers_db[2]];
         //$order_link = "<a href='../../ContrIT/View_Table_Personal.php?Proj_Id=$Proj_Id&Proj_Nm=$Proj_Nm'>СОЗДАТЬ ГРУППУ</a>";
         $Row = array_merge($Row, array($headers[$i] => $order_link));	
    	 $Table_view   ->  AddRowAssArr($Row);
        } 
$Table_view  ->  PrintArr();
print "<br><a href=\"Forms_Main_Frame.php?FormType=$FormType&operation=ADD\"><h4>Добавить новую запись</h4></a>";
#   
# include 'Footer.php';             // стандартная нижняя строка каждой страницы
#      
?>