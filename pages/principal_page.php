<!DOCTYPE html>
<html>

<head>
    <title>
        Cá estámos !
    </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/index.css">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Lobster" rel="stylesheet">
</head>

<body>
    <div id="top-bar">
        <div id="top-bar-elements">
            <h1>
                Cá estámos !
            </h1>

            <div id="top-buttons">
                <div id="login">
                    <form action="../actions/login.php" method="post">
                        <input type="submit" name="submit" value="Iniciar Sessão">
                    </form>
                </div>
                <div id="logon">
                    <form action="../actions/register_page.php" method="post">
                        <input type="submit" name="submit" value="Registar">
                    </form>
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
