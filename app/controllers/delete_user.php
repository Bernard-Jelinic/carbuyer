<?php

Class Delete_user extends Controller {
    
    public function index() {

        $user = new app\models\User();
        $user->delete_user($_SESSION['user_data']->id);
        $user->logout();

    }

}
