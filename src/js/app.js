/**************************
 * 
 * Javascript Imports
 * 
 **************************/

 import 'bootstrap';
 
// import * as bootstrap from 'bootstrap';

//-- You can specify which plugins you need --//
// import { Modal, Tooltip, Popover, Carousel } from 'bootstrap';


//-- Event Listener approach --//
document.addEventListener("DOMContentLoaded", function(){

    // var alertEl = document.getElementById("myToast");
    // var myAlert = new Alert(alertEl);
    //     myAlert;

    // var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    // var popoverList = popoverTriggerList.map(function(element){
    //     return new Popover(element, {
    //     	template: '<div i class="popover"><div class="popover-arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div><div class="popover-footer"><a class="btn btn-secondary btn-sm close">Close</a></div></div>'
    // 	});
 	// });

    // Tool Tip
    //  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    //  var tooltipList = tooltipTriggerList.map(function(element){
    //      return new Tooltip(element);
    //   });
});
  
//Close popover on button click
// document.addEventListener("click", function(e){
//     if(e.target && e.target.classList.contains("close")){
//         var popover = Popover.getInstance(e.target.closest(".popover"));
//         popover.hide();
//     }
// });


/*****************************************************************
 * 
 * custom Javascript to close popover when close button clicked
 * and then show alert message.
 * 
 *****************************************************************/

// document.addEventListener("DOMContentLoaded", function(){
//     var myPopover = document.getElementById('myPopover');
//     var myPopover2 = document.getElementById('myPopover2');
    
//     // Show alert when the popover has finished being hidden 
//     myPopover.addEventListener("hidden.bs.popover", function(){
//         alert("Popover has been completely closed.");
//     }); 
//     myPopover2.addEventListener("hidden.bs.popover", function(){
//         alert("This is for Popover2 has been completely closed.");
//     });                           
// });

/*******************************
 * 
 * show modal on button click
 * 
 *******************************/

// document.addEventListener("DOMContentLoaded", function() {
//     var btn = document.getElementById("myBtn");
    
//     btn.addEventListener("click", function(){
//         var myModal = new Modal(document.getElementById("modalCenter"));
//         myModal.show();
//     });

// });

/********************************
 * 
 * Add jQuery to window object
 * 
 ********************************/

// import jQuery from 'jquery'
// window.jQuery = window.$ = window.jquery = jQuery

// import 'bootstrap';

// jQuery(function(){
//     $('[data-bs-toggle="popover"]').popover({
//         placement: 'bottom'
//     });  
// });