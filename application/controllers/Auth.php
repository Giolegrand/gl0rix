<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Auth_Controller
 *
 * @author Giovanni
 */
class Auth extends MY_AUTH_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function login() {
        $data = NULL;
        if ($this->input->post()) {
            $this->model->login($user);
            if ($user) {
                $this->session->set_userdata(Array('logged_in'=> true, "user"=>$user[0]));
                redirect('admin/dashboard');
            } else {
                $data['melding'] = "Ongeldige Login Gegevens!.";
            }
        }
        $this->load->view('login_form', $data);
    }

    public function logout(){
        $this->session->set_userdata(Array('logged_in'=>false, "user"=>Array()));
        redirect('Welcome/index');
    }
}
