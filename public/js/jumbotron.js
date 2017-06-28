/**
 * Jumbotron javascript module code
 */

// Constants
NODE_DENSITY = 10000;
COLOR = "rgb(139, 255, 154)";
NODE_MAX_DISTANCE = 0.5;

 // Global vaariables
var canvas;
var context;
var width;
var height;
var requestAnimationFrame;
var nodes = [];
var amountOfNodes;
var edges = [];
var distanceThreshold;

/**
 * Fires when window has loaded
 */
window.onload = function() {
    init();
    createNodes();
    update();
}

/**
 * Re-initialise when the window is resized
 */
window.onresize = function() {
    edges = [];
    nodes = [];
    init();
    createNodes();
}

/**
 * Node object
 * x and y coordinates represent a percentage of the total width and height of
 * the canvas
 */
function Node(x, y, radius) {
    this.x = x;
    this.y = y;
    this.speedx = (Math.random() - 0.5) / (width / 2);
    this.speedy = (Math.random() - 0.5) / (width / 2);
    this.color = COLOR;
    this.radius = radius;

    /**
     * Calculates the distance between this node and a specified node
     */
    this.distanceTo = function(node, inPixels) {
        if (inPixels) {
            thisx = this.x * width;
            thisy = this.y * height;
            nodex = node.x * width;
            nodey = node.y * height;
            return Math.sqrt((thisx - nodex) ** 2 + (thisy - nodey) ** 2);
        } else {
            return Math.sqrt((this.x - node.x) ** 2 + (this.y - node.y) ** 2);
        }
    }

    /**
     * Draws the node
     */
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

    /**
     * Updates the x and y coordinates of the node
     */
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
 * Edge object
 * A line connecting two nodes, if they are a certain distance from each other
 */
function Edge(startNode, endNode) {
    this.startNode = startNode;
    this.endNode = endNode;
    this.color = COLOR;
    this.alpha = 0;

    /**
     * Calculates the alpha value
     */
    this.calculateAlpha = function() {
        nodeDistance = this.startNode.distanceTo(this.endNode);
        this.alpha = nodeDistance / NODE_MAX_DISTANCE;
    }

    /**
     * Draws the line
     */
    this.draw = function(context) {
        // Calculate coordinates
        xStart = startNode.x * width;
        yStart = startNode.y * height;
        xEnd = endNode.x * width;
        yEnd = endNode.y * height;

        // Calculate new alpha value
        this.calculateAlpha();

        // Draw line
        context.beginPath();
        context.moveTo(xStart, yStart);
        context.lineTo(xEnd, yEnd);
        context.strokeStyle = convertRGB(this.color, this.alpha / 100);
        context.stroke();
    }
}

/**
 * Initialises the animation
 */
function init() {

    // Get canvas
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

    // Calculate distance threshold
    distanceThreshold = Math.min(width, height) * NODE_MAX_DISTANCE;

}

/**
 * Creates all nodes. The amount of nodes depends on the screen dimension. This
 * way, the screen won't be filled with too many nodes
 */
function createNodes() {

    amountOfNodes = (width * height) / NODE_DENSITY;

    for (i = 0; i < amountOfNodes; i++) {
        x = Math.random();
        y = Math.random();
        radius = 2;
        node = new Node(x, y, radius);
        nodes.push(node);
    }

}

/**
 * Updates all values and draws a new image on the canvas
 */
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

    // Update edges
    updateEdges();

    // Draw edges
    for (i = 0; i < edges.length; i++) {
        edges[i].draw(context);
    }

    requestAnimationFrame(update);

}

/**
 * Update all edges. Remove and add new edges if required
 */
function updateEdges() {

    // Check existing edges if the distance between its nodes is still acceptable
    for (i = 0; i < edges.length; i++) {
        if (edges[i].startNode.distanceTo(edges[i].endNode, true) > distanceThreshold) {
            edges.remove(edges[i]);
            i--;
        }
    }

    // Check if new edges should be created
    for (i = 0; i < nodes.length; i++) {
        for (j = 0; j < nodes.length; j++) {

            if (nodes[i] == nodes[j]) {
                continue;
            }

            if (nodes[i].distanceTo(nodes[j], true) < distanceThreshold) {
                edge = new Edge(nodes[i], nodes[j]);
                edges.push(edge);
            }

        }
    }

}

/**
 * Converts a given color in rgb format to rgba format with the given alpha
 * value.
 */
function convertRGB(rgb, alpha) {
    return rgb.replace(')', ', ' + alpha + ')').replace('rgb', 'rgba');
}

/**
 * Helper function for array to remove an element
 */
Array.prototype.remove = function(x) {
    this.splice(this.indexOf(x), 1);
}
