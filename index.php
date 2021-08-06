<?php

// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);

// We are going to use session variables so we need to enable sessions
session_start();
if(isset($_POST['email'])){
    $_SESSION['email'] = $_POST['email'];
}
if(isset($_POST['street'])){
    $_SESSION['street'] = $_POST['street'];
}
if(isset($_POST['streetnumber'])){
    $_SESSION['streetnumber'] = $_POST['streetnumber'];
}
if(isset($_POST['city'])){
    $_SESSION['city'] = $_POST['city'];
}
if(isset($_POST['zipcode'])){
    $_SESSION['zipcode'] = $_POST['zipcode'];
}
if(isset($_POST['products'])){
    $_SESSION['products'] = $_POST['products'];
}

// Use this function when you need to need an overview of these variables
function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

// TODO: provide some products (you may overwrite the example)
$products = [];

if($_GET['mythical'] == 1){
    array_push($products, ['name' => 'Holy Grail', 'price' => 500]);
    array_push($products, ['name' => 'Golden Fleece', 'price' => 250]);
    array_push($products, ['name' => 'Excalibur', 'price' => 10]);
}
else{
    array_push($products, ['name' => 'A load of nothing', 'price' => 1000]);
    array_push($products, ['name' => 'A bit of nothing', 'price' => 150]);
    array_push($products, ['name' => 'A sprinkle of nothing', 'price' => 10]);
}

$totalValue = 0;

function validate()
{
    $error = "";
    if (empty($_POST["email"])) {
        $error = "Email is required";
    } 
    else if (empty($_POST["street"])) {
        $error = "Street is required";
    } 
    else if (empty($_POST["streetnumber"])) {
        $error = "Streetnumber is required";
    } 
    else if (empty($_POST["city"])) {
        $error = "City is required";
    } 
    else if (empty($_POST["zipcode"])) {
        $error = "Zipcode is required";
    } 
    else if (empty($_POST["products"][0]) && empty($_POST["products"][1]) && empty($_POST["products"][2])) {
        $error = "A product is required";
    } 
    else if (!preg_match('/^([0-9]+)$/', $_POST['zipcode'])){
        $error = "Zipcode can only contain numbers";
    }
    return $error;
}

function refill(){
    echo "<script type='text/javascript'> ";
    echo "document.getElementById('email').value = '{$_SESSION['email']}'; ";
    echo "document.getElementById('street').value = '{$_SESSION['street']}'; ";
    echo "document.getElementById('streetnumber').value = '{$_SESSION['streetnumber']}'; ";
    echo "document.getElementById('city').value = '{$_SESSION['city']}'; ";
    echo "document.getElementById('zipcode').value = '{$_SESSION['zipcode']}'; ";
    if($_SESSION['products'][0] == 1){
        echo "document.getElementById('products[0]').checked = true; ";
    }
    if($_SESSION['products'][1] == 1){
        echo "document.getElementById('products[1]').checked = true; ";
    }
    if($_SESSION['products'][2] == 1){
        echo "document.getElementById('products[2]').checked = true; ";
    }
    echo "</script>";
}

function handleForm()
{
    // Validation (step 2)
    $error = validate();
    if ($error != "") {
        // TODO: handle errors
        echo "<script type='text/javascript'> document.getElementById('error').innerHTML = '{$error}'; document.getElementById('error').setAttribute('class', 'alert alert-warning');</script>";
    } else {
        // TODO: handle successful submission
        $_SESSION['products'] = $_POST['products'];
        echo "<script type='text/javascript'> alert('Thank you for your order! \\n E-mail - {$_SESSION['email']} \\n Address - {$_SESSION['street']} {$_SESSION['streetnumber']} \\n Zipcode - {$_SESSION['zipcode']} \\n City - {$_SESSION['city']} \\n Order: ";
        if(!empty($_SESSION['products'][0])){
            if($_GET['mythical'] == 1){
                echo "\\n Holy Grail - €500.00";
            }
            else{
                echo "\\n A load of nothing - €1000.00";   
            }
        }
        if(!empty($_SESSION['products'][1])){
            if($_GET['mythical'] == 1){
                echo "\\n Golden Fleece - €250.00"; 
            }
            else{
                echo "\\n A bit of nothing - €250.00";   
            }
        }
        if(!empty($_SESSION['products'][2])){
            if($_GET['mythical'] == 1){
                echo "\\n Excalibur - €10.00";
            }
            else{
                echo "\\n A sprinkle of nothing - €10.00";   
            }
        }
        echo "')</script>";
    }
}
require 'form-view.php';
// TODO: replace this if by an actual check
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    handleForm();
}

refill();

