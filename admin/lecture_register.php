<?php

	include '../dbconfig.php';

	$code = $_POST['code'];
	$lecture_name = $_POST['lecture_name'];
	$lecturer_name = $_POST['lecturer'];
	$level = $_POST['level'];
	$lec_time = $_POST['time'];
	$img_name = $_POST['img_name'];
	
	if($code == "00"){

		echo "<script> alert('강의분류를 선택해주세요'); </script>";
		echo "<script>history.back();</script>";

	}else if($lecture_name == ""){

		echo "<script> alert('강의명을 입력해주세요'); </script>";
		echo "<script>history.back();</script>";

	}else if($lecturer_name == ""){
		
		echo "<script> alert('강의자를 입력해주세요'); </script>";
		echo "<script>history.back();</script>";


	}else if($level == "00"){
	
		echo "<script> alert('수업수준을 선택해주세요'); </script>";
		echo "<script>history.back();</script>";

	}else if($lec_time == ""){
		
		echo "<script> alert('강의시간을 입력해주세요'); </script>";
		echo "<script>history.back();</script>";
	}

	if($_FILES["fileToUpload"]["name"] != null){


		$upfile_dir = '../admin/uploads';		// 경로
		$upfile_tmp = $_FILES["fileToUpload"]["tmp_name"]; //서버 파일임시저장 주소


		$imageFileType = array_pop(explode(".", strtolower($_FILES["fileToUpload"]["name"]))); //파일확장자 추출
		//$upfile_name= $seqn.".".$imageFileType;
        $upfile_name =  basename($_FILES["fileToUpload"]["name"]);
		
		$dirImg = $upfile_dir."/".$seqn.".".$imageFileType;

		if($upfile_name){
			if (file_exists("{$upfile_dir}/{$upfile_name}") ) { 
				unlink("{$upfile_dir}/{$upfile_name}"); 
			}

			if (move_uploaded_file($upfile_tmp, "{$upfile_dir}/{$upfile_name}")) {
				
				$sql = "INSERT INTO lecture SET 
									category_code='$code',
									lecture_name='$lecture_name',
									lecturer_name='$lecturer_name',
									lecture_lev='$level',
									lecture_runtime='$lec_time',
									img_name='$upfile_name'";
				$result = mysql_query($sql);
				$row = mysql_affected_rows($result);
				echo("
				       <script>
					         alert('SUCCESS');
				             location.href='../admin/index.php';
					   </script>"
				); 		
			}
		}
	}

?>