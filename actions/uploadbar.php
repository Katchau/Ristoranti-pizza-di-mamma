<?php
	function upload_bar($id,$is_restaurant){
		
		echo '<form enctype="multipart/form-data" action="../database/uploader.php?id=' . $id . '"method="POST">';
		echo '<input type="file" name="userfile" accept="image/*">';
		if($is_restaurant){
			echo '<button type="submit" value="' . $id . '" name="rest_id">';
		}
		else{
			echo '<button type="submit" value="' . $id . '" name="user_id">';
		}
		echo 'Upload Image</button>';
		echo '</form>';
	}

?>