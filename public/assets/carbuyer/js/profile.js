class UI {

    load() {
        let navMenu = document.querySelector('#nav-menu');
        let navToggle = document.querySelector('#nav-toggle');
        let closeFlyout = document.querySelector('#close-flyout');

        //dodao iz account-page site-a
        let signUpPassword = document.querySelector("#signUpPassword");

        let signUpEye = document.querySelector(".signUpEye");

        let signUpPassword2 = document.querySelector("#signUpPassword2");

        let signUpEye2 = document.querySelector(".signUpEye2");

        signUpEye.addEventListener("click",()=>{

            if (signUpPassword.type === "password") {

                signUpPassword.type = "text";
                signUpEye.innerHTML = `<i class="fa fa-eye"></i>`;

            }else{

                signUpPassword.type = "password";
                signUpEye.innerHTML = `<i class="fa fa-eye-slash"></i>`;
    
            }
        })

        signUpEye2.addEventListener("click",()=>{

            if (signUpPassword2.type === "password") {

                signUpPassword2.type = "text";
                signUpEye2.innerHTML = `<i class="fa fa-eye"></i>`;

            }else{

                signUpPassword2.type = "password";
                signUpEye2.innerHTML = `<i class="fa fa-eye-slash"></i>`;
    
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