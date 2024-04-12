<?php
session_start();
require_once '../controllers/AdminController.php';
require_once '../controllers/OrderController.php';
require_once '../controllers/ProductsController.php';

$admin = new AdminController();
$product=new ProductsController();
$order = new OrderController();

$route = $_GET['route'] ?? 'first';

include '../views/templates/navigation.php';


switch ($route) {
    case ('first'):
        $products = $product->showProducts();
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
        $order->cart();
        break;
    case 'checkout':
        $order->Checkout();
        break;
    case 'orders':
        $order->getOrders();
        break;

}
