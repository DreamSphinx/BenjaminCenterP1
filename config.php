<?php

$dbhost = 'localhost:/var/lib/mysql/mysql.sock';


$dbuser = 'whaleye1';
$dbpass = 'uuewyp';


$conn = mysql_connect($dbhost, $dbuser, $dbpass);

mysql_select_db('whaleye1_db');

?>
