"use strict";

var mouse = {
  x: window.innerWidth * 0.5,
  y: window.innerHeight * 0.5
};

var itemsArray = [];
var parallaxContainer = document.getElementById("parallaxContainer");

for (let i = 0; i < 30; i++) {
  var item = document.createElement("div");
  item.className = "parallax-item";
  itemsArray.push(item);

  var art = document.createElement("div");
  art.className = "art";
  item.appendChild(art);

  parallaxContainer.appendChild(item);

  var bgImgNum = Math.round(Math.random() * 5);
  var rotateNum = 360 * Math.random();
  var depth = Math.random();

  item.style.zIndex = 1;
  item.style.width = 100 * Math.random() + 50 + "px";
  item.style.height = 100 * Math.random() + 50 + "px";
  item.dataset.depth = depth;
  art.style.transform = "rotate(" + rotateNum + "deg)";
  art.style.backgroundImage =
    "url(https://i.ibb.co/nDgFvcx/parallax-asset-" + bgImgNum + ".png)";
  item.style.top = Math.round(Math.random() * 100 - 20) + "%";
  item.style.left = Math.round(Math.random() * 100 - 20) + "%";
}

function updateParallaxItems() {
  itemsArray.forEach(function (item) {
    var depth = parseFloat(item.dataset.depth, 10);
    var moveX = (mouse.x - window.innerWidth / 2) * depth * 0.05;
    var moveY = (mouse.y - window.innerHeight / 2) * depth * 0.05;
    item.style.transform = `translate(${moveX}px, ${moveY}px)`;
  });
}

window.addEventListener("mousemove", function (event) {
  mouse.x = event.clientX;
  mouse.y = event.clientY;
  updateParallaxItems();
});
