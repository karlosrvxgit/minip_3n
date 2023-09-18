<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login sistem</title>
    <link rel="stylesheet" href="stylein.css">

</head>

<body>
    <div class="form-container">
        <form action="/login/login_process.php" method="post">
            <div><img src="/imagenes/devchallenges.svg" class="devchallenges" alt="devch"></div><br>
            <span class="join">Welcome</span><br><br>
            <span class="join">to Login sistem</span><br><br><br><br><br>

            <div class="form-group">

                <a href="/login/login.php" class="btn-primary">Iniciar Sesión</a>

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

</body>

</html>