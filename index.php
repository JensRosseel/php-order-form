<?php

// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);

// We are going to use session variables so we need to enable sessions
session_start();
$_SESSION['email'] = $_POST['email'];
$_SESSION['street'] = $_POST['street'];
$_SESSION['streetnumber'] = $_POST['streetnumber'];
$_SESSION['city'] = $_POST['city'];
$_SESSION['zipcode'] = $_POST['zipcode'];
$_SESSION['products'] = $_POST['products'];

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
$products = [
    ['name' => 'Holy Grail', 'price' => 500],
    ['name' => 'Golden Fleece', 'price' => 250],
    ['name' => 'Excalibur', 'price' => 10]
];

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
            echo "\\n Holy Grail - 500";
        }
        if(!empty($_SESSION['products'][1])){
            echo "\\n Golden Fleece - 250";              
        }
        if(!empty($_SESSION['products'][2])){
            echo "\\n Excalibur - 10";
        }
        echo "')</script>";
    }
}
whatIsHappening();
require 'form-view.php';
// TODO: replace this if by an actual check
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    handleForm();
}

session_destroy();