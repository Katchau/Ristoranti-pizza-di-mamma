<html>
    <head>
        <title>Restaurant Guide</title>
        <meta charset="utf-8">
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="scripts/script1.js"></script>
        <!-- <link rel="stylesheet" href="css/style.css"> -->
    </head>
    <body>
        <header>
           <div id="header">
            <h1>Restaurant Guide</h1>
            <p>
                <?php
                    echo $email;
                ?>
                <a href="index.php"> Logout </a>
            </p>
           </div>
        </header>
    </body>
</html>
