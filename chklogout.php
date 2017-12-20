<!--로그아웃-->
<?php
	include 'dbconfig.php';

	echo "로그아웃!!!";
	
	echo $_SESSION['session_id'];
	
	session_destroy();

	echo "<script>location.href = 'member/index.php'</script>";

	
	/*
	if($_SESSION['session_id'] == null){
		//로그인페이지 열기
	}else{
		//메인페이지 열기
	}
	*/
/*
	$userid = $_POST['userid'];
	$userpwd = $_POST['userpwd'];
	$refer_check = $_POST['refer_check'];
	echo $userid.",".$userpwd.",".$refer_check;

	$sql = "SELECT id FROM members where id = '".$userid."' and pwd1 ='".$userpwd."'";
	$result = mysql_query($sql);
	$count = mysql_num_rows($result);

	if($count>0){
			while($row = mysql_fetch_assoc($result)){
				$_SESSION['session_id'] = $row['id'];
				echo "<script>location.href = '".$refer_check."'</script>";
			}		
	}else{
		echo "<script>alert('아이디 또는 비밀번호를 제대로 입력해주세요.');</script>";
		echo "<script>location.href = 'login.html'</script>";
	}
*/
?>