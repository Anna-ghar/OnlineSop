<?php
session_start();

if (isset($_POST['id']) && isset($_POST['quantity'])) {
    $productId = $_POST['id'];
    $quantity = $_POST['quantity'];

    $_SESSION['cart'][] = ['id' => $productId, 'quantity' => $quantity];
    $res = 'Item added to cart successfully';
    var_dump($_SESSION['cart']);
} else {
    $res =  'Invalid request';
}
echo json_encode($res);
