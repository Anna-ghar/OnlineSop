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
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="../../public/index.php">OnlineShop</a>
                </div>
                <ul class="nav navbar-nav">
                    <?php if (!$_SESSION['isAdmin']):?>
                        <li><a href="../../public/index.php?route=adminLogin">Login</a></li>
                        <li><a href="../../public/index.php?route=cart">Cart</a></li>
                    <?php else: ?>
                        <li><a href="../../public/index.php?route=adminLogin">Log Out</a></li>
                        <li><a href="../../public/index.php?route=orders">Orders</a></li>
                    <?php endif ?>
                </ul>
            </div>
        </nav>
    </body>
</html>

