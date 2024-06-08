<?php 

?>

<html>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log inn</title>
    <link rel="stylesheet" href="login/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
	<!-- containter en container med fult av innhold som inneholder informasjon og hele koden. Dette gjør det lettere for og style det i CSS.  -->
    <div class="container">
        <form class="form" id="login" method="post" action="/login/login.php">

	<!-- Jeg har to :understreker __ i variablene mine for lettere navigering og observasjon i koden. Jeg syns det får det til og bli letter og finne. --> 
            <h1 class="form__title">Login</h1>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">

		<!-- Autofocus placeholder gjør som når du går inn på en nettside slipper du og trykke på input baren for og skrive og går heller... 
		 bare til input baren med en gang du kommer inn til nesttstedet. Dette gjør det kjappere og mer accessible --> 
                <input type="text" class="form__input" autofocus placeholder="Username or email" name="UserOrEmail">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="password" id="loginpassword" class="form__input" autofocus placeholder="Password" name="LoginPassword">
                <div class="form__input-error-message"></div>
            </div>
            <!--Checkbox-->
            <input type="checkbox" id="LoginCheckPass" />
            <label for ="LoginCheckPass">Show Password</label>
            <!--Continue Button-->
            <button class="form__button" type="submit">Continue</button>
            <p class="form__text">
                <a class="form__link" href="./" id="linkCreateAccount">Don't have an account? Create account</a>
            </p>
        </form>

        <!-- Lager et form som inneholder SignUp både forms sånt som Login og SignUp er på samme side bare gjemt bak hverandre. Dette gjør det fortere og mer rensligt ut. -->

        <form class="form form--hidden" id="createAccount" method="post" action="/login/signup.php">
            <h1 class="form__title">Create Account</h1>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
                <input type="text" id="signupUsername" class="form__input" autofocus placeholder="Username" name="username">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="text" class="form__input" autofocus placeholder="EmailAddress" name="mail">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="password" id="signuppassword" class="form__input" autofocus placeholder="Password" name="password">
                <div class="form__input-error-message"></div>
            </div>
            <!--CheckBox-->
            <input type="checkbox" id="SignCheckPass" />
            <label for ="SignCheckPass">Show Password</label>
            <!--Continue Button-->
            <button class="form__button" type="submit">Continue</button>
            <p class="form__text">
                <a class="form__link" href="./" id="linkLogin">Already have an account? Sign in</a>
            </p>
        </form>
    </div> 
    <script src="login/login.js"></script>
    <script src="launch.json"></script>
</body>
</html>
</html>