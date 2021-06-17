<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trabalho";

$connection = mysqli_connect($servername, $username, $password, $dbname);

if (mysqli_connect_error()) {
	echo "não".mysqli_connect_error();
}


?>