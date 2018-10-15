<?php  //ignore this comment >
$uploadFolder = "./upload";
if (!file_exists($uploadFolder)) {
    mkdir($uploadFolder);
}

if (is_array($_FILES["fileToUpload"])) {
    $numberOfFiles = count($_FILES["fileToUpload"]["name"]);
    for ($i = 0; $i < $numberOfFiles; $i++) { //ignore this comment >
        $uploadFile = $uploadFolder . "/" . basename($_FILES["fileToUpload"]["name"][$i]);
        $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

        if (!(getimagesize($_FILES["fileToUpload"]["tmp_name"][$i]) !== false)) {
            echo "Sorry, your image is invalid";
            exit;
        }

        if ($_FILES["fileToUpload"]["size"][$i] > 10000000) {
            echo "Sorry, your file is too large.";
            exit;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit;
        }

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $uploadFile)) {
            echo "Upload image ".basename($_FILES["fileToUpload"]["name"][$i])." successfully!";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
