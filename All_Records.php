<?php 
####################################################################################
# ������ ������� �� ����� ���������� ������� $FormType                             #
####################################################################################
#
require_once   'DB_Tables_Fields.php';      //��������� ����� ���� ������ � ����� ��
# ����� ��� ������ � ����� ������ MySQL, �������� � ���� ������   
# require_once 'DB_Class.php';
# ������ ������ ������ � ����� ������ ��������� ������ ������ DB_Class.php
# $dbObj     =  new MySQL_DB(DB_HOST, DB_USER, DB_PWD, DB_NAME); 
### 
# ��� �� ������ ���� ����� ����������� �� ���������� ������ ��
#
# ��������� ���� ������ ��� �������, ������� ���������� �� ������ 
include_once  'Table_Headers.php';          //!!!// ���� ��� ������� ������� ���������
#
$headers     = $Table_Headers   [$FormType];// ������������ �������� ������e 
$headers_db  = $Table_Headers_DB[$FormType];// ������������ ������� � ������� 
#                                           // �� �� 'DB_Tables_Fields.php'
#
#������ �� ������ ���� �������  
#
if ($KeySearch=='')
    $QueryResult = $dbObj->query("SELECT * FROM $FormType");
else
    $QueryResult = $dbObj->query("SELECT * FROM $FormType WHERE $headers_db[0]='$KeySearch' ");
# ���������� ������ ������������� �������� (��. ����� DB_Class.php)   
# �� ���� ��������� ������, ������� ���������� ����������� foreach
# ��� ����� ������� ����� ���� # ����� print ��. ����. ����� �������
# ����������� ������� ��� ������ �� ����� ��� ������ �������
#
if ($QueryResult==false)   
   {
    $msg = '��� ������� � ���� ������!';
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