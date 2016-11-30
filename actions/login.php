  <html>
      <head>
          <title>Login</title>
          <meta charset="utf-8">
          <link rel="stylesheet" href="">
      <body>
        <form method="post" action="sign_in.php" onsubmit="return validateForm();" >
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

      </body>
  </html>
