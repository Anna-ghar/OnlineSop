<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Orders</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <?php foreach ($results as $row): ?>
                <div class="col-sm-3" style="border:solid 1px black; margin: 10px; background-color:aliceblue">
                    <div>
                        <p>Order Date:<br><?= $row['order_date']?></p>
                        <p>Books:<br><?=$row['product_names']?></p>
                        <p>Customer Address:<br><?= $row['customer_address']?></p>
                        <p>Total price:<br><?= $row['total']?></p>
                        <p>Quantity:<br><?= $row['quantities']?></p>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
            <div>
    </body>

</html>




