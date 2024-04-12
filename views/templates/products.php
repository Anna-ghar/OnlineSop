<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>OnlineShop</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>

    <div class="container">
        <h2>Bestsellers</h2>
        <?php if ($_SESSION['isAdmin']): ?>
        <a href="<?php echo "../public/index.php?route=add" ?>">Add Book</a>
        <?php  endif  ?>
            <?php for($i=0; $i<3;$i++) ?>
            <div class="row">
            <?php foreach ($products as $product):  ?>
                <div class="col-sm-3">
                    <div class="thumbnail">
                        <a href="<?php echo "../public/index.php?route=view&id={$product['product_id']}" ?>">
                            <img src="<?= $product['image_path'] ?>" alt="Lights" style="width: 200px; height: 300px;" class="img-fluid">
                            <div class="caption">
                                <p><?= $product['product_name'] ?></p>
                                <p>$<?= $product['price'] ?></p>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach ?>
            </div>
    </div>

    </body>
</html>
