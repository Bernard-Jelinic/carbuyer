<?php

Class post_details extends Controller
{
    public function index($slag)
    {

        $slag = esc($slag);

        $data['page_title'] = "Post Details";

        $User = new app\models\User();

        $Category = new app\models\Category();
        $category_data = $Category->get_all_disabled();

        $DB = \app\models\Database::newInstance();
        $post = $DB->read("select * from posts where slag = :slag",['slag'=>$slag]);

        $data['post'] = is_array($post) ? $post[0] : false;

        $advertiser_data = $User->get_advertiser($data['post']->user_id);

        $data['advertiser_data'] = $advertiser_data;
        $data['advertiser_data'] = is_array($advertiser_data) ? $advertiser_data[0] : false;

        //convert default format of the date into convenient format
        $data['post']->date = date( 'd.m.Y. H:i', strtotime($data['post']->date ));

        $post_class = new app\models\Post();

        $recent = $post_class->getRecent();

        $data['POSTS'] = $recent;

        
        $this->view("post_details",$data);
    }

}
