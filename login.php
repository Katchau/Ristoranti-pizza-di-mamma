  <html>
      <head>
          <title>Login</title>
          <meta charset="utf-8">
          <link rel="stylesheet" href="">
          <?php
            try{
               $db = new PDO('sqlite:database/database.db');
            }
            catch(PDOException $e) {
                die($e->getMessage());
            }
          ?>
      </head>
      <body>
        <form method="post">
          <h1>Login</h1>
          <p>
            <label>Email:
				        <input type="text" name="email" >
				    </label>
          </p>
          <p>
            <label>Password:
			          <input type="password" name="password" >
			      </label>
          </p>
          <input type="submit" name="submit" value="Iniciar Sessão">
        </form>
          <?php
              if (isset($_POST['submit'])) {
              $email = $_POST['email'];
              $password = $_POST['password'];
              $stmt = $db->prepare('SELECT password FROM User WHERE email = ?');
              $stmt->execute(array($email));
              $result = $stmt->fetch();
              if ($result[0] == $password){
                //Direccionar para a página com o login efectuado
              }
              else{
                echo "User or Password incorrect";
              }
            }
          ?>
      </body>
  </html>
