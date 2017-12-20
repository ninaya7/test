<?php @session_start(); ?>

<?
	if($_GET['page']){

		include 'admin_list.html';

	}else if($_GET['mode'] == "write"){
	
		include 'admin_write.html';

	}else{

			include './admin_list.html';

	}
?>