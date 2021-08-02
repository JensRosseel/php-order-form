<?php

// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);

// We are going to use session variables so we need to enable sessions
session_start();

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
    return [];
}

function handleForm()
{
    // Validation (step 2)
    $invalidFields = validate();
    if (!empty($invalidFields)) {
        // TODO: handle errors
    } else {
        // TODO: handle successful submission
        // TODO: form related tasks (step 1)
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['street'] = $_POST['street'];
        $_SESSION['streetnumber'] = $_POST['streetnumber'];
        $_SESSION['city'] = $_POST['city'];
        $_SESSION['zipcode'] = $_POST['zipcode'];
        $_SESSION['products'] = $_POST['products'];
        echo "<script type='text/javascript'> alert('Thank you for your order! \\n E-mail - {$_SESSION['email']} \\n Address - {$_SESSION['street']} {$_SESSION['streetnumber']} \\n Zipcode - {$_SESSION['zipcode']} \\n City - {$_SESSION['city']} \\n Order: ";
        if($_SESSION['products'][0] != NULL){
            echo "\\n Holy Grail - 500";
        }
        if($_SESSION['products'][1] != NULL){
            echo "\\n Golden Fleece - 250";              
        }
        if($_SESSION['products'][2] != NULL){
            echo "\\n Excalibur - 10";
        }
        echo "')</script>";
    }
}

// TODO: replace this if by an actual check
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    handleForm();
}


require 'form-view.php';