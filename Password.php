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

    <div id="ResetPass">
        <h2 class="section-header" style="font-size: xx-large;">Reset your Password</h2>

        <form method="post" enctype="multipart/form-data">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "mydb";

            // Create connection
            //in the page we talk about admin can add supplier or update item or add item
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error); //the result if we dont have connection to database
            }
            //if he did press on update to make an update of products 
            print "Please insert the id and the new password:<br><br>"
            ?>
            Id:  &nbsp;&nbsp; &nbsp; &nbsp;<input type="text" name="Id" required><br><br>
            New Pass &nbsp;<input type="number" name="pass" min="1" required><br><br><br>
            <button type="submit" name="done" value="1">Done</button>
    </div>
    <?php
    if (isset($_POST["done"])) {

        if ($_POST["done"] == 1) { //if he did click on update item to update the item
            $Password = $_POST["pass"];
            $id = $_POST["Id"];
            $sql = "SELECT FirstName,Id,Password FROM client WHERE Id='$id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { //if the item exist in the database to update him
                    print "<br><b>FirstName</b>: " . $row["FirstName"] . " <b>Id</b>: " . $row["Id"] . "<b> Password</b>: " . $row["Password"] . "<br>";
                }
                $sql = "UPDATE client SET Password='$Password' WHERE Id='$id'";
                $result = $conn->query($sql); //upated to new quintity

                print "<br>password updated to " . $Password . "<br>";
            } else { //if he pressed an id doesnt exist in the databae
                print "<br>There is a problem!! Try again with another id!!";
            }
        }
    }
    ?>

    <footer class="main-footer">
        <div class="container main-footer-container">
            <h4 class="band-name">L&T Market © 2021 All Rights Reserved</h4>
        </div>

    </footer>
</body>

</html>