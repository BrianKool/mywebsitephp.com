<?php 


    include 'php/upload.php';
    $uploadOK = upload("profile_image/");


    // check if all the verifications passed

    if ($uploadOK == 1){

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
        //test out if the connection is success
        // echo "Connected Successfully" . "<br>";

        session_start();
        $userid = $_SESSION["userid"];
        $imgPath = "/profile_image/" . basename($_FILES["fileToUpload"]["name"]);

        $sql = "UPDATE `myuser` SET `profile_picture`= '$imgPath' WHERE userid = $userid;";

        if ($conn->query($sql) === TRUE) {
        echo "Your profile picture has been changed successfully<br>";
        echo "<script>setTimeout(\"location.href = '/html/product.html';\",1500);</script>";
        }else{
        echo "Error: " . $conn->error;
        }

    }else{
        echo "Sorry, there was an error uploading your file.<br>";
    }
?>