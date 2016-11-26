  <html>
      <head>
          <title>Login:</title>
          <meta charset="utf-8">
          <link rel="stylesheet" href="">
          <!--<?php
            try{
               $db = new PDO('database/sqlite:database.db');
            }
            catch(PDOException $e) {
                die($e->getMessage());
            }
          ?>-->
      </head>
      <body>
        <form method="post">
          <p>
            <label>Email:
				        <input type="text" name="email"  >
				    </label>
          </p>
          <p>
            <label>Password:
			          <input type="password" name="password" >
			      </label>
          </p>
          <input type="submit" name="submit" value="Iniciar Sessão">
        </form>
          <!--<?php
              $email = $_POST["email"];
              $password = $_POST["password"];
              if (isset($_POST['submit'])) {
              $stmt = $db->prepare('SELECT passowrd FROM User WHERE email = ?');
              $stmt->execute(array($email));
              $result = $stmt->fetch();
              if ($result == $password){
                echo "Yey";
              }
              else{
                echo "Not Found";
              }
            }
          ?>-->
      </body>
  </html>
