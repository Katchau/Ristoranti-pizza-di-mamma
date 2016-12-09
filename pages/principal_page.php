<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>
        Cá estámos !
    </title>
    <meta charset="UTF-8">
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="../scripts/initialpage_header.js"></script>
    <link rel="stylesheet" href="../css/index.css">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Lobster" rel="stylesheet">
</head>

<body>
    <div class="overlayLogin" hidden="hidden">
        <div id="overlay-login">
            <div id="register-box"><h1>Iniciar Sessão</h1></div>
            <form id="form" method="post" action="../actions/sign_in.php" onsubmit="return validateForm();">
                <input id="email" type="email" name="Email" placeholder="Email" required/>
                <input id="password" type="password" name="Password" placeholder="Paswword" required/>
                <input type="submit" value="Iniciar sessão"/>
                <span id="output"></span>
            </form>
        </div>
    </div>
    <div class="overlayLogon" hidden="hidden">
        <div id="overlay-logon">
            <div id="register-box"><h1>Registar</h1></div>
            <form id="form" method="post" action="../actions/sign_up.php" onsubmit="return validateForm();">
                <input id="firstName" type="text" name="firstName" placeholder="First name" required/>
                <input id="lastName" type="text" name="lastName" placeholder="Last name" required/>
                <input id="password" type="password" name="password" placeholder="Password" required/>
                <input id="passwordConfirm" type="password" name="passwordConfirm" placeholder="Repeat your Password" required/>
                <input id="email" type="email" name="email" placeholder="Email" required/>
                <input type="submit" value="Registar"/>
                <span id="output"></span>
            </form>
        </div>
    </div>
    <div id="top-bar">
        <div id="top-bar-elements">
            <h1>
                Cá estámos !
            </h1>

            <div id="top-buttons">
                <div id="login">
                    <?php
                    if(isset($_SESSION['name']))
                    {
                        echo '<div id="user-name">' . $_SESSION['name'] . '</div>' ;

                    }
                    else{
                        echo '<div id="init_session">';
                        echo '<input type="submit" name="submit" value="Iniciar Sessão">';
                        echo '</div>';
                    }

                    ?>
                </div>
                <div id="logon">
                    <?php
                    if(isset($_SESSION['name']))
                    {

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

    <div id="middle">
        <img src="../res/backgroundPhoto.jpg"/>
        <div id="middle-elements">
            <div id="search-bar">
                <img  src="../res/logo.png"/>
                <form action="" method="post">
                    <input id="searchLocal" type="text" name="local_search" placeholder="Pesquisar por local..."/>
                    <input id="searchRestaurant" type="text" name="restaurant_search" placeholder="Pesquisar por restaurante..."/>
                    <input type="submit" value="">
                </form>
            </div>
        </div>
    </div>
</body>

</html>
