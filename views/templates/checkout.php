<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>OnlineSHop</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <form method="post">
                <div class="form-group">
                    <label for="i1">Name</label><br>
                    <input class="form-control" id="i1" name="nameC" type="text" required><br>
                </div>
                <div class="form-group">
                    <label for="i2">Phone number</label><br>
                    <input class="form-control" id="i2" name="phone" type="text" required><br><br>
                </div>
                <div class="form-group">
                    <label for="i3">Address</label><br>
                    <input class="form-control" id="i3" name="addressC" type="text" required><br><br>
                </div>
                <input class="btn btn-default" type="submit" name="checkoutSubmit">
            </form>
        </div>
    </body>
</html>
