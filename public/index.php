<?php
session_start();
require_once '../config/db.php';
require_once '../models/AdminModel.php';
require_once '../models/OrdersModel.php';
require_once '../models/ProductsModel.php';
require_once '../controllers/AdminController.php';
require_once '../controllers/OrderController.php';
require_once '../controllers/ProductsController.php';

$admin = new AdminController();
$product=new ProductsController();
$order = new OrderController();

include '../views/templates/navigation.php';
$route = $_GET['route'] ?? 'first';

switch ($route) {
    case ('first'):
        $product->showProducts();
        break;
    case 'adminLogin':
        $_SESSION['isAdmin'] = false;
        $admin->adminLogin();
        break;
    case 'view':
        $product->viewProduct();
        break;
    case 'delete':
        $product->deleteProductById();
        break;
    case 'add':
        $product->addNewProduct();
        break;
    case 'edit':
        $product->updateProductById();
        break;
    case 'cart':
        $order->cartItems();
        break;
    case 'checkout':
        $order->checkout();
        break;
    case 'orders':
        $order->getOrders();
        break;

}
