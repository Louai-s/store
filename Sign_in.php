<!DOCTYPE html>
<html>

<head>
    <title>L&T | Market</title>
    <meta name="description" content="This is the description">
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
    <header class="main-header">
        <nav class="main-nav nav">
            <ul>
                <li><a href="Sign_up.php">SIGN UP</a></li>
                <li><a href="Sign_in.php">SIGN IN</a></li>
            </ul>
        </nav>
        <h1 class="band-name band-name-large">L&T Market</h1>
    </header>

    <h2 class="section-header" align="center" style="font-size: xx-large;"> Sign in </h2>
    <br><br>
    <?php
    session_start();
    ?>
    <div class="titlepic2">
        <div id="SignIN">
            <?php
            if (!isset($_SESSION['Email'])) { //test if we have a login username

            ?>
                <b>Login</b>
                <form method="post" action="Connect.php">
                    <input type="text" name="Email" required>
                    <br><br><br>
                    <input type="password" name="password" required>
                    <br><br><br>
                    <input type="submit" name="signin" value="Sign In">
                </form>
            <?php


            } else { // if the client did logedin
                header("Location:store.php");


            ?>

            <?php
            }

            ?>
            <div id=SignIN>
                <a href="Sign_up.php" style="display: inline-block;color: blue; ">
                    <h4>Sign Up </h4>
                </a>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <a href="Password.php" style="display: inline-block;color: blue;">
                    <h4>Forgot Your Password?</h4>
                </a>
            </div>

        </div>
    </div>

    <footer class="main-footer">
        <div class="container main-footer-container">
            <h4 class="band-name">L&T Market © 2021 All Rights Reserved</h4>
        </div>
    </footer>
</body>

</html>
