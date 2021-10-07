<?php

namespace app\models;

Class User {
    
    private $error = "";

    public function signup($POST) {

        $data = array();
        $db = \app\models\Database::newInstance();
        $data['name'] = trim($POST['name']);
        $data['email'] = trim($POST['email']);
        $data['password'] = trim($POST['password']);
        $password2 = trim($POST['password2']);

        if (empty($data['email']) || !preg_match("/^[a-zA-Z_-]+@[a-zA-Z]+.[a-zA-Z]+$/", $data['email'])) {

            if (!empty($this->error)) {

                $this->error .= ".";
            }
            $this->error .= "Unijeli ste netočnu lozinku";
        }

        if (empty($data['name'])) {

            $this->error .= "Unijeli ste netočno korisničko ime";

        } elseif (!preg_match("/^[a-zA-Z]+$/", $data['name'])) {

            if (!empty($this->error)) {

                $this->error .= ".";
            }
            $this->error .= "Korisničko ime ne smije sadržavati razmak";
        }

        if ($data['password'] !== $password2) {

            if (!empty($this->error)) {

                $this->error .= ".";
            }
            $this->error .= "Lozinka se ne podudara";
        }

        if (strlen($data['password']) < 4 ) {

            if (!empty($this->error)) {

                $this->error .= ".";
            }
            $this->error .= "Lozinka mora sadržavati minimalno 4 znaka";
        }

        //check if email already exists
        $sql = "select * from users where email = :email limit 1";
        $arr['email'] = $data['email'];
        $check = $db->read($sql, $arr);
        if (is_array($check)) {

            if (!empty($this->error)) {

                $this->error .= ".";
            }
            $this->error .= "Taj email se već koristi";
        }

        $data['url_address'] = $this->get_random_string_max(60);
        //check for url_adress
        $arr = false;
        $sql = "select * from users where url_address = :url_address limit 1";
        $arr['url_address'] = $data['url_address'];
        $check = $db->read($sql, $arr);

        if (is_array($check)) {

            $data['url_address'] = $this->get_random_string_max(60);

        }

        if ($this->error == "") {

            //save
            $data['rank'] = "customer";
            $data['date'] = date("Y-m-d H:i:s");
            $data['password'] = hash('sha1',$data['password']);

            //u VALUES su prepared statements
            $query = "INSERT INTO USERS (url_address,name,email,password,rank,date) VALUES (:url_address,:name,:email,:password,:rank,:date)";
            $result = $db->write($query, $data);
            
            if ($result) {

                header("Location: ". ROOT . "login");
                die();

            }

        }

        $_SESSION['error'] = $this->error;
        
    }

    public function login($POST) {

        $data = array();
        $db = \app\models\Database::newInstance();

        $data['email'] = trim($POST['email']);
        $data['password'] = trim($POST['password']);

        if (empty($data['email']) || !preg_match("/^[a-zA-Z_-]+@[a-zA-Z]+.[a-zA-Z]+$/", $data['email'])) {

            $this->error .= "Molim unesite ispravan email <br>";

        }

        if (strlen($data['password']) < 4 ) {

            $this->error .= "Molim unesite ispravnu lozinku <b>";

        }

        if ($this->error == "") {

            //confirm
            $data['password'] = hash('sha1',$data['password']);

            //check if email already exists
            $sql = "select id, url_address, name, rank from users where email = :email && password = :password limit 1";
            $result = $db->read($sql, $data);
            if (is_array($result)) {

                $_SESSION['user_data'] = $result[0];
                header("Location: ". ROOT . "home");
                die();

            }

            $this->error .= "Pogrešan email ili lozinka <b>";

        }

        $_SESSION['error'] = $this->error;

    }

    public function get_advertiser($user_id) {

        $data = array();
        $data['user_id'] = $user_id;
        $db = \app\models\Database::newInstance();
        $sql = "select * from users where id = :user_id limit 1";
        $result = $db->read($sql, $data);
        return $result;

    }

    public function get_user() {

        $data = array();
        $data['url_address'] = $_SESSION['user_data']->url_address;
        $data['rank'] = $_SESSION['user_data']->rank;
        $db = \app\models\Database::newInstance();
        $sql = "select * from users where url_address = :url_address && rank = :rank limit 1";
        $result = $db->read($sql, $data);
        return $result[0];

    }

    private function get_random_string_max($length) {

        $array = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
        $text = "";

        $length = rand(4,$length);

        for($i=0; $i<$length; $i++){

            $random = rand(0,61);

            $text .=$array[$random];

        }

        return $text;
    }

    public function edit_user($data,$FILES,$image_class = null) {

        $arr = array();
        $db = \app\models\Database::newInstance();
        $arr['name'] = trim($data->name);
        $arr['last_name'] = trim($data->last_name);
        $arr['telephone'] = trim($data->telephone);
        $arr['email'] = trim($data->email);
        $arr['url_address'] = $_SESSION['user_data']->url_address;
        //$arr['password'] = trim($data->password);
        $password2 = trim($data->password2);
        $image_string = "";
        $password_string = "";

        if (empty($arr['email'])) {

            if (!empty($this->error)) {

                $this->error .= ".";
            }
            $this->error .= "Email ne smije biti nedefiniran";
        }

        if (empty($arr['name'])) {

            $this->error .= "Niste unijeli korisničko ime";

        } elseif (!preg_match("/^[a-zA-Z]+$/", $arr['name'])) {

            if (!empty($this->error)) {

                $this->error .= ".";
            }
            $this->error .= "Korisničko ime ne smije sadržavati razmak";
        }

        
        $allowed[] = "image/jpeg";
        $allowed[] = "image/png";
        $size = 10;
        $size = ($size * 1024 * 1024);
        $folder = "users/";

        if (!file_exists($folder)) {

            mkdir($folder,0777,true);
        }

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
                        $arr["image"] = $destination;
                        $image_string = 'image = :image,';

                        $image_class->resize_image($destination,$destination,1500,1500);

                    } else {
                        $_SESSION["error"] .= "Picture is bigger than required size<br>";
                   }
                }
            }

        } else {
            
            //echo("Gd not installed");
            die();

        }

        if (!empty(trim($data->password)) && !empty($password2)) {


            if (trim($data->password) !== $password2) {

                if (!empty($this->error)) {

                    $this->error .= ".";
                }
                $this->error .= "Lozinka se ne podudara";
            }

            if (strlen(trim($data->password)) < 4 ) {

                if (!empty($this->error)) {

                    $this->error .= ".";
                }
    
                $this->error .= "Lozinka mora sadržavati minimalno 4 znaka";
    
            }
            
            //save password
            $arr['password'] = hash('sha1',trim($data->password));

            $arr['password'] = trim($arr['password']);

            $password_string = 'password = :password,';


        }

        $query = "UPDATE users SET 
        $image_string
        name = :name,
        $password_string 
        last_name = :last_name, 
        telephone = :telephone,
        email = :email WHERE url_address = :url_address LIMIT 1";

        //check if email already exists
        $sql = "select * from users where email = '{$arr['email']}' limit 1";
        $check = $db->read($sql);
        $image_to_remove = $check[0]->image;

        if (is_array($check) && $_SESSION['user_data']->url_address !== $check[0]->url_address) {

            if (!empty($this->error)) {

                $this->error .= ".";
            }

            $this->error .= "Taj email se već koristi";
        }

        if ($this->error == "") {

            $result = $db->write($query, $arr);
            
            if ($result) {

                $_SESSION['user_data']->name = $arr['name'];

                if (file_exists(PUBLIC_DIR . $image_to_remove)  && $image_to_remove !== "" && isset($arr["image"])) {

                    unlink(PUBLIC_DIR .$image_to_remove);
                }

            }
        }

        $_SESSION['error'] = $this->error;
        
    }

    public function delete_user($id) {

        $DB = \app\models\Database::newInstance();
        $id = (int)$id;
        $query = "delete from users where id = '$id' limit 1";
        $DB->write($query);

    }

    public function logout() {

        if (isset($_SESSION['user_data'])) {

            unset($_SESSION['user_data']);
        }

        header("Location: ". ROOT . "home");
        die();

    }

    public function count_users() {

        $db = \app\models\Database::newInstance();
        $sql = "SELECT COUNT(*) AS count_users FROM users";
        $result = $db->read($sql);
        return $result[0];
    }

    public function count_posts() {

        $db = \app\models\Database::newInstance();
        $sql = "SELECT COUNT(*) AS count_posts FROM posts";
        $result = $db->read($sql);
        return $result[0];
    }

    public function make_profile_cart($user_data) {

        $user_img = "";
        $last_name = "";
        $telephone = "";
        $email = "";
        $delete_user_string = '\'' . ROOT . 'delete_user' . '\'';

        if ($user_data->image != "") {

            $user_img = '<img src="'. ROOT . $user_data->image . '" alt="Slika korisnika" width="80">';

        } else {

            $user_img = '<img src="' . ROOT . 'users/default.jpg" alt="Slika korisnika" />';

        }

        if (isset($_POST['last_name'])) {

            $last_name = $_POST['last_name'];

        } else {

            $last_name = $user_data->last_name;

        }

        if (isset($_POST['telephone'])) {

            $telephone = $_POST['telephone'];

        } else {

            $telephone = $user_data->telephone;

        }

        if (isset($_POST['email'])) {

            $email = $_POST['email'];

        } else {

            $email = $user_data->email;

        }

        $result = "";

        if (is_object($user_data)) {

            $result = '
                <div class="form-btn">
                    <span class="signUp">Moj profil</span>
                    <hr id="indicator">
                </div>

                <div class="js-post-images-add">'
                    . $user_img .
                '</div>

                <div class="section-box">
                    <div>Promijeni sliku profila:</div>
                    <input id="image" name="image" type="file" onchange="displayImage(this.files[0],this.name,\'js-post-images-add\')">
                </div>

                <form id="signUpForm" method="post">

                    <input name="name" id="name" value="' . $user_data->name . '" type="text" placeholder="Ime" autocomplete="on">
                    <input name="last_name" id="last_name" value="' . $last_name . '" type="text" placeholder="Prezime" autocomplete="on">
                    <input name="telephone" id="telephone" value="' . $telephone . '" type="text" placeholder="Broj telefona" autocomplete="on">
                    <input name="email" id="email" value="' . $email .'" type="email" placeholder="Email adresa" autocomplete="on">

                    <div class="signUpPassEye">
                        <input id="signUpPassword" name="password" type="password" placeholder="Upišite novu lozinku"/>

                        <span class="signUpEye">
                            <i class="fa fa-eye-slash"></i>
                        </span>
                    </div>

                    <div class="signUpPassEye">
                        <input id="signUpPassword2" name="password2" type="password" placeholder="Ponovno upišite novu lozinku"/>

                        <span class="signUpEye2">
                            <i class="fa fa-eye-slash"></i>
                        </span>		
                    </div>

                    <div>
                        <button type="button" name="delete" class="rounded-delete" onclick="deleteUser(' . $delete_user_string . ')">Izbriši profil</button>
                    </div>

                    <button type="button" name="save" class="rounded" onclick="collectData()">Spremi promjene</button>

                </form>';

        }

        return $result;

    } 
}