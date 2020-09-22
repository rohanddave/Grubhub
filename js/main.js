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
    var data = document.getElementById("find-food-input").value;
    window.location.href = "html/home.html";
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