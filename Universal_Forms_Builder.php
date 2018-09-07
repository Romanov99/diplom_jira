<?php
#
# построитель форм такого вида Universal_Forms_Builder.php
#
### Кнопки тоже вписываются в таблицы; Особенность в NAME='UpdPro'. Первый раз 
# пользователь нажимает кнопку Update, под списком всех строк таблицы,
# например, сотрудников. Предполагается обновление только одной записи.
# В этой форме происходит повторное нажатие "изменить", а обрабатывает
# один и тот же _Handler. Он "должен знать" откуда запрос на обработку. 
#
$button_add               =  "<INPUT TYPE='submit' NAME='Add' STYLE='font-size: 10 pt; 
	 background: font-family: arial,verdana,helvetica,sansserif' VALUE='            ДОБАВИТЬ           '>";
$button_del               =  "<INPUT TYPE='submit' NAME='Delete' STYLE='font-size: 10 pt; 
	 background: font-family: arial,verdana,helvetica,sansserif' VALUE='Удалить   '>";
$button_upd               =  "<INPUT TYPE='submit' NAME='UpdPro' STYLE='font-size: 10 pt; 
	 background: font-family: arial,verdana,helvetica,sansserif' VALUE='            ИЗМЕНИТЬ           '>";
$button_view              =  "<INPUT TYPE='submit' NAME='View'   STYLE='font-size: 10 pt; 
	 background: font-family: arial,verdana,helvetica,sansserif' VALUE='Просмотр '>";
###
#    Создаем объекты класса для вывода таблиц, вызываем конструктор
#$handler      = $FormType.'_Handler';          // обработчик настоящей формы
#$headers      = $Table_Headers   [$FormType];  // наименования столбцов таблицe 
#$headers_db   = $Table_Headers_DB[$FormType];  // наименования доменов в таблице 
#                                               // Staff БД и input name's в формах
$i=0;
foreach ($headers as $element)
        {
         $element1         =  "<input type='text'      name ='". $headers_db[$i].
                              "'size=100 maxlength=180 value='".$$headers_db[$i]."'>";	
                                                // наименования доменов в таблице 
    	 if (($FormType=='3_clients')&&($i==0)){
         $element1         =  "<input type='text'      name ='". $headers_db[$i].
                              "'size=10 maxlength=10   value='".$$headers_db[$i]."'>";	  	 	
    	 }                                                
    	 if (($FormType=='3_clients')&&($i==1)){
         $element1         =  "<input type='password'  name ='". $headers_db[$i].
                              "'size=10 maxlength=10   value='".$$headers_db[$i]."'>";    	 	
    	 }
#                                                                          
	     $Form_view -> AddRowAssArr
    	                     (array($form_headers [0] => $element,
    	                            $form_headers [1] => $element1
    	                            )
    	                      ); 
     	 $i++;                          
        }
//buttons Add && Delete  
if ( $operation=='ADD') 
   { 
     $button_del='';
     $Form_view -> AddRowAssArr
    	(array($form_headers [0] => $button_add,
    	       $form_headers [1] => $button_del
    	       )
    	);
   }
#
//button Update && Delete - раздумали обновлять и удаляем
if ($operation=='UPD')
   {
    $button_del='';
    $Form_view -> AddRowAssArr
    	(array($form_headers [0] => $button_upd,
    	       $form_headers [1] => $button_del
    	       )
    	);
   }
# 
/*if ($operation!=='ADD') {      	 
$Form_view -> AddRowAssArr
    	(array($form_headers [0] => $button_upd ,
    	       $form_headers [1] => $button_view
    	       )
    	); 
}
*/
// вывод формы на экран    	     	        
$Form_view ->OutForm($handler); 
?>