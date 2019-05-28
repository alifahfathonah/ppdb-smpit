<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Model_home extends CI_Model{



    function __construct(){



        parent::__construct();



    }



    function berita($num, $offset){



        $this->db->where('status','berita');



        $this->db->where('status_aktif','1');



        $this->db->order_by('tanggal', 'DESC');



        $data = $this->db->get('pengumuman_berita', $num, $offset);



        return $data->result_array();



    }



    function slider($num, $offset){



        $this->db->where('status','1');



        $this->db->order_by('id_gambar', 'DESC');



        $data = $this->db->get('album_foto', $num, $offset);



        return $data->result_array();



    }



    function dokumen($num, $offset){



        $this->db->where('status','1');



        $this->db->order_by('tanggal', 'DESC');



        $data = $this->db->get('dokumen', $num, $offset);



        return $data->result_array();



    }



    function berita_detail($id){



        $this->db->where('status_aktif','1');



        $this->db->where('id',$id);



        $data = $this->db->get('pengumuman_berita');



        return $data->result_array();



    }



    function pengumuman($num, $offset){



        $this->db->where('status','pengumuman');



        $this->db->where('status_aktif','1');



        $this->db->order_by('tanggal', 'DESC');



        $data = $this->db->get('pengumuman_berita', $num, $offset);



        return $data->result_array();



    }



    function pengumuman_detail($id){



        $this->db->where('status','pengumuman');



        $this->db->where('status_aktif','1');



        $this->db->where('id',$id);



        $data = $this->db->get('pengumuman_berita');



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



    function all_album() {



        $query = $this->db->query('select * from album where status=1');



        return $query->num_rows();



    }



    function data_album($limit,$offset){



        $query = $this->db->query('select album.*, user_profil.nama as pengunggah from album left JOIN user_profil on album.id_user = user_profil.id_user where album.status=1 limit '.$limit);



        return $query->result();



    }



    function foto($where = ""){



        $data = $this->db->query('select album_foto.*, album.nama as nama_album from album_foto right join album on album_foto.id_album = album.id_album '.$where);



        return $data->result_array();



    }



    function all_foto($where = ""){



        $data = $this->db->query('select album_foto.*, album.nama as nama_album from album_foto right join album on album_foto.id_album = album.id_album '.$where);



        return $data->num_rows();



    }



    function data_foto($limit,$offset,$id=""){



        $query = $this->db->query('select album_foto.*, album.nama as nama_album, user_profil.nama as pengunggah from album_foto right join album on album_foto.id_album = album.id_album left JOIN user_profil on album_foto.id_user = user_profil.id_user '.$id.' and album_foto.status=1 limit '.$limit);



        return $query->result();



    }



}