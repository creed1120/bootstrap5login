document.addEventListener("DOMContentLoaded", function(){

// Login page options flyout
var formH1 = document.querySelector('.hone');

formH1.addEventListener('click', () => {
    setTimeout( () => {
        var element = document.getElementById("the-box");
        element.classList.toggle("mystyle");
        }, 200);
    });

});