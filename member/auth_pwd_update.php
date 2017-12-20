
<?php
	//DB연결
	$connect = mysql_connect('localhost', 'root', 'localhost'); 
	mysql_query("set names 'utf-8'"); 
	mysql_select_db('test' ,$connect);

	$new_pwd = $_POST['new_pwd'];
	$new_pwd2 = $_POST['new_pwd2'];
	$id = $_POST['id'];

	$hashresult1 = hash('sha256', $new_pwd);
	$hashresult2 = hash('sha256', $new_pwd2);

			
	$sql = "UPDATE members SET pwd1='".$hashresult1."', pwd2='".$hashresult2."' where id = '".$id."'";

	$result = mysql_query($sql);
	//$count = mysql_affected_rows($result);
	

	if($result>0){
		
		echo 1;

	}else{
		
		echo 0;
	}

?>