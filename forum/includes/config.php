<?php
define('DB_SERVER','sql10.freemysqlhosting.net');
define('DB_USER','sql10588204');
define('DB_PASS' ,'YaKLIBfykG');
define('DB_NAME','sql10588204');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>