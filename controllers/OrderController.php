<?php
class OrderController
{
    private $productModel;
    public function __construct()
    {
        $this->productModel = new ProductsModel();
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
            $products = $this->productModel->getCartItems($ids);
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