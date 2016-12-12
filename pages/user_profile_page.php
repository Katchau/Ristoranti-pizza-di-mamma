<?php
include_once('header.php');
include_once('../pages/header.php');
include_once('../actions/uploadbar.php');
include_once('../actions/profile_pics.php');
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

<div class="overlayChangeProfilePic" hidden="hidden">
    <div id="overlay-changePic">
        <div id="changePic"><h1>Mudar Imagem Perfil</h1></div>
        <?php
		upload_bar($_SESSION['id'], false);
		?>
    </div>
</div>

<div id="middle">
    <div id="profile-img">
		<?php
			$pic = get_profile_pic();
			if($pic == null || !$pic)
				echo '<img src="../res/defaultProfilePicture.png">';
			else echo '<img src="' . '../database/images/users/' . $_SESSION['id'] . '/' . $pic . '">';
			
		?>
		<div id="changeProfilePic">
            <input type="button" value="Mudar Imagem">
        </div>
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
			display_restaurants();
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
