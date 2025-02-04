<?php
// Connect to server and select database.
define('servername', 'localhost');
define('username', 'root');
define('password', '');
define('dbname', 'myhotel');
$objCon = mysqli_connect(servername, username,
password,dbname);
