<?php $this->view("inc/header",$data); ?>

<!-- start: account-page -->

<div class="account-page">
    <div class="container">
        <div class="form-container">
            <div class="form-btn">
                <span class="login">Prijava</span>
                <hr id="indicator">
            </div>
            
            <p><?php check_error() ?></p>

            <form id="loginForm" method="post">
                
                <input type="email" value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>" name="email" placeholder="Vaša Email adresa" autocomplete="on">
                
                <div class="loginPassEye">
                    <input type="password" value="<?= isset($_POST['password']) ? $_POST['password'] : ''; ?>" id="loginPassword" placeholder="Lozinka" name="password" autocomplete="on">
                    
                    <span class="loginEye">
                        <i class="fa fa-eye-slash"></i>
                    </span>

                </div>

                <div>
                    <button type="submit" class="rounded" autocomplete="off">Prijava</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- end: account-page -->

<?php $this->view("inc/footer",$data); ?>

