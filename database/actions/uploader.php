<?php

	include_once('connection.php');

	function insertPicture($id_restaurant,$pic_name){
		global $db;
		
		$insertReview=$db->prepare('INSERT INTO Picture VALUES(NULL,?,?,NULL)');
		$insertReview->execute([$pic_name,$id_restaurant]);
		return $insertReview->errorCode();
	}

    $uploaddir = '../images/' . $_POST['id'] . '/';
	if(!file_exists($uploaddir))mkdir($uploaddir, 0700);
	$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
	
	echo "<p>";
	
	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
		echo "Updload Successfull!.\n";
		insertPicture($_POST['id'],$_FILES['userfile']['name']);
	} 
	else {
		echo "Upload failed";
	}
	
	echo "</p>";
?>
