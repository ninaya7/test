
<?php
	//DB����
	include '../dbconfig.php';

	$new_pwd = $_POST['new_pwd'];
	$new_pwd2 = $_POST['new_pwd2'];
	$id = $_SESSION['id'];

	@session_start();
	$_SESSION['new_pwd'] = $_POST['new_pwd'];
	$_SESSION['new_pwd2'] = $_POST['new_pwd2'];

	$sql = "update members set pwd1='".$new_pwd."',pwd2='".$new_pwd2."' where id='".$id."'";

	//���ǹ��� �´� id ���� ��� count�� dbȮ�� �� �̵�
	$result = mysql_query($sql);
	$count = mysql_num_rows($result);
	$row = mysql_fetch_assoc($result);


	if($count>0){
		
		echo "���Ե� ȸ���Դϴ�. ������ȣ�� Ȯ�����ּ���.";
	
	}else{

		echo "���Ե� ������ �����ϴ�. ȸ�������� ���ּ���.";
	
	}

?>