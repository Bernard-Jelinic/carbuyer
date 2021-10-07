class UI {

    load() {
        let navMenu = document.querySelector('#nav-menu');
        let navToggle = document.querySelector('#nav-toggle');
        let closeFlyout = document.querySelector('#close-flyout');

        //dodao iz account-page site-a

        let loginPassword = document.querySelector("#loginPassword");

        let loginEye = document.querySelector(".loginEye");


        loginEye.addEventListener("click",()=>{

            if (loginPassword.type === "password") {

                loginPassword.type = "text";
                loginEye.innerHTML = `<i class="fa fa-eye"></i>`;

            }else{

                loginPassword.type = "password";
                loginEye.innerHTML = `<i class="fa fa-eye-slash"></i>`;

            }
        })

        //prikaže bočno kad se klikne na hamburger menu
        navToggle.addEventListener("click",()=>{
            navMenu.style.right = '0';
        });
        
        //sakrije bočno kad se klikne na X
        closeFlyout.addEventListener("click",()=>{
            navMenu.style.right = '-100%';
        });

    };

}

//event listener na DOM koji poziva anonimus funkciju kad se DOM učita
document.addEventListener("DOMContentLoaded", () => {
  //---instances of classes---
  const ui = new UI();
  ui.load();

  //---Footer Year---
  const currentYear = new Date().getFullYear();
  document.querySelector(
      ".copyright-footer"
      ).innerText = `© Copyright ${currentYear} Sva prava pridržana | Kupi auto.hr`;
});