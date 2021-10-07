<?php $this->view("admin/inc/header",$data); ?>

<div class="categories-container">
    <table>
        <button class="rounded btn-blue" onclick="showAddNew()"><i class="fa fa-plus"></i> Dodaj novu kategoriju </button>
        <!-- add new category -->
        <div class="box add_new hide">

            <!-- BASIC FORM ELELEMNTS -->
            <form method="post">
                <div class="section_box">

                    <h3>Dodaj novu kategoriju</h3>
                    <div>Ime kategorije:</div>
                    <input id="category" name="category" type="text" autofocus>
                </div>
                <div class="section_box">
                    <div>Nadređena kategorija (neobavezan):</div>
                    <select id="parent" name="parent" required>
                        <option></option>

                        <?php if(is_array($categories_all)): ?>
                            <?php foreach($categories_all as $cat_row): ?>

                                <option value="<?=$cat_row->id?>"><?=$cat_row->category?></option>

                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
            </form>
            <button type="button" class="rounded btn-cancel" onclick="showAddNew()">Zatvori</button>
            <button type="button" class="rounded btn-blue" onclick="collectData()">Spremi</button>
        </div>
        <!-- add new category end -->

        <h4>Popis kategorija</h4>

        <!-- edit new category -->
        <div class="box edit_category hide">

            <!-- BASIC FORM ELELEMNTS -->
            <h3>Uredi kategoriju</h3>
            <form method="post">

                <div class="section_box">
                    <div>Ime kategorije:</div>
                    <input id="category_edit" name="category" type="text" autofocus>
                </div>

                <div class="section_box">
                <div>Nadređena kategorija (neobavezan):</div>
                    <select id="parent_edit" name="parent" required>
                        <option></option>
                        <?php if(is_array($categories_all)): ?>
                            <?php foreach($categories_all as $cat_row): ?>

                                <option value="<?=$cat_row->id?>"><?=$cat_row->category?></option>

                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

            </form>
            <button type="button" class="rounded btn-cancel" onclick="showEditCategory(0,'','',event)">Zatvori</button>
            <button type="button" class="rounded btn-blue" onclick="collectEditData()">Spremi</button>
        </div>
        <!-- edit new category end -->

        <hr>
        <thead>
        <tr>
            <th>Kategorija</th>
            <th>Nadređena kategorija</th>
            <th>Status</th>
            <th>Akcija</th>
        </tr>
        </thead>
        <tbody id="table_body">

        <?= $tbl_rows?>

        </tbody>
    </table>
</div>

<script type="text/javascript">

    let EDIT_ID = 0;

    function showAddNew(){
        
        let show_add_box = document.querySelector(".add_new");
        let category_input = document.querySelector("#category");
        let show_edit_box = document.querySelector(".edit_category");
        let t_body = document.querySelector("tbody");

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
    }

    function showEditCategory(id,category,parent,e){

        EDIT_ID = id;
        let show_add_box = document.querySelector(".add_new");
        let show_edit_box = document.querySelector(".edit_category");

        let category_input = document.querySelector("#category_edit");
        category_input.value = category;
        let t_body = document.querySelector("tbody");

        let parent_input = document.querySelector("#parent_edit");
        parent_input.value = parent;

        if (show_edit_box.classList.contains("hide")) {

            show_add_box.classList.add("hide");

            show_edit_box.classList.remove("hide");
            category_input.focus();
            t_body.style.filter = "grayscale(100%)";

        }else{

            show_edit_box.classList.add("hide");
            t_body.style.filter = "grayscale(0)";
            category_input.value = "";

        }

    }

    function collectData(){

        let category_input = document.querySelector("#category");
        let parent_input = document.querySelector("#parent");
        let category = category_input.value.trim();
        let parent = parent_input.value.trim();

        if (category_input.value.trim() == "" || !isNaN(category_input.value.trim())) {

            swal({
                title: "Neispravan unos",
                text: "Molim unesite ispravnu kategoriju",
                icon: "warning",
            });
        }

        else if (isNaN(parent_input.value.trim())) {

            swal({
                title: "Neispravan unos",
                text: "Molim unesite ispravnu nadređenu kategoriju",
                icon: "warning",
            });
            
        }

        sendData({
            category:category,
            parent:parent,
            data_type:"add_category"
            });
        
    }

    function collectEditData(){

        let category_input = document.querySelector("#category_edit");
        let parent_input = document.querySelector("#parent_edit");
        let category = category_input.value.trim();
        let parent = parent_input.value.trim();

        if (category_input.value.trim() == "" || !isNaN(category_input.value.trim())) {

            swal({
                title: "Neispravan unos",
                text: "Molim unesite ispravnu kategoriju",
                icon: "warning",
            });
            
        }

        else if (isNaN(parent_input.value.trim())) {

            swal({
                title: "Neispravan unos",
                text: "Molim unesite ispravnu nadređenu kategoriju",
                icon: "warning",
            });

        }

        sendData({
            id:EDIT_ID,
            category:category,
            parent:parent,
            data_type:"edit_category"
            });
        
    }

    function sendData(data = {}){
        
        let ajax = new XMLHttpRequest();

        ajax.addEventListener("readystatechange",function(){

            if (ajax.readyState == 4 && ajax.status == 200 ) {
                handleResult(ajax.responseText);
            }
        });

        ajax.open("POST","<?=ROOT?>ajax_category",true);
        ajax.send(JSON.stringify(data));
    }

    function handleResult(result){

        if (result != "") {
            
            let obj = JSON.parse(result);

            if (typeof obj.data_type != "undefined") {

                if (obj.data_type == "add_new") {
                    if (obj.message_type == "info") {

                        swal({
                            title: "Uspješno ste dodali kategoriju",
                            icon: "success",
                        });

                        showAddNew();

                        let table_body = document.querySelector("#table_body");
                        table_body.innerHTML = obj.data;

                    }else{

                        alert(obj.message);

                    }

                }else if (obj.data_type == "disable_row") {
                            
                    let table_body = document.querySelector("#table_body");
                    table_body.innerHTML = obj.data;

                }else if (obj.data_type == "edit_category") {

                    swal({
                        title: "Uspješno ste uredili kategoriju",
                        icon: "success",
                    });

                    showEditCategory(0,'','',false);

                    let table_body = document.querySelector("#table_body");
                    table_body.innerHTML = obj.data;

                }else if (obj.data_type == "delete_row"){

                    swal({
                        title: "Uspješno ste obrisali kategoriju",
                        icon: "success",
                    });

                    let table_body = document.querySelector("#table_body");
                    table_body.innerHTML = obj.data;

                }
                
            }
        }   
    }

    function deleteRow(id){


        swal({
            title: "Dali ste sigurni da želite obrisati ovu kategoriju?",
            text: "Jedanput kada obrišete kategoriju više ju ne možete vratiti",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {

                    sendData({
                        data_type:"delete_row",
                        id:id
                    });

                } else {
                    return;
                }

            }
        );

    }

    function disableRow(id,state){

        sendData({
            data_type:"disable_row",
            id:id,
            current_state:state
        });

    }

</script>

<?php $this->view("admin/inc/footer",$data); ?>