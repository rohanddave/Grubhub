var k = -1;
//message_input = document.getElementById("message");

function onLoad(){
    document.getElementById("message").innerHTML = "<h1>Game Night?</h1>";
    var array = ["Unexpected Guests?" , "Cooking Gone Wrong?", "Late night at work?" , "Movie Marathon?" , "Game Night?"];
    var slider = setInterval(function(){
        k = (++k)%array.length;
        document.getElementById("message").innerHTML = "<h1>"+array[k]+"</h1>";
    },3000);
}

function find(){
    var data = document.getElementById("find-food-input").value;
    window.location.href = "html/home.html";
}