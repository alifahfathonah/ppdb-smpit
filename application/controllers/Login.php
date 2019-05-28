<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('model_login');
    }
    public function index(){
        $tipe_user = $this->session->userdata('tipe_user');
        $session = $this->session->userdata('login'); 
        if($session != 'Sudah Loggin'){
            $this->load->view('login');
        }else{
            if ($tipe_user==1) {
                redirect('admin');
            }else if ($tipe_user==2) {
                redirect('dashboard');
            }else{
                redirect('errors');
            }
        }
    }
    public function cek_login() {
        $username = $this->security->xss_clean($this->input->post("username"));
        $password = $this->security->xss_clean($this->input->post("password"));
        $cek = $this->model_login->cek_user($username,md5($password));
        if(count($cek) == 1){
            foreach ($cek as $cek) {
                $nama       = $cek['nama'];
                $user       = $cek['username'];
                $tipe_user  = $cek['tipe_user'];
                $status     = $cek['status'];
                $id_user     = $cek['id_user'];
            }
            if ($status==1) {
                $this->session->set_userdata(array(
                    'login'         => TRUE,
                    'nama'          => $nama,
                    'username'      => $user,
                    'tipe_user'     => $tipe_user,
                    'id_user'       => $id_user,
                ));
                if ($tipe_user==1) {
                    redirect('admin');
                }else if ($tipe_user==2) {
                    redirect('dashboard');
                }
            }else{
                $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Username anda di blokir <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('login');
            }
        }else{
            $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Username atau Password Salah ! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('login');
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect('login','refresh');
    }
}
