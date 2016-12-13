<?php
include_once('header.php');
include_once('../actions/uploadbar.php');
include_once('../actions/profile_pics.php');

?>

<script src="../scripts/profile_page.js"></script>
<link rel="stylesheet" href="../css/user_profile_page.css">
<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
<link rel="stylesheet" href="../css/header.css">

<div class="overlayEditProfile" hidden="hidden">
    <div id="overlay-EditProfile">
        <div id="editProfile"><h1>Editar Perfil</h1>
          <div id="changeUserName">
              <input type="button" value="Mudar Nome">
          </div>
          <div id="changeUserEmail">
              <input type="button" value="Mudar Email">
          </div>
          <div id="changeUserBirthday">
              <input type="button" value="Mudar Data Nascimento">
          </div>
          <div id="changeUserPassword">
              <input type="button" value="Mudar Password">
          </div>
        </div>
    </div>
</div>

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

<div class="overlayChangeName" hidden="hidden">
    <div id="overlay-changeName">
        <div id="changeName"><h1>Mudar Nome</h1></div>
        <form id="form" method="post" action="../actions/change_name.php" onsubmit="return changeName();">
           <input id="first_name" type="text" name="first_name" placeholder="Nome Próprio" required/>
           <input id="last_name" type="text" name="last_name" placeholder="Apelido" required/>
           <input type="submit" value="Confirmar"/>
           <span id="output-changeName"></span>
        </form>
    </div>
</div>

<div class="overlayChangeEmail" hidden="hidden">
    <div id="overlay-changeEmail">
        <div id="changeEmail"><h1>Mudar E-mail</h1></div>
        <form id="form" method="post" action="../actions/change_email.php" onsubmit="return changeEmail();">
           <input id="novo_email" type="text" name="novo_email" placeholder="Email" required/>
           <input type="submit" value="Confirmar"/>
           <span id="output-changeEmail"></span>
        </form>
    </div>
</div>

<div class="overlayChangeBirthday" hidden="hidden">
    <div id="overlay-changeBirthday">
        <div id="changeBirthday"><h1>Mudar Data de Nascimento</h1></div>
        <form id="form" method="post" action="../actions/change_birthday.php" onsubmit="return changeBirthday();">
           <input id="birthday" type="date" name="birthday" placeholder="Data de Nascimento" required/>
           <input type="submit" value="Confirmar"/>
           <span id="output-changeBirthday"></span>
        </form>
    </div>
</div>

<div class="overlayChangeProfilePic" hidden="hidden">
    <div id="overlay-changePic">
        <div id="changePic">Mudar Imagem Perfil</div>
        <?php
		upload_bar($_SESSION['id'], false);
		?>
    </div>
</div>

<div class="overlayCreateRestaurant" hidden="hidden">
    <div id="overlay-createRestaurant">
        <div id="createRestaurant"><h1>Criar restaurante</h1></div>
        <form id="form" method="post" action="../actions/create_restaurant.php" onsubmit="return changePassword();">
            <input id="restaurant-name" type="text" name="restaurant-name" placeholder="Nome do restaurante" required/>
            <input id="restaurant-description" type="text" name="restaurant-description" placeholder="Descrição do restaurante" required/>
            <input id="restaurant-address" type="text" name="restaurant-address" placeholder="Endereço" required/>
            <input id="restaurant-contacts" type="text" name="restaurant-contacts" placeholder="Contacto" required/>
            <input id="restaurant-schedule" type="text" name="restaurant-schedule" placeholder="Horário" required/>
            <input id="restaurant-type" type="text" name="restaurant-type" placeholder="Tipo de restaurante" required/>
            <input type="submit" value="Confirmar"/>
            <span id="output-creatRestaurant"></span>
        </form>
    </div>
</div>

<div id="middle">
    <div id="profile-img">
        <div id="img-and-button">
            <?php
            $pic = get_profile_pic();
            if($pic == null || !$pic)
                echo '<img src="../res/defaultProfilePicture.png">';
            else echo '<img src="' . '../database/images/users/' . $_SESSION['id'] . '/' . $pic . '">';

            ?>
        </div>
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
            <div id="birthday-date">
                <?php
                $userInfo=getUserInfo($_SESSION['email']);

                echo $userInfo['birthday'];
                ?>
            </div>
        </div>
    </div>
</div>

<div id="down-part">
    <div id="restaurants">
        <div id="place-restaurants">
            <p>Restaurants</p>
        </div>
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
        <div id="create-restaurant">
            <input type="button" value="Criar restaurante">
        </div>
    </div>
</div>
