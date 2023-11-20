function deleteProduct(){
    var thePath = window.location.href;
    var itemNo = thePath.substring(thePath.lastIndexOf('/') + 1)



    // use AJAX to send the productName for deleting to corresponding PHP
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/php/delete_upload.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send("productNo="+itemNo);
    
    //########## onreadystatechange is when response received,
    //########## usually test if the data sccessful send to the server ########
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("yo").innerHTML = this.responseText;
        window.setTimeout(function(){window.location.replace("http://localhost/html/seller.html")}, 1500);
    }
    };

};



