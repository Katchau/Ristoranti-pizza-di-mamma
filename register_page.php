<script src=""></script>

<form id="form" method="post" action="actions/sign_up.php" onsubmit="return validateForm();">
    <input id="firstName" type="text" name="firstName" placeholder="First name" required/>
    <input id="lastName" type="text" name="lastName" placeholder="Last name" required/>
    <input id="password" type="password" name="password" placeholder="Password" required/>
    <input id="passwordConfirm" type="password" name="passwordConfirm" placeholder="Repeat your Password" required/>
    <input id="email" type="email" name="email" placeholder="Email" required/>
    <button type="submit">Submit</button>
    <span id="output"></span>
</form>