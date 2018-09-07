<?php 
####################################################################################
# Модуль выводит на экран содержимое базы данных любых таблиц. Добавляет, обновляет#
# или удаляет запись(строку) данных в таблице.                                     #
####################################################################################
#
session_start();
$Status  = $_SESSION['Status'  ];
$username= $_SESSION['username'];
$FIO     = $_SESSION['username'];
#
if ($_GET[FormType])
$FormType     = $_GET[FormType];
$Arr_acc      =  array();
$Row          =  array();
require_once 'DB_Tables_Fields.php';                 //!!!//
#
//require_once 'FormMsgs.php';
$dbtable      = $FormType;
# Класс для построения таблиц по заголовкам и содержанию таблиц
require_once 'Any_Table_HTML_New.php';

# Класс для работы с базой данных MySQL, описание в теле модуля   
require_once 'DB_Class.php';                         //???//
# 
# Заголовки всех таблиц веб проекта, которые появляются на экране 
include_once 'Table_Headers.php';
#
# Заголовки всех таблиц БД проекта, на английском 
//require_once 'Table_Headers_DB.php';               //!!!//
#
# Так мы делаем софт более независимым от конкретных таблиц БД
#
$headers    = $Table_Headers   [$FormType];// наименования столбцов таблицe 
$headers_db = $Table_Headers_DB[$FormType];// наименования доменов в таблице 
#                                          // БД и <input name's в формах
# Создаем объекты класса для вывода таблиц, вызываем конструктор
#$handler     = $FormType.'_Handler';      // обработчик настоящей формы
$head_color   = 'silver';
$Table_view   =  new HTML_Table($headers , $heard_color);
#
# Объект класса работы с базой данных создается внутри модуля DB_Class.php
//$dbObj                 =  new MySQL_DB(DB_HOST, DB_USER, DB_PWD, DB_NAME); 
#
#include 'Client_form_valid.php  // проверяет введенные данные
#************************ Добавление Обновление **************************
#
#    Добавление записи в таблицу БД. Данные передаются методом POST из 
# Forms_Main.php. Нажата кнопка Добавить.
# При обновлениии данных, просто удаляется предыдущая и заносится новая.
#    Кнопки тоже вписываются в таблицы; Особенность в NAME='UpdPro'Первый раз 
# пользователь нажимает кнопку Update, под списком всех строк таблицы,
# например, сотрудников. Предполагается обновление только одной записи.
# А в форме Forms_Main происходит повторное нажатие "изменить", обрабатывает
# один и тот же _Handler. Он "должен знать" откуда запрос на обработку. 
#
if ($_GET["staffsearch"])
    $Staff_Search =true;
if ((isset($_POST["Add"]))||(isset($_POST["UpdPro"])))   // после нажатия кнопки в Form_Button.php
   { 
   	                                                 // "UpdPro" - это после обновления                       
     $i=0;                                               // данных в форме Forms_Main.php
   	 foreach ($headers_db as $element)
   	 {
   	  $$headers_db[$i] = $_POST[$headers_db[$i]];
   	  $Str2.=",'".$$headers_db[$i]."'";
   	  $i++;	
   	 }
     $Str2=substr($Str2,1);
     $$headers_db[0]  = substr($$headers_db[0],0,10);    // в первой колонке всегда первичный ключ 
     if (isset($_POST["UpdPro"]))
        {
         $KeyName = $headers_db[0];
         $KeyValue= $$headers_db[0];	
    	 $Del     = $dbObj->query("DELETE FROM $dbtable WHERE $KeyName='$KeyValue'");
	 	 if ($Del == false) $msg1= 'Ошибка обновления данных! ';
        }
     foreach ($FormTypes as $current) 
        {
         if ($FormType==$current){
 	        include 'Request_SQL.php';    //The result in $QueryResult 
            }                                 //
        }   
    if ($QueryResult==1)  $msg1  = 'Новые данные успешно добавлены '; 
    else                  $msg1  = "При вводе данных произошла ошибка! 
                                    Данные уже есть в таблице ";
//  echo                  $msg1;
  } 

#******************************* Поиск-Удаление ********************************
# Если данные передаются методом POST из _Handler.php при нажатии кнопки "Найти",
# то только записи соответствующие ввденному ключу будут надены и выданы на экран 
# в данном примере
#
if ( (isset($_POST["Search"]))||
     (isset($_POST["Delete"]))||
     (isset($_POST["Update"])))
   {
     $KeyValue = $_POST["$headers_db[0]"];
   } 
