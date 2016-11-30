<script src=""></script>

<form id="form" method="post" action="sign_up.php" onsubmit="return validateForm();">
    <h1>Register:</h1>
    <p>
      <input id="firstName" type="text" name="firstName" placeholder="First name" required/>
    </p>
    <p>
      <input id="lastName" type="text" name="lastName" placeholder="Last name" required/>
    </p>
    <p>
      <input id="password" type="password" name="password" placeholder="Password" required/>
    </p>
    <p>
      <input id="passwordConfirm" type="password" name="passwordConfirm" placeholder="Repeat your Password" required/>
    </p>
    <p>
      <input id="email" type="email" name="email" placeholder="Email" required/>
    </p>
    <button type="submit">Submit</button>
    <span id="output"></span>
</form>
