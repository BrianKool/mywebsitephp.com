document.getElementById('likeButton').addEventListener('click', function() {
    this.classList.toggle('active');

    this.classList.contains('active') ? document.getElementById('likeornot').innerHTML = 
    "like" : document.getElementById('likeornot').innerHTML = "not";

    // use AJAX to send the state to PHP
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/handle_data.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(this.classList.contains('active') ? "like=1" : "like=0");
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("demo").innerHTML = this.responseText;
    }
    };


});