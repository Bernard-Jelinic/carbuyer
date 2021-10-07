<!-- start: account-page -->

<div class="account-page">
    <div class="container">
		<div class="user-data form-container">

			<?= $user_profile_cart; ?>

		</div>
    </div>
</div>

<script type="text/javascript">

function collectData(){

	let nameInput = document.querySelector("#name");
	let lastNameInput = document.querySelector("#last_name");
	let telephoneInput = document.querySelector("#telephone");
	let emailInput = document.querySelector("#email");
	let passwordInput = document.querySelector("#signUpPassword");
	let password2Input = document.querySelector("#signUpPassword2");
	let imageInput = document.querySelector("#image");

	//create a form
	let data = new FormData();

	if (nameInput.value.trim() == "" || !isNaN(nameInput.value.trim())) {

		swal({
			title: "Neispravan unos",
			text: "Molim unesite ispravno ime",
			icon: "warning",
		});
		return;

	}

	if (passwordInput.value.trim() !== "" && password2Input.value.trim() !== "") {

		if (passwordInput.value.trim() !== password2Input.value.trim() ) {

			swal({
                title: "Neispravan unos",
                text: "Niste unijeli ispravnu lozinku",
                icon: "warning",
            });
			return;

		} else if (passwordInput.value.trim() == password2Input.value.trim() ) {

		data.append('password',passwordInput.value.trim());
		data.append('password2',password2Input.value.trim());

		}

	}

	data.append('name',nameInput.value.trim());
	data.append('last_name',lastNameInput.value.trim());
	data.append('telephone',telephoneInput.value.trim());
	data.append('email',emailInput.value.trim());

	data.append('password',passwordInput.value.trim());
	data.append('password2',password2Input.value.trim());

	data.append('image',imageInput.files[0]);
	data.append('data_type','edit_user');

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
        ajax.open("POST","<?=ROOT?>ajax_profile",true);
        ajax.send(formdata);
        
    }

function displayImage(file,name,element){

	let index = 0;

	let image_holder = document.querySelector("." + element);

	let images = image_holder.querySelectorAll("IMG");

	images[index].src = URL.createObjectURL(file);
        
}

function handleResult(result){

	if (result != "") {

		let obj = JSON.parse(result);
		
		if (typeof obj.data_type != 'undefined') {

			let userData = document.querySelector(".user-data");

			if (obj.data_type=="edit_user") {

				swal({
					title: "Uspješno ste uredili svoj profil",
					icon: "success",
				});

				userData.innerHTML = obj.data;

			}
		}
	}   
}

function deleteUser(path){

        swal({
            title: "Dali ste sigurni da želite obrisati svoj profil?",
            text: "Jedanput kada obrišete profil više ga ne možete vratiti",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {

					location.href = path;

                } else {
                    return;
                }

            }
        );
		
}

</script>

<!-- end: account-page -->