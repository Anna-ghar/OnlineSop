<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="container">
            <form  method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="i1">Product Name</label><br>
                    <input id="i1" name="uTitle" type="text" class="form-control" ><br>
                </div>
                <div class="form-group">
                    <label for="i2">Description</label><br>
                    <textarea id="i2" name="uDescription" rows="6" class="form-control" ></textarea><br><br>
                </div>
                <div class="form-group">
                    <label for="i3">Price</label><br>
                    <input id="i3" name="uPrice" type="text" class="form-control" ><br>
                </div>
                <div class="form-group">
                    <label for="i4">Image</label><br>
                    <input id="i4" name="uImage" type="file" class="form-control" ><br>
                </div>
                <input type="submit" name="updateProduct" class="btn btn-default">
            </form>
        </div>
    </body>
</html>
