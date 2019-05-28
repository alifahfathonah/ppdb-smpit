<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Admin extends CI_Controller {

    function __construct(){

        parent::__construct();

        $this->tipe_user = $this->session->userdata('tipe_user');

        $this->username = $this->session->userdata('username');

        $this->load->model('model_admin');

        if ($this->tipe_user != 1) {

            redirect('errors');

        }

    }

    function index(){

        $data=array('title' => 'Dashboard',

            'isi' => 'backend/dashboard',

        );

        $this->load->view('layout', $data);

    }

    //-------------------Pengaturan Pengumuman Berita----------------//

    public function informasi($status_info="semua", $id = NULL, $no = NULL){
        //pengaturan pagination
        
        $title = 'Semua Berita dan Pengumuman';
        if ($status_info != 'semua') {
            $title = ucwords($status_info);
            $this->db->where('status', $status_info);
            $jml = $this->db->get('pengumuman_berita');
        }else{
            $jml = $this->db->get('pengumuman_berita');
        }
        $config['base_url'] = base_url() . 'admin/informasi/'.$status_info;
        $config['total_rows'] = $jml->num_rows();
        $config['per_page'] = '10';
        $config['first_page'] = 'Awal';
        $config['last_page'] = 'Akhir';
        $config['next_page'] = '«';
        $config['prev_page'] = '»';

        //inisialisasi config
        $this->pagination->initialize($config);

        $data = array('title' => $title,
            'no'    => $no,
            'isi'   => 'backend/berita_pengumuman',
            'data'  => $this->model_admin->berita_pengumuman($status_info,$config['per_page'],$id),
            'halaman'   => $this->pagination->create_links(),
            'norut'     => $id,
        );
        $this->load->view('layout', $data);     
    }
    public function informasi_baru(){
        $data = array('title' => 'PPDB - Tambah Informasi',
            'judul'     => 'Tambah Informasi',
            'form'      => 'Admin/informasi_tambah',
            'kembali'   => 'admin/semua_informasi/semua',
            'isi'       => 'backend/berita_pengumuman_baru',
            'id'        => '',
            'judulnya'  => '',
            'tanggal'   => '',
            'isinya'    => '',
            'foto'      => '',
            'file'      => '',
            'status'    => '',
            'status_aktif' => '',
        );
        $this->load->view('layout',$data);
    }
    public function informasi_tambah(){
        $foto = '';
        $file = '';
        $nmfile = "pengumuman_".time();
        $this->load->helper(array('url','html','form'));
        // Upload foto
        if ($_FILES['foto']['name']) {
            $config['upload_path']      = realpath(APPPATH . '../assets/frontend/uploads/informasi_foto');
            $config['allowed_types']    = 'jpg||png||jpeg||bmp';
            //$config['max_size']         = '8000';        
            $config['file_name']        = $nmfile;
            $config['remove_spaces']    = TRUE;
            $this->load->library('upload', $config);
            $this->upload->do_upload('foto');
            $foto = $this->upload->file_name;
        } 
        else if(empty($_FILES['foto']['name'])){
        	$foto='';
        }
        if ($_FILES['file']['name']) {
            $config2['upload_path']     = realpath(APPPATH . '../assets/frontend/uploads/informasi_file');
            $config2['allowed_types']   = 'pdf||doc||docx';
            //$config2['max_size']        = '8000';
            $config2['file_name']       = $nmfile;
            $config2['remove_spaces']   = TRUE;
            $this->upload->initialize($config2);
            $this->upload->do_upload('file');
            $file = $this->upload->file_name;
        }
        else if(empty($_FILES['file']['name'])){
        	$file='';
        }       
        $data = array(
            'judul'     => $this->input->post('judul'),
            'isi'       => $this->input->post('isi'),
            'tanggal'   => date('Y-m-d'),
            'foto'      => $foto,
            'file'      => $file,
            'status'    => $this->input->post('status'),
            'status_aktif' => $this->input->post('status_aktif'),
        );
        $this->model_admin->get_insert_informasi($data);
        redirect('admin/informasi/'.$this->input->post('status'));
    }
    public function informasi_ubah($id = 0){    
        $data_informasi = $this->model_admin->berita_pengumuman_ubah($id);
        $data = array('title' => 'PPDB - Ubah Informasi',
            'judul'     => 'Ubah Informasi',
            'form'      => 'Admin/informasi_update',
            'kembali'   => 'admin/informasi/'.$data_informasi[0]['status'],
            'isi'       => 'backend/berita_pengumuman_baru',
            'id'        => $data_informasi[0]['id'],
            'judulnya'  => $data_informasi[0]['judul'],
            'tanggal'   => $data_informasi[0]['tanggal'],
            'isinya'    => $data_informasi[0]['isi'],
            'foto'      => $data_informasi[0]['foto'],
            'file'      => $data_informasi[0]['file'],
            'status'    => $data_informasi[0]['status'],
            'status_aktif' => $data_informasi[0]['status_aktif'],
        );
        $this->load->view('layout',$data);
    }
    public function informasi_update(){
        $foto = '';
        $file = '';
        $nmfile = "pengumuman_".time();
        $this->load->helper(array('url','html','form'));
        // Upload foto
        if ($_FILES['foto']['name']) {
            $config['upload_path']      = realpath(APPPATH . '../assets/frontend/uploads/informasi_foto');
            $config['allowed_types']    = 'jpg||png||jpeg||bmp';
            //$config['max_size']         = '8000';        
            $config['file_name']        = $nmfile;
            $config['remove_spaces']    = TRUE;
            $this->load->library('upload', $config);
            $this->upload->do_upload('foto');
            $foto = $this->upload->file_name;
        }
        if ($_FILES['file']['name']) {
            $config2['upload_path']     = realpath(APPPATH . '../assets/frontend/uploads/informasi_file');
            $config2['allowed_types']   = 'pdf||doc||docx';
            //$config2['max_size']        = '8000';
            $config2['file_name']       = $nmfile;
            $config2['remove_spaces']   = TRUE;
            $this->load->library('upload', $config2);
            $this->upload->do_upload('file');
            $file = $this->upload->file_name;
        }
        $where = 'id = '.$this->input->post('id');
        if ($_FILES['file']['name']) {
            $data = array(
                'judul'     => $this->input->post('judul'),
                'isi'       => $this->input->post('isi'),
                'tanggal'   => date('Y-m-d'),
                'file'      => $file,
                'status'    => $this->input->post('status'),
                'status_aktif' => $this->input->post('status_aktif'),
            );
        }
        if ($_FILES['foto']['name']) {
            $data = array(
                'judul'     => $this->input->post('judul'),
                'isi'       => $this->input->post('isi'),
                'tanggal'   => date('Y-m-d'),
                'foto'      => $foto,
                'status'    => $this->input->post('status'),
                'status_aktif' => $this->input->post('status_aktif'),
            );
        }if(empty($_FILES['foto']['name']) AND empty($_FILES['file']['name'])){
            $data = array(
                'judul'     => $this->input->post('judul'),
                'isi'       => $this->input->post('isi'),
                'tanggal'   => date('Y-m-d'),
                'status'    => $this->input->post('status'),
                'status_aktif' => $this->input->post('status_aktif'),
            );
        }
        $res = $this->db->update('pengumuman_berita', $data, $where);
        if($res>=1){
            $this->notifikasi('success','Data Berhasil Diubah !');
        }else{
            $this->notifikasi('danger','Data Tidak Berhasil Diubah !');
        }
        redirect('admin/informasi/'.$this->input->post('status'));
    }
    public function informasi_hapus($id){   
        $res = $this->db->delete('pengumuman_berita', array('id' => $id));
        if($res>=1){
            $this->notifikasi('danger','Data Berhasil Dihapus !');
        }else{
            $this->notifikasi('danger','Data Tidak Berhasil Dihapus !');
        }
        redirect('admin/informasi/semua');
    }
    /*------------------------------- Dokumen -------------------------------*/

    public function dokumen($id=NULL){

        $jml = $this->db->get('dokumen');



        //pengaturan pagination

        $config['base_url'] = base_url() . 'admin/dokumen';

        $config['total_rows'] = $jml->num_rows();

        $config['per_page'] = '10';

        $config['first_page'] = 'Awal';

        $config['last_page'] = 'Akhir';

        $config['next_page'] = '«';

        $config['prev_page'] = '»';



        //inisialisasi config

        $this->pagination->initialize($config);



        $data = array('title' => 'Data Dokumen - SMP IT Bengkulu',

            'halaman'   => $this->pagination->create_links(),

            'norut'     => $id,

            'data'      => $this->model_admin->dokumen($config['per_page'], $id),

            'isi'       => 'backend/dokumen'

        );

        $this->load->view('layout',$data);

    }

    public function dokumen_tambah(){

        $this->load->library('upload');

        $nmfile = "dokumen_".time(); //nama file saya beri nama langsung dan diikuti fungsi time

        $config['upload_path'] = './assets/frontend/uploads/dokumen'; //path folder

        $config['allowed_types'] = 'doc|docx|xls|xlsx|rtf|pdf|txt'; //type yang dapat diakses bisa anda sesuaikan

        $config['max_size'] = '2048'; //maksimum besar file 1M        

        $config['file_name'] = $nmfile; //nama yang terupload nantinya

 

        $this->upload->initialize($config);

         

        if($_FILES['file']['name']){

            if ($this->upload->do_upload('file')){

                $gbr = $this->upload->data();

                $data = array(

                    'nama'      => $this->input->post('nama'),

                    'status'    => $this->input->post('status'),

                    'tanggal'   => date('Y-m-d'),

                    'keterangan'=> $this->input->post('keterangan'),

                    'file'      => $gbr['file_name']

                );

                $this->model_admin->dokumen_tambah($data);               



                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Tambah Guru Berhasil !!</div></div>");

                redirect('admin/dokumen');

            }else{

                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal Tambah Guru !!</div></div>");

                redirect('admin/dokumen');

            }

        }else{

            $data = array(

                'nama'      => $this->input->post('nama'),

                'tanggal'   => date('Y-m-d'),

                'keterangan'=> $this->input->post('keterangan'),

                'status'    => $this->input->post('status'),

            );

            $this->model_admin->dokumen_tambah($data);     

            $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Tambah Guru Berhasil !!</div></div>");

            redirect('admin/dokumen');

        }

    }

    public function dokumen_ubah(){

        $this->load->library('upload');

        $nmfile = "dokumen_".time(); //nama file saya beri nama langsung dan diikuti fungsi time

        $config['upload_path'] = './assets/frontend/uploads/dokumen'; //path folder

        $config['allowed_types'] = 'doc|docx|xls|xlsx|rtf|pdf|txt'; //type yang dapat diakses bisa anda sesuaikan

        $config['max_size'] = '2048'; //maksimum besar file 1M

        $config['file_name'] = $nmfile; //nama yang terupload nantinya

 

        $this->upload->initialize($config);

         

        $id = $this->input->post('id');

        $where = 'id = '.$id;

        if($_FILES['file']['name'])

        {

            if ($this->upload->do_upload('file'))

            {

                $gbr = $this->upload->data();

                $data = array(

                    'nama'      => $this->input->post('nama'),

                    'tanggal'   => date('Y-m-d'),

                    'keterangan'=> $this->input->post('keterangan'),

                    'status'    => $this->input->post('status'),

                    'file'      => $gbr['file_name']

                );

                $res = $this->db->update('dokumen', $data, $where);

                if($res >= 1){

                    $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                    redirect('admin/dokumen');

                }

                else{

                    $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data Gagal diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                    redirect('admin/dokumen');

                }

            }else{

                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal Update Guru !!</div></div>");

                redirect('admin/dokumen');

            }

        }else{

            $data = array(                    

                'nama'      => $this->input->post('nama'),

                'tanggal'   => date('Y-m-d'),

                'keterangan'=> $this->input->post('keterangan'),

                'status'    => $this->input->post('status'),

            );

            $res = $this->db->update('dokumen', $data, $where);

            if($res >= 1){

                $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                redirect('admin/dokumen');

            }

            else{

                $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data Gagal diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                redirect('admin/dokumen');

            }

        }

    }

    public function dokumen_hapus($id){

        $this->db->where('id',$id);

        $query = $this->db->get('dokumen');

        $row = $query->row();

        unlink(realpath(APPPATH . '../assets/frontend/uploads/dokumen/'.$row->file));

        $res = $this->db->delete('dokumen', array('id' => $id));

        if($res>=1){

            $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/dokumen');

        }else{

            $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data gagal dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/dokumen');

        }

    }

    function dokumen_ppdb(){
        $data=array(
            'title'     => 'Dokumen PPDB',
            'data'      => $this->model_admin->dokumen_ppdb(),
            'isi'       => 'backend/dokumen_ppdb'
        );
        $this->load->view('layout', $data);
    }

    public function dokumen_ppdb_ubah(){
        $dok = $this->model_admin->dokumen_ppdb();
        if ($this->input->post('upload')) {
            /*upload dokumen_ppdb*/
            $config['upload_path']   = realpath(APPPATH . '../assets/frontend/uploads/dokumen_ppdb');
            $config['allowed_types'] = 'pdf||docx||zip||rar';
            $config['file_name']     = 'Dokumen_PPDB';
            $config['remove_spaces'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->do_upload('files');
            $file = $this->upload->file_name;
            if (empty($_FILES['files']['name'])) {
                $new_file = $dok[0]['file'];
            } else {
                unlink(realpath(APPPATH . '../assets/frontend/uploads/dokumen_ppdb/' . $dok[0]['file']));
                $new_file = $file;
            }
            /*end*/
        }
        $data  = array(
            'nama' => $this->input->post('nama'),
            'file' => $new_file
        );
        $where = "id = 5";
        $res   = $this->db->update('dokumen', $data, $where);
        if ($res >= 1) {
            $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diperbaharui <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/dokumen_ppdb');
        }
    }

    /*------------------------------- Pengaturan User -------------------------------*/
    function user($id=NULL){
        $jml = $this->db->get('user');
        //pengaturan pagination
        $config['base_url'] = base_url() . 'admin/user';
        $config['total_rows'] = $jml->num_rows();
        $config['per_page'] = '10';
        $config['first_page'] = 'Awal';
        $config['last_page'] = 'Akhir';
        $config['next_page'] = '«';
        $config['prev_page'] = '»';

        //inisialisasi config
        $this->pagination->initialize($config);
        $data=array('title' => 'Manajemen Pengguna',
            'halaman'   => $this->pagination->create_links(),
            'norut'     => $id,
            'data'      => $this->model_admin->user($config['per_page'], $id),
            'isi' => 'backend/user',
        );
        $this->load->view('layout', $data);
    }
    function user_cari($id = NULL){
        if (isset($_POST['submit'])) {
            $cari = $this->input->post('cari');
            $this->session->set_userdata('pencarian',$cari);
        }else{
            $cari = $this->session->userdata('pencarian');
        }
        $this->db->like('nama', $cari);
        $this->db->or_like('username', $cari);
        $jml = $this->db->get('user');

        //pengaturan pagination
        $config['base_url'] = base_url() . 'admin/user_cari';
        $config['total_rows'] = $jml->num_rows();
        $config['per_page'] = '10';
        $config['first_page'] = 'Awal';
        $config['last_page'] = 'Akhir';
        $config['next_page'] = '«';
        $config['prev_page'] = '»';
        //inisialisasi config
        $this->pagination->initialize($config);

        $data = array('title' => 'Manajemen User',
            'halaman'   => $this->pagination->create_links(),
            'norut'     => $id,
            'data'      => $this->model_admin->user_cari($cari, $config['per_page'], $id),
            'isi'       => 'backend/user'
        );
        $this->load->view('layout',$data);
    }
    function user_tambah(){
        $data = array(
            'nama'      => $this->input->post('nama'),
            'username'  => $this->input->post('username'),
            'tipe_user' => 1,
            'password'  => md5($this->input->post('password')),
            'status'    => $this->input->post('status')
        );
        $this->model_admin->user_tambah($data);
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/user');
    }
    function user_hapus($id){
            $res = $this->db->delete('user', array('id_user' => $id));
            if($res>=1){
                $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('admin/user');
            }else{
                $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data gagal dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('admin/user');
            }
    }
    function user_ubah(){
        $data = array(
            'nama'      => $this->input->post('nama'),
            'username'  => $this->input->post('username'),
            'tipe_user' => 1,
            'status'    => $this->input->post('status')
        );
        $where = 'id_user = '.$this->input->post('id');
        $res = $this->db->update('user', $data, $where);
        if($res >= 1){
            $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/user');
        }
        else{
            $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data Gagal diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/user');
        }
    }
    function password_ubah(){
        if ($this->input->post('password') == $this->input->post('password1')) {
            $data = array(
            'password'        => md5($this->input->post('password'))
            );
            $where = 'id_user = '.$this->input->post('id');
            $res = $this->db->update('user', $data, $where);
            if($res >= 1){
                $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('admin/user');
            }
            else{
                $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data Gagal diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('admin/user');
            }
        }else{
            $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Kesalahan dalam penulisan password <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('admin/user');
        }
    }    
    /*------------------------------- Pengaturan Profil-------------------------------*/
    function sekolah(){
        $data=array(
            'title'     => 'Manajemen Sekolah',
            'data'      => $this->model_admin->profil(null, null, 'sekolah'),
            'isi'       => 'backend/sekolah'
        );
        $this->load->view('layout', $data);
    }
    function kesiswaan(){
        $data=array(
            'title'     => 'Manajemen Kesiswaan',
            'data'      => $this->model_admin->profil(null, null, 'kesiswaan'),
            'isi'       => 'backend/sekolah'
        );
        $this->load->view('layout', $data);
    }
    function kurikulum(){
        $data=array(
            'title'     => 'Manajemen kurikulum',
            'data'      => $this->model_admin->profil(null, null, 'kurikulum'),
            'isi'       => 'backend/sekolah'
        );
        $this->load->view('layout', $data);
    }
    public function sarana($id=NULL){
        $this->db->where('status','sarana');
        $jml = $this->db->get('profil');

        //pengaturan pagination
        $config['base_url'] = base_url() . 'admin/alumni';
        $config['total_rows'] = $jml->num_rows();
        $config['per_page'] = '10';
        $config['first_page'] = 'Awal';
        $config['last_page'] = 'Akhir';
        $config['next_page'] = '«';
        $config['prev_page'] = '»';

        //inisialisasi config
        $this->pagination->initialize($config);

        $data = array('title' => 'Data Sarana Prasarana - SMP IT Bengkulu',
            'status'    => 'sarana',
            'halaman'   => $this->pagination->create_links(),
            'norut'     => $id,
            'data'      => $this->model_admin->profil($config['per_page'], $id, 'sarana'),
            'isi'       => 'backend/profil'
        );
        $this->load->view('layout',$data);
    }
    function sekolah_ubah(){
        $url=$_POST['url'];
        $this->load->library('upload');
        $nmfile = "sekolah_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/frontend/images/profil'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '1024'; //maksimum besar file 1M
        $config['max_width']  = '1288'; //lebar maksimum 1288 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);
         
        $id = $this->input->post('id');
        $where = 'id = '.$id;
        if($_FILES['files']['name'])
        {
            if ($this->upload->do_upload('files'))
            {
                $this->db->where('id',$id);
                $query = $this->db->get('profil');
                $row = $query->row();
                unlink(realpath(APPPATH . '../assets/frontend/images/profil/'.$row->foto));
                $gbr = $this->upload->data();
                $data = array(
                    'nama'      => $this->input->post('nama'),
                    'keterangan'=> $this->input->post('keterangan'),
                    'foto'      => $gbr['file_name']
                );
                $res = $this->db->update('profil', $data, $where);
                if($res >= 1){
                    $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    header("Refresh: 0; URL=$url");
                }else{
                    $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data Gagal diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    header("Refresh: 0; URL=$url");
                }
            }else{
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal Update Guru !!</div></div>");
                header("Refresh: 0; URL=$url");
            }
        }else{
            $data = array(                    
                'nama'      => $this->input->post('nama'),
                'keterangan'=> $this->input->post('keterangan'),
            );
            $res = $this->db->update('profil', $data, $where);
            if($res >= 1){
                $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                header("Refresh: 0; URL=$url");
            }
            else{
                $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data Gagal diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                header("Refresh: 0; URL=$url");
            }
        }
    }
    public function guru($id=NULL){

        $this->db->where('status','guru');

        $jml = $this->db->get('profil');



        //pengaturan pagination

        $config['base_url'] = base_url() . 'admin/guru';

        $config['total_rows'] = $jml->num_rows();

        $config['per_page'] = '10';

        $config['first_page'] = 'Awal';

        $config['last_page'] = 'Akhir';

        $config['next_page'] = '«';

        $config['prev_page'] = '»';



        //inisialisasi config

        $this->pagination->initialize($config);



	    $data = array('title' => 'Data Guru - SMP IT Bengkulu',

            'status'    => 'guru',

            'halaman'   => $this->pagination->create_links(),

            'norut'     => $id,

            'data'      => $this->model_admin->profil($config['per_page'], $id, 'guru'),

	        'isi'       => 'backend/profil'
	    );

	    $this->load->view('layout',$data);
    }

    public function alumni($id=NULL){

        $this->db->where('status','alumni');

        $jml = $this->db->get('profil');



        //pengaturan pagination

        $config['base_url'] = base_url() . 'admin/alumni';

        $config['total_rows'] = $jml->num_rows();

        $config['per_page'] = '10';

        $config['first_page'] = 'Awal';

        $config['last_page'] = 'Akhir';

        $config['next_page'] = '«';

        $config['prev_page'] = '»';



        //inisialisasi config

        $this->pagination->initialize($config);



        $data = array('title' => 'Data Alumni - SMP IT Bengkulu',

            'status'    => 'alumni',

            'halaman'   => $this->pagination->create_links(),

            'norut'     => $id,

            'data'      => $this->model_admin->profil($config['per_page'], $id, 'alumni'),

            'isi'       => 'backend/profil'

        );

        $this->load->view('layout',$data);

    }

    public function prestasi($id=NULL){

        $this->db->where('status','prestasi');

        $jml = $this->db->get('profil');



        //pengaturan pagination

        $config['base_url'] = base_url() . 'admin/prestasi';

        $config['total_rows'] = $jml->num_rows();

        $config['per_page'] = '10';

        $config['first_page'] = 'Awal';

        $config['last_page'] = 'Akhir';

        $config['next_page'] = '«';

        $config['prev_page'] = '»';



        //inisialisasi config

        $this->pagination->initialize($config);



        $data = array('title' => 'Data Prestasi - SMP IT Bengkulu',

            'status'    => 'prestasi',

            'halaman'   => $this->pagination->create_links(),

            'norut'     => $id,

            'data'      => $this->model_admin->profil($config['per_page'], $id, 'prestasi'),

            'isi'       => 'backend/profil'

        );

        $this->load->view('layout',$data);

    }

    public function profil_tambah(){

        $url=$_POST['url'];

        $this->load->library('upload');

        $nmfile = "ava_".time(); //nama file saya beri nama langsung dan diikuti fungsi time

        $config['upload_path'] = './assets/frontend/images/profil'; //path folder

        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan

        $config['max_size'] = '1024'; //maksimum besar file 1M        

        $config['file_name'] = $nmfile; //nama yang terupload nantinya

 

        $this->upload->initialize($config);

         

        if($_FILES['filefoto']['name']){

            if ($this->upload->do_upload('filefoto')){

                $gbr = $this->upload->data();

                $data = array(

                    'nama'      => $this->input->post('nama'),

                    'keterangan'=> $this->input->post('keterangan'),

                    'status'    => $this->input->post('status'),

                    'foto'      => $gbr['file_name'],

                    'tingkatan_guru' => $this->input->post('jabatan')

                );

                $this->model_admin->profil_tambah($data);               



                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Tambah Guru Berhasil !!</div></div>");

                header("Refresh: 0; URL=$url");

            }else{

                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal Tambah Guru !!</div></div>");

                header("Refresh: 0; URL=$url");

            }

        }else{

            $data = array(

                'nama'      => $this->input->post('nama'),

                'keterangan'=> $this->input->post('keterangan'),

            );

            $this->model_admin->profil_tambah($data);     

            $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Tambah Guru Berhasil !!</div></div>");

            header("Refresh: 0; URL=$url");

        }

    }

    public function profil_update(){
        $url=$_POST['url'];
        $this->load->library('upload');
        $nmfile = "ava_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/frontend/images/profil'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '1024'; //maksimum besar file 1M
        $config['max_width']  = '1288'; //lebar maksimum 1288 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);
         
        $id_guru = $this->input->post('id');
        $where = 'id = '.$id_guru;
        if($_FILES['filefoto']['name'])
        {
            if ($this->upload->do_upload('filefoto'))
            {
                $gbr = $this->upload->data();
                $data = array(
                    'nama'      => $this->input->post('nama'),
                    'keterangan'=> $this->input->post('keterangan'),
                    'foto'      => $gbr['file_name'],
                    'tingkatan_guru' => $this->input->post('jabatan')
                );
                $res = $this->db->update('profil', $data, $where);
                if($res >= 1){
                    $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    header("Refresh: 0; URL=$url");
                }else{
                    $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data Gagal diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    header("Refresh: 0; URL=$url");
                }
            }else{
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal Update Guru !!</div></div>");
                header("Refresh: 0; URL=$url");
            }
        }else{
            $data = array(                    
                'nama'      => $this->input->post('nama'),
                'keterangan'=> $this->input->post('keterangan'),
                'tingkatan_guru' => $this->input->post('jabatan')
            );
            $res = $this->db->update('profil', $data, $where);
            if($res >= 1){
                $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                header("Refresh: 0; URL=$url");
            }
            else{
                $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data Gagal diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                header("Refresh: 0; URL=$url");
            }
        }
    }

    public function profil_hapus($id){

        $this->db->where('id',$id);

        $query = $this->db->get('profil');

        $row = $query->row();

        $url=base_url().'admin/'.$row->status;

        unlink(realpath(APPPATH . '../assets/frontend/images/profil/'.$row->foto));

        $res = $this->db->delete('profil', array('id' => $id));

        if($res>=1){
 $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            header("Refresh: 0; URL=$url");

        }else{

            $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data gagal dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            header("Refresh: 0; URL=$url");

        }

    }

    public function jadwal($id=NULL){
        $jml = $this->db->get('jadwal_ujian');

        //pengaturan pagination
        $config['base_url'] = base_url() . 'admin/jadwal';
        $config['total_rows'] = $jml->num_rows();
        $config['per_page'] = '10';
        $config['first_page'] = 'Awal';
        $config['last_page'] = 'Akhir';
        $config['next_page'] = '«';
        $config['prev_page'] = '»';

        //inisialisasi config
        $this->pagination->initialize($config);
        $data = array('title' => 'Data Jadwal Ujian - SMP IT Bengkulu',
            'halaman'   => $this->pagination->create_links(),
            'norut'     => $id,
            'data'      => $this->model_admin->jadwal($config['per_page'], $id),
            'isi'       => 'backend/jadwal'
        );
        $this->load->view('layout',$data);
    }
    public function jadwal_ubah(){
        $data = array(
            'hari'           => $this->input->post('hari'),
            'tanggal'        => $this->input->post('tanggal'),
            'jenis_tes'      => $this->input->post('jenis_tes'),
            'waktu'          => $this->input->post('waktu')
        );
        $where = 'id = '.$_POST['id'];
        $res = $this->db->update('jadwal_ujian', $data, $where);
        if($res >= 1){
            $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/jadwal');
        }
        else{
            $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data Gagal diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/jadwal');
        }
    }
    function jadwal_tambah(){
        $data = array(
            'hari'           => $this->input->post('hari'),
            'tanggal'        => $this->input->post('tanggal'),
            'jenis_tes'      => $this->input->post('jenis_tes'),
            'waktu'          => $this->input->post('waktu')
        );
        $this->model_admin->jadwal_tambah($data);
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/jadwal');
    }
    function jadwal_hapus($id){
            $res = $this->db->delete('jadwal_ujian', array('id' => $id));
            if($res>=1){
                $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('admin/jadwal');
            }else{
                $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data gagal dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('admin/jadwal');
            }
    }

    /*------------------------------- Pengaturan Dokumentasi -------------------------------*/

    public function dokumentasi(){

        $idUser = $this->session->userdata('id_user');

        $hal = number_format($this->uri->segment(3));

        $per_page = 20;

        

        $pcfg = array(

            'base_url'      => base_url().'admin/dokumentasi',

            'per_page'      => $per_page,

            'total_rows'    => $this->model_admin->all_album(),

            'first_link'    => 'Awal',

            'last_link'     => 'Akhir',

        );

        $this->pagination->initialize($pcfg);

            $data = array('title' => 'Album Dokumentasi',

                'data'      => $this->model_admin->data_album($per_page,$hal,''),

                'jmldata'   => $pcfg['total_rows'],

                'judul'     => 'Dokumentasi',

                'link'      => 'admin/foto/',

                'form'      => 'admin/album_buat',

                'form_ubah' => 'admin/album_update',

                'hapus'     => 'admin/album_hapus/',

                'isi'       => 'backend/dokumentasi'

            );

            $this->load->view('layout',$data);

    }

    public function album_buat(){

        $idUser = $this->session->userdata('id_user');

        $data = array(

            'id_user'        => $idUser,

            'nama'           => $this->input->post('nama'),

            'status'         => $this->input->post('status'),

            'waktu'          => date('d-m-Y H:i:s')

        );

        $this->model_admin->album_buat($data);

        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Berhasil Membuat Album <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

        redirect('admin/dokumentasi');

    }

    public function album_update(){

        $idUser = $this->session->userdata('id_user');

        $data = array(

            'id_user'        => $idUser,

            'nama'           => $this->input->post('nama'),

            'status'         => $this->input->post('status'),

            'waktu'          => date('d-m-Y H:i:s')

        );

        $where = 'id_album = '.$_POST['id_album'];

        $res = $this->db->update('album', $data, $where);

        if($res >= 1){

            $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/dokumentasi');

        }

        else{

            $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data Gagal diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/dokumentasi');

        }

    }

    public function album_hapus($id){

        $data=$this->model_admin->foto();

        foreach ($data as $data){

            unlink(realpath(APPPATH . '../assets/backend/images/gallery/'.$data['foto']));

        }

        $this->db->delete('album_foto', array('id_album'  => $id));

        $res = $this->db->delete('album', array('id_album' => $id));

        if($res>=1){

            $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Album Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/dokumentasi');

        }else{

            $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Album gagal dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/dokumentasi');

        }

    }

    public function foto($id){

        $per_page = 20;

        if($this->uri->segment(4)){

            $hal = number_format(($this->uri->segment(4)-1)*$per_page);

        }

        else{

            $hal = number_format(1);

        }

        $pcfg = array(

            'base_url'      => base_url().'admin/foto/'.$id.'/',

            'per_page'      => $per_page,

            'total_rows'    => $this->model_admin->all_foto(' where album.id_album='.$id),

            'first_link'    => 'Awal',

            'last_link'     => 'Akhir',

        );

        $this->pagination->initialize($pcfg);



        $idku=' where album.id_album = '.$id;

        $data = array('title' => 'Foto Dokumentasi',

            'data2'     => $this->model_admin->foto(' where album.id_album ='.$id),

            'jmldata'   => $pcfg['total_rows'],

            'data'      => $this->model_admin->data_foto($per_page,$hal,$idku),

            'id'        => $id,

            'link'      => 'admin/foto/',

            'form'      => 'admin/foto_buat',

            'form_ubah' => 'admin/foto_update',

            'hapus'     => 'admin/foto_hapus/',

            'isi'       => 'backend/dokumentasi_foto'

        );

        $this->load->view('layout',$data);

    }

    public function foto_update(){
        $this->load->library('upload');
        $nmfile = "gallery_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/backend/images/gallery'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '1024'; //maksimum besar file 1M
        
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);
        $idUser = $this->session->userdata('id_user');
        $link2 = 'admin/foto/'.$this->input->post('id_album'); 
        $where = 'id_gambar = '.$this->input->post('id_gambar');
        if($_FILES['filefoto']['name'])
        {
            if ($this->upload->do_upload('filefoto'))
            {
                $gbr   = $this->upload->data();
                $data  = array(
                    'id_user'       => $idUser,
                    'id_album'      => $this->input->post('id_album'),
                    'nama'          => $this->input->post('nama'),
                    'deskripsi'     => $this->input->post('deskripsi'),
                    'waktu'         => date('d-m-Y H:i:s'),
                    'status'        => $this->input->post('status'),
                    'foto'          => $gbr['file_name']
                );            
                $res = $this->db->update('album_foto', $data, $where);
                if($res >= 1){
                    $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect($link2);
                }
                else{
                    $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data Gagal diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect($link2);
                }
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal Update User !!</div></div>");
                redirect($link2); //jika gagal maka akan ditampilkan form upload
            }
        }else{
            $data2 = array(                    
                'id_user'       => $idUser,
                'id_album'      => $this->input->post('id_album'),
                'nama'          => $this->input->post('nama'),
                'deskripsi'     => $this->input->post('deskripsi'),
                'waktu'         => date('d-m-Y H:i:s'),
                'status'        => $this->input->post('status')
            );
            $res = $this->db->update('album_foto', $data2, $where);
            if($res >= 1){
                $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect($link2);
            }
            else{
                $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data Gagal diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect($link2);
            }
        }
    }

    public function foto_buat(){
        $idUser = $this->session->userdata('id_user');
        $this->load->library('upload');
        $nmfile = "gallery_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/backend/images/gallery'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        //$config['max_size'] = '1024'; //maksimum besar file 1M        
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);
        $link2 = 'admin/foto/'.$this->input->post('id_album'); 
        if($_FILES['filefoto']['name']){
            if ($this->upload->do_upload('filefoto')){
                $gbr = $this->upload->data();
                $config2['source_image']= realpath(APPPATH . '../assets/backend/images/gallery/'.$gbr['file_name']);
                $config2['quality']     = '80%';
                $config2['width']       = 800;
                $this->load->library('Image_lib', $config2);
                $this->image_lib->resize();               
                $data = array(
                    'id_user'   => $idUser,
                    'id_album'  => $this->input->post('id_album'),
                    'foto'      => $gbr['file_name'],
                    'nama'      => $this->input->post('nama'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'waktu'     => date('d-m-Y H:i:s'),
                    'status'    => $this->input->post('status')
                );
                $this->model_admin->foto_buat($data);
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Unggah Gambar Berhasil !!</div></div>");
                redirect($link2);
            }else{
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal Unggah Gambar !!</div></div>");
                redirect($link2);
            }
        }else{
            $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Unggah Gambar Berhasil !!</div></div>");
            redirect($link2);
        }
    }

    public function foto_hapus($id,$id_album){
        $link2 = 'admin/foto/'.$id_album; 
        $this->db->where('id_gambar',$id);
        $query = $this->db->get('album_foto');
        $row = $query->row();
        unlink(realpath(APPPATH . '../assets/backend/images/gallery/'.$row->foto));
        $this->db->delete('album_foto', array('id_gambar' => $id));
        $res = $this->db->delete('album_foto', array('id_gambar' => $id));
        if($res>=1){
            $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect($link2);
        }
        else{
            $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data gagal dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect($link2);
        }
    }

    //-------------------Pengaturan Calon Siswa calon_siswa -------------------//



    public function calon_siswa($st='semua',$id=NULL){

    	if($st=='registrasi'){

    		$status = 1;

    	} else if($st=='pembayaran') {

    		$status = 2;

    	} else if ($st=='validasi') {

    		$status = 3;

    	} else {

    		$status = 0;

    	}

        if($status==0) {

        	$jml = $this->db->get('calon_siswa');

        	$config['base_url'] = base_url() . 'admin/calon_siswa/semua';

        } else {

        	$this->db->where('status',$status);

        	$jml = $this->db->get('calon_siswa');

        	$config['base_url'] = base_url() . 'admin/calon_siswa/'.$st;

        }

        //pengaturan pagination
        $config['total_rows'] = $jml->num_rows();

        $config['per_page'] = '10';

        $config['first_page'] = 'Awal';

        $config['last_page'] = 'Akhir';

        $config['next_page'] = '«';

        $config['prev_page'] = '»';



        //inisialisasi config

        $this->pagination->initialize($config);



        $data = array('title' => 'Manajemen calon siswa',

            'halaman'   => $this->pagination->create_links(),

            'norut'     => $id,

            'st'		=> $st,

            'data'      => $this->model_admin->calon_siswa($status,$config['per_page'], $id),

            'isi'       => 'backend/calon_siswa'

        );

        $this->load->view('layout',$data);

    }

    function formulir_ppdb($no_reg){
        $status=1;
        $data = array('title' => 'Formulir Pendaftaran Siswa',
            'data'  => $this->model_admin->formulir_ppdb($status,$no_reg)
        );
        $this->load->view('backend/formulir_ppdb',$data);
    }

    function formulir_ppdb_semua(){
        $status=0;
        $data = array('title' => 'Formulir Pendaftaran Semua Siswa',
            'data' => $this->model_admin->formulir_ppdb($status)
        );
        $this->load->view('backend/formulir_ppdb_semua',$data);
    }

    public function calon_siswa_tambah(){

        $cek_user = $this->model_admin->cek_user($this->input->post('username'));

        if(count($cek_user)>=1) {

            $this->notifikasi('danger','Username Telah Digunakan !');    

        } else {

            $data = array(

                

            );

            $this->model_admin->user_tambah($data);

            $this->notifikasi('success','calon_siswa Berhasil Ditambahkan !');

        }

        redirect('admin/calon_siswa');  

    }

    public function calon_siswa_cari($st='semua',$id=NULL){

    	if($st=='registrasi'){

    		$status = 1;

    	} else if($st=='pembayaran') {

    		$status = 2;

    	} else if ($st=='validasi') {

    		$status = 3;

    	} else {

    		$status = 0;

    	}



        if (isset($_POST['submit'])) {

            $cari = $this->input->post('cari');

            $this->session->set_userdata('pencarian',$cari);

        }else{

            $cari = $this->session->userdata('pencarian');

        }

        

        if($status==0) {

        	$this->db->like('no_registrasi', $cari);

        	$this->db->or_like('nama', $cari);

        	$jml = $this->db->get('calon_siswa');

        	$config['base_url'] = base_url() . 'admin/calon_siswa/semua';

        } else {

        	$this->db->where('status',$status);

        	$this->db->like('no_registrasi', $cari);

        	$this->db->or_like('nama', $cari);

        	$jml = $this->db->get('calon_siswa');

        	$config['base_url'] = base_url() . 'admin/calon_siswa/'.$st;

        }

        //pengaturan pagination

        $config['base_url'] = base_url() . 'admin/calon_siswa_cari/'.$st;

        $config['total_rows'] = $jml->num_rows();

        $config['per_page'] = '10';

        $config['first_page'] = 'Awal';

        $config['last_page'] = 'Akhir';

        $config['next_page'] = '«';

        $config['prev_page'] = '»';

        //inisialisasi config

        $this->pagination->initialize($config);



        $data = array('title' => 'Manajemen calon_siswa',

            'halaman'   => $this->pagination->create_links(),

            'norut'     => $id,

            'st'		=> $st,

            'data'      => $this->model_admin->calon_siswa_cari($cari, $status, $config['per_page'], $id),

            'isi'       => 'backend/calon_siswa'

        );

        $this->load->view('layout',$data);

    }

    public function calon_siswa_hapus($no_registrasi,$st='semua'){   
        $this->db->where('no_registrasi',$no_registrasi);
        $query = $this->db->get('calon_siswa');
        $row = $query->result_array();

        if (!empty($row[0]['foto'])) {
            unlink(realpath(APPPATH.'../assets/frontend/uploads/foto/'.$row[0]['foto']));
        }
        if (!empty($row[0]['ktp_ortu'])) {
            unlink(realpath(APPPATH.'../assets/frontend/uploads/ktp_ortu/'.$row[0]['ktp_ortu']));
        }
        if (!empty($row[0]['kartu_keluarga'])) {
            unlink(realpath(APPPATH.'../assets/frontend/uploads/kartu_keluarga/'.$row[0]['kartu_keluarga']));
        }
        if (!empty($row[0]['akta_lahir'])) {
            unlink(realpath(APPPATH.'../assets/frontend/uploads/akta_lahir/'.$row[0]['akta_lahir']));
        }
        if (!empty($row[0]['bukti_bayar'])) {
            unlink(realpath(APPPATH.'../assets/frontend/uploads/bukti_bayar/'.$row[0]['bukti_bayar']));
        }

        //dokumen ppdb
        for ($i=1; $i<=8; $i++) { 
            if (!empty($row[0]['dok_'.$i])) {
                unlink(realpath(APPPATH.'../assets/frontend/uploads/dokumen_ppdb/'.$row[0]['dok_'.$i]));
            }
        }

        $res = $this->db->delete('calon_siswa', array('no_registrasi' => $no_registrasi));
        if($res>=1){

            $this->notifikasi('danger','Data '.$no_registrasi.' Berhasil Dihapus !');

        }else{

            $this->notifikasi('danger','Data Tidak Berhasil Dihapus !');

        }

        redirect('admin/calon_siswa/'.$st);

    }

    public function calon_siswa_hapus_semua($st='semua'){
        $res = $this->db->truncate('calon_siswa');
        if ($res>=1) {
            $this->notifikasi('danger','Data calon siswa telah dihapus semua');
            redirect('admin/calon_siswa/'.$st);
        }
    }

    public function calon_siswa_ubah($st='semua'){

        $data = array(

            'nama'      => $this->input->post('nama'),

            'tempat_lahir'  => $this->input->post('tempat_lahir'),

            'jenis_kelamin' => $this->input->post('jenis_kelamin'),

            'nama_ayah'    => $this->input->post('nama_ayah'),
            'nama_ibu'    => $this->input->post('nama_ibu'),

            'asal_sekolah' => $this->input->post('asal_sekolah'),

        );

        $where = 'no_registrasi = '.$this->input->post('no_registrasi');

        $res = $this->db->update('calon_siswa', $data, $where);

        if($res>=1){

            $this->notifikasi('success','Data Berhasil Diubah !');

        }else{

            $this->notifikasi('danger','Data Tidak Berhasil Diubah !');

        }

        redirect('admin/calon_siswa/'.$st);

    }

    public function calon_siswa_cetak($st='semua'){

        if($st=='registrasi'){

            $status=1;

        } else if($st=='pembayaran'){

            $status=2;

        } else if($st=='validasi'){

            $status=3;

        } else {

        	$status=0;

        }

        $data = array('title' => 'Cetak '.$st,

            'data'      => $this->model_admin->cetak($status),

        );

        $this->load->view('backend/calon_siswa_cetak',$data);

    }

    public function validasi_pembayaran($id=NULL){

        //pengaturan pagination

        $this->db->where('status','2');

    	$jml = $this->db->get('calon_siswa');

    	$config['base_url'] = base_url() . 'admin/calon_siswa/';

        $config['total_rows'] = $jml->num_rows();

        $config['per_page'] = '10';

        $config['first_page'] = 'Awal';

        $config['last_page'] = 'Akhir';

        $config['next_page'] = '«';

        $config['prev_page'] = '»';



        //inisialisasi config

        $this->pagination->initialize($config);



        $data = array('title' => 'Validas Pembayaran',

            'halaman'   => $this->pagination->create_links(),

            'norut'     => $id,

            'data'      => $this->model_admin->validasi_pembayaran($config['per_page'], $id),

            'isi'       => 'backend/validasi_pembayaran'

        );

        $this->load->view('layout',$data);

    }

    public function validasi_pembayaran_cari($id=NULL){

    	if (isset($_POST['submit'])) {

            $cari = $this->input->post('cari');

            $this->session->set_userdata('pencarian',$cari);

        }else{

            $cari = $this->session->userdata('pencarian');

        }



    	$this->db->where('status','2');

    	$this->db->like('no_registrasi', $cari);

    	$this->db->or_like('nama', $cari);

    	$jml = $this->db->get('calon_siswa');

    	$config['base_url'] = base_url() . 'admin/calon_siswa/';

        

        //pengaturan pagination

        $config['base_url'] = base_url() . 'admin/calon_siswa_cari/';

        $config['total_rows'] = $jml->num_rows();

        $config['per_page'] = '10';

        $config['first_page'] = 'Awal';

        $config['last_page'] = 'Akhir';

        $config['next_page'] = '«';

        $config['prev_page'] = '»';

        //inisialisasi config

        $this->pagination->initialize($config);



        $data = array('title' => 'Manajemen Validasi Pembayaran',

            'halaman'   => $this->pagination->create_links(),

            'norut'     => $id,

            'data'      => $this->model_admin->validasi_pembayaran($cari, $config['per_page'], $id),

            'isi'       => 'backend/validasi_pembayaran'

        );

        $this->load->view('layout',$data);

    }

    public function validasi_pembayaran_ubah(){
        $no_registrasi = $this->input->post('no_registrasi');


        $data = array(

            'status'      => 3,
            'final'       => 1

        );

        $where = 'no_registrasi = '.$no_registrasi;

        $res = $this->db->update('calon_siswa', $data, $where);

        if($res>=1){

            $this->notifikasi('success','Data Berhasil Diubah !');

        }else{

            $this->notifikasi('danger','Data Tidak Berhasil Diubah !');

        }

        redirect('admin/validasi_pembayaran/');

    }



    function notifikasi($button,$pesan){

        $this->session->set_flashdata('notif','<center><div class="alert alert-'.$button.'" role="alert"><b><u>'.$pesan.'</u></b><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></center>');

    }

}