#             
#запрос на выдачу всей таблицы или результата поиска, если поиска нет
if (!$KeyValue)
   {
     $KeyName     = $headers_db[0];
     $QueryResult = $dbObj->query("SELECT * FROM $dbtable ORDER BY '$KeyName' ");
   }
else
# если поиск с целью поиска, удаления или обновления
   {
   	 $KeyName         = $headers_db[0];
	 $QueryResult     = $dbObj->query("SELECT * FROM $dbtable WHERE $KeyName ='$KeyValue' ORDER BY '$KeyName' ");
	 if ($QueryResult==false)
	    {
	     $msg1        ='Запись не найдена в таблице';
	     $QueryResult = $dbObj->query("SELECT * FROM $dbtable ORDER BY '$KeyName' ");
	    }
	 else
	    {
	     if ($_POST["Delete"]) $del  = $dbObj->query("DELETE FROM $dbtable WHERE $KeyName='$KeyValue'");
	     if ($del != false) {
                                 $msg1= 'Запись удалена ';
                                 include 'Next_Page.php';
                                }
	    }
   }
# возвращает массив ассоциативных массивов (см. класс DB_Class.php)   
# по сути двумерный массив, поэтому используем конструкцию foreach
# это можно увидеть убрав знак # перед print см. ниже. Таким образом
# формируются массивы для вывода на экран, даже если таблица состоит
# из одной строки (как в случае поиска)
#
if ($QueryResult==false)  
   {
    $msg = 'Нет записей в базе данных!';
   }
else              
   {       
    $NC  = count($QueryResult);
    //print '$NC='.$NC;
    //print '<pre>'; print_r($QueryResult); print '</pre>'; 
   }        
foreach ($QueryResult as $row    => $Arr_acc)
    	{
    	 $i=0;	
    	 foreach ($headers_db as $element) 
    	         {
    	 	      $Row = array_merge($Row, array($headers[$i] => $Arr_acc[$headers_db[$i]]) );
    	 	      $$headers_db[$i] = $Arr_acc[$headers_db[$i]];
    	 		  $i++;
    	 	     }	
    	 $Table_view ->  AddRowAssArr($Row);
        }
if  (isset($_POST["Update"]))
    {
	 header("Location: ".$DOCUMENT_ROOT."/ContrIT/Forms_Main_Frame.php?FormType=$FormType&operation=UPD&KeyValue=$KeyValue&msg1=$msg1"); 
         //header("Location: http://www.diofant.com/ContrIT/Forms_Main_Frame.php?FormType=$FormType&operation=UPD&KeyValue=$KeyValue&msg1=$msg1");
         exit;
         //include 'Forms_Main_Frame.php';  exit;
    }
#                     
#include'Header.php';               // общий заголовок для всех страниц проекта 
//print "<p></p><font color='blue'><strong>$All_Tables_Names_Acc[$FormType]</strong>&nbsp$msg1&nbsp</font>";
$Table_view -> PrintArr();          // таблица 'Staff' - все назначения на текущий момент
if ($Staff_Search){
    include 'Form_Buttons_Staff.php';
    exit;	
}
/*
if (!$KeyValue){
	include 'Form_Buttons.php'; // простая форма для работы с таблицей; с кнопками 
}                                   // удаления,поиска, обновл.,если просмативается вся таблица
*/
print '<p><a href="All_Tables_Frame.php">Просмотр структуры всех таблиц</a>';
print "<a href=\"Forms_Main_Frame.php?FormType=$FormType&operation=ADD\"><h4>Добавить новую запись</h4></a>";
 
if ($Status=='Admin'){
if (!$KeyValue){
	include 'Form_Buttons.php'; // простая форма для работы с таблицей; с кнопками 
}                                   // удаления,поиска, обновл.,если просмативается вся таблица

//print '<p><a href="All_Tables_Frame.php">Просмотр структуры всех таблиц</a>';
//print "&nbsp&nbsp&nbsp<a href=\"Forms_Main_Frame.php?FormType=$FormType&operation=ADD\">Добавить новую запись</a>";
//print '&nbsp&nbsp&nbsp<a href="Tables_Handler.php?staffsearch=Yes">Расширенный поиск</a></p>';
}
#include 'Footer.php';               // стандартная нижняя строка каждой страницы
#        
?>