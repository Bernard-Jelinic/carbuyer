<?php

Class Controller {

    public function __construct() {

        include '../app/autoload.php';
        
    }

    public function view($path,$data = []) {

        
        // because of this I no longer have to write $data['page_title'] but only $page_title
        extract($data);

        if(file_exists("../app/views/" . THEME . $path . ".php")){
            include "../app/views/" . THEME . $path . ".php";
        }

    }

}