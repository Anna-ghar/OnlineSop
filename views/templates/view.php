
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>View</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <h3><?= $book['product_name'] ?></h3>
            <div class="row">
                <div class="col-sm-3">
                    <img src="<?= $book['image_path'] ?>" style="width: 200px; height: 300px;" alt="" >
                </div>
                <div class="col-sm-3">
                    <p><?= $book['description'] ?></p>
                    <p>$<?= $book['price'] ?></p>
                </div>
            </div><br><br>
                <?php if (!$_SESSION['isAdmin'] == true): ?>
                <div class="quantity">
                    <input type="number" name="quantityI" data-ids="<?= $book["product_id"]?>">
                    <button class="add_to_cart" onclick="addToCart(this)">Add to cart</button>
                </div>
                <?php endif ?>
            <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == true): ?>
                <a href="<?php echo "../public/index.php?route=delete&id={$book['product_id']}" ?>">Delete</a>
                <a href="<?php echo "../public/index.php?route=edit&id={$book['product_id']}" ?>">Edit</a>
            <?php endif ?>
        </div>

        <script src="../views/ajax/ajax.js"></script>
        <script src="<?= DOM ?>../views/ajax/jquery.js"></script>
        <script src="<?= DOM ?>../views/ajax/main.js"></script>
    </body>
</html>



