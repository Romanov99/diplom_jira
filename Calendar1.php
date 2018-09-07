<?php
/**
* Получение календаря на месяц
* @var int $month - номер месяца
* @var int $year - год
*
* @return string
*/
// вывод календаря на май 2018 в браузере
$str = get_month(5, 2018); 
// для вывода в браузере вместо переноса строки <br>
$str = str_replace(PHP_EOL, "<br>", $str); 
echo $str;
function get_month($month, $year){
    // получение количества дней в месяце и номер дня недели
    $rows = explode(', ', date('t, w', mktime(0, 0, 0, $month, 1, $year)));
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
                $str .= PHP_EOL; // в конце каждой недели перенос строки            
            }
        }
    }   
    return $str;
}
?>