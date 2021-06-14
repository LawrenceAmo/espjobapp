<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <?php require_once "functions/functions.php"; ?>
</head>
<body>
    <h1>Hello world</h1>
    <a href="about.php">About</a> <br>
 
    <form action="upload.php" method="post" class="border m-5 p-5 rounded shadow" enctype="multipart/form-data">
    
        <div class="form-group">
            <label for="">Select File</label>
            <input type="file" class="form-control-file" name="imageFile" id="imageFile" placeholder="" >
            <small id="fileHelpId" class="form-text text-muted">only JPG, JPEG, and PNG files</small>
        </div>
        <hr>
        <div class="form-group">
          <label for="">what do you want to do?</label>
          <select required  class="custom-select" name="action" id="">
                <option selected disabled>Select one</option>
                <option value="product">Crop Product Image</option>
                <option value="stuff">Crop Stuff Image</option>
                <option value="save">Upload Image</option>
            </select>
        </div>
        <button type="submit" class="btn btn-sm rounded">Upload Image</button>
    </form>

</body>
</html>