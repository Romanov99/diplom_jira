<?php
/**
* Получение календаря на месяц
* @var int $month - номер месяца
* @var int $year - год
*
* @return string
*/
if ($_POST[month])
    $month=$_POST[month];
else
    $month=date('n'); //номер месяца текущего
#
$Months    = Array ( 'январь', 'февраль', 'март', 'апрель', 'май', 'июнь','июль', 'август', 'сентябрь', 'октябрь', 'ноябрь', 'декабрь');
$Days      = Array ( '<br>пн','<br>вт','<br>ср','<br>чт','<br>пт', '<br><strong><font color=red>сб</font></strong>','<br><strong><font color=red>вс</font></strong>',
                     '<br>пн','<br>вт','<br>ср','<br>чт','<br>пт', '<br><strong><font color=red>сб</font></strong>','<br><strong><font color=red>вс</font></strong>',
                     '<br>пн','<br>вт','<br>ср','<br>чт','<br>пт', '<br><strong><font color=red>сб</font></strong>','<br><strong><font color=red>вс</font></strong>',
                     '<br>пн','<br>вт','<br>ср','<br>чт','<br>пт', '<br><strong><font color=red>сб</font></strong>','<br><strong><font color=red>вс</font></strong>',
                     '<br>пн','<br>вт','<br>ср','<br>чт','<br>пт', '<br><strong><font color=red>сб</font></strong>','<br><strong><font color=red>вс</font></strong>',
                     '<br>пн','<br>вт','<br>ср','<br>чт','<br>пт', '<br><strong><font color=red>сб</font></strong>','<br><strong><font color=red>вс</font></strong>'
                   );
$NDays     = Array ( 1,2,3,4,5,6,7,
                     1,2,3,4,5,6,7,
                     1,2,3,4,5,6,7,
                     1,2,3,4,5,6,7,
                     1,2,3,4,5,6,7,
                     1,2,3,4,5,6,7
                   );
$Date_Day  = Array();
#
// вывод календаря на май 2018 в браузере
$str = get_month($month, 2018); 
// для вывода в браузере вместо переноса строки <br>
//echo "<br>$str<br>";
//$date= $str;
//$str = str_replace(PHP_EOL, "<br>", $str); 
//echo $str;
$date= $str;
//$date = str_replace(" ", PHP_EOL, $date); 
//$date = str_replace(" ", "<br>", $date); 
$dates = explode(' ',$date);
//print '<pre>'; print_r($dates); print '</pre>'; 
$i=0;	    
foreach ($dates as $element)
    	{
         if ($dates[$i]=="__") {
                    $i++;
                    continue;
         }
         $Date_Day[]        = $dates[$i].$Days[$i];
         $NDate_Day[]       =           $NDays[$i];
         $i++;
        }  
//print '<pre>'; print_r($Date_Day); print '</pre>'; 
function get_month($month, $year){
    // получение количества дней в месяце и номер дня недели
    $rows = explode(', ', date('t, w', mktime(0, 0, 0, $month, 1, $year)));
    //print '<pre>'; print_r($rows); print '</pre>'; 
    $rows[1] = (int)trim($rows[1]) - 1;
    if ($rows[1] < 0) $rows[1] = 6;
 
    // считаем количество мест в календаре
    $all_places = (ceil(($rows[0] + $rows[1]) / 7) * 7 - ($rows[0] + $rows[1])) + ($rows[0] + $rows[1]);
 
    // составление календаря
    $str = "";
    for($i = 1; $i <= $all_places; $i++){
        if( ($i <= $rows[1]) OR $i > ($rows[0] + $rows[1])){
            $str .= "__ "; // прочерки для пустых мест  
        }else{
            $str .= str_pad(($i - $rows[1]), 2, '0', STR_PAD_LEFT) . " ";   
        }   
        if(($i % 7) == 0){
            $str = trim($str); // убираем лишние пробелы в конце
            if($i < $all_places){
                $str .= ' '; // в конце каждой недели перенос строки
                //$str .= PHP_EOL; // в конце каждой недели перенос строки              
            }
        }
    }   
    return $str;
}
?>