<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Main
 *
 * @author Giovanni
 */
class Main extends MY_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Main_model');
    }
    public function index(){
        $config = Array();
        $config['base_url'] = base_url();
        $config['total_rows'] = $this->Main_model->record_count();
        $config['per_page'] = 10;
        $config['uri_segment'] = 5;
        
        $this->pagination->initialize($config);
        
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        
        $data['results'] = $this->Main_model->getContent($config["per_page"], $page);
        $data['links'] = $this->pagination->create_links();
        
        $this->load->view('main',$data);
    }
    
    public function test(){
        $this->load->view('testPage');
    }
}
