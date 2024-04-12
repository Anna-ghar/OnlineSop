<?php

class OrdersModel
{
    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function Orders()
    {
        try {

            $sql = "SELECT 
                orders.order_id,
                GROUP_CONCAT(products.product_name) AS product_names,
                JSON_EXTRACT(orders.customer_info, '$.address') AS customer_address,
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
