<?php
error_reporting(0);
$target_dir = "unverified-media/";
$target_file = $target_dir . $_POST["uname"] . " - " . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $msg = "<p>File is not an image.</p>";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  $msg = "<p>Sorry, your file already exists.</p>";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 3000000) {
  $msg = "<p>Sorry, your file is too large.</p>";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
  $msg = "<p>Sorry, only JPG, JPEG, & PNG files are allowed.</p>";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  //$msg = "<p>Sorry, your file was not uploaded.</p>";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $msg = "<p>The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded. Please wait for it to be verified.</p>";
  } else {
    $msg = "<p>Sorry, an error occured when uploading your image.";
  }
}
?>

<!DOCTYPE html>
<html style="overflow-x: hidden;">
    <head>
        <link rel="stylesheet" href="style.css">
        <title>Flora Boards</title>
    </head>
<body style="background-image: url('background.jpg');">
    <?php echo $msg;?>
    <div style="text-align:center">
    <button onClick="location.href='index.php';">Go Back</button>
    </div>
</body>
</html>