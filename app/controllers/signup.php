<?php

Class Signup extends Controller
{

    public function index()
    {

        $data['page_title'] = "Signup";

        $Category = new app\models\Category();
        $category_data = $Category->get_all_disabled();

        if ($_SERVER['REQUEST_METHOD']=="POST")
        {
            $user = new app\models\User();
            $user->signup($_POST);
        }

        $this->view("signup",$data);
    }

}
