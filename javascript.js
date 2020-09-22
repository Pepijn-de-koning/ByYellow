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

window.addEventListener("scroll", function () {
  const a = logo.getBoundingClientRect();

  if (isInsideInImages(images, a)) {
    logo.classList.add("yellowmenu");
  } else {
    logo.classList.remove("yellowmenu");
  }
});

