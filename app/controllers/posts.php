<?php

Class Posts extends Controller
{
    public function index($slag)
    {
        
        $slag = ucfirst(esc($slag));

        $data['page_title'] = "Posts";

        $User = new app\models\User();

        $Category = new app\models\Category();

        $one_category = $Category->get_one_by_category($slag);

        $category_data = $Category->get_all_disabled();

        $post_class = new app\models\Post();

        $posts = $post_class->getPosts($one_category);

        $data['posts'] = $posts;
        $data['category'] = $slag;
        
        $this->view("posts",$data);
    }

}
