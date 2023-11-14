<?php
$target_dir = "uploads/";
//target_file is the path of the image !!
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    // echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
// if ($_FILES["fileToUpload"]["size"] > 500000) {
//   echo "Sorry, your file is too large.";
//   $uploadOk = 0;
// }

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

//********************************************************/
//upload data to sql database
include 'credential.php';
$servername = "localhost";
$username = $GLOBALS["username"];
$password = $GLOBALS["password"];
$databsae = "brian";

    //create connection 
    $conn = new mysqli($servername, $username, $password, $databsae);

    //check connection
    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
    echo "Connected Successfully" . "<br>";

    $pname = $_REQUEST["pname"];
    $pdescription = $_REQUEST["pdescription"];
    $imgPath = $target_file;

    if ($uploadOk == 1) {
      $sql = "INSERT INTO product (Pimage, Pdescription, Pname) VALUES ('$imgPath', '$pdescription', '$pname')";
    }else{
      echo "Something went wrong with your upload files!<br>";
    }

    if ($conn->query($sql) === TRUE) {
      session_start();
      echo "Your product has been added successfully";
      echo "<script>setTimeout(\"location.href = '/html/product.html';\",1500);</script>";
    }else{
      echo "Error: " . $conn->error;
    }


?>