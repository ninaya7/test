
<!--수강후기 페이지 분기-->

<?php include '../header.php'?>

<?
	if($_GET['page']){

		include 'review_list.html';

	}else if($_GET['mode'] == "list"){	//수강후기 리스트 페이지로 이동
		
		include 'review_list.html';
	
	}else if($_GET['mode'] == "write"){
		
		include './write.html';
	
	}else if($_GET['mode'] == "modify" && $_GET['modify_no']){
		
		include 'write.html?no='.$_GET['modify_no'];
	
	}else{
	
		include '../index.html';
	
	}	
?>

<?php include '../footer.php'?>