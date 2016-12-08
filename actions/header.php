<html>
    <head>
        <title>Restaurant Guide</title>
        <meta charset="utf-8">
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="../scripts/script1.js"></script>
        <!-- <link rel="stylesheet" href="css/style.css"> -->
    </head>
    <body>
        <header>
          <h1>Restaurant Guide</h1>
           <div id="header">
                <?php
                    session_start();
                    if(isset($_SESSION['name']))
                      include_once('loggedin_header.php');
                    else
                      include_once('loggedout_header.php');
                ?>
            </p>
           </div>
        </header>
    </body>
</html>
