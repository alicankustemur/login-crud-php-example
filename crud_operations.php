<!-- 
	Author : Ali Can Kustemur
	File   : login/crud_operations.php
	Date   : 29.06.2015
	P.Name : Login Page

-->
<?php 
	
	function user_create(){
		if(isset($_POST["user_add"])){
			$sql = "SELECT * FROM users";
			$query = mysql_query($sql);
			while($row = mysql_fetch_array($query)){
				if($row["user_name"] == p("user_name")){
					$count++;
				}
			}
			if($count < 1){
				if(p("user_name") != null && p("user_pass") != null){
					$sql2 = 'INSERT INTO users SET
				user_name = \''.p("user_name").'\',
				user_pass = \''.p("user_pass").'\',
				user_authority = '.p("user_authority");
				$query2 = mysql_query($sql2);
				crud_message_user_create();
				}
				else{
					crud_message_user_create_error();
				}
				
			}else{
				crud_message_same_create();
			}
		}
	}

	function user_update(){
		if(isset($_POST["user_update"])){
			if(p("user_pass") != null){
				$sql = "UPDATE users SET 
						user_name = \"".p("user_name")."\",
						user_pass = \"".p("user_pass")."\",
						user_authority = ".p("user_authority")."
						WHERE user_id = ".g("user_id");
				$query = mysql_query($sql);
			}else{
				$sql = "SELECT * FROM users";
				$query = mysql_query($sql);
				while($row = mysql_fetch_array($query)){
					if($row["user_id"] == g("user_id")){
						$sql2 = "UPDATE users SET 
								user_name = \"".p("user_name")."\",
								user_pass = \"".$row["user_pass"]."\",
								user_authority = ".p("user_authority")."
								WHERE user_id = ".g("user_id");
						$query2 = mysql_query($sql2);
					}
				}
			
			}
			
		}
	}

	function user_delete(){
		if(g("crud") == "d"){
			$sql = "DELETE FROM users WHERE user_id = ".g("user_id");
			$query = mysql_query($sql);
			remove_get_var_of_adress_bar();
		}
	}
	
	function crud_message_user_create(){
		$message.= p("user_name")." adına sahip bir ";
		if(p("user_authority") == 1){
			$message.= "<u>yetkili</u>";
		}else{
			$message.= "<u>kullanıcı</u>";
		}
		$message.=" başarıyla eklendi.";
		echo $message;
		
	}
	
	function crud_message_user_create_error(){
		if(p("user_name") == null && p("user_pass") == null){
			$message  = "Tüm alanları doldurunuz.";
		}else if(p("user_name") == null){
			$message = "Lütfen bir kullanıcı adı giriniz.";
		}else if(p("user_pass") == null){
			$message = "Lütfen bir şifre giriniz.";
		}
		echo $message;
	}
	
	function crud_message_same_create(){
		echo p("user_name")." adında bir kullanıcı zaten mevcut.";
		
	}
	
	function crud_message_user_update(){
		echo "<i>Şifre boş geçildiği takdirde , eski şifre geçerli olucaktır.</i>";
	}
	
	function crud_operations(){
		if(session_okay()){
				if(isset($_POST["user_add"])){
					user_create();
					
				}
				if(g("crud") == "d" && !isset($_POST["user_add"])){
					user_delete();
					
				}
				if(isset($_POST["user_update"])){
					user_update();
				}
				if(g("crud") == "u"){
					crud_message_user_update();
				}
				

			}
	}
	
?>