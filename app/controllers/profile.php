<?php

Class Profile extends Controller {

    public function index() {

        $data['page_title'] = "Profile";

        if (!isset($_SESSION['user_data'])) {

            header("Location: ". ROOT . "login");
            die();

        }

        $user = new app\models\User();
        $user_data = $user->get_user();

        $user_profile_cart = $user->make_profile_cart($user_data);

        $data['user_profile_cart'] = $user_profile_cart;

        $this->view("profile",$data);
    }

    public function user_posts() {

        $data['page_title'] = "User posts";

        if (!isset($_SESSION['user_data'])) {

            header("Location: ". ROOT . "login");
            die();

        }

        $post = new app\models\Post();
        $category = new app\models\Category();
        $DB = \app\models\Database::newInstance();

        $posts = $post->get_all_user_posts($_SESSION['user_data']->id);
        $tbl_rows = $post->make_table($posts,$category);
        $data['tbl_rows'] = $tbl_rows;

        $country = $DB->read("select * from country order by name");
        $data['country_data'] = $country;

        $categories_all = $category->get_all();
        $data['categories_all'] = $categories_all;

        $this->view("user_posts",$data);
        
    }

}
