<?php

Class Error_404 extends Controller {
    
    public function index() {

        $data['page_title'] = "404 Not Found";

        $this->view("Error_404",$data);

    }

}
