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
    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(showPosition);
    }
}

function showPosition(position){
    document.getElementById("location").innerHTML= "Latitude: " + position.coords.latitude +
    "<br>Longitude: " + position.coords.longitude;

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

var addresses = document.getElementsByClassName('address-boxes');

function showPayment(elem){
    var parent_div = elem.parentNode;
    parent_div.style.borderColor='green'; 
    for(var i = 0; i < addresses.length; i++){
        if(addresses[i] != parent_div){
            addresses[i].style.display = 'none';
        }
    }
    var addresses_main_div = document.getElementById("page-wrap");
    addresses_main_div.style.height = '220px';

    var payment_div = document.getElementById('payment-div');
    payment_div.style.display = 'block';
}

function showAddresses(){
    document.getElementById('payment-div').style.display = 'none';
    var addresses_main_div = document.getElementById("page-wrap");
    addresses_main_div.style.height = '400px';
    for(var i = 0; i < addresses.length; i++){
        addresses[i].style.borderColor = '#d9d9d9';
        addresses[i].style.display = 'block';
    }
}

function showDetails(elem){
    var buttons = document.getElementsByClassName('payment-buttons');
    for(var i = 0; i < buttons.length; i++){
        buttons[i].style.color = 'gray';
    }
    elem.style.color='black';
    var div_name = elem.value;
    var elements = document.getElementsByClassName('payment-option');
    for(var i = 0; i < elements.length; i++){
        elements[i].style.display = 'none';
    }
    var element = document.getElementById(div_name);
    element.style.display = 'block';
}