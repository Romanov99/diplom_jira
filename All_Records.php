<?php 
####################################################################################
# Модуль выводит на экран содержимое таблицы $FormType                             #
####################################################################################
#
require_once   'DB_Tables_Fields.php';      //считывает имена всех таблиц и полей БД
# Класс для работы с базой данных MySQL, описание в теле модуля   
# require_once 'DB_Class.php';
# Объект класса работы с базой данных создается внутри модуля DB_Class.php
# $dbObj     =  new MySQL_DB(DB_HOST, DB_USER, DB_PWD, DB_NAME); 
### 
# Так мы делаем софт более независимым от конкретных таблиц БД
#
# Заголовки всех таблиц веб проекта, которые появляются на экране 
include_once  'Table_Headers.php';          //!!!// если уже созданы русские заголовки
#
$headers     = $Table_Headers   [$FormType];// наименования столбцов таблицe 
$headers_db  = $Table_Headers_DB[$FormType];// наименования доменов в таблице 
#                                           // БД из 'DB_Tables_Fields.php'
#
#запрос на выдачу всей таблицы  
#
if ($KeySearch=='')
    $QueryResult = $dbObj->query("SELECT * FROM $FormType");
else
    $QueryResult = $dbObj->query("SELECT * FROM $FormType WHERE $headers_db[0]='$KeySearch' ");
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
    $NA  = count($QueryResult);
    //print '$NA='.$NA;
    //print '<pre>'; print_r($QueryResult); print '</pre>'; 
   } 
//$i=0;	    
//foreach ($QueryResult as $row    => $Arr_acc)
//    	{
//       $Id[$i]        = $QueryResult[$i][Serv_Id];
//       $Title[$i]     = $QueryResult[$i][Serv_Name];
//       $Pictures[$i]  = $QueryResult[$i][Serv_Picture];
//       print '<br>'.$Id[$i].': '.$Title[$i];
//       $i++;
//      }   
# 
?>