<?php

require_once '../models/ProductsModel.php';
class ProductsController
{
    private $productModel;
    private $id;

    public function __construct()
    {
        $this->productModel = new ProductsModel();
        if (isset($_GET['id'])) {
            $this->id = $_GET['id'];
        };
    }

    public function showProducts()
    {
        $products = $this->productModel->getProducts();
        include '../views/templates/products.php';
    }

    public function viewProduct()
    {
        $products = $this->productModel->getProducts();
        foreach ($products as $product) {
            if ($product['product_id'] == $this->id) {
                $book = $product;
            }

        }
        include '../views/templates/view.php';
    }

    public function addNewProduct()
    {
        include '../views/templates/addProduct.php';
        if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['price']) && isset($_FILES['image']) && isset($_POST['addProduct'])) {
            $fileName = $_FILES['image']['name'];
            $tmpName = $_FILES['image']['tmp_name'];
            $imagePath = '../views/images/' . $fileName;
            move_uploaded_file($tmpName, $imagePath);
            $this->productModel->addProduct($_POST['title'], $_POST['description'], $_POST['price'], $imagePath);
        }


    }


    public function deleteProductById()
    {
        $this->productModel->deleteProduct($this->id);
        header("Location ../public/index.php");
    }

    public function updateProductById()
    {
        include '../views/templates/update.php';
        if (isset($_POST['uTitle']) && isset($_POST['uDescription']) && isset($_POST['uPrice']) && isset($_FILES['uImage']) && isset($_POST['updateProduct'])) {
            $fileName = $_FILES['uImage']['name'];
            $tmpName = $_FILES['uImage']['tmp_name'];
            $imagePath = '../views/images/' . $fileName;
            move_uploaded_file($tmpName, $imagePath);
            $this->productModel->editProduct($this->id, $_POST['uTitle'], $_POST['uDescription'], $_POST['uPrice'], $imagePath);
        }
    }

}
