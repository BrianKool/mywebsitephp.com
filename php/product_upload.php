<?php 


    include 'php/upload.php';
    $uploadOK = upload("uploads/");


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
        $pname = $_REQUEST["pname"];
        $pdescription = $_REQUEST["pdescription"];
        $imgPath = "/uploads/" . basename($_FILES["fileToUpload"]["name"]);
        $sql = "INSERT INTO product (Sellerid, Pimage, Pdescription, Pname) VALUES ('$userid', '$imgPath', '$pdescription', '$pname')";


        if ($conn->query($sql) === TRUE) {
        echo "Your product has been added successfully<br>";
        echo "<script>setTimeout(\"location.href = '/html/product.html';\",1500);</script>";
        }else{
        echo "Error: " . $conn->error;
        }
        echo "yes your file is good and successful uploads to our local drive but not yet sent to online database!";

    }else{
        echo "Sorry, there was an error uploading your file.<br>";
        echo "please try again. <br>";
        echo "<script>setTimeout(\"location.href = '/html/setting.html';\",1500);</script>";
    }
?>