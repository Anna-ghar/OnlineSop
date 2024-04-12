<?php

class OrdersModel
{
    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function getCartItems($ids)
    {
        $cartItems = [];
        $placeholders = implode(',', array_fill(0, count($ids), '?'));

        $sql = 'SELECT * FROM products WHERE product_id IN (' . $placeholders . ')';
        $stmt = $this->conn->prepare($sql);

        foreach ($ids as $key => $id) {
            $stmt->bindValue(($key + 1), $id, PDO::PARAM_INT);
        }

        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cartItems[] = $row;
        }

        return $cartItems;
    }



    public function orderCheckout()
    {
        $sql = 'INSERT INTO orders (order_date,customer_name, phone, address, total) VALUES (?,?,?,?,?)';
        $stmt = $this->conn->prepare($sql);
        if ($stmt) {
            $date = date("Y/m/d");
            $stmt->bindParam(1, $date);
            $stmt->bindParam(2, $_POST['nameC']);
            $stmt->bindParam(3, $_POST['phone']);
            $stmt->bindParam(4, $_POST['addressC']);
            $stmt->bindParam(5, $_SESSION['total']);
            $stmt->execute();
            $orderId = $this->conn->lastInsertId();
        }
        foreach ($_SESSION['cart'] as $key => $value) {
            $sql = 'INSERT INTO order_items (order_id,product_id,quantity) VALUES (?,?,?)';
            $stmt = $this->conn->prepare($sql);
            if ($stmt) {
                $product_id = $_SESSION['cart'][$key]['id'];
                $quantity = $_SESSION['cart'][$key]['quantity'];
                $stmt->bindParam(1, $orderId);
                $stmt->bindParam(2, $product_id);
                $stmt->bindParam(3, $quantity);
                $stmt->execute();
            }
        }
    }


    public function orders()
    {
        try {

            $sql = "SELECT 
                orders.order_id,
                GROUP_CONCAT(products.product_name) AS product_names,
                orders.address AS customer_address,
                orders.order_date,
                orders.total,
                GROUP_CONCAT(order_items.quantity) AS quantities
                FROM orders
                JOIN order_items ON orders.order_id = order_items.order_id
                JOIN products ON order_items.product_id = products.product_id
                GROUP BY orders.order_id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }

}
