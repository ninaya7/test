
<!--�����ı� ������ �б�-->

<?php include '../header.php'?>

<?
	if($_GET['page']){

		include 'review_list.html';

	}else if($_GET['mode'] == "list"){	//�����ı� ����Ʈ �������� �̵�
		
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