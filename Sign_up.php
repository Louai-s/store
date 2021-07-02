<!DOCTYPE html>
<html>

<head>
    <title>L&T | Market</title>
    <meta name="description" content="This is the description">
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="store.js" async></script>
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
    <div id="SignUp">
        <h2 class="section-header" align="center" style="font-size: xx-large;"> Create New Account</h2>
    </div>
    <br>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydb";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    //we add a new client to database in this php page
    if ($conn->connect_error)
        die("Connection failed: " . $conn->connect_error);
    if ($_POST) {
        $users_Email = $_POST['Email']; //his id to access to account
        $users_Confirm = $_POST['Confirm']; //his firstname
        $users_Nickname = $_POST['Nickname']; //his lastname
        $users_Phone = $_POST['Phone']; //his birthday
        $users_Password = $_POST['Password']; //password to access to account
        


            $query = "INSERT INTO client1(Email, Nickname,PhoneNumber,Password) VALUES 
            ('$users_Email','$users_Nickname','$users_Phone','$users_Password')";
            if ($conn->query($query) === TRUE) { //if did added to the clients
            ?>
                <script type='text/javascript'>
                    alert('Added !!');
                    window.location.href = "Sign_in.php";
                </script>";

            <?php
            } else //if didnt added
        {
            echo "<script type='text/javascript'>alert('Error!! You already have an account !'); 
            window.history.back();
            </script>";
        }
    } else {
        ?>
        <div id="SignUp">

            <form method="post">
            <h2 class="section-header" align="center" style="font-size: xx-large;"> Create New Account</h2>
            <label for="Email">&nbsp&nbsp E-mail Address:</label><br>
            &nbsp&nbsp<input type="Email" name="Email" id="Email"><br><br> 
            <label for="Confirm">&nbsp&nbspConfirm E-mail Address:</label><br>
            &nbsp&nbsp<input type="Email" name="Confirm" id="Confirm"><br><br>
            <label for="Nickname">&nbsp&nbspNickname(Optional):</label><br>
            &nbsp&nbsp<input type="text" name="Nickname" id="Nickname"><br><br>
            <label for="Phone">&nbsp&nbspPhone Number(Optional):</label><br>
            &nbsp&nbsp<input type="text" name="Phone" id="Phone"><br><br>
            <label for="Password">&nbsp&nbsp Password:</label><br>
            &nbsp&nbsp<input type="Password" name="Password" id="Password"><br><br>
            <button class="btn btn-primary shop-item-button" onclick="checkEmail(event)" type="submit">Create</button>
            </form>
        </div>
        <br><br><br>

        <footer class="main-footer">
            <div class="container main-footer-container">
                <h4 class="band-name">L&T Market © 2021 All Rights Reserved</h4>
            </div>
        </footer>
</body>

</html>
<?php
    }
    $conn->close(); //end the connection with data base
?>
