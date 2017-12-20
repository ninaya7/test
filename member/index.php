<?php 
	@session_start();
	include '../header.php';
	
	$exMode = explode('_', $_GET['mode']);


	switch($_GET[mode]){

		case 'step_'.$exMode[1]: 
			include 'member_'.$_GET['mode'].'.html';
			break;
		
	/*	case 'step_02' :
			include 'member_'.$_GET['mode'].'.html';
			break;
		
		case 'step_03' :
			include 'member_'.$_GET['mode'].'.html';
			break;
*/		
		case 'step_04' : //register로 변경해주기
			include './member_complete.html';
			break;

		case 'regist' :
			include 'regist.php';
			break;
		
		case 'find_id' :
			include './find_id.html';
			break;
		
		case 'find_pwd' :
			include './find_pwd.html';
			break;

		case 'modify' :
			include './modify_mypage.html';
			break;

		default :  
			include './index.html'; 
			break;
	}

	include '../footer.php';
?>
