<?php 
// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','t3n8oved226i');
define('DB_PASS','Data1data@');
define('DB_NAME','thtdn');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS);
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>