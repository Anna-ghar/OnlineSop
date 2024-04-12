<?php

class ProductsModel
{
    private $conn;
    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }
    public function getProducts()
    {


        $sql = 'SELECT * FROM products';
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM products WHERE product_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(':id' => $id));
    }

    public function addProduct($name, $description, $price, $imagePath)
    {

        $sql = 'INSERT INTO products (product_name, description, price, image_path) VALUES (?,?,?,?)';
        $stmt = $this->conn->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $description);
            $stmt->bindParam(3, $price);
            $stmt->bindParam(4, $imagePath);
            $stmt->execute();
        }
    }


    public function editProduct($id, $name, $description, $price, $imagePath)
    {
        $sql = 'UPDATE products SET product_name = :name, description = :description, price = :price, image_path = :imagePath WHERE product_id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':name' => $name,
            ':description' => $description,
            ':price' => $price,
            ':imagePath' => $imagePath
        ]);
    }

}
