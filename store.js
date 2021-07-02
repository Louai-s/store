if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}
function ready() {
    var removeCartItemButtons = document.getElementsByClassName('btn-danger')
    for (var i = 0; i < removeCartItemButtons.length; i++) {
        var button = removeCartItemButtons[i]
        button.addEventListener('click', removeCartItem)
    }

    var quantityInputs = document.getElementsByClassName('cart-quantity-input')
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i]
        input.addEventListener('change', quantityChanged)
    }

    var addToCartButtons = document.getElementsByClassName('shop-item-button')
    for (var i = 0; i < addToCartButtons.length; i++) {
        var button = addToCartButtons[i]
        button.addEventListener('click', addToCartClicked)
    }

    var addToCartButtons = document.getElementsByClassName('list-item-button')
    for (var i = 0; i < addToCartButtons.length; i++) {
        var button = addToCartButtons[i]
        button.addEventListener('click', ADDITEM)
    }
}

function purchaseClicked(event) {
    var button = event.target
    var shopItem = button.parentElement.parentElement
    var title = shopItem.getElementsByClassName('cart-item-title')[0].innerText
    var r = confirm("Are you sure you want to Purchase the item: " + title + "?");
    if (r == true) {
        var buttonClicked = event.target
        shopItem.style.textDecoration = 'line-through';
    }
}

function removeCartItem(event) {
    var button = event.target
    var shopItem = button.parentElement.parentElement
    var title = shopItem.getElementsByClassName('cart-item-title')[0].innerText
    console.log(title)
    var r = confirm("Are you sure you want to remove the item: " + title + "?");
    if (r == true) {
        var buttonClicked = event.target
        buttonClicked.parentElement.parentElement.remove()
        alert('Item removed')
    } else {
        alert('Nothing changed')
    }

}
function PurchaseClicked1(event) {
    var button = event.target
    var shopItem = button.parentElement.parentElement
    var check = shopItem.getElementsByClassName('btn-success')[0].innerHTML
    var qty = shopItem.getElementsByClassName('cart-quantity-input')[0].value
    var title = shopItem.getElementsByClassName('cart-item-title')[0].innerText
    if (check == 'PURCHASE') {
        shopItem.getElementsByClassName('btn-success')[0].innerHTML = 'PURCHACED'
        shopItem.getElementsByClassName("cart-item-title")[0].style.backgroundColor = "lightgreen";
        shopItem.getElementsByClassName("btn-danger")[0].style.display = "none";
        shopItem.getElementsByClassName("cart-quantity-input")[0].readOnly = true;

    } else {
        shopItem.getElementsByClassName('btn-success')[0].innerHTML = 'PURCHASE'
        shopItem.getElementsByClassName("cart-item-title")[0].style.backgroundColor = "white";
        shopItem.getElementsByClassName("btn-danger")[0].style.display = "block";
        shopItem.getElementsByClassName("cart-quantity-input")[0].readOnly = false;
    }
}


function saveToDB(event) {
    var button = event.target
    var shopItem = button.parentElement.parentElement
    var qty = shopItem.getElementsByClassName('cart-quantity-input')[0].value
    var title = shopItem.getElementsByClassName('cart-item-title')[0].innerText
    updateDataBase(title, qty)
}



function updateDataBase(title, qty) {
    $(document).ready(function () {
        if (title != "" && qty != "") {
            $.ajax({
                url: "save.php",
                type: "POST",
                data: {
                    title: title,
                    qty: qty
                },
                cache: false,
                success: function (dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        alert("DataBase Updated");
                    }
                    else if (dataResult.statusCode == 201) {
                        alert("Error occured !");
                    }
                }
            });
        }
    });
}

function deleteDataFromDB(title) {
    $(document).ready(function () {
        if (title != "") {
            $.ajax({
                url: "delete_ajax.php",
                type: "POST",
                data: {
                    title: title
                },
                cache: false,
                success: function (dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        alert("DataBase Updated");
                    }
                    else if (dataResult.statusCode == 201) {
                        alert("Error occured !");
                    }
                }
            });
        }
    });
}

function viewPrevPurchaces() {
    $(document).ready(function () {
        $.ajax({
            url: "view_ajax.php",
            type: "POST",
            cache: false,
            success: function (data) {
                alert(data);
                var dataSplit = data.split(' ');
                dataSplit.pop();
                $.each(dataSplit, function (index) {
                    addItemToCart(dataSplit[index]);
                    console.log(dataSplit[index]);

                });

            }

        });
    });
}
function viewPrevPurchaces2() {
    $(document).ready(function () {
        $.ajax({
            url: "view_ajax2.php",
            type: "POST",
            cache: false,
            success: function (data) {
                alert(data);
                var dataSplit = data.split(' ');
                dataSplit.pop();
                $.each(dataSplit, function (index) {
                    addItemToCart(dataSplit[index]);

                });

            }

        });
    });
}

