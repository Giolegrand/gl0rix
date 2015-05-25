<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dashboard
 *
 * @author Giovanni
 */
class Dashboard extends MY_Admin_Controller {
    
    function index(){
        $this->load->view('admin/dashboard');
    }
}
