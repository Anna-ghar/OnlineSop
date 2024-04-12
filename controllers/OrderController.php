<?php

require_once '../config/db.php';
require_once '../models/ProductsModel.php';
require_once '../models/OrdersModel.php';

class OrderController
{
    private $productModel;
    public function __construct()
    {
        $this->productModel = new ProductsModel();
    }

    public function cart()
    {
        $cartItems = [];
        $_SESSION['total'] = 0;
        $products = $this->productModel->getProducts();
        if (!empty($_SESSION['cart'])) {
            foreach ($products as $product) {
                foreach ($_SESSION['cart'] as $key => $value) {
                    if (in_array($product['product_id'], $_SESSION['cart'][$key])) {
                        $product['quantity'] = $_SESSION['cart'][$key]['quantity'];
                        $cartItems[] = $product;
                        $total = $product['price'] * (int)$product['quantity'];
                        $_SESSION['total'] += $total;
                    }
                }
            }
            include '../views/templates/cart.php';
        }
    }


    public function Checkout()
    {
        include '../views/templates/checkout.php';
        if (isset($_POST['nameC']) && isset($_POST['phone']) && isset($_POST['addressC']) && isset($_POST['checkoutSubmit']) ){
            $array = Array(
                'name' => $_POST['nameC'],
                'phone' => $_POST['phone'],
                'address' => $_POST['addressC']
            );

            $json = json_encode($array);

            $this->productModel->orderCheckout($json);
            Unset($_SESSION['cart']);
            $_SESSION['total'] = 0;
            header('Location: ../public/index.php?route=first');
        }
    }

    public function getOrders()
    {
        $model = new OrdersModel();
        $results = $model->Orders();
        include '../views/templates/orders.php';
    }
}