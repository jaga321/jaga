<?php

$hostname_obj_Conn = "localhost";
$username_obj_Conn = "i2softwa_crm";
$password_obj_Conn = "test123!@#";

$obj_Conn = mysql_connect($hostname_obj_Conn, $username_obj_Conn, $password_obj_Conn) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db('i2softwa_crm');


?>