<?php

	include_once('connection.php');

	function insertPicture($id,$pic_name,$is_restaurant){
		global $db;
		$insertReview = null;
		
		if($is_restaurant)
			$insertReview=$db->prepare('INSERT INTO Picture VALUES(NULL,?,?)');
		else
			$insertReview=$db->prepare('UPDATE User SET picture = ? WHERE id = ?');
		
		$insertReview->execute([$pic_name,$id]);
		return $insertReview->errorCode();
	}

    $uploaddir = 'images/';
	if(isset($_POST['rest_id']))
		$uploaddir .= $_POST['rest_id'] . '/';
	else 
		$uploaddir .= 'users/' . $_POST['user_id'] . '/';
	
	if(!file_exists($uploaddir))mkdir($uploaddir, 0700);
	$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
	
	echo "<p>";
	
	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
		echo "Updload Successfull!.\n";
		if(isset($_POST['rest_id']))
			insertPicture($_POST['rest_id'],$_FILES['userfile']['name'],true);
		else
			insertPicture($_POST['user_id'],$_FILES['userfile']['name'],false);
	} 
	else {
		echo "Upload failed";
	}
	
	echo "</p>";
	
	header('Location: ../pages/principal_page.php?' . '');
?>
