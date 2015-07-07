<!-- 
	Author : Ali Can Kustemur
	File   : login/functions.php
	Date   : 29.06.2015
	P.Name : Login Page

-->
<?php 
	error_reporting(0);
	session_start();
	require_once("database_operations.php");
	require_once("html_operations.php");
	require_once("crud_operations.php");
	require_once("login_operations.php");

	function p($par){
		return $_POST[$par];
	}
	
	function g($par){
		return $_GET[$par];
	}
	
	function submit_buttons_remove_get_var(){
		if(isset($_POST["cancel"]) || isset($_POST["user_update"])){
			remove_get_var_of_adress_bar();
		}else if(isset($_POST["logout"])){
			session_destroy();
			remove_get_var_of_adress_bar();
		}
	}
	
	function session_okay(){
		if(count($_SESSION) >= 1){
			return true;
		}else{
			return false;
		}
	}
	
	function remove_get_var_of_adress_bar(){
			$url = $_SERVER['REQUEST_URI'];
			$url = strtok($url,'?');
			header("Location:".$url);
	}
	
	
	function all_func(){
		submit_buttons_remove_get_var();
		user_list();
	}
?>