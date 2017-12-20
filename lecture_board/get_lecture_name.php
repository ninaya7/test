<?php
	include "../dbconfig.php";
	
	$code = $_POST['code'];
	$sql = "select * from lecture where category_code='".$code."'";

	$result = mysql_query($sql);

	while($row = mysql_fetch_assoc($result)){
		$id_numbers[] = $row['lecture_name'];

	}

	echo json_encode($id_numbers);

?>