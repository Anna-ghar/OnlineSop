<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <form  method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="i1">Product Name</label><br>
                    <input id="i1" name="title" type="text" class="form-control" ><br>
                </div>
                <div class="form-group">
                    <label for="i2">Description</label><br>
                    <textarea id="i2" name="description" rows="6" class="form-control" ></textarea><br><br>
                </div>
                <div class="form-group">
                    <label for="i3">Price</label><br>
                    <input id="i3" name="price" type="text" class="form-control" ><br>
                </div>
                <div class="form-group">
                    <label for="i4">Image</label><br>
                    <input id="i4" name="image" type="file" class="form-control" ><br>
                </div>
                <input type="submit" name="addProduct" class="btn btn-default">
            </form>
        </div>
    </body>
</html>
