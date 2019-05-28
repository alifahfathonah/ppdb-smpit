<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_calon_siswa extends CI_Model{

    function __construct()

    {

        parent::__construct();

    }



    public function md_noreg_max(){

        $data = $this->db->query('select MAX(no_registrasi) as noreg_max from calon_siswa');

        return $data->result_array();

    }



    public function md_cek_siswa($username="",$password=""){

    	$data = $this->db->get_where('calon_siswa', array('no_registrasi' => $username, 'tanggal_lahir' => $password));

    	return $data->result_array();

    }



    public function md_data_siswa($no_reg=""){

    	$data = $this->db->query("select * from calon_siswa where no_registrasi = '".$no_reg."'");

    	return $data->result_array();

    }



    public function md_jadwal(){

        $data = $this->db->query("select * from jadwal_ujian");

        return $data->result_array();

    }	

}