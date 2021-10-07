class UI {

    load() {

        let EDIT_ID = 0;
        // save references to often used DOM elements
        let navMenu = document.querySelector('#nav-menu');
        let navToggle = document.querySelector('#nav-toggle');
        let closeFlyout = document.querySelector('#close-flyout');
        let showAddNew = document.querySelectorAll('#show_add_new');
        let i;
        let collectData = document.querySelector('#collect_data');

        let show_add_box = document.querySelector(".add_new");
        let category_input = document.querySelector("#category");
        let show_edit_box = document.querySelector(".edit_category");
        let t_body = document.querySelector("tbody");

        //prikaže bočno kad se klikne na hamburger menu
        navToggle.addEventListener("click",()=>{
            navMenu.style.right = '0';
        });
        
        //sakrije bočno kad se klikne na X
        closeFlyout.addEventListener("click",()=>{
            navMenu.style.right = '-100%';
        });

        for (i = 0; i < showAddNew.length; i++) {

            showAddNew[i].addEventListener("click",()=>{

                if (show_add_box.classList.contains("hide")) {
    
                    show_edit_box.classList.add("hide");
                    show_add_box.classList.remove("hide");
                    t_body.style.filter = "grayscale(100%)";
                    category_input.focus();
    
                }else{
    
                    show_add_box.classList.add("hide");
                    t_body.style.filter = "grayscale(0)";
                    category_input.value = "";
    
                }
            })

        }

        collectData.addEventListener("click",()=>{
            
            let category_input = document.querySelector("#category");
            let parent_input = document.querySelector("#parent");
            let category = category_input.value.trim();
            let parent = parent_input.value.trim();
    
            if (category_input.value.trim() == "" || !isNaN(category_input.value.trim())) {
    
                alert("Molim unesite ispravnu kategoriju");
            }
    
            else if (isNaN(parent_input.value.trim())) {
    
                alert("Molim unesite ispravnu kategoriju");
            }
    
            send_data({
                category:category,
                parent:parent,
                data_type:"add_category"
            });

        });

        function send_data(data = {}){
        
            let ajax = new XMLHttpRequest();
    
            ajax.addEventListener("readystatechange",function(){
    
                if (ajax.readyState == 4 && ajax.status == 200 ) {
                    handle_result(ajax.responseText);
                }
            });
    
            // ajax.open("POST","<?=ROOT?>ajax_category",true);
            ajax.open("POST","ajax_category",true);
            ajax.send(JSON.stringify(data));

        }

        function handle_result(result){

            if (result != "") {

                console.log(result);
                let obj = JSON.parse(result);
    
                if (typeof obj.data_type != "undefined") {
    
                    if (obj.data_type=="add_new") {
                        if (obj.message_type == "info") {
    
                            alert(obj.message);
                            show_add_new();
    
                            let table_body = document.querySelector("#table_body");
                            table_body.innerHTML = obj.data;
    
                        }else{
    
                            alert(obj.message);
    
                        }
    
                    }else if (obj.data_type=="edit_category") {
    
                        show_edit_category(0,'','',false);
    
                        let table_body = document.querySelector("#table_body");
                        table_body.innerHTML = obj.data;
    
                    }else if (obj.data_type=="disable_row") {
                                
                        let table_body = document.querySelector("#table_body");
                        table_body.innerHTML = obj.data;
    
                    }
                    
                }
            }   
        }

    };
    }

    // event listener na DOM koji poziva anonimus funkciju kad se DOM učita
    document.addEventListener("DOMContentLoaded", () => {
        // instances of classes
        const ui = new UI();
        ui.load();

        // footer year
        // const currentYear = new Date().getFullYear();
        // document.querySelector(
        //     ".copyright-footer"
        // ).innerText = `© Copyright ${currentYear} Sva prava pridržana | Kupi auto.hr`;
    });