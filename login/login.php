<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" type="text/css" href="/login/stylel.css">
</head>

<body>
    <!-- Formulario de inicio de sesión -->
    <div class="form-container">
        <form action="/login/login_process.php" method="post">
            <div><img src="/imagenes/devchallenges.svg" class="devchallenges" alt="devch"></div><br>
            <span class="join">Login</span><br><br>


            <div class="form-group">
                <label for="form2Example1"></label>
                <div class="emailr">
                    <!-- <span class="material-symbols-outlined" id="mail">mail</span> -->
                    <input type="email" name="email" id="form2Example1" placeholder="Email" required><br>
                </div>

            </div>

            <div class="form-group">
                <!-- <label for="form2Example2">Contraseña:</label> -->
                <div>
                    <input type="password" name="password" id="form2Example2" placeholder="Password" required><br>
                </div>

                <input type="submit" class="btn-primary" value="Login">
                <br>
                <br><br><br>
                <span class="continue">or continue with these social profile</span>


                <div class="social-buttons">
                    <button type="button">
                        <img src="/imagenes/Google.svg" alt="google">
                    </button>
                    <button type="button">
                        <img src="/imagenes/Facebook.svg" alt="facebook">
                    </button>
                    <button type="button">
                        <img src="/imagenes/Twitter.svg" alt="twitter">
                    </button>
                    <button type="button">
                        <img src="/imagenes/Gihub.svg" alt="google">
                    </button>
                </div>
                <br><br>
                <div class="Loginend">
                    <span class="already">Don't have an account yet?</span>
                    <span><a href="/register/register.php" class="login">Register</a></span>
                </div>

            </div>
        </form>
    </div>
</body>
<div class="footerend">
    <footer>created by Carlos RV</footer>
    <footer>devChallenges.io</footer>
</div>

</html>