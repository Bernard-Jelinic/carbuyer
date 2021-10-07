<?php

namespace app\models;

Class Post {

    public function getRecent() {

        $DB = \app\models\Database::newInstance();

        $POSTS = $DB->read("SELECT 
                                `image`, 
                                `name`, 
                                `kilometers`, 
                                `location`, 
                                `manufacture_year`, 
                                `price`, 
                                `slag` 
                            FROM 
                                `posts`
                             WHERE 
                                `recent` = 'da';");

        return $POSTS;

    }

    public function getPosts($category_id) {

        $DB = \app\models\Database::newInstance();

        $POSTS = $DB->read(
            "SELECT 
                    `image`, 
                    `name`, 
                    `kilometers`, 
                    `location`, 
                    `manufacture_year`, 
                    `price`, 
                    `slag` 
                FROM 
                    `posts`
                WHERE 
                    `category_id` = '$category_id';");

        return $POSTS;

    }

    public function create($data,$FILES,$image_class = null) {

        $_SESSION["error"] = "";
        $DB = \app\models\Database::newInstance();

        $arr['user_id']             = $_SESSION['user_data']->id;
        $arr['user_url']            = $_SESSION['user_data']->url_address;
        $arr['name']                = ucwords($data->name);
        $arr['location']            = ucwords($data->location);
        $arr['status']              = $data->status;
        $arr['brand']               = ucwords($data->brand);
        $arr['model']               = ucwords($data->model);
        $arr['recent']              = ucwords($data->recent);
        $arr['description']         = $data->description;
        $arr['kilometers']          = ucwords($data->kilometers);
        $arr['power']               = ucwords($data->power);
        $arr['engine_displacement'] = ucwords($data->engine_displacement);
        $arr['transmission']        = ucwords($data->transmission);
        $arr['transmission_number'] = ucwords($data->transmission_number);
        $arr['motor_type']          = ucwords($data->motor_type);
        $arr['manufacture_year']    = ucwords($data->manufacture_year);
        $arr['category_id']         = ucwords($data->category_id);
        $arr['price']               = ucwords($data->price);
        $arr['date']                = date("Y-m-d H:i:s");
        $arr['slag']                = $this->str_to_url($data->name);

        //make sure slag is unique
        $slag_arr['slag'] = $arr['slag'];
        $query = "select slag from posts where slag = :slag limit 1";
        $check = $DB->read($query,$slag_arr);

        if ($check) {

            $arr['slag'] .= "-" . rand(0,99999);
            
        }

        $arr['image'] = "";
        $arr['image2'] = "";
        $arr['image3'] = "";
        $arr['image4'] = "";
        $arr['image5'] = "";
        $arr['image6'] = "";
        $arr['image7'] = "";
        $arr['image8'] = "";
        $arr['image9'] = "";
        
        $allowed[] = "image/jpeg";
        $allowed[] = "image/png";
        $size = 10;
        $size = ($size * 1024 * 1024);
        $folder = "uploads/";

        if (!file_exists($folder)) {
            
            mkdir($folder,0777,true);
        }

        // if GD Library isn't installed php can't call function imagecreatefromjpeg()
        if (extension_loaded('gd') && function_exists('gd_info')) {
            //echo("Gd installed");

        	//check for files
            foreach ($FILES as $key => $img_row) {

                if ($img_row['error'] == 0 && in_array($img_row['type'], $allowed)) {

                    if ($img_row['size'] < $size) {

                        $path_info = pathinfo($img_row['name']);

                        if ($path_info['extension'] == 'jpeg' || $path_info['extension'] == 'jpg') {

                            $destination = $folder . $image_class->generate_filename(60) . ".jpg";

                        } elseif ($path_info['extension'] == 'png') {
                            
                            $destination = $folder . $image_class->generate_filename(60) . ".png";

                        }

                        move_uploaded_file($img_row['tmp_name'], $destination);
                        $arr[$key] = $destination;
                        
                        $image_class->resize_image($destination,$destination,1500,1500);

                    } else {

                        $_SESSION["error"] .= $key . "is bigger than required size<br>";
                    }
                }
            }            

        } else {

            //echo("Gd not installed");
            die();
        }

        if (!isset($_SESSION["error"]) || $_SESSION["error"] == "") {

            $query = "insert into posts 
            (name,location,status,brand,model,recent,description,user_id,user_url,kilometers,power,engine_displacement,transmission,transmission_number,motor_type,manufacture_year,category_id,price,date,image,image2,image3,image4,image5,
            image6,image7,image8,image9,slag) 
            values (:name,:location,:status,:brand,:model,:recent,:description,:user_id,:user_url,:kilometers,:power,:engine_displacement,:transmission,:transmission_number,:motor_type,:manufacture_year,:category_id,:price,:date,:image,:image2,:image3,:image4,:image5,:image6,:image7,:image8,:image9,:slag)";
            $check = $DB->write($query,$arr);

            if ($check) {
                return true;
            }
            
        }

        return false;

    }

    public function edit($data,$FILES,$image_class = null){

        $arr['id'] = $data->id;
        $arr['name'] = $data->name;
        $arr['location'] = $data->location;
        $arr['status'] = $data->status;
        $arr['brand'] = $data->brand;
        $arr['model'] = $data->model;
        $arr['recent'] = $data->recent;
        $arr['description'] = $data->description;
        $arr['kilometers'] = $data->kilometers;
        $arr['power'] = $data->power;
        $arr['engine_displacement'] = $data->engine_displacement;
        $arr['transmission'] = $data->transmission;
        $arr['transmission_number'] = $data->transmission_number;
        $arr['motor_type'] = $data->motor_type;
        $arr['manufacture_year'] = $data->manufacture_year;
        $arr['category_id'] = $data->category_id;
        $arr['price'] = $data->price;
        $arr['price'] = $data->price;
        $images_string = "";

        $allowed[] = "image/jpeg";
        $allowed[] = "image/png";
        $size = 10;
        $size = ($size * 1024 * 1024);
        $folder = "uploads/";

        if (!file_exists($folder)) {

            mkdir($folder,0777,true);
        }

        // if GD Library isn't installed php can't call function imagecreatefromjpeg()
        if (extension_loaded('gd') && function_exists('gd_info')) {

            //check for files
            foreach ($FILES as $key => $img_row) {

                if ($img_row['error'] == 0 && in_array($img_row['type'], $allowed)) {

                    if ($img_row['size'] < $size) {

                        $path_info = pathinfo($img_row['name']);

                        if ($path_info['extension'] == 'jpeg' || $path_info['extension'] == 'jpg') {

                            $destination = $folder . $image_class->generate_filename(60) . ".jpg";

                        } elseif ($path_info['extension'] == 'png') {
                            
                            $destination = $folder . $image_class->generate_filename(60) . ".png";

                        }
                        
                        move_uploaded_file($img_row['tmp_name'], $destination);
                        $arr[$key] = $destination;

                        $image_class->resize_image($destination,$destination,1500,1500);

                        $images_string .= "," . $key . " = :" . $key;
                    } else {

                        $_SESSION["error"] .= $key . "is bigger than required size<br>";
                    }
                }
            }

        } else {

            //echo("Gd not installed");
            die();
        }

        if (!isset($_SESSION["error"]) || $_SESSION["error"] == "") {

            $DB = \app\models\Database::newInstance();
            $query = "update posts set 
            name = :name, 
            location = :location, 
            status = :status, 
            brand = :brand, 
            model = :model, 
            recent = :recent, 
            description = :description, 
            kilometers = :kilometers, 
            power = :power, 
            engine_displacement = :engine_displacement,  
            transmission = :transmission, 
            transmission_number = :transmission_number, 
            motor_type = :motor_type, 
            manufacture_year = :manufacture_year, 
            category_id = :category_id, 
            price = :price $images_string where id = :id limit 1";

            $DB->write($query,$arr);
        }

    }

    public function delete($id) {

        $DB = \app\models\Database::newInstance();

        $arr = $this->get_images($id);

        foreach ($arr as $images) {
            foreach ($images as $image) {
                if (file_exists(PUBLIC_DIR . $image)  && $image !== "") {

                    unlink(PUBLIC_DIR .$image);
                }
            }
        }

        $id = (int)$id;
        $query = "delete from posts where id = '$id' limit 1";
        $DB->write($query);

    }
    
    public function get_images($id) {

        $DB = \app\models\Database::newInstance();

        $images = $DB->read(
            "SELECT 
                `image`,
                `image2`,
                `image3`,
                `image4`,
                `image5`,
                `image6`,
                `image7`,
                `image8`,
                `image9` 
            FROM 
                `posts`
            WHERE 
                `id` = '$id';");

        return $images;
        
    }

    public function get_all() {

        $DB = \app\models\Database::newInstance();
        return $DB->read("select * from posts order by id");
        
    }

    public function get_all_user_posts($id) {

        $DB = \app\models\Database::newInstance();
        return $DB->read("select * from posts where user_id = '$id' order by id");
        
    }

    public function make_table($cats,$model = null) {

        $result = "";
        if (is_array($cats)) {
            foreach ($cats as $cat_row) {
                
                $edit_args = $cat_row->id.",'".$cat_row->description."'";
                $info = array();
                $info['id'] = $cat_row->id;
                $info['name'] = $cat_row->name;
                $info['location'] = $cat_row->location;
                $info['status'] = $cat_row->status;
                $info['recent'] = $cat_row->recent;
                $info['description'] = $cat_row->description;
                $info['category_id'] = $cat_row->category_id;
                $info['price'] = $cat_row->price;
                $info['brand'] = $cat_row->brand;
                $info['model'] = $cat_row->model;
                $info['kilometers'] = $cat_row->kilometers;
                $info['power'] = $cat_row->power;
                $info['engine_displacement'] = $cat_row->engine_displacement;
                $info['transmission'] = $cat_row->transmission;
                $info['transmission_number'] = $cat_row->transmission_number;
                $info['motor_type'] = $cat_row->motor_type;
                $info['manufacture_year'] = $cat_row->manufacture_year;
                $info['image'] = $cat_row->image;
                $info['image2'] = $cat_row->image2;
                $info['image3'] = $cat_row->image3;
                $info['image4'] = $cat_row->image4;
                $info['image5'] = $cat_row->image5;
                $info['image6'] = $cat_row->image6;
                $info['image7'] = $cat_row->image7;
                $info['image8'] = $cat_row->image8;
                $info['image9'] = $cat_row->image9;

                $info = str_replace('"',"'",json_encode($info));

                $one_cat = $model->get_one($cat_row->category_id);
                $result .= "<tr>";

                    $result .= '
                    <td><a>' . $cat_row->id . '</a></td>
                    <td><a>' . $cat_row->name . '</a></td>
                    <td><a>' . $cat_row->kilometers . '</a></td>
                    <td><a>' . $one_cat->category . '</a></td>
                    <td><a>' . $cat_row->price . ' kn</a></td>
                    <td><a>' . date("d.m.Y. H:i",strtotime($cat_row->date)) . '</a></td>
                    <td><a><img src="'. ROOT . $cat_row->image. '" class="small-picture"/></a></td>
                    <td>
                        <button info="'.$info.'" onclick="showEditPost('.$edit_args.',event)" class="rounded btn-blue"><i class="fa fa-pencil"></i></button>
                        <button onclick="deleteRow('.$cat_row->id.')" class="rounded btn-delete"><i class="fa fa-trash-o "></i></button>
                    </td>
                    ';
                
                $result .= "</tr>";
            }
        }
    return $result;
    }

    public function str_to_url($url) {

        $url = preg_replace('~[^\\pL0-9_]+~u','-', $url);
        $url = trim($url, "-");
        $url = iconv("utf-8","us-ascii//TRANSLIT", $url);
        $url = strtolower($url);
        $url = preg_replace('~[^-a-z0-9_]+~', '', $url);
        return $url;

    }

}