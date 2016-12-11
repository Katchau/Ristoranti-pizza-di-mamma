<?php
include_once('header.php');
include_once('../pages/header.php');
include_once('../database/actions/user.php');
include_once('../database/actions/restaurant.php');
?>

<script src="../scripts/profile_page.js"></script>
<link rel="stylesheet" href="../css/user_profile_page.css">
<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
<link rel="stylesheet" href="../css/header.css">

<div class="overlayChangePassword" hidden="hidden">
    <div id="overlay-changePassword">
        <div id="changePassword"><h1>Mudar Password</h1></div>
        <form id="form" method="post" action="../actions/change_password.php" onsubmit="return changePassword();">
           <input id="password" type="password" name="password" placeholder="Actual Password" required/>
           <input id="new_password" type="password" name="new_password" placeholder="New Password" required/>
           <input id="new_password_confirm" type="password" name="new_password_confirm" placeholder="Repeat your new Password" required/>
           <input type="submit" value="Confirmar"/>
           <span id="output-changePassword"></span>
        </form>
    </div>
</div>

<div id="middle">
    <div id="profile-img">
        <img src="../res/defaultProfilePicture.png">
    </div>
    <div id="user-info">
        <div id="personal-info">
            <div id="name">
                <?php
					echo $_SESSION['name'];
				?>
            </div>
            <div id="email">
                <?php
					echo $_SESSION['email'];
				?>
            </div>
        </div>
    </div>
</div>

<div id="down-part">
    <div id="restaurants">
        <p>Restaurants</p>
		
		<?php
			$restaurants = getOwnedRestaurants($_SESSION['id']);
			$ref = "../actions/restaurant_page.php";
			
			echo '<form method="post" action=' . $ref . '>';
			$paragraph = 0;
			foreach($restaurants as $rest){
				if($paragraph == 2){
					$paragraph = 0;
					echo '<br>';
				}
				echo '<button type="submit" value="' . $rest['id'] . '" name="id">';
				echo $rest['name'];
				echo '<br>';
				$pic = getRestaurantPicture($rest['id']);
				$image_path = "../database/images/" . $rest['id'] . "/";
				echo '<img src="' . $image_path . $pic['name'] . '" alt="restaurant_pics">';
				echo '</button>';
				$paragraph ++;
			}
			echo '</form>';
		?>
		
    </div>
    <div id="options">
        <div id="title-options">
            Options
        </div>
        <div id="edit">
            <input type="button" value="Editar">
        </div>
        <div id="changeUserPassword">
            <input type="button" value="Mudar Password">
        </div>
        <div>
            <input type="button" value="Criar restaurante">
        </div>
    </div>
</div>
