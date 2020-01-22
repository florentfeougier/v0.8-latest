


var MobileMenuBtn = document.querySelector(".btn-show-menu-mobile");
document.querySelector(".btn-show-menu-mobile").addEventListener("click", function (e) {
  console.log('Mobile menu toggle button clicked.');
  MobileMenuBtn.classList.toggle('is-active');
  var MobileMenu = document.querySelector(".wrap-side-menu");
  if (MobileMenu.style.display == 'block') MobileMenu.style.display = 'none';else MobileMenu.style.display = 'block';
}); //
// Hide flash message block if exist
//

document.addEventListener("click", alertCloseButtonListener);

function alertCloseButtonListener(event) {
  var element = event.target;

  if (document.querySelector(".alert-close")) {
    console.log("Class .alert-close cliked! Closing the alert box...");
    document.querySelector(".alert-close").closest(".alert").style.visibility = "hidden";
  }
}

// window.addEventListener('scroll', function() {
//         console.log('scrolling');
// });
// function resize() {
//     console.log('resizing...');
//   }
//
//   window.onresize = resize;


var nav = document.querySelector('.header2');
var navTop = nav.offsetTop;

function stickyNavigation() {
  if (window.scrollY >= 300) {
    // nav offsetHeight = height of nav
    document.querySelector('.fixed-header2').classList.toggle('fixed-header');
    document.querySelector('.fixed-header2').style.display = "block";
    document.querySelector('.fixed-header2').classList.add('show-fixed-header2');
  } else {
    document.body.style.paddingTop = 0;
    document.querySelector('.fixed-header2').style.display = "none";
    document.body.classList.remove('show-fixed-header2');
  }
}

window.onscroll = stickyNavigation; //
// Init and handle modals
//



document.addEventListener("click", toggleListener);

function toggleListener(event) {
  var element = event.target;
  console.log(element.classList.contains("js-toggle-dropdown-content"));

  if (element.classList.contains("js-toggle-dropdown-content")) {
    console.log("Toggle");

    if (element.nextElementSibling.style.display == 'block') {
      console.log("Closing toggle");
      console.log(element.children.innerHTML);
      element.children.innerHTML = "+";
      element.nextElementSibling.style.display = 'none';
    } else {
      console.log("Opening toggle");
      element.children.innerHTML = "-";
      element.nextElementSibling.style.display = 'block';
    }
  }
}
