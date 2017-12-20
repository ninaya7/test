<?php
	include '../dbconfig.php';

	$obj = $_POST['arrayData'];

	$reg_name = $obj['reg_name'];
	$reg_id = $obj['reg_id'];
	$reg_pwd1 = $obj['reg_pwd1'];
	$reg_pwd2 = $obj['reg_pwd2'];
	$reg_email = $obj['reg_email1']."@".$obj['reg_email2'];
	$reg_mobile = $obj['reg_mobile1']."-".$obj['reg_mobile2']."-".$obj['reg_mobile3'];
	$reg_phone = $obj['reg_phone1']."-".$obj['reg_phone2']."-".$obj['reg_phone3'];
	$reg_zipcode = $obj['reg_zipcode'];
	$reg_address1 = $obj['reg_address1'];
	$reg_address2 = $obj['reg_address2'];
	$reg_sms_yn = $obj['reg_sms_yn'];
	$reg_getmail_yn = $obj['reg_getmail_yn'];

	$hashresult1 = hash('sha256', $reg_pwd1);
	$hashresult2 = hash('sha256', $reg_pwd2);

	echo $reg_sms_yn;
	//$sql = "SELECT * FROM members where name='".$reg_name."' and id='".$reg_id."' and pwd1='".$reg_pwd1."' and email='".$reg_email."'and mobile='".$reg_mobile."'";
	//$sql = "SELECT * FROM members where name='".$reg_name."'";

	/*
	$sql = "INSERT INTO members SET 
			name='$reg_name',  
			id='$reg_id',
			pwd1='$reg_pwd1',
			pwd2='$reg_pwd2',
			email='$reg_email',
			mobile='$reg_mobile',
			phone='$reg_phone',
			zipcode='$reg_zipcode',
			address1='$reg_address1',
			address2='$reg_address2',
			check_sms='$reg_sms_yn',
			get_email='$reg_getmail_yn'";
	*/
	$sql = "INSERT INTO members SET 
		name='$reg_name',  
		id='$reg_id',
		pwd1='$hashresult1',
		pwd2='$hashresult2',
		email='$reg_email',
		mobile='$reg_mobile',
		phone='$reg_phone',
		zipcode='$reg_zipcode',
		address1='$reg_address1',
		address2='$reg_address2',
		check_sms='$reg_sms_yn',
		get_email='$reg_getmail_yn'";

	$result = mysql_query($sql);

	while($row = mysql_fetch_assoc($result)){
		$member_list[] = $row;
	}
	print_R($member_list);

?>