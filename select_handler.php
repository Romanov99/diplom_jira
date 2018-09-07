<?php 
################################################################################
define("DB_HOST",     "localhost"               ); // адрес сервера баз данных #
define("DB_USER",     "romanov"                 ); // имя пользователя         #
define("DB_PWD",      "romanov"                 ); // пароль к бд              #
define("DB_NAME",     "contrit"                 ); // имя базы данных          #
define("DB_MODE",                              2); // 0 - в ручную откр/закр,  #
################################################################################
#
foreach ($_POST as $key => $value) {
    $add[$key] = $value;
}
print '<pre>'; print_r($_POST); print '</pre>'; 
print '<pre>'; print_r($add); print '</pre>'; 
?>