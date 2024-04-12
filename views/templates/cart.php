<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cart</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php if(empty($_SESSION['cart'])): ?>
            <div class="container">
                <h2>Cart is Empty</h2>
            </div>
        <?php else: ?>
            <div class="container">
        <?php for($i=0; $i<3;$i++) ?>
            <div class="row">
                <?php foreach($cartItems as $item): ?>
                    <div class="col-sm-3">
                        <div class="thumbnail">
                            <img src="<?=$item['image_path']?>" style="width: 200px; height: 300px;" alt="">
                            <div clas="caption">
                                <p>name: <?=$item['product_name']?></p>
                                <p>quantity: <?=$item['quantity']?></p>
                                <p>price: $<?=$item['price']*(int)$item['quantity']?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <h2>Total Price:$<?=$_SESSION['total']?></h2>
            <a href="../../public/index.php?route=checkout">Checkout</a>
        </div>
        <?php endif ?>
    </body>
</html>


