<?php

Class Login extends Controller {

    public function index() {

        $data['page_title'] = "Login";

        if (isset($_SESSION['user_data'])) {
            header("Location: ". ROOT . "home");
            die();
        }

        $Category = new app\models\Category();
        $category_data = $Category->get_all_disabled();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $user = new app\models\User();
            $user->login($_POST);

        }

        $this->view("login",$data);
    }

}
