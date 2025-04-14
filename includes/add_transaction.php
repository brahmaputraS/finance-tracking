<?php
require_once 'functions.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    if (isset($_POST['description']) && isset($_POST['amount'])) {
        $description = trim($_POST['description']);
        $amount = floatval($_POST['amount']);
        
  
        if (empty($description)) {
            die('Description cannot be empty');
        }
        
        
        addTransaction($description, $amount);
        
        
        header('Location: ../index.php');
        exit;
    } else {
        die('Invalid input');
    }
} else {
    header('Location: ../index.php');
    exit;
}