document.getElementById('likeButton').addEventListener('click', function() {
    this.classList.toggle('active');
    if (this.name == "liked"){
        this.classList.contains('active') ? document.getElementById('likeButton').innerHTML = 
            "not" : document.getElementById('likeButton').innerHTML = "like";
    }else {
        this.classList.contains('active') ? document.getElementById('likeButton').innerHTML = 
            "like" : document.getElementById('likeButton').innerHTML = "not";
    }

    

    // use AJAX to send the state to PHP
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/handle_data.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(document.getElementById('likeButton').innerHTML == "like"  ? "like=1" : "like=0");

    
    //########## onreadystatechange is when response received, 
    //########## usually test if the data sccessful send to the server ########
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("demo").innerHTML = this.responseText;
    }
    };


});