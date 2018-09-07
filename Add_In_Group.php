<?php 
####################################################################################
# Добавление записи в любую таблицу БД                                             #
# Входным параметром является имя таблицы БД FormType                              #
# (т.к.каждой таблице соответствует форма)                                         #
# Параметр передается по GET, или непосредственным заданием значения               #
# Определяются все поля таблицы. Формируется строка через запятую.                 #
# Так мы делаем софт более независимым от конкретных таблиц БД                     #
####################################################################################
#
session_start();
$Status  = $_SESSION['Status'  ];
$username= $_SESSION['username'];
$FIO     = $_SESSION['username'];
#
$FormType='c_groups';                                // можно через GET
if ($_GET[FormType])
$FormType     = $_GET[FormType];
#
require_once 'DB_Tables_Fields.php';                 // Считывание всех таблиц БД
#
$dbtable     = $FormType;
#
# Класс для работы с базой данных MySQL, описание в теле модуля 'DB_Tables_Fields.php';  
# 
# Заголовки всех столбцов таблиц, которые появляются на экране. Формируем сами. 
include_once 'Table_Headers.php';
#
# Так мы делаем софт более независимым от конкретных таблиц БД
#
$headers    = $Table_Headers   [$FormType];          // Наименования столбцов в таблицe на русском 
$headers_db = $Table_Headers_DB[$FormType];          // Наименования доменов в таблице БД 
#                                                    // как результат DB_Tables_Fields.php 
# Объект класса работы с базой данных создается внутри модуля DB_Class.php
#
#include 'Client_form_valid.php  // проверяет введенные данные
#
#    Добавление записи в таблицу БД. Данные передаются методом POST из 
#    Forms_Main.php. Нажата кнопка Добавить. Или из другой формы.
#
#    Параметры должны соответствовать Link-у из View_Table_Personal.php?Proj_Id=a100000002&
#                                                                       Proj_Nm=$Proj_Nm&
#                                                                       Sotrudnik_Id =$Sotrudnik_Id&
#                                                                       Sotrudnik_FIO=$Sotrudnik_FIO&
#                                                                       Doljnost     =$Doljnost
$i=0;
foreach ($headers_db as $element)
   	{                                           // $$headers_db[$i]-значения полей, данные
   	  $$headers_db[$i] = $_GET[$headers_db[$i]];
   	  $Str2.=",'".$$headers_db[$i]."'";
   	  $i++;	
   	}
/*
$i=0;
foreach ($headers_db as $element)
   	{                                           // $$headers_db[$i]-значения полей, данные
   	  $$headers_db[$i] = $_POST[$headers_db[$i]];
   	  $Str2.=",'".$$headers_db[$i]."'";
   	  $i++;	
   	}
*/
$Str2=substr($Str2,1);                              // Это список данных для занесения в БД через запятую
$$headers_db[0]  = substr($$headers_db[0],0,10);    // в первой колонке всегда первичный ключ ???
#                                                   // или ключ формируется (или нет) в форме 
foreach ($FormTypes as $current)                    // FormTypes[] из DB_Tables_Fields.php 
        {
         if ($FormType==$current){
 	        include 'Request_SQL.php';          //The result in $QueryResult 
            }                                       //
        }   
if ($QueryResult==1)  
   { $msg1  = 'Новые данные успешно добавлены '; 
     if ($FormType=='c_clients')                    // 19-10-2017 !!!
         include 'Add_Record_Htpass.php';           // Добавляется Погин:Пароль в htpass
   }
else                  $msg1  = "При вводе данных произошла ошибка! 
                                Данные уже есть в таблице ";
//echo                $msg1;
if ($FormType=='c_clients')
header("Location:".$DOCUMENT_ROOT."/ContrIT/Result.php?msg1=$msg1&FormType=$FormType");
else
header("Location:".$DOCUMENT_ROOT."/ContrIT/Tables_Handler_Frame.php?msg1=$msg1&FormType=$FormType");
exit;
//include 'Result.php'; все портит
?>