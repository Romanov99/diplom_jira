<?php 
####################################################################################
# Модуль производит поиск по полю - Id                                             #
#                                                                                  #
####################################################################################
#
$Arr_w                  = array();
$Row_w                  = array();
$Arr_acc                = array();
$Row                    = array();
$dbtable                = $FormType;
#
# Заголовки всех таблиц БД проекта, на английском формируются динамически
require_once 'DB_Tables_Fields.php';
#                 
# Заголовки всех таблиц веб проекта, которые появляются на экране 
include_once 'Table_Headers.php';
#
# Так мы делаем софт более независимым от конкретных таблиц БД
#
$headers    = $Table_Headers   [$FormType];// наименования столбцов таблицe 
$headers_db = $Table_Headers_DB[$FormType];// наименования доменов в таблице 
#                                          // БД и <input name's в формах
# Объект класса работы с базой данных создается внутри модуля DB_Class.php
//$dbObj                 =  new MySQL_db(DB_HOST, DB_USER, DB_PWD, DB_NAME); 
require_once 'Any_Table_HTML_New.php';
#
#******************************* Поиск ключу ********************************
$KeyName         = $headers_db[0];
$QueryResult     = $dbObj->query("SELECT * FROM $dbtable WHERE $KeyName ='$KeyValue' ORDER BY '$KeyName' ");
if ($QueryResult==false)
   {
    $msg1        ='Запись не найдена в таблице';
//  $QueryResult = $dbObj->query("SELECT * FROM $dbtable ORDER BY '$KeyName' ");
   }
else 
   {
    $msg1        ='<br>Запись  найдена в базе данных. Предполагается, что одна.';
    if ($print){
    print '*** FirstKey_Search.php ***<br>';
    print "<br>$msg1";
    print '<pre>'; 
    print_r($QueryResult); 
    print '</pre>'; 
    }
    $i=0;
    foreach ($headers_db as $element) 
    	    {
             $$headers_db[$i]      = $QueryResult[0][$headers_db[$i]];
             //if ($print){print "<br>$"."$headers_db[$i]=".$$headers_db[$i];}
             $i++;
    	    }
    if ($FormType=='a_tasks')
    {
     #
     ### Формируем дополнительные столбцы с календарем ###
     # 
     include 'Calendar1_String.php';
     $i=4;
     $j=0;
     foreach ($Date_Day as $element) 
    	     {
              $headers[$i]      = $Date_Day[$j];
              $i++;
              $j++;
    	     }
     }
     ### Конец формирования дополнительных столбцов ###
    //print '<pre>'; print_r($headers); print '</pre>'; 
    $Table_view =  new HTML_Table($headers , $heard_color);
    foreach ($QueryResult as $row    => $Arr_acc)
    	{
    	 $i=0;	
    	 foreach ($headers_db as $element) 
    	         {
    	 	      $Row = array_merge($Row, array($headers[$i] => $Arr_acc[$headers_db[$i]]) );
    	 	      $i++;
    	 	 }
                 if ($FormType=='a_tasks')
                 {
                 #
                 ### Формируем дополнительные столбцы с календарем ###
                 # 
                 $j=0;
                 foreach ($Date_Day as $element) 
    	                 { 
                          /* Здесь надо проверить, почему не получилось так. Возможно была другая кодировка
                          $str = str_replace(PHP_EOL, "<br>", $str);
                          $DayType=substr($Date_Day[$j],0,9);
                          $DayType = str_replace("@", "<br>", $DayType);
                          $DayType=trim($DayType);
                          print "<br>DayType=$DayType";
                          $DayType=substr($Date_Day[$j],-2,2);
                          print "<br>DayType=$DayType";
                          */
                          $Font_Green='<h3><strong><font color=\'Green\'>-</font></strong></h3>';
                          $Font_Red  ='<h3><strong><font color=\'Red\'  >-</font></strong></h3>';
                          $Font_White='<h3><strong><font color=\'White\'>-</font></strong></h3>';
                          #
                          $Links_Select_Color ="<a href='FirstKey_Search_Frame.php?KeyValue=$Proj_Id&Proj_Nm=$Proj_Nm&FormType=a_tasks'>";
                          $Links_Select_Color.=$Font_Green.$Font_Red.$Font_White;
                          $Links_Select_Color.="</a>";
                          if (($NDate_Day[$j]=='6')||($NDate_Day[$j]=='7'))   
                             $cell=1;
                           //$cell="<strong><font color='red'>вх</font></strong>";
                          else                                                
                             $cell=$Links_Select_Color;
                          $Row = array_merge($Row, array($headers[$i] => $cell));
                          $i++;
                          $j++;
    	                 }
                 }
                 ### Конец формирования дополнительных столбцов ###	
    	 $Table_view   ->  AddRowAssArr($Row);
        } 
   If ($FormType=='a_tasks')
   { 
    $Month      = $Months[$month-1];
### желательно сделать функцию и связать с базой данных ###
    print
    "
    <form action='FirstKey_Search_Frame.php?KeyValue=$Proj_Id&Proj_Nm=$Proj_Nm&FormType=a_tasks' method='post'>
    <p><select size='3' name='month'>
    <option disabled>Выберите месяц   </option>
    <!--option value='2'>Январь       </option>
    <option value='2'>Февраль         </option>
    <option value='3'>Март            </option>
    <option value='4'>Апрель          </option//-->
    <option selected value='5'>Май    </option>
    <option value='6'>Июнь            </option>
    <option value='7'>Июль            </option>
    <option value='8'>Август          </option>
    <option value='9'>Сентябрь        </option>
    <option value='10'>Октябрь        </option>
    <option value='11'>Ноябрь         </option>
    <option value='12'>Декабрь        </option>
    </select></p>
    <p><input type='submit' value=' &nbsp;Выбрать месяц&nbsp;&nbsp;  '></p>
    </form>
    <br>
    <br>
    <p></p>
    <center><h3><font color='Blue' >Загрузка сотрудников на $Month</font></h3></center>
    <p></p>
    ";
   }
   $Table_view      ->  PrintArr();
   }
if ($print) print $msg1;
print "<BR><a href=\"Forms_Main_Frame.php?FormType=a_tasks&Proj_Id=$Proj_Id&Proj_Nm=$Proj_Nm&operation=ADD&Title=Добавление задач по проекту $Proj_Nm\">
       <h3>Добавление задач по проекту $Proj_Nm</h3></a>"       
?>