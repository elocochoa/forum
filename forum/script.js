/* Toggle between adding and removing the "responsive" class to 
topnav when the user clicks on the icon */
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
// Select all links with hashes



$(window).scroll(function() {
  if ($(window).scrollTop() > 0) {
    $('.nav').addClass("sticky");
  } else {
    $('.nav').removeClass( "sticky" );
  } 
});
//sign up fade in
function toggleup() {
var y = document.getElementById("box").classList;
var m = document.getElementById("box2").classList;
 
 if (y.contains("invisible")) {
 
    y.remove("invisible");
 
 } else {
 
    y.add("invisible");
 
 }
 if (m.contains("invisible")) {
 
    m.remove("invisible");
 
 } else {
 
    m.add("invisible");
 
 }
}
//sign in fade in
function togglein() {
var x = document.getElementById("box3").classList;

 
 if (x.contains("invisible")) {
 
   x.remove("invisible");
 
 } else {
 
    x.add("invisible");
 
 }
 
}







