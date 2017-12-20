
<?php
	//DB연결
	include '../dbconfig.php';

	$new_pwd = $_POST['new_pwd'];
	$new_pwd2 = $_POST['new_pwd2'];
	$id = $_SESSION['id'];

	@session_start();
	$_SESSION['new_pwd'] = $_POST['new_pwd'];
	$_SESSION['new_pwd2'] = $_POST['new_pwd2'];

	$sql = "update members set pwd1='".$new_pwd."',pwd2='".$new_pwd2."' where id='".$id."'";

	//조건문에 맞는 id 있을 경우 count로 db확인 후 이동
	$result = mysql_query($sql);
	$count = mysql_num_rows($result);
	$row = mysql_fetch_assoc($result);


	if($count>0){
		
		echo "가입된 회원입니다. 인증번호를 확인해주세요.";
	
	}else{

		echo "가입된 정보가 없습니다. 회원가입을 해주세요.";
	
	}

?>