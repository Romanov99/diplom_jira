<?php
$Table_Headers = 
Array
(
  'a_projects' => Array                                 # Проекты 
        (
            'Код (Номер)  Проекта'                    , # [0] => Proj_Id 
            'Код (Номер)  Клиента'                    , # [1] => Client_Id          
            'Наименование Проекта'                    , # [2] => Proj_Nm             
            'Детализация проекта'                     , # [3] => Proj_Detail           
            'ФИО Администратора'                      , # [4] => Proj_Admin           
            'Стоимость'                               , # [5] => Proj_Price              
        ),
        
  'b_personal' => Array                                 # Персонал 
        (
            'Код (Номер) сотрудника'                  , # [0] => Sotrudnik_Id 
            'ФИО Сотрудника'                          , # [1] => Sotrudnik_FIO          
            'Должность'                               , # [2] => Doljnost             
            'Телефон'                                 , # [3] => Telefon           
            'Стаж работы'                             , # [4] => Date_In           
            'Наличие сертификата'                     , # [5] => Sertefikat
            'Комментарии'                             , # [6] => Comments              
        ),

  'c_clients' => Array
        (
            'ИДЕНТЕФИКАТОР (логин)'                   , # [0] => Client_Id 
            'ПАРОЛЬ'                                  , # [1] => Client_Pass             
            'КОД КОМПАНИИ'                            , # [2] => Object_Type_Id
            'НАИМЕНОВАНИЕ КОМПАНИИ'                   , # [3] => Object_Nm
            'ФИО ПРЕДСТАВИТЕЛЯ'                       , # [4] => Client_FIO
            'ДОЛЖНОСТЬ'                               , # [5] => Client_Level
            'ТЕЛЕФОН МОБИЛЬНЫЙ'                       , # [6] => Client_Ph
            'ЭЛЕКТРОННЫЙ АДРЕС'                       , # [7] => Client_Em
        ),

  'c_orders' => Array
        (
            'Код заказа'                              , # [0] => Order_Id
            'Идентификатор клиента'                   , # [1] => Client_Id
            'ФИО клиента'                             , # [2] => Object_Type_Id
            'Дата заказа'                             , # [3] => Order_Date
            'Код оборудования'                        , # [4] => Serv_Id
            'Наименование'                            , # [5] => Serv_Nm
            'Характеристика 1'                        , # [6] => Serv_1
            'Характеристика 2'                        , # [7] => Serv_2
            'Характеристика 3'                        , # [8] => Serv_3
//          'Код объекта'                             , # [9] => Serv_4
            'Примечание'                              , # [9] => Client_Text
        ), 

    'c_orders_result' => Array
        (
            'Номер Заказа'                            , # [0] => Order_Id
            'Код клиента'                             , # [1] => Client_Id
            'Дата заказа'                             , # [2] => Order_Date
            'Дата начала'                             , # [3] => Ex_Date_Beg
            'Дата завершения (менеджер)'              , # [4] => Ex_Date_End
            'Код услуги (менеджер)'                   , # [5] => Serv_Id
            'Наименование услуги'                     , # [6] => Serv_Nm
            'Количество'                              , # [7] => Order_Qu
            'Цена услуги (менеджер)'                  , # [8] => Serv_Cost
            'Код подразделения (менеджер)'            , # [9] => Dep_Id
            'Примечания заказчика'                      # [10]=> Order_Com
        ),

    'c_services' => Array
        (
            'Код услуги'                              ,  # [0] => Serv_Id
            'Наименование услуги'                     ,  # [1] => Serv_Nm
            'Описание/Характеристика'                 ,  # [2] => Serv_Detail
            'Еденица измерения'                       ,  # [3] => Serv_1
            'Цена услуги'                             ,  # [4] => Serv_Cost
            'Гарантия '                                  # [5] => Serv_Gar
        ),

   'd_quest' => Array
       (
        'ФИО'                                         ,  # [0] => name
        'Электронная почта'                           ,  # [1] => email
        'Тема сообщения'                              ,  # [2] => subject
        'Содержание сообщения'                        ,  # [3] => message
        ),  

    'd_review' => Array
        (
         'ИМЯ'                                        ,  # [0] => name
         'ЭЛЕКТРОННАЯ ПОЧТА'                          ,  # [1] => email
         'СОДЕРЖАНИЕ'                                 ,  # [2] => content
        ),     
             
);
#                                    
#                                                      
# This is my advanced idea for the next version: 
# Should be loop for the   $Table_Headers_DB like this
# $Table_Headers_DB ($FormTypes[$i], headers_DB[$i]) 
# and  headers_DB[$i] - two dim array 
# 
# This is not correct array construction !!!
# PHP5 print_r print in this view (without "'" and ","
#
#$A=array
#(
#  [0]=>array
#     (
#      [0]=>'a0',
#      [1]=>'b0'
#     ),
#  [1]=>array
#     (
#      [0]=>'a1',
#      [1]=>'b1'
#     )
#);  
?>                      
                   
                 
