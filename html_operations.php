<!-- 
	Author : Ali Can Kustemur
	File   : login/html_operations.php
	Date   : 29.06.2015
	P.Name : Login Page

-->
<?php 
	
	
	function form_action($par){
		switch($par){
			case 'POST':
				echo '<form action="" name="frm" method="POST">';
				break;
			case 'GET':
				echo '<form action="" name="frm" method="GET">';
				break;
		}
	}
	
	
	function panel_label(){
		if(!session_okay()){ 
			echo '<th colspan="2">Giriş Paneli</th>'; 
		}else{
			echo '<th colspan="2">Kullanıcı İşlemleri</th>'; 
		}
	}
	
	function warning_message(){
		$message = "Hoşgeldiniz , ".$_SESSION["user_name"];
		echo $message;
	}
	
	function login_submit_button(){
		$submit = '<td colspan="2" align="right"><input type="submit" ';
		if(!session_okay()){
			$submit = ' <td colspan="2" align="right"><input type="submit"';
			$submit.=' name="user_submit" value="Giriş Yap" >';
		}else{
			$cancel =  '<input type="submit" name="cancel" value="İptal"></td>';
				switch(g("crud")){
						case 'u' :
							$submit.=  'name="user_update" value="Güncelle">';
							$submit.=$cancel;
						break;
						default:
								$submit.=  'name="user_add" value="Ekle">';
								$submit.=$cancel;
						break;
				}
		}
			echo $submit;
	}
	
	function logout_button(){
			if(session_okay()){
				echo '<input type="submit" name="logout" value="Çıkış Yap">';
		}
	}
	
	function user_name_value(){
		if(g("crud") == "u"){
			echo "value =".g("user_name");
		}
	}
	
	function authority_select(){
		if(session_okay()){
			$authority = '<select name="user_authority">';
			$authority.= '<option value="1"';
			if(g("crud") == "u"){
				if(g("user_authority") == 1){
				$authority.=" selected ";
				}
			}
			$authority.= '>Yetkili</option>';
			$authority.= '<option value="2"';
			if(g("crud") == "u"){
				if(g("user_authority") == 2){
				$authority.=" selected ";
				}
			}
			$authority.= '>Kullanıcı</option>';
			$authority.="</select>";
			echo $authority;
		}
	}
	function user_list(){
		if(session_okay()){
			$sql = "SELECT * FROM users"; 
			$query = mysql_query($sql);
			if(mysql_affected_rows() > 0){
				$user_list = '<table  border=1px>';
				$user_list.= "<tr class=tags><th>Sıra</th><th>Kullanıcı Adı</th><th>Yetki</th><th>Sil</th><th>Güncelle</th></tr>";
				while($row = mysql_fetch_assoc($query)){
					if($count % 2 == 0){
						$user_list.='<tr class=black><td>'.++$count.'</td><td>'.$row["user_name"].'</td><td>';
					}else{
						$user_list.='<tr class=white><td>'.++$count.'</td><td>'.$row["user_name"].'</td><td>';
					}
						if($row["user_authority"] == 1){
							$user_list.='Yetkili';
						}else{
							$user_list.='Kullanıcı';
						}
						$user_list.="<td><img src=img/delete.png onClick=deleteUser($row[user_id],\"$row[user_name]\")></td>";
						$user_list.="<td align=center><img src=img/update.png onClick=updateUser($row[user_id],\"$row[user_name]\",$row[user_authority])></td></tr>";
				}
				$user_list.="</table>";
			}
			echo $user_list;
			}
	}
?>