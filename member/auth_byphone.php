
<?php
	//DB연결
	include '../dbconfig.php';

	$name = $_POST['name'];
	$mobile = $_POST['mo1']."-".$_POST['mo2']."-".$_POST['mo3'];

	$sql = "SELECT * FROM members where name = '".$name."' and mobile = '".$mobile."'";

	//조건문에 맞는 id 있을 경우 count로 db확인 후 이동
	$result = mysql_query($sql);
	$count = mysql_num_rows($result);
	//$row = mysql_fetch_assoc($result);

	if($count>0){
		//가입된 회원인 경우
		echo 1;

	}else{

		//가입된 회원 아닌경우
		echo 0;
	}

?>