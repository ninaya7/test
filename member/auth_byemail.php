
<?php
	//DB연결
	include '../dbconfig.php';

	$name = $_POST['name'];
	$email = $_POST['email1']."@".$_POST['email2'];

	$sql = "SELECT id FROM members where name = '".$name."' and email = '".$email."'";

	//조건문에 맞는 id 있을 경우 count로 db확인 후 이동
	$result = mysql_query($sql);
	$count = mysql_num_rows($result);

	if($count>0){

		echo 1;
	
	}else{

		echo 0;
	
	}

?>