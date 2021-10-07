<?php

Class Home extends Controller {
    
    public function index() {

        $data['page_title'] = "Home";

        $Category = new app\models\Category();
        $category_data = $Category->get_all_disabled();

        $post_class = new app\models\Post();
        $recent = $post_class->getRecent();

        $data['POSTS'] = $recent;

        $this->view("index",$data);

    }

}
