<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_Controller
 *
 * @author Giovanni
 */
class MY_Controller extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
}

class MY_AUTH_Controller extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('auth_model','model');
    }
}

class MY_Admin_Controller extends CI_Controller{
    public function __construct() {
        parent::__construct();
        
        if(!$this->session->userdata('logged_in')){
            redirect('auth/login');
        }
    }
}
