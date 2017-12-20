<?php include '../dbconfig.php' ?>

<?php
	
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
	//이미지 파일인지 확인
/*

if(isset($_POST["submit"])) {

		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {

			//echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;

		} else {

			//echo "File is not an image.";
			$uploadOk = 0;

		}
	}
*/
	//이미 파일이 존재하는 경우
	/*
	if (file_exists($target_file)) {
		//echo "이미 존재하는 파일입니다";
		$uploadOk = 0;
	}*/
	
	//확장자 구분
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		//echo "JPG, JPEG, PNG & GIF만 업로드 가능합니다";
		$uploadOk = 0;
	}
	
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		//echo "죄송합니다. 파일업로드에 실패했습니다";
	
	// if everything is ok, try to upload file
	} else {
					
		//이미지 파일 업로드 성공했을경우
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			
			$uploaded_file = $_FILES["fileToUpload"]["name"];

			//업로드 성공한 파일을 업로드DB에 저장(파일정보 저장), 이미지이름 lecture DB에 이름만 저장해서 이미지 불러올때 사용
			$sql = "INSERT INTO gallery SET image_path='/test/admin/uploads/".$uploaded_file."', image_name ='".$uploaded_file."'";
			if($result = mysql_query($sql)) {
				echo "<script>history.back();</script>";	
			} else {
				echo "실패";
			}	
	
		} else {

			//echo "죄송합니다. 파일업로드에 실패했습니다";
		}

	}
?>