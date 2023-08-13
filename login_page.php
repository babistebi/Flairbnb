<?php

//connect to database
$db = mysqli_connect('localhost', 'root', '', 'flairbnb')
or die('Error connecting to databse.');


//get values
$login_user = $_REQUEST['email || username'];

$login_password = $_REQUEST['psw'];


//Execute query
$query_user = "SELECT "