<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Model_admin extends CI_Model{



    function __construct(){



        parent::__construct();



    }

    function jadwal_tambah($data){

       $this->db->insert('jadwal_ujian', $data);

       return TRUE;

    }



    function user($num=NULL, $offset=NULL){

        $this->db->limit($num, $offset);

        $query = $this->db->get('user');

        return $query->result_array();

    }

    function user_tambah($data){

       $this->db->insert('user', $data);

       return TRUE;

    }

    function user_cari($cari, $num, $offset){

        $this->db->order_by('nama', 'ASC');

        $this->db->like('nama', $cari);

        $data = $this->db->get('user', $num, $offset);

        return $data->result_array();

    }



    function dokumen($num, $offset) {



        $data = $this->db->get('dokumen', $num, $offset);



        return $data->result_array();



    }



    function dokumen_ppdb() {



        $this->db->where('id',5);

        $data = $this->db->get('dokumen');



        return $data->result_array();



    }



    function dokumen_tambah($data){



       $this->db->insert('dokumen', $data);



       return TRUE;



    }



    function berita_pengumuman($status, $num, $offset) {



        if ($status!='semua') {



            $this->db->where('status',$status);



        }



        $data = $this->db->get('pengumuman_berita', $num, $offset);



        return $data->result_array();



    }



    function berita_pengumuman_ubah($id) {



        $this->db->where('id',$id);



        $data = $this->db->get('pengumuman_berita');



        return $data->result_array();



    }



    function get_insert_informasi($data){



       $this->db->insert('pengumuman_berita', $data);



       return TRUE;



    }



    function calon_siswa($status, $num, $offset) {



        if ($status!=0) {



            $this->db->where('status',$status);



        }



        $this->db->order_by('tanggal_registrasi', 'DESC');



        $data = $this->db->get('calon_siswa', $num, $offset);



        return $data->result_array();



    }



    function formulir_ppdb($status,$no_reg=""){

        if ($status!=0) {

            $this->db->where('no_registrasi',$no_reg);

        }

                

        $data = $this->db->get('calon_siswa');

        return $data->result_array();

    }



    function calon_siswa_tambah($data){



       $this->db->insert('calon_siswa', $data);



       return TRUE;



    }



    function calon_siswa_cari($cari, $status, $num, $offset){



        if ($status!=0) {



            $this->db->where('status',$status);



        }



        $this->db->like('no_registrasi', $cari);



        $this->db->or_like('nama', $cari);



        $this->db->order_by('tanggal_registrasi', 'DESC');



        $data = $this->db->get('calon_siswa', $num, $offset);



        return $data->result_array();



    }



    function cetak($status){



        if ($status!=0) {



            $this->db->where('status',$status);



        }



        $this->db->order_by('no_registrasi', 'DESC');



        $data = $this->db->get('calon_siswa');



        return $data->result_array();



    }



    function validasi_pembayaran($num, $offset) {



        $this->db->where('status','2');



        $this->db->order_by('tanggal_registrasi', 'DESC');



        $data = $this->db->get('calon_siswa', $num, $offset);



        return $data->result_array();



    }



    function validasi_pembayaran_cari($cari, $num, $offset){



        $this->db->where('status','2');



        $this->db->like('no_registrasi', $cari);



        $this->db->or_like('nama', $cari);



        $this->db->order_by('tanggal_registrasi', 'DESC');



        $data = $this->db->get('calon_siswa', $num, $offset);



        return $data->result_array();



    }



    function profil($num=NULL, $offset=NULL, $status){



        $this->db->where('status',$status);



        $this->db->limit($num, $offset);

        if ($status=='guru') {
            $this->db->order_by('tingkatan_guru','ASC');
        }

        $query = $this->db->get('profil');



        return $query->result_array();



    }



    function jadwal($num=NULL, $offset=NULL){

        $this->db->limit($num, $offset);



        $query = $this->db->get('jadwal_ujian');



        return $query->result_array();



    }



    function profil_tambah($data2){



       $this->db->insert('profil', $data2);



       return TRUE;



    }



    //----------------------------------------- Pengarutan Dokumentasi



    public function album($where = ""){



        $data = $this->db->query('select * from album '.$where);



        return $data->result_array();



    }



    public function album_page($where = ""){



        $data = $this->db->query('select * from album '.$where);



        return $data->result_array();



    }



    function album_buat($data){



       $this->db->insert('album', $data);



       return TRUE;



    }



    public function foto($where = ""){



        $data = $this->db->query('select album_foto.*, album.nama as nama_album from album_foto right join album on album_foto.id_album = album.id_album '.$where);



        return $data->result_array();



    }



    function foto_buat($data){



       $this->db->insert('album_foto', $data);



       return TRUE;



    }



    public function all_foto($where = ""){



        $data = $this->db->query('select album_foto.*, album.nama as nama_album from album_foto right join album on album_foto.id_album = album.id_album '.$where);



        return $data->num_rows();



    }



    function all_album() {



        $query = $this->db->get('album');



        return $query->num_rows();



    }



    function data_album($limit,$offset){



        $query = $this->db->query('select album.*, user_profil.nama as pengunggah from album left JOIN user_profil on album.id_user = user_profil.id_user limit '.$limit);



        return $query->result();



    }



    function data_foto($limit,$offset,$id=""){



        $query = $this->db->query('select album_foto.*, album.nama as nama_album, user_profil.nama as pengunggah from album_foto right join album on album_foto.id_album = album.id_album left JOIN user_profil on album_foto.id_user = user_profil.id_user '.$id.' limit '.$limit);



        return $query->result();



    }



}