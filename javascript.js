window.onload = function() {
    document.body.classList.remove("loading");
    console.log("LOADED!");
}; 



AOS.init();

const logo = document.getElementById("hamburger");
const images = document.getElementById("video");

function isInsideInImages(images, logoPos) {
    let imagePos = images.getBoundingClientRect();

    if (
      logoPos.top <= imagePos.top + imagePos.height &&
      logoPos.top + logoPos.height > imagePos.top
    ) {
      return true;
    }
  
  return false;
}


var isInViewport = function (elem) {
  var bounding = elem.getBoundingClientRect();
  return (
    bounding.top >= 0 &&
    bounding.left >= 0 &&
    bounding.bottom <=
      (window.innerHeight || document.documentElement.clientHeight) &&
    bounding.right <=
      (window.innerWidth || document.documentElement.clientWidth)
  );
};

    var tl = gsap.timeline().to(".e", {
      x: "random(0, 500, 5)", //chooses a random number between -20 and 20 for each target, rounding to the closest 5!
      y: "random(0, 100, 3)",
      duration: 1.5,
      ease: "none",
      repeat: -1,
      repeatRefresh: true, // gets a new random x and y value on each repeat
    });

window.addEventListener("scroll", function () {
  const a = logo.getBoundingClientRect();

  if (isInsideInImages(images, a)) {
    logo.classList.add("yellowmenu");
  } else {
    logo.classList.remove("yellowmenu");
  }


  if (isInViewport(document.querySelector(".circle"))) {
    //Header animation
    var tl = gsap.timeline().to(".e", {
      x: "random(0, 500, 5)", //chooses a random number between -20 and 20 for each target, rounding to the closest 5!
      y: "random(0, 100, 3)",
      duration: 1.5,
      ease: "none",
      repeat: -1,
      repeatRefresh: true, // gets a new random x and y value on each repeat
    });
  }
});


