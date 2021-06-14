<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <?php require_once "functions/functions.php"; ?>
</head>
<body> <a href="index.php"> Go Back</a> <br>
    <?php

        // Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Check if file was uploaded 
    if(isset($_FILES["imageFile"]) && isset($_POST["action"])){

        // initialising variables
        $filename = $_FILES["imageFile"]["name"];
        $filepath = $_FILES["imageFile"]["tmp_name"];
        $mode = $_POST['action'];
        $entity = "product";

        if ($mode === 'stuff') $entity = "stuff";
        
        $img = new Image($entity, $filename, $filepath); 

        if ($mode === 'stuff' || $mode === 'product') {
            $img->crop_img();
        }
        if ($mode === 'save') {
            $img->save();
        }
        // exit;
                
    } else{
        echo "Error: There was a problem uploading your file. Please try again."; 
    }
    
}

?>
<script>
</script>
</body>
</html>