<!-- 
	Author : Ali Can Kustemur
	File   : login/index.php
	Date   : 29.06.2015
	P.Name : Login Page

-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link rel="stylesheet" href="css/index.css">
	<script src="js/crud.js"></script>
	<title>Giriş Sayfası</title>
</head>
<body>
<?php
	require_once("functions.php");
	form_action("POST"); 
?>
		<table align="left">
			<?php panel_label(); ?>
			<tr><td colspan="2">
				<div class="message">
					<?php
					if(!session_okay()){
						echo $message;
					}else{
						warning_message();
					}
					?>
				</div>
			</td></tr>
			<tr>
				<td>Kullanıcı Adı</td>
				<td><input type="text" name="user_name" <?php user_name_value(); ?> ></td>
			</tr>
			<tr>
				<td>Şifre</td>
				<td><input type="password" name="user_pass"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><?php authority_select(); ?></td>
			</tr>
			<tr>
				<?php login_submit_button(); ?>
			</tr>
			<tr>
				<td colspan="2">
					<div class="alt_message"><?php crud_operations(); ?></div>
				</td>
			</tr>
			<tr><td colspan="2" align="right"><?php logout_button();?></td></tr>
		</table>
	</form>
	<?php
		all_func();
	?>
</body>
</html>