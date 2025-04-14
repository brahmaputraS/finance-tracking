<?php
require_once 'functions.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    deleteTransaction($id);
    
    header('Location: ../index.php');
    exit;
} else {
    header('Location: ../index.php');
    exit;
}