<?php

Class Logout extends Controller {
    
    public function index() {

        $User = new app\models\User();
        $User->logout();

    }

}
