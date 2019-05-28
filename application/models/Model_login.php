<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_login extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function cek_user($username="",$password=""){
        $query = $this->db->query('Select * from user where username ="'.$username.'" AND password ="'.$password.'"');
        return $query->result_array();
    }
}