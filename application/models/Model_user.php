<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_user extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    //-------------------Manajemen Keuangan-------------------//
    function keuangan($user){
        $query = $this->db->query('SELECT *, pemasukan-pengeluaran as saldo FROM keuangan where username = "'.$user.'"');
        return $query->result_array();
    }
    function total_saldo($user){
        $query = $this->db->query('SELECT sum(pemasukan-pengeluaran) as total_saldo FROM `keuangan` where username = "'.$user.'"');
        return $query->result_array();
    }
    function tambah_keuangan($data){
       $this->db->insert('keuangan', $data);
       return TRUE;
    }
}