<!DOCTYPE html>
<html style="overflow-x: hidden;">
    <head>
        <link rel="stylesheet" href="style.css">
        <title>Flora Boards</title>
    </head>
<body style="background-image: url('background.jpg');">

<h1>Plant Picture Upload</h1>
<form action="upload.php" method="post" enctype="multipart/form-data" style="margin: auto; text-align: center; font-size: 20px;">
  <label>Select image to upload:</label><br>
  <input type="file" name="fileToUpload" id="fileToUpload" style="margin-right: -85px;"><br><br>
  <label>Username (optional):</label><br>
  <input name="uname" id="uname" type="text"><br><br>
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>