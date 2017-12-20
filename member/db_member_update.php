<?php
	//DB연결
	@session_start();
	$connect = mysql_connect('localhost', 'root', 'localhost'); 
	mysql_query("set names utf8"); 
	mysql_select_db('test' ,$connect);

	$user_id = $_SESSION['session_id'];
	echo "userID : ".$user_id;

	$u_name = $_POST['u_name'];
	$u_id = $_POST['u_id'];
	$u_pwd1 = $_POST['u_pwd1'];
	$u_pwd2 = $_POST['u_pwd2'];
	$u_email1 = $_POST['u_email1'];
	$u_email2 = $_POST['u_email2'];
	$u_mobile = $_POST['u_mobile'];
	$u_phone1 = $_POST['u_phone1'];
	$u_phone2 = $_POST['u_phone2'];
	$u_phone3 = $_POST['u_phone3'];
	$u_zip = $_POST['u_zip'];
	$u_address1 = $_POST['u_address1'];
	$u_address2 = $_POST['u_address2'];
	$u_sms = $_POST['u_sms'];
	$u_getemail = $_POST['u_getemail'];

	$hashresult1 = hash('sha256', $u_pwd1);
	$hashresult2 = hash('sha256', $u_pwd2);

			
	$sql = "UPDATE members SET 
				id='".$u_id."', 
				pwd1='".$hashresult1."', 
				pwd2='".$hashresult2."', 
				email='".$u_email1."@".$u_email2."',  
				mobile='".$u_mobile."', 
				phone='".$u_phone1."-".$u_phone2."-".$u_phone3."', 
				zipcode='".$u_zip."', 
				address1='".$u_address1."', 
				address2='".$u_address2."', 
				check_sms='".$u_sms."', 
				get_email='".$u_getemail."' 
				where id = '".$user_id."'";

	$result = mysql_query($sql);


	if(mysql_affected_rows() > 0){
		unset($_SESSION['session_id']);
		$_SESSION['session_id'] = $u_id;

	}else{
		
		echo "nope";
	}

	
?>