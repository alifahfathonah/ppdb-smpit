<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->tipe_user = $this->session->userdata('tipe_user');
        $this->username = $this->session->userdata('username');
        $this->load->model('model');
        if ($this->tipe_user != 2) {
            redirect('errors');
        }
    }
    function index(){
        $data=array('title' => 'Dashboard',
            'isi' => 'backend/dashboard',
            'total_post' => $this->model->content()->num_rows(),
            'total_comment' => $this->model->comment()->num_rows(),
            'page_view' => $this->model->content_view()->result_array()
        );
        $this->load->view('layout', $data);
    }
    //-------------------Post-------------------//
    function content($no=NULL){
        $data = array('title' => 'Semua Post',
            'no'      => $no,
            'isi'     => 'backend/post',
            'content' => $this->model->content('order by kode_content desc')->result_array(),
        );
        $this->load->view('layout',$data);
    }
    function contentpublish($no=NULL){
        $data = array('title' => 'Post Diterbitkan',
            'no'      => $no,
            'isi'     => 'backend/post',
            'content' => $this->model->content('where status = "publish" order by kode_content desc')->result_array(),
        );
        $this->load->view('layout',$data);
    }
    function contentdraft($no=NULL){
        $data = array('title' => 'Post Draft',
            'no'      => $no,
            'isi'     => 'backend/post',
            'content' => $this->model->content('where status = "draft" order by kode_content desc')->result_array(),
        );
        $this->load->view('layout',$data);
    }
    function newcontent(){
        $data = array(
            'title' => 'Tulis Post',
            'kode_content' => '',
            'judul_content' => '',
            'header_post' => '',
            'deskripsi' => '',
            'status' => 'baru',
            'status_content' => '',
            'label' => $this->model->label()->result_array(),
            'label_post' => array(),
            'tags' => '',
            'isinya' => '',
            'isi' => 'backend/tulis_post'
        );
        $this->load->view('layout',$data);
    }
    function session_preview(){
        if($_POST){
            $data = array(
                'username' => $this->session->userdata('username'),
                'judul_content' => $_POST['judul_post'],
                'header_post' => $_POST['header_post'],
                'penulis' => $data_sess['pengguna'],
                'tanggal' => date("Y-m-d H:i:s"),
                'tags' => $_POST['tags'],
                'isi' => $_POST['isi'],
                'title' => 'Preview'
            );
            /*can't use CI session for save any values :-( */
            /*$this->session->set_userdata('pratinjau',$data);
            print_r($this->session->userdata('pratinjau'));*/
            /*session php*/
            $_SESSION['pratinjau'] = $data;
        }else{
            redirect('errors');
        }
    }
    function konten_prasimpan(){
        if ($_POST['Submit'] == 'Pratinjau'){
            $this->session->set_userdata(array(
                'judul_content' => $this->input->post('judul_post'),
                'header_post' => $this->input->post('header_post'),
                'judul_label' =>$this->input->post('labels'),
                'penulis' => $this->session->userdata('username'),
                'tanggal' => date("Y-m-d H:i:s"),
                'tags' => $this->input->post('tags'),
                'isi' => $this->input->post('isinya'),
            ));
            redirect('home/pratinjau');
        }else if ($_POST['Submit'] == 'Simpan'){
            if($_POST){
                $judul_post = $_POST['judul_post'];
                $header_post = $_POST['header_post'];
                $deskripsi = $_POST['deskripsi'];
                $status = $_POST['status'];
                $labels = $_POST['labels'];
                $tags = $_POST['tags'];
                $isinya = $_POST['isinya'];
                $kode_content = $_POST['kode_content'];
                $status_simpan = $_POST['status_simpan'];
                
                if($status_simpan == "baru"){
                    $data = array(
                        'judul_content' => $judul_post,
                        'image_header' => $header_post,
                        'deskripsi' => $deskripsi,
                        'tanggal' => date("Y-m-d H:i:s"),
                        'penulis' => $this->session->userdata('nama'),
                        'content' => $isinya,
                        'tags' => $tags,
                        'status' => $status,
                        'image_header' => $header_post,
                        'counter' => 0
                    );
                    $result = $this->model->insert_data('content',$data);
                    if($result == 1){
                        $terakhir = $this->model->content('order by kode_content desc limit 1')->result_array();
                        foreach($labels as $l){
                            $data = array(
                                'kode_content' => $terakhir[0]['kode_content'],
                                'kode_label' => $l
                            );
                            $this->model->insert_data('content_label',$data);
                        }
                        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Berhasil Menulis <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                        header('location:'.base_url('dashboard/content'));
                    }else{
                        $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Gagal Menulis <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                        header('location:'.base_url('dashboard/content'));
                    }
                }else{
                    $this->model->delete_data('content_label',array('kode_content' => $kode_content));
                    $data = array(
                        'judul_content' => $judul_post,
                        'image_header' => $header_post,
                        'deskripsi' => $deskripsi,
                        'tanggal' => date("Y-m-d H:i:s"),
                        'penulis' => $this->session->userdata('nama'),
                        'content' => $isinya,
                        'tags' => $tags,
                        'status' => $status,
                        'image_header' => $header_post
                    );
                    $result = $this->model->update_data('content',$data,array('kode_content' => $kode_content));
                    if($result == 1){
                        foreach($labels as $l){
                            $data = array(
                                'kode_content' => $kode_content,
                                'kode_label' => $l
                            );
                            $this->model->insert_data('content_label',$data);
                        }
                        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Berhasil Mengubah Tulisan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                        header('location:'.base_url('dashboard/content'));
                    }else{
                        $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Gagal Mengubah Tulisan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                        header('location:'.base_url('dashboard/content'));
                    }
                }
            }else{
                redirect('errors');
            }
        }
    }
    function editcontent($kode = 0){
        $data_content = $this->model->content("where kode_content = '$kode'")->result_array();
        /*label to array*/
        $label_post_arr = array();
        foreach($this->model->label_content("where kode_content = '$kode'")->result_array() as $lab){
            $label_post_arr[] = $lab['kode_label'];
        }       
        /*end label to array*/
        $data = array(
            'kode_content' => $data_content[0]['kode_content'],
            'judul_content' => $data_content[0]['judul_content'],
            'header_post' => $data_content[0]['image_header'],      
            'deskripsi' => $data_content[0]['deskripsi'],
            'status_content' => $data_content[0]['status'],
            'status' => 'lama',
            'label' => $this->model->label()->result_array(),
            'label_post' => $label_post_arr,
            'tags' => $data_content[0]['tags'],
            'isinya' => $data_content[0]['content'],
            'isi' => 'backend/tulis_post',
            'title' => 'Ubah Post'
        );
        $this->load->view('layout',$data);
    }
    function deletecontent($kode = 0){
        $this->model->delete_data('content_label',array('kode_content' => $kode));
        $result = $this->model->delete_data('content',array('kode_content' => $kode));
        if($result == 1){
            $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            header('location:'.base_url().'dashboard/content');
        }else{
            $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data Gagal dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            header('location:'.base_url().'dashboard/content');
        }
    }
    //-------------------Label-------------------//
    function labels(){
        $data = array(
            'status' => 'baru',
            'judul_label' => '',
            'kode_label' => '',
            'label' => $this->model->label("order by kode_label desc")->result_array(),
            'title' => 'Label',
            'isi' => 'backend/label'
        );
        $this->load->view('layout',$data);
    }    
    function savelabel(){
        if($_POST){
            $status = $_POST['status'];
            $kode_label = $_POST['kode_label'];
            $judul_label = $_POST['judul_label'];           
            if($status == "baru"){
                $data = array(
                    'kode_label' => $kode_label,
                    'judul_label' => $judul_label
                );
                $result = $this->model->insert_data('label',$data);
                if($result == 1){
                    $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Berhasil Membuat Kategori <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    header('location:'.base_url().'dashboard/labels');
                }else{
                    $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Gagal Membuat Kategori <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    header('location:'.base_url().'dashboard/labels');
                }
            }else{
                $data = array(
                    'judul_label' => $judul_label
                );
                $result = $this->model->update_data('label',$data,array('kode_label' => $kode_label));
                if($result == 1){
                    $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Berhasil Mengubah Kategori <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    header('location:'.base_url().'dashboard/labels');
                }else{
                    $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Gagal Mengubah Kategori <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    header('location:'.base_url().'dashboard/labels');
                }
            }           
        }else{
            $this->load->view('webdashboard/pagenotfound',array('title' => 'page not found'));
        }
    }
    function deletelabel($kode = 1){
        $result = $this->model->delete_data('label',array('kode_label' => $kode));
        if($result == 1){
            $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            header('location:'.base_url('dashboard/labels'));
        }else{
            $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data Gagal dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            header('location:'.base_url('dashboard/labels'));
        }
    }
    //-------------------Statistik-------------------//
    function statistik($no = NULL){
        $tanggal_wingi = date("d");
        $view_stat = array(
            'day' => $this->model->visitor("where SUBSTRING(tanggal,1,10) = '".date("Y-m-d")."'")->num_rows(),
            'yesterday' => $this->model->visitor("where SUBSTRING(tanggal,1,10) = '".date("Y-m-d", strtotime("yesterday"))."'")->num_rows(),
            'mounth' => $this->model->visitor("where SUBSTRING(tanggal,1,7) = '".date("Y-m")."'")->num_rows(),
            'year' => $this->model->visitor("where SUBSTRING(tanggal,1,4) = '".date("Y")."'")->num_rows(),
            'sepanjang_waktu' => $this->model->visitor()->num_rows(),   
        );
        $data = array(
            'no' => $no,
            'visitor' => $view_stat,
            'post' => $this->model->content("where status = 'publish' order by counter")->result_array(),
            'title' => 'Statistik',
            'isi' => 'backend/statistik'
        );
        $this->load->view('layout',$data);
    }
    //-------------------Komentar-------------------//
    function komentar($no=NULL){
        $data = array(
            'comment'   => $this->model->comment("order by kode_comment desc")->result_array(),
            'no'        => $no,
            'title'     => 'Komentar',
            'isi'       => 'backend/komentar'
        );
        $this->load->view('layout',$data);
    }
    function publishingcomment($kode = 0){
        $data = array('status' => 'publish');
        $result = $this->model->update_data('komentar',$data,array('kode_comment' => $kode));
        if($result == 1){
            $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Berhasil Menerbitkan Komentar <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            header('location:'.base_url().'dashboard/komentar');
        }else{
            $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Gagal Menerbitkan Komentar <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            header('location:'.base_url().'dashboard/komentar');
        }
    }
    function deletingcomment($kode = 0){
        $result = $this->model->delete_data('komentar',array('kode_comment' => $kode));
        if($result == 1){
            $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Berhasil Menghapus Komentar <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            header('location:'.base_url().'dashboard/komentar');
        }else{
            $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Gagal Menghapus Komentar <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            header('location:'.base_url().'dashboard/komentar');
        }
    }
    function replycomment($kode = 0){
        $data = array(
            'comment' => $this->model->comment("where content.kode_content = '$kode' order by kode_comment")->result_array(),
            'title'     => 'Balas Komentar',
            'isi'       => 'backend/komentar_balas'
        );
        $this->load->view('layout',$data);
    }
    function myreply(){
        if($_POST){
            $data = array(
                'kode_content' => $_POST['kode_content'],
                'isi' => $_POST['mycomment'],
                'status' => 'publish',
                'pengirim' => $this->session->userdata('username'),
                'website' => 'http://rumah-aiti.com',
                'tanggal' => date("Y-m-d H:i:s")
            );
            $result = $this->model->insert_data('komentar',$data);
            if($result == 1){
                $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Berhasil Menerbitkan Komentar <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                header('location:'.base_url().'dashboard/komentar');
            }else{
                $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Gagal Menerbitkan Komentar <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                header('location:'.base_url().'dashboard/komentar');
            }
        }else{
            redirect('errors');
        }
    }
}