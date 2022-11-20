<?php

error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
mysql_connect('localhost','root','')or die("cannot connect to server");
mysql_select_db('pharnacy_trial_run')or die("cannot connect to database");


// $servername = "localhost";
// $username = "root";
// $password = "";

// try {
//     $conn = new PDO("mysql:host=$servername;dbname=pharmacy", $username, $password);
//     // set the PDO error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "Connected successfully"; 
//     }
// catch(PDOException $e)
//     {
//     echo "Connection failed: " . $e->getMessage();
//     }

?>