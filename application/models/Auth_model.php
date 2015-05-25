<?php

class Auth_model extends CI_Model {

    public function login(&$user) {

        $this->db->select('*');
        $this->db->from('~users');
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', sha1($this->input->post('password')));
        $this->db->limit(1);

        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $user = $query->result();
        } else {
            return false;
        }
    }

}
