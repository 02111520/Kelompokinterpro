<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conectt = "localhost";
$database_conectt = "sia";
$username_conectt = "root";
$password_conectt = "";
$conectt = mysql_pconnect($hostname_conectt, $username_conectt, $password_conectt) or trigger_error(mysql_error(),E_USER_ERROR); 
?>