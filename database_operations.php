<!-- 
	Author : Ali Can Kustemur
	File   : login/database_operations.php
	Date   : 29.06.2015
	P.Name : Login Page

-->
<?php

	$server = "localhost";
	$user = "root";
	$password = null;
	$connect = mysql_connect($server,$user,$password) or die (mysql_error());
	
	$db = "login";
	
	$select_db = mysql_select_db($db) or die (mysql_error());
?>