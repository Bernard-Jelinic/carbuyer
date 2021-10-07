class UI {

  load() {
      // save references to often used DOM elements
      let imageSlider = $('#post-image-slider');
      let displayAllRealState = document.querySelector(".rounded");
      let navMenu = document.querySelector('#nav-menu');
      let navToggle = document.querySelector('#nav-toggle');
      let closeFlyout = document.querySelector('#close-flyout');

    $(imageSlider).slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: true,
        variableWidth: true,
        infinite: true,
        prevArrow: '<a href="#" class="slick-arrow slick-prev"><span class="fa fa-chevron-left"></span></a>',
        nextArrow: '<a href="#" class="slick-arrow slick-next"><span class="fa fa-chevron-right"></span></a>'
    });

    navToggle.addEventListener("click",()=>{
        navMenu.style.right = '0';
    });
     
    closeFlyout.addEventListener("click",()=>{
        navMenu.style.right = '-100%';
    });

      displayAllRealState.addEventListener("click",()=>{
          window.location = "all-post.html";
      })
  };
}

// event listener na DOM koji poziva anonimus funkciju kad se DOM učita
document.addEventListener("DOMContentLoaded", () => {
  // instances of classes
  const ui = new UI();
  ui.load();

  // footer year
  const currentYear = new Date().getFullYear();
  document.querySelector(
      ".copyright-footer"
  ).innerText = `© Copyright ${currentYear} Sva prava pridržana | Nekretnine`;
});