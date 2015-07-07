<!-- 
	Author : Ali Can Kustemur
	File   : login/login_operations.php
	Date   : 29.06.2015
	P.Name : Login Page

-->
<?php
	if(p("user_submit")){	
		if(p("user_name") != null && p("user_pass") != null){
			$sql = "SELECT * FROM users";
			$query = mysql_query($sql);
			if(mysql_affected_rows() > 0 ){
				while($row = mysql_fetch_array($query)){
					if(!$success){
						if(p("user_name") == $row["user_name"] && p("user_pass") == $row["user_pass"] ){
								if($row["user_authority"] == 1){
									$_SESSION["user_name"] = $row["user_name"];
									$success  = true;
									$list = true;
									$message = "Hoşgeldiniz , ".$_SESSION["user_name"];
								}else{
									if(!session_okay()){
										$message = "Bu alanı görmeye yetkiniz yok";
										$success = true;
									}
									
								}
						}else{
								if(!session_okay()){
									$message = "Kullanıcı Adı veya Şifre hatalı girildi,lütfen tekrar deneyin";
								}
						}					
					}
				}
			}else{
				if(!session_okay()){
					$message = "Görüntülenecek bir kullanıcı bulunamadı";
				}
			}
		}else{
				$message = "Tüm alanları doldurunuz.";
		}
		
	}
?>