// document.getElementById('like').addEventListener('click', function() {
//     this.classList.toggle('active');
   
//     // use AJAX to send the state to PHP
//     var xhr = new XMLHttpRequest();
//     xhr.open('POST', 'update.php', true);
//     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//     xhr.send('state=' + (this.classList.contains('active') ? 1 : 0));

//     document.getElementById('count').textContent = 'Increase count: ' + (this.classList.contains('active') ? 1 : 0);

// });


document.getElementById('like_button').addEventListener('click', function() {
    this.classList.toggle('active');

    this.classList.contains('active') ? document.getElementById('like_button').src = "/source/liked.png" : document.getElementById('like_button').src = "/source/unliked.png";

});
