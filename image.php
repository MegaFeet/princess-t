<?php //ignore this comment >
    $uploadFolder = "./upload";
    if (!file_exists($uploadFolder)) {
        mkdir($uploadFolder);
    }
    
    $uploadFile = $uploadFolder . "/" . basename($_FILES["fileToUpload"]["name"]);

    if(!(getimagesize($_FILES["fileToUpload"]["tmp_name"]) !== false)) {
        echo "Sorry, your image is invalid";
        exit;
    }

    $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
    if($imageFileType != "jpg"
            && $imageFileType != "png"
            && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        exit;
    }

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $uploadFile)) {
        echo "Successfully";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
?>
