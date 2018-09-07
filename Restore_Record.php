<?php
#************************************************************************************
# Находим запись базы данных для обновления. Используется в Forms_Main.php,         #
# которая в настоящей версии вызывается по header из Tables_Handler.php             #
# Входными параметрами, передаваемыми по GET в header являются: FormType,operation, #
# которая для обновления записи должна иметь значение 'UPD' и на всякий случай msg1 #
# Модуль должен быть помещен после стандартного набора для все модулей              #
#************************************************************************************
# 
if ($_GET["operation"]=='UPD')
   {
    $KeyValue        = $_GET[KeyValue];
    $KeyName         = $headers_db[0];      // предполагается, $headers_db определены в стандартном наборе
    $QueryResult     = $dbObj->query("SELECT * FROM $FormType WHERE $KeyName ='$KeyValue' ");
	 if ($QueryResult==false)
	    {
	     $msg1        ='Запись не найдена в таблице';
	     include 'Next_Page.php';
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
?>
	
	