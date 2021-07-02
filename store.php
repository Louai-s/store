<!DOCTYPE html>
<html>

<head>
    <title>L&T | Market</title>
    <meta name="description" content="This is the description">
    <link rel="stylesheet" href="styles.css" />
    <script src="store.js" async></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body onload="viewPrevPurchaces3();">
    <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    </div>
    <header class="main-header">
        <nav class="main-nav nav">
            <ul>
                <li><a href="store.php">STORE</a></li>
            </ul>
        </nav>
        <h1 class="band-name band-name-large">Shopping List</h1>
        <?php
        session_start();
        ?>
        <div id="login">
            <?php
            if (isset($_SESSION['username'])) { //test if we have a login username
                print "Hello, " . $_SESSION["FN"] . " " . $_SESSION["LN"];
            ?>
                <a href="logout.php"><br>Logout</a>
            <?php
            }
            ?>

        </div>
    </header>
    <nav class="secondary-nav nav">
        <ul>
            <li><button id="ShowBtn" onclick="show()" value="Show Recommended Items">Show Recommended Items</button></li>
            <button class="btn btn-secondary show-prev" onclick="viewPrevPurchaces()" value="item1">Previous Lists 1</button>
            <button class="btn btn-secondary show-prev" onclick="viewPrevPurchaces2()" value="item2">Previous Lists 2</button>
        </ul>
    </nav>
    <hr class="solid">
    <div class="float-container">
        <div class="float-child">
            <div id="prevtitle">
                <h3>Previous Purchased Items:</h3>
                <div id="table-container">
                </div>
            </div>
        </div>
        <div class="float-child">
            <div class="list">
                <h3>Type Items To Add:</h3>
                <input type="text" class="addItemInput" placeholder="Typing.."> &nbsp
                <button class="btn btn-primary list-item-button"> Add Item </button> &nbsp&nbsp
                <button class="btn btn-danger" type="button" onclick="MakeNewList()" style="background-color: red;color: white;">Make a new List</button> <br> <br>
                <ul>
                </ul>
            </div>
        </div>
    </div>
    <section class="container content-section">
        <div id="RecommendedItems">
            <h2 class="section-header">Recommended Items
            </h2>
            <div class="shop-items">
                <div class="shop-item">
                    <span class="shop-item-title">Nescafi</span>
                    <img class="shop-item-image" src="Images/nes.jpg">
                    <div class="shop-item-details">
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO LIST</button>
                    </div>
                </div>
                <div class="shop-item">
                    <span class="shop-item-title">Milk</span>
                    <img class="shop-item-image" src="Images/milk.jpg">
                    <div class="shop-item-details">
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO LIST</button>
                    </div>
                </div>
            </div>
            </h2>
            <div class="shop-items">
                <div class="shop-item">
                    <span class="shop-item-title">chocolate</span>
                    <img class="shop-item-image" src="Images/chock3.jpg">
                    <div class="shop-item-details">
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO LIST</button>
                    </div>
                </div>
                <div class="shop-item">
                    <span class="shop-item-title">HotDogs</span>
                    <img class="shop-item-image" src="Images/hotdog.jpg">
                    <div class="shop-item-details">
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO LIST</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <section class="container content-section">
        <div class="cart-row">
            <span class="cart-item cart-header cart-column">ITEM</span>
            <span class="cart-quantity cart-header cart-column">QUANTITY</span>
        </div>
        <div id='NEW' class="cart-items">
        </div>
    </section>
    <br><br><br>

    <footer class="main-footer">
        <div class="container main-footer-container">
            <h4 class="band-name">L&T Market © 2021 All Rights Reserved</h4>

        </div>
    </footer>
</body>
<script>
    document.getElementById("RecommendedItems").style.display = "none";

    function show() {
        var x = document.getElementById("RecommendedItems");
        var btn = document.getElementById("ShowBtn");
        if (x.style.display == "none" && btn.value == "Show Recommended Items") {
            x.style.display = "block";
            btn.innerHTML = "Hide Recommended Items";
        } else {
            x.style.display = "none";
            btn.innerHTML = "Show Recommended Items";
        }
    }

    function MakeNewList() {
        var x = document.getElementById('NEW');
        x.innerHTML = "";

    }
</script>

</html>