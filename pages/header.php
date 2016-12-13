<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Cá estámos !</title>
    <meta charset="utf-8">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="../scripts/header.js"></script>
    <script src="../scripts/sign_up.js"></script>
	<script src="../scripts/script1.js"></script>
    <link rel="stylesheet" href="../css/header.css">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Lobster" rel="stylesheet">
</head>
<body>
<header>
    <div class="overlayLogin" hidden="hidden">
        <div id="overlay-login">
            <?php
            include_once('../database/actions/user.php');
            $_SESSION['token-login']= generateSessionToken();
            ?>
            <div id="register-box"><h1>Iniciar Sessão</h1></div>
            <form id="form" method="post" action="../actions/sign_in.php" onsubmit="">
                <input id="email" type="email" name="Email" placeholder="Email" required/>
                <input id="password" type="password" name="Password" placeholder="Password" required/>
                <input type="hidden" name="token-logon" value="<?php echo $_SESSION['token-login']; ?>">
                <input type="submit" value="Iniciar sessão"/>
                <span id="output-login"></span>
            </form>
        </div>
    </div>
    <div class="overlayLogon" hidden="hidden">
        <div id="overlay-logon">
            <?php
            include_once('../database/actions/user.php');
            $_SESSION['token-login']= generateSessionToken();
            ?>
            <div id="register-box"><h1>Registar</h1></div>
            <form id="form" method="post" action="../actions/sign_up.php" onsubmit="return verifySignUp();">
                <input id="firstName" type="text" name="firstName" placeholder="First name" required/>
                <input id="lastName" type="text" name="lastName" placeholder="Last name" required/>
                <input id="birthday" type="date" name="birthday" placeholder="Birthday" required/>
                <input id="password-logon" type="password" name="password" placeholder="Password" required/>
                <input id="passwordConfirm-logon" type="password" name="passwordConfirm" placeholder="Repeat your Password" required/>
                <input id="email-logon" type="email" name="email" placeholder="Email" required/>
                <input type="hidden" name="token-logon" value="<?php echo $_SESSION['token-login']; ?>">
                <input type="submit" value="Registar"/>
                <span id="output-logon"></span>
            </form>
        </div>
    </div>
    <div id="top-bar">
        <div id="top-bar-elements">
            <h1>
                <a href="../pages/principal_page.php">Cá estámos !</a>
            </h1>
            <div id="search">
                <form action="search_page.php" method="get">
                    <input id="searchLocal" type="text" name="local" placeholder="Pesquisar por local..."/>
                    <input id="searchRestaurant" type="text" name="restaurant" placeholder="Pesquisar por restaurante..."/>
                    <input type="submit" value="Pesquisar">
                </form>
            </div>
            <div id="top-buttons">
                <div id="login">
                    <?php
                    if(isset($_SESSION['name']))
                    {
                        echo '<div id="user-name">';
                        echo '<a href="../pages/user_profile_page.php">'. $_SESSION['name'] .'</a>';
                        echo '</div>';
                    }
                    else{
                        echo '<div id="init_session">';
                        echo '<input type="button" value="Iniciar Sessão">';
                        echo '</div>';
                    }
                    ?>
                </div>
                <div id="logon">
                    <?php
                    if(isset($_SESSION['name']))
                    {
                        echo '<form id="form" method="post" action="../actions/sign_out.php">';
                        echo '<input type="submit" value="Sair">';
                        echo '</form>';
                    }
                    else {
                        echo '<div id="register">';
                        echo '<input type="button" value="Registar">';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</header>
