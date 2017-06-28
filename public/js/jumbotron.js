/**
 * Jumbotron javascript module code
 */

 // Global vaariables
var canvas;
var context;
var width;
var height;
var requestAnimationFrame;
var nodes = [];
var amountOfNodes;

/**
 * Fires when window has loaded
 */
window.onload = function() {
    init();
    createNodes();
    update();
}

/**
 * Node object
 * x and y coordinates represent a percentage of the total width and height of
 * the canvas
 */
function Node(x, y, radius) {
    this.x = x;
    this.y = y;
    this.speedx = (Math.random() - 0.5) / 500;
    this.speedy = (Math.random() - 0.5) / 500;
    this.color = "#ffffff";
    this.radius = radius;
    this.draw = function(context) {
        // Calculate actual x and y
        _x = width * this.x;
        _y = height * this.y;

        // Begin drawing circle
        context.beginPath();
        context.arc(_x, _y, this.radius, 0, Math.PI * 2, false);
        context.closePath();
        context.fillStyle = this.color;
        context.fill();
    };
    this.update = function() {
        this.x += this.speedx;
        this.y += this.speedy;
        if (this.x <= 0 || this.x >= 1) {
            this.x = Math.random();
        };
        if (this.y <= 0 || this.y >= 1) {
            this.y = Math.random();
        }
    }
}

/**
 * Initialises the animation
 */
function init() {

    // Create canvas
    canvas = document.getElementById("canvas");

    // Fix percentage width/height to actual integer dimensions
    canvas.width = canvas.clientWidth;
    canvas.height = canvas.clientHeight;

    // Get context and information
    context = canvas.getContext("2d");
    width = canvas.width;
    height = canvas.height;

    // Animation handler
    requestAnimationFrame = window.requestAnimationFrame ||
                            window.mozRequestAnimationFrame ||
                            window.webkitRequestAnimationFrame ||
                            window.msRequestAnimationFrame;

}

function createNodes() {

    amountOfNodes = (width * height) / 5000;

    for (i = 0; i < amountOfNodes; i++) {
        x = Math.random();
        y = Math.random();
        radius = Math.floor(Math.random() * (2 - 1 + 1)) + 1;
        node = new Node(x, y, radius);
        nodes.push(node);
    }

}

function update() {

    // Clear canvas
    context.clearRect(0, 0, width, height);
    context.fillStyle = "rgba(0, 0, 0, 0)";
    context.fillRect(0, 0, width, height);

    // Update and draw
    for (i = 0; i < nodes.length; i++) {
        nodes[i].update();
        nodes[i].draw(context);
    }

    requestAnimationFrame(update);

}
