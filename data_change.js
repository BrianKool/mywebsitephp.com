var thePath = window.location.href;
var itemNo = thePath.substring(thePath.lastIndexOf('/') + 1)


function deleteProduct(){
    
    // use AJAX to send the productName for deleting to corresponding PHP
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/php/data_manage.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send("action=delete&productNo="+itemNo);
    
    //########## onreadystatechange is when response received,
    //########## usually test if the data sccessful send to the server ########
    // xhttp.onreadystatechange = function() {
    // if (this.readyState == 4 && this.status == 200) {
    //     document.getElementById("yo").innerHTML = this.responseText;
    // }
    // };

    window.setTimeout(function(){window.location.replace("http://localhost/html/seller.html")}, 1500);

};

function updateProduct(form){
    
    // use AJAX to send the productName for deleting to corresponding PHP
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/php/data_manage.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send("action=update&productNo="+itemNo+"&name="+form.name.value+"&description="+form.description.value);
    
    form.reset();
    //########## onreadystatechange is when response received,
    //########## usually test if the data sccessful send to the server ########
    // xhttp.onreadystatechange = function() {
    // if (this.readyState == 4 && this.status == 200) {
    //     document.getElementById("yo").innerHTML = this.responseText;
    // }
    // };
    window.setTimeout(function(){window.location.replace(thePath)}, 500);
    
    
}



