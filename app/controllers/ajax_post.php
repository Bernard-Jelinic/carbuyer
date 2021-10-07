<?php

Class Ajax_post extends Controller {

    public function index() {

        $data = (object)$_POST;

        if (is_object($data) && isset($data->data_type)) {

            $DB = \app\models\Database::newInstance();
            $post = new app\models\Post();
            $category = new app\models\Category();
            $image_class = new app\models\Image();

            if ($data->data_type == 'add_post') {
                //add new post
                $check = $post->create($data,$_FILES,$image_class);

                if ($_SESSION["error"] != "") {
                    
                    $arr["message"] = $_SESSION["error"];
                    $_SESSION["error"] = "";
                    $arr["message_type"] = "error";
                    $arr["data"] = "";
                    $arr["data_type"] = "add_new";

                    echo json_encode($arr);
                    die();

                } else {

                    $arr['message'] = "Post added succesfully!";
                    $_SESSION['error'] = "";
                    $arr["message_type"] = "info";

                    $cats = $post->get_all();
                    $arr['data'] = $post->make_table($cats,$category);

                    $arr['data_type'] = "add_new";

                    echo json_encode($arr);

                }
            }else if ($data->data_type == 'edit_post') {

                $post->edit($data,$_FILES,$image_class);
                
                $arr['message'] = "Your row was successfully edited";
                $_SESSION['error'] = "";
                $arr['message_type'] = "info";
                
                $cats = $post->get_all();
                $arr['data'] = $post->make_table($cats, $category);

                $arr['data_type'] = "edit_post";

                echo json_encode($arr);

            }else if ($data->data_type == 'delete_row') {

                $post->delete($data->id);

                $arr['message'] = "Your row was successfully deleted";
                $_SESSION['error'] = "";
                $arr['message_type'] = "info";
                
                $cats = $post->get_all();
                $arr['data'] = $post->make_table($cats, $category);

                $arr['data_type'] = "delete_row";

                echo json_encode($arr);

            }
        }
    }
}
