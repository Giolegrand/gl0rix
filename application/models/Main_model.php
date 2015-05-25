<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Main_model
 *
 * @author Giovanni
 */
class Main_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    
    public function record_count(){
        return $this->db->count_all('~content');
    }
    
    public function getContent($limit, $start){
        $this->db->limit($limit,$start);
        $query = $this->db->get('~content');
        
        if($query->num_rows() > 0){
            foreach($query->result() as $row){
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
}
