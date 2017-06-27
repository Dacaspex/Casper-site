/**
 * Jumbotron javascript module code
 */

// Create canvas
var canvas = document.getElementById("canvas");

// Fix percentage width/height to actual integer dimensions
canvas.width = canvas.clientWidth;
canvas.height = canvas.clientHeight;

// Get context and information
var ctx = canvas.getContext("2d");
var width = canvas.width;
var height = canvas.height;

// Animation handler
var requestAnimationFrame = window.requestAnimationFrame ||
                            window.mozRequestAnimationFrame ||
                            window.webkitRequestAnimationFrame ||
                            window.msRequestAnimationFrame;

// Simple draw function
function draw() {

    ctx.clearRect(0, 0, width, height);

    // Color the background
    ctx.fillStyle = "rgba(0, 0, 0, 0)";
    ctx.fillRect(0, 0, width, height);
     
    // Begin drawing circle
    ctx.beginPath();
     
    var radius = 2;
    ctx.arc(100, 50, radius, 0, Math.PI * 2, false);
    ctx.closePath();
     
    // Color the cirlce
    ctx.fillStyle = "#dbdbdb";
    ctx.fill();

    requestAnimationFrame(draw);

}

draw();
