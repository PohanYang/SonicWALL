<?php
$hostname_db = "localhost";
$database_db = "sonicwall";
$username_db = "root";
$password_db = "123";
$db = mysql_pconnedt($hostname_db, $username_db, $password_db) or die('Error with MySQL conection');
mysql_query("set names 'utf8'");
mysql_select_db($dbname);
?>
