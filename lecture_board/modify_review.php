<?
	@session_start();
	$session_id = $_SESSION['session_id'];
	include "../dbconfig.php";

	$code = $_POST['code'];
	$lecture_name = $_POST['lecture_name'];
	$title = $_POST['title'];
	$score = $_POST['score'];
	$content = $_POST['content'];
	$login_name = $_POST['login_name'];
	$update_time = date('m/d/Y h:i:s', time());
	$no = $_POST['no'];

	$sql = "UPDATE review SET
			category_code='".$code."',
			lecture_name='".$lecture_name."',
			title='".$title."',
			score='".$score."',
			content='".$content."',
			upload_time = '".$update_time."',
			login_id='".$session_id."'
			where id='".$no."'";

	$result = mysql_query($sql);
	
	if($result>0){
		
		echo 1;

	}else{
		
		echo 0;
	}
	



?>