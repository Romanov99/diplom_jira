<?php
//  'DB_Tables_Fields.php'; - формирует все строки $Str1, состоящие из полей таблиц, через запятую
     $Str1=$SQL_String1[$FormType];  
//   $Str2=$SQL_String2[$FormType];       -
     $QueryResult = $dbObj->query("INSERT INTO $dbtable
                                  (
                                    $Str1
 
                                  ) 
                            values                   
                                  (
                                    $Str2
 
                                  )"
                                 );
                        
?>
