<?php 
####################################################################################
# Модуль выводит на экран форму для добавления данных в  таблицу заказов-заявок    #
# по специальному шаблону                                                          #
####################################################################################
session_start();
$Status          = $_SESSION['Status'  ];
$username        = $_SESSION['username'];
$FIO             = $_SESSION['FIO'];
if                ($_GET['service'])             //!!!//
$Service_Id      = $_GET['service'];
if                ($_GET[FormType])
                   $FormType=$_GET[FormType];                 
$KeyValue        = $Service_Id;                  // здесь это конкретный вид оборудования
require_once      'FirstKey_Search.php';         // получили все характеристики оборудования
$headers_obor    = $Table_Headers[$FormType];    // Сохраним имена столбцов выбранного оборудования (сервиса)
#
### Теперь готовим данные для занесения заказа в БД заказов ###
#
$FormType        ='c_orders';
require_once      'DB_Tables_Fields.php';        //!!!// 
# 'FormTypes.php' формируется программой 'DB_Tables_Fields.php'
#
require_once       'FormMsgs.php';
#
###
# В случае вызова модуля для заполнения включаются эти include-ы
include_once   'Header.php';                 // Общий заголовок веб-страниц проекта
include_once   'Table_Headers.php';          // Заголовки полей таблиц и форм таблиц
# Table_Headers_DB формируется программой 'DB_Tables_Fields.php'
include_once   'Any_Table_HTML_New.php';     // Класс для построения таблиц по 
                                             // Может быть использован в лругом варианте
#
$handler      = 'Tables_Handler.php?FormType='.$FormType;
                                             // обработчик настоящей формы
$headers      = $Table_Headers   [$FormType];// наименования столбцов (полей)таблиц 
$headers_db   = $Table_Headers_DB[$FormType];// наименования полей в таблицах БД
$head_color   = "silver";                    // ???
#
/*$form_headers = array(' Наименования полей',
                      ' Заносимые или обновляемые данные'
                      );
*/                      
# !!!
# Создаем объекты класса для вывода таблиц, вызываем конструктор !!!!
# Это в стандартной версии, но здесь специальный вид страницы и формы
# !!!
$Form_view   =  new HTML_Table($form_headers  , $head_color);    //!!!
# Заголовок формы страницы
print    '<p></p><center>
           <font color= "blue" >'                 
            .'<strong>ОФОРМИТЕ ЗАКАЗ-ЗАЯВКУ<strong>'.
            '</font>
                </center>
         <p></p>'; 
#
# построитель простых форм такого вида Universal_Forms_Builder.php
#
//include 'Universal_Forms_Builder.php';     // Может быть использовано в другой версии
include 'Order_Handler.php';
?> 
