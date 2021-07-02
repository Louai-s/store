<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
session_start();
// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error); //the result if we dont have connection to database
}

$us = $_POST["Email"]; //set the username from textbox username
$pass = $_POST["password"]; //set the password from textbox password

$sql = "SELECT Email from client1 where Email='$us' AND Password='$pass'"; //searching for what username and password vaild
$result = $conn->query($sql);

if ($result->num_rows > 0) { //if result bigger than 0 thats mean password and username is vaild
  $row = $result->fetch_assoc();

  $_SESSION["Email"] = $us; //start session to username
  $_SESSION["password"] = $pass; //start session to password
  $_SESSION["Email"] = $row["Email"]; //start session of name to print it
  //$_SESSION["LN"] = $row["LastName"]; //start session of lastname to print it!
  //$_SESSION["Admin"] = $row["Admin"]; //if he an admin the session value will be "1"!
  if (isset($_COOKIE[$_SESSION['Email']])) //if we have an cookie we put the cookie in session array of items!
  {
    $cart = $_COOKIE[$_SESSION['Email']];
    $_SESSION['cart'] = unserialize($cart);
    $total = $_COOKIE[$_SESSION['Email'] . "1"];
    $_SESSION['total'] = $total;
  } else {
    $_SESSION['total'] = 0; //if we dont have and cookie we start with 0 items in the card
  }

  echo "<script type='text/javascript'>alert('Logged in successfuly!');
            window.location.href = ('store.php');
             </script>";
} else { //if the clint didnt put the username and passowrd vaild!
  echo "<script type='text/javascript'>alert('Wrong Username or Password!!');
            window.history.back();
             </script>"; //print this and back to backward page
}
$conn->close();//end the connection with data base
?>
