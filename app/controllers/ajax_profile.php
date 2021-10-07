<?php

Class Ajax_profile extends Controller {

    public function index() {

        $data = (object)$_POST;

        if (is_object($data) && isset($data->data_type)) {

            $DB = \app\models\Database::newInstance();
            $post = new app\models\Post();
            $category = new app\models\Category();
            $image_class = new app\models\Image();

            $user = new app\models\User();

            if ($data->data_type == 'edit_user') {

                $user->edit_user($data,$_FILES,$image_class);
                
                $arr['message'] = "Your row was successfully edited";
                $_SESSION['error'] = "";
                $arr['message_type'] = "info";

                $user_data = $user->get_user();
                $arr['data'] = $user->make_profile_cart($user_data);

                $arr['data_type'] = "edit_user";

                echo json_encode($arr);

            }
        }
    }
}
