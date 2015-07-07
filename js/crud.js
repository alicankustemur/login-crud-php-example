/*
	Author : Ali Can Kustemur
	File   : script/crud.js
	Date   : 29.06.2015
	P.Name : Login Page

*/
function deleteUser(user_id,user_name){
		if(confirm(user_name+" adlı kullanıcı silinecektir,Onaylıyor musunuz ?")){
			document.frm.action="?crud=d&user_id="+user_id;
			document.frm.submit();
		}
}
function updateUser(user_id,user_name,user_authority){
			document.frm.action="?crud=u&user_id="+user_id+"&user_name="+user_name+"&user_authority="+user_authority;
			document.frm.submit();
}