var k = -1;
//message_input = document.getElementById("message");
cart = [];
const section_size = 4;
function onLoad(){
    document.getElementById("message").innerHTML = "<h1>Game Night?</h1>";
    var array = ["Unexpected Guests?" , "Cooking Gone Wrong?", "Late night at work?" , "Movie Marathon?" , "Game Night?"];
    var slider = setInterval(function(){
        k = (++k)%array.length;
        document.getElementById("message").innerHTML = "<h1>"+array[k]+"</h1>";
    },3000);
}

function find(){
    console.log("find method called");
    var data = document.getElementById("find-food-input").value;
    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(showLocation);
        console.log("if statement true");
    }
    console.log("if statement false");

    window.location.href = "html/home.php";
}

function showLocation(position){
    var label = document.getElementById("geoLocation");
    var cords = position.coords;
    var lat = cords.lattitude.toString();
    var lon = cords.longitude.toString();
    var coordinates = [lat,lon];
    label.innerHTML = getCity(coordinates);
}

function getCity(coordinates) { 
    var xhr = new XMLHttpRequest(); 
    var lat = coordinates[0]; 
    var lng = coordinates[1]; 
  
    // Paste your LocationIQ token below. 
    xhr.open('GET', "https://us1.locationiq.com/v1/reverse.php?key=YOUR_PRIVATE_TOKEN&lat=" + 
    lat + "&lon=" + lng + "&format=json", true); 
    xhr.send(); 
    xhr.onreadystatechange = processRequest; 
    xhr.addEventListener("readystatechange", processRequest, false); 
  
    function processRequest(e) { 
        if (xhr.readyState == 4 && xhr.status == 200) { 
            var response = JSON.parse(xhr.responseText); 
            var city = response.address.city; 
            console.log(city); 
            return; 
        } 
    } 
}  

function addToCart(){
    var parentDiv = (document.getElementsByClassName("addToCartBtn")[0].parentElement.parentElement.parentElement);
    cart.unshift(parentDiv);
    console.log(cart);
}

function cartOnLoad(){
    console.log("method called");
    var number_of_items = cart.length;
    var number_of_sections = Math.ceil(number_of_items/4);
    console.log(number_of_sections);
    for(var i =0; i < cart.length;i++){
        if(i%section_size == 0){
            section = document.createElement("section");
            section.className = "item-section";
        }
        section.appendChild(cart[i]);
    }
}


document.getElementByTa