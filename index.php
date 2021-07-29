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
    // This function will send a list of invalid fields back
    return [];
}

function handleForm()
{
    // TODO: form related tasks (step 1)
    
    echo "<p>Thank you for your order!</p>";
    echo "<p>E-mail - {$_SESSION['email']} <br>Address - {$_SESSION['street']} {$_SESSION['streetnumber']} <br>Zipcode - {$_SESSION['zipcode']} City - {$_SESSION['city']}</p>";
    echo "<p>Order - ";
    echo "</p>";
    // Validation (step 2)
    $invalidFields = validate();
    if (!empty($invalidFields)) {
        // TODO: handle errors
    } else {
        // TODO: handle successful submission
    }
}

// TODO: replace this if by an actual check
whatIsHappening();
handleForm();

require 'form-view.php';