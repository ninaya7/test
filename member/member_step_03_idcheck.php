<?php

	include '../dbconfig.php';

	$sql = "SELECT id FROM members where id = '".$reg_id."'";
	$result = mysql_query($sql);
	$count = mysql_num_rows($result);
	
	$return = false;
	$msg = '사용 가능한 아이디입니다.';

	if( $count>0 ){
		$return = true;
		$msg = '중복된 아이디가 있습니다. 다시입력해 주세요.';
	}

	
	$checkid = array('success' => $return, 'msg' => $msg);
	echo json_encode($checkid);
	

?>