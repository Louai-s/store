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
        $users_Id = $_POST['Id']; //his id to access to account
        $users_FirstName = $_POST['FirstName']; //his firstname
        $users_LastName = $_POST['LastName']; //his lastname
        $users_Birthday = $_POST['bday']; //his birthday
        $users_AddressCity = $_POST['AddressCity']; //his address city
        $users_AdressStreet = $_POST['AddressStreet']; //his address street
        $users_PhoneNumber = $_POST['PhoneNumber']; //his phone number
        $users_Gender = $_POST['Gender']; //if he is male or female
        $users_Password = $_POST['Password']; //password to access to account


        $query = "INSERT INTO client(Id, FirstName,LastName,Birthday,AddressCity,AddressStreet,PhoneNumber,Gender,Password) VALUES 
  ('$users_Id','$users_FirstName','$users_LastName','$users_Birthday','$users_AddressCity','$users_AdressStreet','$users_PhoneNumber','$users_Gender','$users_Password')";
        if ($conn->query($query) === TRUE) { //if did added to the clients
    ?>
            <script type='text/javascript'>
                alert('Added !!');
                window.location.href = "Sign_in.php";
            </script>";

        <?php
        } else //if didnt added
        {
            echo "<script type='text/javascript'>alert('Error!!'); 
window.history.back();
 </script>";
        }
    } else {
        ?>
        <div id="SignUp">

            <form method="post">
                <table align='center'>
                    <tr>
                        <td>ID</td>
                        <td><input type="text" name="Id" pattern="[0-9]{3,}" title="Plese Enter Just a Numbers" required></td>
                    </tr>
                    <tr>
                        <td>First name</td>
                        <td><input type="text" name="FirstName" pattern="[A-Za-z]{2,}" title="First Name have numbers Or less than two charchter" required></td>
                    </tr>
                    <tr>
                        <td>Last name</td>
                        <td><input type="text" name="LastName" pattern="[A-Za-z]{2,}" title="First Name have numbers Or less than two charchter" required></td>
                    </tr>
                    <tr>
                        <td>Birthday</td>
                        <td><input type="date" value="2011-01-13" name="bday"></td>
                    </tr>
                    <tr>
                        <td>Address City</td>
                        <td><input type="text" name="AddressCity" required></td>
                    </tr>
                    <tr>
                        <td>Adress Street</td>
                        <td><input type="text" name="AddressStreet" required></td>
                    </tr>
                    <tr>
                        <td>Phonenumber</td>
                        <td><input type="text" name="PhoneNumber" pattern="[0-9]{10,10}" title="Enter 10 Numbers" maxlength="10" required></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td><input type="text" name="Gender" required></td>
                    </tr>
                    <tr>
                        <td>Pass</td>
                        <td><input type="password" name="Password" required></td>
                    </tr>
                    <tr>
                        <th colspan="2"><input type="submit" value="Submit"></th>
                    </tr>
                </table>
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