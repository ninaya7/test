<!--로그인-->
<?php
	@session_start();
	include 'dbconfig.php';

	$userid = $_POST['userid'];
	$userpwd = $_POST['userpwd'];
	$refer_check = $_POST['refer_check'];
	//echo $userid.",".$userpwd.",".$refer_check;

	$hashresult = hash('sha256', $userpwd);



	$sql = "SELECT id FROM members where id = '".$userid."' and pwd1 ='".$hashresult."'";
	$result = mysql_query($sql);
	$count = mysql_num_rows($result);

	if($count > 0){
			while($row = mysql_fetch_assoc($result)){
					$_SESSION['session_id'] = $row['id'];
					if($refer_check == null){
						echo "<script>location.href = './member/index.php'</script>";
					}else{
						if($refer_check == "http://test.hackers.com/test/member/find_pwd_complete.html"){
							echo "<script>location.href = './member/index.php'</script>";
						}else{
							echo "<script>location.href = '".$refer_check."'</script>";
						}
					}
			}
	}else{
			echo "<script>alert('아이디 또는 비밀번호를 확인해주세요.');</script>";
			echo "<script>location.href = 'login.html'</script>";
	}

?>