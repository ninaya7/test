<?php
	@session_start();
	$session_id = $_SESSION['session_id'];
	include "../dbconfig.php";

	$code = $_POST['code'];
	$lecture_name = $_POST['lecture_name'];
	$title = $_POST['title'];
	$score = $_POST['score'];
	$content = $_POST['content'];
	$login_name = $_POST['login_name'];
	$date = date('m/d/Y h:i:s', time());

	$sql = "INSERT INTO review SET 
		category_code='$code',  
		lecture_name='$lecture_name',
		title='$title',
		score='$score',
		content='$content',
		upload_time='$date',
		login_id='$login_name'";

	$result = mysql_query($sql);

	while($row = mysql_fetch_assoc($result)){
		$review_list[] = $row;
	}
	print_R($review_list);


?>