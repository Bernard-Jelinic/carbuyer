class UI {

    load() {
        // save references to often used DOM elements
        let displayAllRealState = document.querySelector(".rounded");
        let headerElem = document.querySelector('header');
        let logo = document.querySelector('#logo');
        let navMenu = document.querySelector('#nav-menu');
        let navToggle = document.querySelector('#nav-toggle');
        let closeFlyout = document.querySelector('#close-flyout');
        let strip = document.querySelectorAll(".strip");

        navToggle.addEventListener("click",()=>{
            navMenu.style.right = '0';
        });
       
        closeFlyout.addEventListener("click",()=>{
            navMenu.style.right = '-100%';
        });

        document.addEventListener('scroll',()=>{
            let scrollTop = document.scrollingElement.scrollTop;
            let allBackgroundColor;
            let i;
 
            if (scrollTop > 0) {
                navMenu.classList.add('is-sticky');
                logo.style.color = "#000";
                headerElem.style.background = '#fff';
                navToggle.style.borderColor = "#000";
                allBackgroundColor = '#000';

            } else {
                navMenu.classList.remove('is-sticky');
                logo.style.color = '#fff';
                headerElem.style.background = 'transparent';
                navToggle.style.borderColor = "#fff";
                allBackgroundColor = '#fff';
            }

            // ako koristim querySelector označi mi samo prvi prvu klasu 'strip',tj.samo prvu vodoravnu liniju 
            // querySelectorAll vrati array od selectiranih klasa, te zato loopam taj array i mijenjam background-color
            for (i = 0; i < strip.length; i++) {
               strip[i].style.backgroundColor = allBackgroundColor;
            }
 
            // ovaj dio ispod napravio da se header povećava i smanjuje ovisno o skrolanju
            if (scrollTop >= 200) {
                headerElem.style.padding = '0.5rem';
                //headerElem.style.boxShadow = '0 -4px 10px 1px #999';
                //ova dva načina ispod nisam koristio zato što oni pregaze trenutni style od header tag-a
                //headerElem.setAttribute('style','padding: 0.5rem; box-shadow: 0 -4px 10px 1px #999;');
                //headerElem.style.cssText = "padding: 0.5rem; box-shadow: 0 -4px 10px 1px #999;";
            }else{
                headerElem.style.padding = '1rem 0';
                //headerElem.style.boxShadow = 'none';
                //ova dva načina ispod nisam koristio zato što oni pregaze trenutni style od header tag-a
                //headerElem.setAttribute('style','padding: 1rem 0, box-shadow: none;');
                //headerElem.style.cssText = "padding: 1rem 0, box-shadow: none;";
            }
        });

       document.dispatchEvent(new Event('scrol'));

        displayAllRealState.addEventListener("click",()=>{
            window.location = "all-property.html";
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
    ).innerText = `© Copyright ${currentYear} Sva prava pridržana | Kupi auto.hr`;
});