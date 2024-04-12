<?php

class OrderController
{
    private $orderModel;

    public function __construct()
    {
        $this->orderModel = new OrdersModel();
    }

    public function cartItems()
    {
        $cartItems = [];
        $_SESSION['total'] = 0;

        if (!empty($_SESSION['cart'])) {
            $ids = [];
            foreach ($_SESSION['cart'] as $key => $value) {
                $ids[] = $_SESSION['cart'][$key]['id'];
            }
            $products = $this->orderModel->getCartItems($ids);
            foreach ($products as $product) {
                foreach ($_SESSION['cart'] as $key => $value) {
                    $product['quantity'] = $_SESSION['cart'][$key]['quantity'];
                    $cartItems[] = $product;
                    $total = $product['price'] * (int)$product['quantity'];
                    $_SESSION['total'] += $total;
                }
            }
        }
        include '../views/templates/cart.php';
    }


    public function checkout()
    {
        include '../views/templates/checkout.php';
        if (isset($_POST['nameC']) && isset($_POST['phone']) && isset($_POST['addressC']) && isset($_POST['checkoutSubmit'])) {
            $this->orderModel->orderCheckout();
            unset($_SESSION['cart']);
            $_SESSION['total'] = 0;
            header('Location: ../public/index.php?route=first');
        }
    }

    public function getOrders()
    {
        $results = $this->orderModel->orders();
        include '../views/templates/orders.php';
    }
}