function viewPrevPurchaces3() {
    $.ajax({
        url: "view_ajax3.php",
        type: "POST",
        cache: false,
        success: function (data) {
            $('#table-container').html(data);
        }
    });
}



function quantityChanged(event) {
    var input = event.target
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1
    }
    updateCartTotal()
}

function addToCartClicked(event) {
    var button = event.target
    var shopItem = button.parentElement.parentElement
    var title = shopItem.getElementsByClassName('shop-item-title')[0].innerText
    console.log(title)
    var r = confirm("Are you sure you want to add the item |" + title + "| to the cart?");
    if (r == true) {
        var button = event.target
        var shopItem = button.parentElement.parentElement
        var title = shopItem.getElementsByClassName('shop-item-title')[0].innerText
        var imageSrc = shopItem.getElementsByClassName('shop-item-image')[0].src
        addItemToCart(title, imageSrc)
    }
    else {
        alert('Nothing changed')
    }
}
function ADDITEM(event) {
    var button = event.target
    var list = button.parentElement.parentElement
    var title = list.getElementsByClassName('addItemInput')[0].value
    console.log(title)
    var r = confirm("Are you sure you want to add the item |" + title + "| to the cart?");
    if (r == true) {
        var button = event.target
        var list = button.parentElement.parentElement
        var title = list.getElementsByClassName('addItemInput')[0].value
        addItemToCart(title)
    }
    else {
        alert('Nothing changed')
    }
}

function addItemToCart(title) {
    var cartRow = document.createElement('div')
    cartRow.classList.add('cart-row')
    var cartItems = document.getElementsByClassName('cart-items')[0]
    var cartItemNames = cartItems.getElementsByClassName('cart-item-title')
    for (var i = 0; i < cartItemNames.length; i++) {
        if (cartItemNames[i].innerText == title) {
            alert('This item is already added to the cart')
            return
        }
    }
    var cartRowContents = `
        <div class="cart-item cart-column">
            <span class="cart-item-title">${title}</span>
        </div>
        <div class="cart-quantity cart-column">
            <input class="cart-quantity-input" type="number" value="1">
            <button class="btn btn-danger" type="button">REMOVE</button>
            &nbsp;&nbsp;&nbsp;
            <button class="btn btn-success" type="button">PURCHASE</button>
            &nbsp;&nbsp;&nbsp;
            <button class="btn btn-secondary" type="button">Save To DB</button>
        </div>`
    cartRow.innerHTML = cartRowContents
    cartItems.append(cartRow)
    cartRow.getElementsByClassName('btn-danger')[0].addEventListener('click', removeCartItem)
    cartRow.getElementsByClassName('btn-secondary')[0].addEventListener('click', saveToDB)
    cartRow.getElementsByClassName('btn-success')[0].addEventListener('click', PurchaseClicked1)
    cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', quantityChanged)
}


function updateCartTotal() {
    var cartItemContainer = document.getElementsByClassName('cart-items')[0]
    var cartRows = cartItemContainer.getElementsByClassName('cart-row')
    var total = 0
    for (var i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i]
        var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0]
        var quantity = quantityElement.value
    }
}

function checkEmail(event) {
    const e1 = this.Email.value;
    const e2 = this.Confirm.value;
    const re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    const isEmail = re.test(e1);
    const isMatch = e1 === e2;
    if (!isEmail) {
        event.preventDefault();
        alert('Invalid email address');
    }
    else if (!isMatch) {
        event.preventDefault();
        alert("Those emails don't match!");
    }
    if (isMatch && isEmail) {
        alert('Congratulations! Now you are a Member of our Family')
    }
}

function checkPass(event) {
    const p1 = this.pass.value;
    const p2 = this.New.value;
    const e1 = this.Email.value;
    const isMatch = p1 === p2;
    const IsPass = p1.length >= 5
    const re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    const isEmail = re.test(e1);
    if (!isEmail) {
        event.preventDefault();
        alert('Invalid email address');
    }
    else if (!IsPass) {
        event.preventDefault();
        alert('Password Have to be minimum 5 letters or numbers');
    }
    else if (!isMatch) {
        event.preventDefault();
        alert("Those Passwords don't match!");
    }
    if (isMatch && IsPass) {
        alert('Your Password have been changed!')
    }
}

/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function (event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}



