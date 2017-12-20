<?php
session_start();
include '../dbconfig.php';


switch($_POST[mode]){

	//member_step01 > 인증번호 요청
	case 'authSMS' : 
		$authNum = '123456'; //난수발생
		$_SESSION['authNum'] = $authNum;
		$result = array('success' => true, 'msg' => '인증번호를 전송하였습니다.');
		echo json_encode($result);
	break;

	case 'smsConfirm' : 

		$return = false;
		$msg = '인증에 실패하였습니다. 정확한 인증번호를 입력해 주세요'; 

		if($_SESSION['authNum'] == $_POST['authNum']){
			$return = true;
			$msg = '인증에 성공하였습니다.';
		}

		$result = array('success' => $return, 'msg' => $msg);
		echo json_encode($result);
	break;

}
