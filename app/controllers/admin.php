<?php

Class Admin extends Controller {

    public function index() {

        //show($_SESSION['user_data']);

        if (!isset($_SESSION['user_data']) || $_SESSION['user_data']->rank == "customer") {

            header("Location: ". ROOT . "login");
            die();

        }

        $user = new app\models\User();
        $user_data = $user->get_user();

        $data['count_categories'] = count($_SESSION['category_data']);

        $data['count_users'] = $user->count_users();

        $data['count_posts'] = $user->count_posts();

        $data['page_title'] = "Admin";

        $this->view("admin/index",$data);

    }

    public function categories() {

        if (!isset($_SESSION['user_data']) || $_SESSION['user_data']->rank == "customer") {

            header("Location: ". ROOT . "login");
            die();
        }

        $category = new app\models\Category();

        $categories_all = $category->get_all();
        $tbl_rows = $category->make_table($categories_all);
        $data['tbl_rows'] = $tbl_rows;
        $data['categories_all'] = $categories_all;
        $data['page_title'] = "Categories";

        $this->view("admin/categories",$data);
    }

    public function posts() {

        if (!isset($_SESSION['user_data']) || $_SESSION['user_data']->rank == "customer") {
               
            header("Location: ". ROOT . "login");
            die();
        }

        $DB = \app\models\Database::newInstance();

        $post = new app\models\Post();
        $category = new app\models\Category();

        $posts = $post->get_all();
        $tbl_rows = $post->make_table($posts,$category);
        $data['tbl_rows'] = $tbl_rows;
        $data['page_title'] = "Posts";

        $country = $DB->read("select * from country order by name");

        $data['country_data'] = $country;

        $categories_all = $category->get_all();
        $data['categories_all'] = $categories_all;

        $this->view("admin/posts",$data);
    }

}
