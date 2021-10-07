<?php $this->view("inc/header",$data); ?>

<!-- start: account-page -->

<div class="account-page">
    <div class="container">
        <div class="row">
            <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span class="signUp">Registracija</span>
                            <hr id="indicator">
                        </div>
                        
                        <p><?php check_error() ?></p>

                        <form id="signUpForm" method="post">

                            <input name="name" value="<?= isset($_POST['name']) ? $_POST['name'] : ''; ?>" type="text" placeholder="Korisničko ime" autocomplete="on">
                            <input name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>" type="email" placeholder="Email adresa" autocomplete="on">

							<input id="signUpPassword" name="password" type="password" placeholder="Upišite lozinku"/>

                            <span class="signUpEye">
                                <i class="fa fa-eye-slash"></i>
                            </span>

                            <input id="signUpPassword2" name="password2" type="password" placeholder="Ponovno upišite lozinku"/>

                            <span class="signUpEye2">
                                <i class="fa fa-eye-slash"></i>
                            </span>

                            <div>
                                <button type="submit" class="rounded">Registracija</button>
                            </div>
                        </form>

                    </div>
            </div>
        </div>
    </div>
</div>

<!-- end: account-page -->

<?php $this->view("inc/footer",$data); ?>

