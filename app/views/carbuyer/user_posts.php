<?php $this->view("inc/header",$data); ?>

<div class="categories-container">
    <table>
        <button class="rounded btn-blue" onclick="showAddNew(event)"><i class="fa fa-plus"></i> Dodaj novi oglas </button>
        <!-- add new post -->
        <div class="box add_new hide">

            <div class="section-box">
                <h3>Dodaj novi oglas</h3>
            </div>

            <div class="box-form">
                <div class="section-box">
                    <div>Ime oglasa:</div>
                    <input id="name" name="name" type="text" autofocus>
                </div>

                <div class="section-box">
                    <div>Lokacija:</div>
                    <select id="location" name="location" required>
                        <option></option>

                        <?php if(is_array($country_data)): ?>
                            <?php foreach($country_data as $country): ?>

                                <option value="<?=$country->name?>"><?=$country->name?></option>

                            <?php endforeach; ?>
                        <?php endif; ?>

                    </select>
                </div>
                
                <div class="section-box">
                    <div>Tip oglašavanja:</div>
                    <select id="status" name="status">
                        <option></option>
                            <option value="Za prodaju">Za prodaju</option>
                            <option value="Za najam">Za najam</option>
                    </select>
                </div>

                <div class="section-box">
                    <div>Kategorija:</div>
                    <select id="category" name="category" required>
                        <option></option>
                        <?php if(is_array($categories_all)): ?>
                            <?php foreach($categories_all as $categ): ?>

                                <option value="<?=$categ->id?>"><?=$categ->category?></option>

                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="section-box">
                    <div>Marka vozila:</div>
                    <select id="brand" name="brand" onchange="displayModels()">
                        <option></option>
                            <option value="Audi">Audi</option>
                            <option value="BMW">BMW</option>
                            <option value="Ferrari">Ferrari</option>
                            <option value="Ford">Ford</option>
                            <option value="Škoda">Škoda</option>
                            <option value="VW">VW</option>
                    </select>
                </div>

                <div class="section-box">
                    <div>Model:</div>
                    <select id="model" name="model">
                        <option value="" disabled selected hidden>Prvo odaberi marku vozila</option>
                    </select>
                </div>

                <div class="section-box">
                    <div>Dali je oglas aktualan:</div>
                    <select id="recent" name="recent">
                        <option></option>
                            <option value="Da">Da</option>
                            <option value="Ne">Ne</option>
                    </select>
                </div>

                <div class="section-box">
                    <div>Opis oglasa:</div>
                    <input id="description" name="description" type="text" autofocus>
                </div>

                <div class="section-box">
                    <div>Kilometri [km]:</div>
                    <input id="kilometers" name="kilometers" type="number" placeholder="350000" autofocus required>
                </div>

                <div class="section-box">
                    <div>Cijena [kn]:</div>
                    <input id="price" name="price" type="number" placeholder="20000" step="1" required>
                </div>

                <div class="section-box">
                    <div>Snaga motora [kW]:</div>
                    <input id="power" name="power" type="number" placeholder="74" step="1" required>
                </div>

                <div class="section-box">
                    <div>Radni obujam [l]:</div>
                    <input id="engine_displacement" name="engine_displacement" type="number" placeholder="1.6" step="0.1" required>
                </div>

                <div class="section-box">
                    <div>Tip mjenjača:</div>
                    <select id="transmission" name="transmission">
                        <option></option>
                            <option value="Automatski">Automatski</option>
                            <option value="Ručni">Ručni</option>
                    </select>
                </div>

                <div class="section-box">
                    <div>Broj brzina:</div>
                    <input id="transmission_number" name="transmission_number" type="number" placeholder="5" step="1" required>
                </div>


                <div class="section-box">
                    <div>Tip motora:</div>
                    <select id="motor_type" name="motor_type">
                        <option></option>
                            <option value="Diesel">Diesel</option>
                            <option value="Benzin">Benzin</option>
                    </select>
                </div>

                <div class="section-box">
                    <div>Godina proizvodnje:</div>
                    <input id="manufacture_year" name="manufacture_year" type="number" placeholder="2000" step="1" required>
                </div>

                <div class="section-box">
                    <div>Slika:*</div>
                    <input id="image" name="image" type="file" onchange="displayImage(this.files[0],this.name,'js-post-images-add')" required>
                </div>

                <div class="section-box">
                    <div>Slika 2:</div>
                    <input id="image2" name="image2" type="file" onchange="displayImage(this.files[0],this.name,'js-post-images-add')" >
                </div>

                <div class="section-box">
                    <div>Slika 3:</div>
                    <input id="image3" name="image3" type="file" onchange="displayImage(this.files[0],this.name,'js-post-images-add')" >
                </div>

                <div class="section-box">
                    <div>Slika 4:</div>
                    <input id="image4" name="image4" type="file" onchange="displayImage(this.files[0],this.name,'js-post-images-add')" >
                </div>

                <div class="section-box">
                    <div>Slika 5:</div>
                    <input id="image5" name="image5" type="file" onchange="displayImage(this.files[0],this.name,'js-post-images-add')" >
                </div>

                <div class="section-box">
                    <div>Slika 6:</div>
                    <input id="image6" name="image6" type="file" onchange="displayImage(this.files[0],this.name,'js-post-images-add')" >
                </div>

                <div class="section-box">
                    <div>Slika 7:</div>
                    <input id="image7" name="image7" type="file" onchange="displayImage(this.files[0],this.name,'js-post-images-add')" >
                </div>

                <div class="section-box">
                    <div>Slika 8:</div>
                    <input id="image8" name="image8" type="file" onchange="displayImage(this.files[0],this.name,'js-post-images-add')" >
                </div>

                <div class="section-box">
                    <div>Slika 9:</div>
                    <input id="image9" name="image9" type="file" onchange="displayImage(this.files[0],this.name,'js-post-images-add')" >
                </div>
            </div>

            <div class="section-box">
                <div class="js-post-images-add">
                        <img src="" alt="" class="small-picture">
                        <img src="" alt="" class="small-picture">
                        <img src="" alt="" class="small-picture">
                        <img src="" alt="" class="small-picture">
                        <img src="" alt="" class="small-picture">
                        <img src="" alt="" class="small-picture">
                        <img src="" alt="" class="small-picture">
                        <img src="" alt="" class="small-picture">
                        <img src="" alt="" class="small-picture">
                </div>
                
                <button type="button" class="rounded btn-cancel" onclick="showAddNew(event)">Zatvori</button>
                <button type="button" class="rounded btn-blue" onclick="collectData(event)">Spremi</button>
            </div>

        </div>
        <!-- add new post end -->

        <h4>Popis oglasa</h4>

        <!-- edit post -->
        <div class="box edit_post hide">

            <!-- BASIC FORM ELELEMNTS -->
            
            <div class="section-box">
                <h3>Uredi oglas</h3>
            </div>

            <div class="box-form">
                <div class="section-box">
                    <div>Ime oglasa:</div>
                    <input id="edit_name" name="name" type="text" autofocus>
                </div>

                <div class="section-box">
                    <div>Lokacija:</div>
                    <select id="edit_location" name="location" required>
                        <option></option>

                        <?php if(is_array($country_data)): ?>
                            <?php foreach($country_data as $country): ?>

                                <option value="<?=$country->name?>"><?=$country->name?></option>

                            <?php endforeach; ?>
                        <?php endif; ?>

                    </select>
                </div>
                
                <div class="section-box">
                    <div>Tip oglašavanja:</div>
                    <select id="edit_status" name="status">
                        <option></option>
                            <option value="Za prodaju">Za prodaju</option>
                            <option value="Za najam">Za najam</option>
                    </select>
                </div>

                <div class="section-box">
                    <div>Kategorija:</div>
                    <select id="edit_category" name="category" required>
                        <option></option>
                        <?php if(is_array($categories_all)): ?>
                            <?php foreach($categories_all as $categ): ?>

                                <option value="<?=$categ->id?>"><?=$categ->category?></option>

                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="section-box">
                    <div>Marka vozila:</div>
                    <select id="edit_brand" name="brand" onchange="displayModels('edit')">
                        <option></option>
                            <option value="Audi">Audi</option>
                            <option value="BMW">BMW</option>
                            <option value="Ferrari">Ferrari</option>
                            <option value="Ford">Ford</option>
                            <option value="Škoda">Škoda</option>
                            <option value="VW">VW</option>
                    </select>
                </div>

                <div class="section-box">
                    <div>Model:</div>
                    <select id="edit_model" name="model">
                        <option value="" disabled selected hidden>Prvo odaberi marku vozila</option>
                    </select>
                </div>

                <div class="section-box">
                    <div>Dali je oglas aktualan:</div>
                    <select id="edit_recent" name="recent">
                        <option></option>
                            <option value="Da">Da</option>
                            <option value="Ne">Ne</option>
                    </select>
                </div>

                <div class="section-box">
                    <div>Opis oglasa:</div>
                    <input id="edit_description" name="description" type="text" autofocus>
                </div>

                <div class="section-box">
                    <div>Kilometri [km]:</div>
                    <input id="edit_kilometers" name="kilometers" type="number" placeholder="350000" autofocus required>
                </div>

                <div class="section-box">
                    <div>Cijena [kn]:</div>
                    <input id="edit_price" name="price" type="number" placeholder="20000" step="1" required>
                </div>

                <div class="section-box">
                    <div>Snaga motora [kW]:</div>
                    <input id="edit_power" name="power" type="number" placeholder="74" step="1" required>
                </div>

                <div class="section-box">
                    <div>Radni obujam [l]:</div>
                    <input id="edit_engine_displacement" name="engine_displacement" type="number" placeholder="1.6" step="0.1" required>
                </div>

                <div class="section-box">
                    <div>Tip mjenjača:</div>
                    <select id="edit_transmission" name="transmission">
                        <option></option>
                            <option value="Automatski">Automatski</option>
                            <option value="Ručni">Ručni</option>
                    </select>
                </div>

                <div class="section-box">
                    <div>Broj brzina:</div>
                    <input id="edit_transmission_number" name="transmission_number" type="number" placeholder="5" step="1" required>
                </div>


                <div class="section-box">
                    <div>Tip motora:</div>
                    <select id="edit_motor_type" name="motor_type">
                        <option></option>
                            <option value="Diesel">Diesel</option>
                            <option value="Benzin">Benzin</option>
                    </select>
                </div>

                <div class="section-box">
                    <div>Godina proizvodnje:</div>
                    <input id="edit_manufacture_year" name="manufacture_year" type="number" placeholder="0.00" step="1" required>
                </div>

                <div class="section-box">
                    <div>Slika:*</div>
                    <input id="edit_image" name="image" type="file" onchange="displayImage(this.files[0],this.name,'js-post-images-add')" required>
                </div>

                <div class="section-box">
                    <div>Slika 2:</div>
                    <input id="edit_image2" name="image2" type="file" onchange="displayImage(this.files[0],this.name,'js-post-images-add')" >
                </div>

                <div class="section-box">
                    <div>Slika 3:</div>
                    <input id="edit_image3" name="image3" type="file" onchange="displayImage(this.files[0],this.name,'js-post-images-add')" >
                </div>

                <div class="section-box">
                    <div>Slika 4:</div>
                    <input id="edit_image4" name="image4" type="file" onchange="displayImage(this.files[0],this.name,'js-post-images-add')" >
                </div>

                <div class="section-box">
                    <div>Slika 5:</div>
                    <input id="edit_image5" name="image5" type="file" onchange="displayImage(this.files[0],this.name,'js-post-images-add')" >
                </div>

                <div class="section-box">
                    <div>Slika 6:</div>
                    <input id="edit_image6" name="image6" type="file" onchange="displayImage(this.files[0],this.name,'js-post-images-add')" >
                </div>

                <div class="section-box">
                    <div>Slika 7:</div>
                    <input id="edit_image7" name="image7" type="file" onchange="displayImage(this.files[0],this.name,'js-post-images-add')" >
                </div>

                <div class="section-box">
                    <div>Slika 8:</div>
                    <input id="edit_image8" name="image8" type="file" onchange="displayImage(this.files[0],this.name,'js-post-images-add')" >
                </div>

                <div class="section-box">
                    <div>Slika 9:</div>
                    <input id="edit_image9" name="image9" type="file" onchange="displayImage(this.files[0],this.name,'js-post-images-add')" >
                </div>
            </div>

            <div class="section-box">
                <div class="js-post-images-edit">
                    
                </div>
                
                <button type="button" class="rounded btn-cancel" onclick="showEditPost(0,'',false)">Zatvori</button>
                <button type="button" class="rounded btn-blue" onclick="collectEditData()">Spremi</button>
            </div>
        </div>
        <!-- edit post end -->

        <hr>
        <thead>
        <tr>
            <th>Id</th>
            <th>Ime oglasa</th>
            <th>Kilometri</th>
            <th>Kategorija</th>
            <th>Cijena</th>
            <th>Datum</th>
            <th>Slika</th>
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
        let showEditBox = document.querySelector(".add_new");
        let nameInput = document.querySelector("#name");

        let showAddBox = document.querySelector(".edit_post");

        if (showEditBox.classList.contains("hide")) {

            showAddBox.classList.add("hide");
            showEditBox.classList.remove("hide");
            nameInput.focus();
        }else{
            showEditBox.classList.add("hide");
            nameInput.value = "";

        }
    }

    function showEditPost(id,post,e){
    
        let showEditBox = document.querySelector(".add_new");

        let showAddBox = document.querySelector(".edit_post");
        let editNameInput = document.querySelector("#edit_name");


        if(e){

            let a = (e.currentTarget.getAttribute("info"));
            let info = JSON.parse(a.replaceAll("'",'"'));
            let editLocationSelect = document.querySelector("#edit_location");
            let editStatusSelect = document.querySelector("#edit_status");
            let editCategorySelect = document.querySelector("#edit_category");
            let editBrandSelect = document.querySelector("#edit_brand");
            let editModelSelect = document.querySelector("#edit_model");
            let editRecentSelect = document.querySelector("#edit_recent");
            let editDescriptionInput = document.querySelector("#edit_description");
            let editKilometersInput = document.querySelector("#edit_kilometers");
            let editPriceInput = document.querySelector("#edit_price");
            let editPowerInput = document.querySelector("#edit_power");
            let editEngineDisplacementInput = document.querySelector("#edit_engine_displacement");
            let editTransmissionSelect = document.querySelector("#edit_transmission");
            let editTransmissionNumberInput = document.querySelector("#edit_transmission_number");
            let editMotorTypeSelect = document.querySelector("#edit_motor_type");
            let editManufactureYearInput = document.querySelector("#edit_manufacture_year");
            let postImagesInput = document.querySelector(".js-post-images-edit");

            EDIT_ID = info.id;

            showAddBox.style.top = (e.clientY - 100) + "px";

            editNameInput.value = info.name;

            editLocationSelect.value = info.location;

            editStatusSelect.value = info.status;

            editCategorySelect.value = info.category_id;

            editBrandSelect.value = info.brand;

            //call function to enter in select tag car models
            displayModels("edit");

            editModelSelect.value = info.model;

            editRecentSelect.value = info.recent;

            editDescriptionInput.value = info.description;

            editKilometersInput.value = info.kilometers;

            editPriceInput.value = info.price;

            editPowerInput.value = info.power;

            editEngineDisplacementInput.value = info.engine_displacement;

            editTransmissionSelect.value = info.transmission;

            editTransmissionNumberInput.value = info.transmission_number;

            editMotorTypeSelect.value = info.motor_type;

            editManufactureYearInput.value = info.manufacture_year;

            postImagesInput.innerHTML = `<img src="<?=ROOT?>${info.image}" class="small-picture"/>`;

            if (info.image2!=="") {

                postImagesInput.innerHTML += `<img src="<?=ROOT?>${info.image2}" class="small-picture"/>`;

            }

            if(info.image3!==""){
                
                postImagesInput.innerHTML += `<img src="<?=ROOT?>${info.image3}" class="small-picture"/>`;
            
            }

            if(info.image4!==""){

                postImagesInput.innerHTML += `<img src="<?=ROOT?>${info.image4}" class="small-picture"/>`;
            
            }

            if(info.image5!==""){

                postImagesInput.innerHTML += `<img src="<?=ROOT?>${info.image5}" class="small-picture"/>`;

            }

            if(info.image6!==""){

                postImagesInput.innerHTML += `<img src="<?=ROOT?>${info.image6}" class="small-picture"/>`;

            }

            if(info.image7!==""){

                postImagesInput.innerHTML += `<img src="<?=ROOT?>${info.image7}" class="small-picture"/>`;

            }

            if(info.image8!==""){

                postImagesInput.innerHTML += `<img src="<?=ROOT?>${info.image8}" class="small-picture"/>`;

            }

            if(info.image9!==""){

                postImagesInput.innerHTML += `<img src="<?=ROOT?>${info.image9}" class="small-picture"/>`;

            }

        }

        if (showAddBox.classList.contains("hide")) {

            showEditBox.classList.add("hide");
            showAddBox.classList.remove("hide");
            editNameInput.focus();
        }else{
            showAddBox.classList.add("hide");
            editNameInput.value = "";

        }
    }

    function displayModels(addEdit){

        let modelDisplay = document.querySelector("#brand");
        let modelDOM = document.querySelector("#model");

        if(addEdit == "edit"){
            modelDisplay = document.querySelector("#edit_brand");
            modelDOM = document.querySelector("#edit_model");
        }

        let models = [];
        let resultModel = "<option selected hidden>Odaberi model</option>";

        if (modelDisplay.value.trim() == "Audi") {
            models = ["A1","A3","A4","A5","A6","A7","A8","e-tron GT","TT","Q2","Q3","Q4 e-tron","Q5","Q7","Q8","e-tron","e-tron Sportback"];
        }else if (modelDisplay.value.trim() == "BMW") {
            models = ["Serija 1","Serija 2","Serija 3","BMW serije 4","Serija 5","Serija 5 Gran Turismo","Serija 6","Serija 7","BMW serije 8","X1","X3","X4","X5","X6","BMW X7","Z4","M"];
        }else if (modelDisplay.value.trim() == "Ferrari") {
            models = ["812 Superfast","Portofino","Roma","Monza SP1","Monza SP2","F8","SF90 Stradale","458 Spider"];
        }else if (modelDisplay.value.trim() == "Ford") {
            models = ["Fiesta","Focus","Escort","Mondeo","GT","Mustang","Escape","Kuga"];
        }else if (modelDisplay.value.trim() == "Škoda") {
            models = ["Felicia","Octavia","Fabia","Superb","Roomster","Yeti","Rapid","Citigo"];
        }else if (modelDisplay.value.trim() == "VW") {
            models = ["Polo","Buba","Golf mk1","Golf mk2","Golf mk3","Golf mk4","Golf mk5","Golf mk6","Golf mk7","Golf mk8","Jetta","Passat","CC","Scirocco","Touran","Sharan","Tiguan"];
        }

        models.forEach(model => {
            resultModel += `<option>${model}</option>`;
        });

        modelDOM.innerHTML = resultModel;

    }

    function collectData(e){

        let nameInput = document.querySelector("#name");
        let kilometersInput = document.querySelector("#kilometers");
        let powerInput = document.querySelector("#power");
        let engineDisplacementInput = document.querySelector("#engine_displacement");
        let transmissionSelect = document.querySelector("#transmission");
        let transmissionNumberInput = document.querySelector("#transmission_number");
        let motorTypeSelect = document.querySelector("#motor_type");
        let manufactureYearInput = document.querySelector("#manufacture_year");
        let locationSelect = document.querySelector("#location");
        let statusSelect = document.querySelector("#status");
        let brandSelect = document.querySelector("#brand");
        let modelSelect = document.querySelector("#model");
        let recentSelect = document.querySelector("#recent");
        let descriptionInput = document.querySelector("#description");
        let categorySelect = document.querySelector("#category");
        let priceInput = document.querySelector("#price");
        let imageInput = document.querySelector("#image");

        if (nameInput.value.trim() == "" || !isNaN(nameInput.value.trim())) {

            swal({
                title: "Neispravan unos",
                text: "Molim unesite ispravno ime",
                icon: "warning",
            });
            return;

        } else if (kilometersInput.value.trim() == "" || isNaN(kilometersInput.value.trim())) {

            swal({
                title: "Neispravan unos",
                text: "Molim unesite ispravne kilometre",
                icon: "warning",
            });
            return;

        } else if (powerInput.value.trim() == "" || isNaN(powerInput.value.trim())) {

            swal({
                title: "Neispravan unos",
                text: "Molim unesite ispravnu snagu motora",
                icon: "warning",
            });
            return;

        } else if (engineDisplacementInput.value.trim() == "" || isNaN(engineDisplacementInput.value.trim())) {

            swal({
                title: "Neispravan unos",
                text: "Molim unesite ispravni radni obujam motora",
                icon: "warning",
            });
            return;

        } else if (transmissionSelect.value.trim() == "") {

            swal({
                title: "Neispravan unos",
                text: "Molim odaberite tip mjenjača",
                icon: "warning",
            });
            return;

        } else if (transmissionNumberInput.value.trim() == "" || isNaN(transmissionNumberInput.value.trim())) {

            swal({
                title: "Neispravan unos",
                text: "Molim unesite ispravni broj brzina",
                icon: "warning",
            });
            return;

        } else if (motorTypeSelect.value.trim() == "") {

            swal({
                title: "Neispravan unos",
                text: "Molim odaberite tip motora",
                icon: "warning",
            });
            return;

        } else if (manufactureYearInput.value.trim() == "" || isNaN(manufactureYearInput.value.trim()) ) {

            swal({
                title: "Neispravan unos",
                text: "Molim odaberite godinu proizvodnje",
                icon: "warning",
            });
            return;

        } else if (locationSelect.value.trim() == "") {

            swal({
                title: "Neispravan unos",
                text: "Molim odaberite lokaciju vozila",
                icon: "warning",
            });
            return;

        } else if (statusSelect.value.trim() == "") {

            swal({
                title: "Neispravan unos",
                text: "Molim odaberite tip oglašavanja",
                icon: "warning",
            });
            return;

        } else if (brandSelect.value.trim() == "") {

            swal({
                title: "Neispravan unos",
                text: "Molim odaberite marku vozila",
                icon: "warning",
            });
            return;

        } else if (modelSelect.value.trim() == "") {

            swal({
                title: "Neispravan unos",
                text: "Molim odaberite model vozila",
                icon: "warning",
            });
            return;

        } else if (recentSelect.value.trim() == "") {

            swal({
                title: "Neispravan unos",
                text: "Molim odaberite dali je oglas aktualan",
                icon: "warning",
            });
            return;

        } else if (descriptionInput.value.trim() == "" || !isNaN(descriptionInput.value.trim())) {

            swal({
                title: "Neispravan unos",
                text: "Molim unesite ispravno opis",
                icon: "warning",
            });
            return;

        } else if (categorySelect.value.trim() == "" || isNaN(categorySelect.value.trim())) {

            swal({
                title: "Neispravan unos",
                text: "Molim odaberite kategoriju vozila",
                icon: "warning",
            });
            return;

        } else if (priceInput.value.trim() == "" || isNaN(priceInput.value.trim())) {

            swal({
                title: "Neispravan unos",
                text: "Molim unesite ispravnu cijenu",
                icon: "warning",
            });
            return;

        } else if (imageInput.files.length == 0) {

            swal({
                title: "Neispravan unos",
                text: "Molim unesite ispravnu glavnu sliku",
                icon: "warning",
            });
            return;

        }

        //create a form
        let data = new FormData();
        let image2Input = document.querySelector("#image2");
        let image3Input = document.querySelector("#image3");
        let image4Input = document.querySelector("#image4");
        let image5Input = document.querySelector("#image5");
        let image6Input = document.querySelector("#image6");
        let image7Input = document.querySelector("#image7");
        let image8Input = document.querySelector("#image8");
        let image9Input = document.querySelector("#image9");

        if (image2Input.files.length > 0) {
            data.append('image2',image2Input.files[0]);
        }
        
        if (image3Input.files.length > 0) {
            data.append('image3',image3Input.files[0]);
        }
        
        if (image4Input.files.length > 0) {
            data.append('image4',image4Input.files[0]);
        }
        
        if (image5Input.files.length > 0) {
            data.append('image5',image5Input.files[0]);
        }
        
        if (image6Input.files.length > 0) {
            data.append('image6',image6Input.files[0]);
        }
        
        if (image7Input.files.length > 0) {
            data.append('image7',image7Input.files[0]);
        }
        
        if (image8Input.files.length > 0) {
            data.append('image8',image8Input.files[0]);
        }
        
        if (image9Input.files.length > 0) {
            data.append('image9',image9Input.files[0]);
        }

        data.append('name',nameInput.value.trim());
        data.append('location',locationSelect.value.trim());
        data.append('status',statusSelect.value.trim());
        data.append('brand',brandSelect.value.trim());
        data.append('model',modelSelect.value.trim());
        data.append('recent',recentSelect.value.trim());
        data.append('description',descriptionInput.value.trim());
        data.append('kilometers',kilometersInput.value.trim());
        data.append('power',powerInput.value.trim());
        data.append('engine_displacement',engineDisplacementInput.value.trim());
        data.append('transmission',transmissionSelect.value.trim());
        data.append('transmission_number',transmissionNumberInput.value.trim());
        data.append('motor_type',motorTypeSelect.value.trim());
        data.append('manufacture_year',manufactureYearInput.value.trim());
        data.append('category_id',categorySelect.value.trim());
        data.append('price',priceInput.value.trim());
        data.append('data_type','add_post');
        data.append('image',imageInput.files[0]);

        sendDataFiles(data);
        
    }

    function collectEditData(){

        let editNameInput = document.querySelector("#edit_name");
        let editKilometersInput = document.querySelector("#edit_kilometers");
        let editPowerInput = document.querySelector("#edit_power");
        let editEngineDisplacementInput = document.querySelector("#edit_engine_displacement");
        let editTransmissionSelect = document.querySelector("#edit_transmission");
        let editTransmissionNumberInput = document.querySelector("#edit_transmission_number");
        let editMotorTypeSelect = document.querySelector("#edit_motor_type");
        let editManufactureYearInput = document.querySelector("#edit_manufacture_year");
        let editLocationSelect = document.querySelector("#edit_location");
        let editStatusSelect = document.querySelector("#edit_status");
        let editBrandSelect = document.querySelector("#edit_brand");
        let editModelSelect = document.querySelector("#edit_model");
        let editRecentSelect = document.querySelector("#edit_recent");
        let editDescriptionInput = document.querySelector("#edit_description");
        let editCategorySelect = document.querySelector("#edit_category");
        let editPriceInput = document.querySelector("#edit_price");
        let editImageInput = document.querySelector("#edit_image");

        if (editNameInput.value.trim() == "" || !isNaN(editNameInput.value.trim())) {

            swal({
                title: "Neispravan unos",
                text: "Molim unesite ispravno ime",
                icon: "warning",
            });
            return;

        } else if (editKilometersInput.value.trim() == "" || isNaN(editKilometersInput.value.trim())) {

            swal({
                title: "Neispravan unos",
                text: "Molim unesite ispravne kilometre",
                icon: "warning",
            });
            return;

        } else if (editPowerInput.value.trim() == "" || isNaN(editPowerInput.value.trim())) {

            swal({
                title: "Neispravan unos",
                text: "Molim unesite ispravnu snagu motora",
                icon: "warning",
            });
            return;

        } else if (editEngineDisplacementInput.value.trim() == "" || isNaN(editEngineDisplacementInput.value.trim())) {

            swal({
                title: "Neispravan unos",
                text: "Molim unesite ispravni radni obujam motora",
                icon: "warning",
            });
            return;

        } else if (editTransmissionSelect.value.trim() == "") {

            swal({
                title: "Neispravan unos",
                text: "Molim odaberite tip mjenjača",
                icon: "warning",
            });
            return;

        } else if (editTransmissionNumberInput.value.trim() == "" || isNaN(editTransmissionNumberInput.value.trim())) {

            swal({
                title: "Neispravan unos",
                text: "Molim unesite ispravni broj brzina",
                icon: "warning",
            });
            return;

        } else if (editMotorTypeSelect.value.trim() == "") {

            swal({
                title: "Neispravan unos",
                text: "Molim odaberite tip motora",
                icon: "warning",
            });
            return;

        } else if (editManufactureYearInput.value.trim() == "" || isNaN(editManufactureYearInput.value.trim()) ) {

            swal({
                title: "Neispravan unos",
                text: "Molim odaberite godinu proizvodnje",
                icon: "warning",
            });
            return;

        } else if (editLocationSelect.value.trim() == "") {

            swal({
                title: "Neispravan unos",
                text: "Molim odaberite lokaciju vozila",
                icon: "warning",
            });
            return;

        } else if (editStatusSelect.value.trim() == "") {

            swal({
                title: "Neispravan unos",
                text: "Molim odaberite tip oglašavanja",
                icon: "warning",
            });
            return;

        } else if (editBrandSelect.value.trim() == "") {

            swal({
                title: "Neispravan unos",
                text: "Molim odaberite marku vozila",
                icon: "warning",
            });
            return;

        } else if (editModelSelect.value.trim() == "") {

            swal({
                title: "Neispravan unos",
                text: "Molim odaberite model vozila",
                icon: "warning",
            });
            return;

        } else if (editRecentSelect.value.trim() == "") {

            swal({
                title: "Neispravan unos",
                text: "Molim odaberite dali je oglas aktualan",
                icon: "warning",
            });
            return;

        } else if (editDescriptionInput.value.trim() == "" || !isNaN(editDescriptionInput.value.trim())) {

            swal({
                title: "Neispravan unos",
                text: "Molim unesite ispravno opis",
                icon: "warning",
            });
            return;
            
        } else if (editCategorySelect.value.trim() == "" || isNaN(editCategorySelect.value.trim())) {

            swal({
                title: "Neispravan unos",
                text: "Molim odaberite kategoriju vozila",
                icon: "warning",
            });
            return;

        } else if (editPriceInput.value.trim() == "" || isNaN(editPriceInput.value.trim())) {

            swal({
                title: "Neispravan unos",
                text: "Molim unesite ispravnu cijenu",
                icon: "warning",
            });
            return;

        }

        //create a form
        let data = new FormData();
        let editImage2Input = document.querySelector("#edit_image2");
        let editImage3Input = document.querySelector("#edit_image3");
        let editImage4Input = document.querySelector("#edit_image4");
        let editImage5Input = document.querySelector("#edit_image5");
        let editImage6Input = document.querySelector("#edit_image6");
        let editImage7Input = document.querySelector("#edit_image7");
        let editImage8Input = document.querySelector("#edit_image8");
        let editImage9Input = document.querySelector("#edit_image9");

        if (editImage2Input.files.length > 0) {
            data.append('image2',editImage2Input.files[0]);
        }
        
        if (editImage3Input.files.length > 0) {
            data.append('image3',editImage3Input.files[0]);
        }
        
        if (editImage4Input.files.length > 0) {
            data.append('image4',editImage4Input.files[0]);
        }
        
        if (editImage5Input.files.length > 0) {
            data.append('image5',editImage5Input.files[0]);
        }
        
        if (editImage6Input.files.length > 0) {
            data.append('image6',editImage6Input.files[0]);
        }
        
        if (editImage7Input.files.length > 0) {
            data.append('image7',editImage7Input.files[0]);
        }
        
        if (editImage8Input.files.length > 0) {
            data.append('image8',editImage8Input.files[0]);
        }
        
        if (editImage9Input.files.length > 0) {
            data.append('image9',editImage9Input.files[0]);
        }

        data.append('id',EDIT_ID);
        data.append('name',editNameInput.value.trim());
        data.append('location',editLocationSelect.value.trim());
        data.append('status',editStatusSelect.value.trim());
        data.append('brand',editBrandSelect.value.trim());
        data.append('model',editModelSelect.value.trim());
        data.append('recent',editRecentSelect.value.trim());
        data.append('description',editDescriptionInput.value.trim());
        data.append('kilometers',editKilometersInput.value.trim());
        data.append('power',editPowerInput.value.trim());
        data.append('engine_displacement',editEngineDisplacementInput.value.trim());
        data.append('transmission',editTransmissionSelect.value.trim());
        data.append('transmission_number',editTransmissionNumberInput.value.trim());
        data.append('motor_type',editMotorTypeSelect.value.trim());
        data.append('manufacture_year',editManufactureYearInput.value.trim());
        data.append('category_id',editCategorySelect.value.trim());
        data.append('price',editPriceInput.value.trim());
        data.append('image',editImageInput.files[0]);
        data.append('data_type','edit_post');

        sendDataFiles(data);
        
    }

    function sendDataFiles(formdata={}){
        
        let ajax = new XMLHttpRequest();

        ajax.addEventListener("readystatechange",function(){

            if (ajax.readyState == 4 && ajax.status == 200 ) {
                handleResult(ajax.responseText);
            }
        });

        //this "true" says that the page is not freese, ie that this job is done in the background
        ajax.open("POST","<?=ROOT?>ajax_user_posts",true);
        ajax.send(formdata);
        
    }

    function handleResult(result){

        if (result != "") {

            let obj = JSON.parse(result);
            
            if (typeof obj.data_type != 'undefined') {

                let tableBody = document.querySelector("#table_body");

                if (obj.data_type == "add_new") {
                    if (obj.message_type == "info") {

                        swal({
                            title: "Uspješno ste dodali oglas",
                            icon: "success",
                        });
                        showAddNew();
                        tableBody.innerHTML = obj.data;

                    }else{
                        alert(obj.message);
                    }
                } else if (obj.data_type == "edit_post") {

                    swal({
                        title: "Uspješno ste uredili oglas",
                        icon: "success",
                    });

                    showEditPost(0,'',false);
                    tableBody.innerHTML = obj.data;

                } else if (obj.data_type == "delete_row") {

                    swal({
                        title: "Uspješno ste obrisali oglas",
                        icon: "success",
                    });

                    tableBody.innerHTML = obj.data;


                } 
            }
        }   
    }

    function displayImage(file,name,element){
        let index = 0;
        if (name == "image2") {
            index = 1;
        }
        if (name == "image3") {
            index = 2;
        }
        if(name == "image4"){
            index = 3;
        }
        if(name == "image5"){
            index = 4;
        }
        if(name == "image6"){
            index = 5;
        }
        if(name == "image7"){
            index = 6;
        }
        if(name == "image8"){
            index = 7;
        }
        if(name == "image9"){
            index = 8;
        }
        if(name == "image10"){
            index = 9;
        }

        let image_holder = document.querySelector("." + element);

        let images = image_holder.querySelectorAll("IMG");

        images[index].src = URL.createObjectURL(file);
        
    }

    function deleteRow(id){

        swal({
            title: "Dali ste sigurni da želite obrisati ovaj oglas?",
            text: "Jedanput kada obrišete oglas više ga ne možete vratiti",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {

                    //create a form
                    let data = new FormData();

                    data.append('data_type',"delete_row");
                    data.append('id',id);

                    sendDataFiles(data);

                } else {
                    return;
                }

            }
        );

    }

</script>
<?php $this->view("inc/footer",$data); ?>