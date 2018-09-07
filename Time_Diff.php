﻿<?php
#####################################################################################
# Находим количество дней и лет между двумя датами.                                 #
#####################################################################################
#
$Now       = time();                            // текущее время (метка времени)
$Your_Date = strtotime($Date_In);               // какая-то дата в строке
$datediff  = $Now - $Your_Date;                 // получим разность дат (в секундах)
#
#echo floor($datediff / (60 * 60 * 24));        // количество дней из разности дат
#echo floor($datediff / (60 * 60 * 24 * 365));  // количество лет  из разности дат
#
$Staj     =  floor($datediff / (60 * 60 * 24 * 365));
#####################################################################################
# Почему количество секунд делим на 60 * 60 * 24? Количество секунд поделив на 60   #
# получим количество минут (в одной минуте шестьдесят секунд). Затем, поделив       #
# количество минут на 60 - получим количество часов (в одном часе шестьдесят минут).# 
# А поделив количество часов на  24 - получим количество дней.                      #
#####################################################################################
?>