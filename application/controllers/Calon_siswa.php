<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');

class Calon_siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_calon_siswa');
        $this->load->model('model_admin');        
        $this->load->helper(array('url','html','form'));
    }
    public function index()
    {
        redirect('calon_siswa/ppdb');
    }
    public function ppdb()
    {
        $data = array(
            'title' => 'PPDB',
            'data'  => $this->model_admin->dokumen_ppdb(),
            'isi'   => 'frontend/ppdb'

        );
        $this->load->view('layout_web', $data);
    }
    function secure($url)
    {
        $data = $this->mza_secureurl->setSecureUrl_decode($url);
        if ($data != false) {
            if (method_exists($this, trim($data['function']))) {
                if (!empty($data['params'])) {
                    return call_user_func_array(array(
                        $this,
                        trim($data['function'])
                    ), $data['params']);
                } else {
                    return $this->$data['function']();
                }
            }
        }
        show_404();
    }
    public function do_daftar()
    {
        $this->load->library('upload');
        $this->load->library('image_lib');
        $no_reg_max = $this->model_calon_siswa->md_noreg_max();
        $no_reg     = $no_reg_max[0]['noreg_max'];
        if (!empty($no_reg)) {
            $no_reg1 = (int) substr($no_reg, 8, 4);
            $no_reg1++;
            $new_no_reg = sprintf("%04s", $no_reg1);
        } else {
            $new_no_reg = "0001";
        }
        if ($this->input->post('daftar')) {            
            /*upload foto*/
            $config['upload_path']   = realpath(APPPATH . '../assets/frontend/uploads/foto');
            $config['allowed_types'] = 'jpg||png||jpeg||bmp';
            //$config['max_size']      = '8000';
            $config['file_name']     = date("Ymd") . $new_no_reg;
            $config['remove_spaces'] = TRUE;            
            $this->upload->initialize($config);
            $this->upload->do_upload('foto');
            $foto                     = $this->upload->file_name;
            /*end*/
            /*upload ktp ortu*/
            $config2['upload_path']   = realpath(APPPATH . '../assets/frontend/uploads/ktp_ortu');
            $config2['allowed_types'] = 'jpg||png||jpeg||bmp';
            //$config2['max_size']      = '8000';
            $config2['file_name']     = date("Ymd") . $new_no_reg;
            $config2['remove_spaces'] = TRUE;
            $this->upload->initialize($config2);
            $this->upload->do_upload('ktp_ortu');
            $ktp_ortu                 = $this->upload->file_name;
            /*end*/
            /*upload kartu keluarga*/
            $config3['upload_path']   = realpath(APPPATH . '../assets/frontend/uploads/kartu_keluarga');
            $config3['allowed_types'] = 'jpg||png||jpeg||bmp';
            //$config3['max_size']      = '8000';
            $config3['file_name']     = date("Ymd") . $new_no_reg;
            $config3['remove_spaces'] = TRUE;
            $this->upload->initialize($config3);
            $this->upload->do_upload('kk');
            $kk                       = $this->upload->file_name;
            /*end*/
            /*upload akta kelahiran*/
            $config4['upload_path']   = realpath(APPPATH . '../assets/frontend/uploads/akta_lahir');
            $config4['allowed_types'] = 'jpg||png||jpeg||bmp';
            //$config4['max_size']      = '8000';
            $config4['file_name']     = date("Ymd") . $new_no_reg;
            $config4['remove_spaces'] = TRUE;
            $this->upload->initialize($config4);
            $this->upload->do_upload('akta_lhr');
            $akta_lhr = $this->upload->file_name;
            /*end*/

            //resize image                        
            $config_foto = array(
                'source_image'  => realpath(APPPATH.'../assets/frontend/uploads/foto/'.$foto),
                'quality'       => '80%',
                'width'         => 800            
            );
            $this->image_lib->initialize($config_foto);
            $this->image_lib->resize();

            $config_ktp_ortu = array(
                'source_image'  => realpath(APPPATH.'../assets/frontend/uploads/ktp_ortu/'.$ktp_ortu),
                'quality'       => '80%',
                'width'         => 800            
            );
            $this->image_lib->initialize($config_ktp_ortu);
            $this->image_lib->resize();

            $config_kk = array(
                'source_image'  => realpath(APPPATH.'../assets/frontend/uploads/kartu_keluarga/'.$kk),
                'quality'       => '80%',
                'width'         => 800            
            );
            $this->image_lib->initialize($config_kk);
            $this->image_lib->resize();

            $config_akta_lahir = array(
                'source_image'  => realpath(APPPATH.'../assets/frontend/uploads/akta_lahir/'.$akta_lhr),
                'quality'       => '80%',
                'width'         => 800            
            );
            $this->image_lib->initialize($config_akta_lahir);
            $this->image_lib->resize();
        }

        $no_registrasi = date("Ymd") . $new_no_reg;
        $this->session->set_userdata(array(
            'no_reg' => $no_registrasi
        ));
        $data = array(
            'no_registrasi' => $no_registrasi,
            'tanggal_registrasi' => date("YmdHis"),
            'nama' => $this->input->post('nama'),
            'tempat_lahir' => $this->input->post('tmpt_lhr'),
            'tanggal_lahir' => $this->input->post('tgl_lhr'),
            'jenis_kelamin' => $this->input->post('jk'),
            'alamat_rumah' => $this->input->post('almt_rmh'),
            'foto' => $foto,
            'asal_sekolah' => $this->input->post('asal_sklh'),
            'nama_ayah' => $this->input->post('nm_ayah'),
            'nama_ibu' => $this->input->post('nm_ibu'),
            'ktp_ortu' => $ktp_ortu,
            'kartu_keluarga' => $kk,
            'akta_lahir' => $akta_lhr,
            'status' => "1"
        );
        $res  = $this->db->insert('calon_siswa', $data);        
    }
    public function keluar(){
        $this->session->sess_destroy();
        redirect('calon_siswa/ppdb','refresh');    
    }
    public function pendaftaran_sukses()
    {
        $no_reg     = $this->session->userdata('no_reg');
        $data_siswa = $this->model_calon_siswa->md_data_siswa($no_reg);
        $data       = array(
            'data' => $data_siswa
        );
        $this->load->view('frontend/pendaftaran', $data);
    }
    public function cetak_pendaftaran(){
        $no_reg     = $this->session->userdata('no_reg');        
        $data['data'] = $this->model_calon_siswa->md_data_siswa($no_reg);
        $this->load->view('frontend/cetak_pendaftaran', $data);
        
    }
    public function do_daftar_update()
    {
        $no_registrasi = $this->input->post('no_reg');
        $data          = array(
            'nama' => $this->input->post('nama'),
            'tempat_lahir' => $this->input->post('tmpt_lhr'),
            'tanggal_lahir' => $this->input->post('tgl_lhr'),
            'jenis_kelamin' => $this->input->post('jk'),
            'alamat_rumah' => $this->input->post('almt_rmh'),
            'asal_sekolah' => $this->input->post('asal_sklh'),
            'nama_ayah' => $this->input->post('nm_ayah'),
            'nama_ibu' => $this->input->post('nm_ibu'),
            'final' => "1"
        );
        $where         = "no_registrasi = '" . $no_registrasi . "'";
        $res           = $this->db->update('calon_siswa', $data, $where);
        if ($res >= 1) {
            redirect('calon_siswa/konfirmasi_pembayaran_');
        }
    }
    public function do_berkas_update()
    {
        $this->load->library('image_lib');
        $this->load->library('upload');           
        $no_reg     = $this->input->post('no_reg');
        $data_siswa = $this->model_calon_siswa->md_data_siswa($no_reg);
        if ($this->input->post('berkas')) {
            /*upload foto*/
            $config = array(
                'upload_path' => realpath(APPPATH . '../assets/frontend/uploads/foto'),
                'allowed_types' => 'jpg||png||jpeg||bmp',
                //'max_size' => '8000',
                'file_name' => $no_reg,
                'remove_spaces' => TRUE
            );            
            $this->upload->initialize($config);
            $this->upload->do_upload('foto');
            $foto = $this->upload->file_name;
            if (empty($_FILES['foto']['name'])) {
                $new_foto = $data_siswa[0]['foto'];
            } else {
                if($data_siswa[0]['foto']!=''){
                    unlink(realpath(APPPATH . '../assets/frontend/uploads/foto/' . $data_siswa[0]['foto']));
                }
                $new_foto = $foto;
            }
            /*end*/
            /*upload ktp ortu*/
            $config2 = array(
                'upload_path' => realpath(APPPATH . '../assets/frontend/uploads/ktp_ortu'),
                'allowed_types' => 'jpg||png||jpeg||bmp',
                //'max_size' => '8000',
                'file_name' => $no_reg,
                'remove_spaces' => TRUE
            );
            $this->upload->initialize($config2);
            $this->upload->do_upload('ktp_ortu');
            $ktp_ortu = $this->upload->file_name;
            if (empty($_FILES['ktp_ortu']['name'])) {
                $new_ktp_ortu = $data_siswa[0]['ktp_ortu'];
            } else {
                if($data_siswa[0]['ktp_ortu']!=''){
                    unlink(realpath(APPPATH . '../assets/frontend/uploads/ktp_ortu/' . $data_siswa[0]['ktp_ortu']));
                }
                $new_ktp_ortu = $ktp_ortu;
            }
            /*end*/
            /*upload kartu keluarga*/
            $config3 = array(
                'upload_path' => realpath(APPPATH . '../assets/frontend/uploads/kartu_keluarga'),
                'allowed_types' => 'jpg||png||jpeg||bmp',
                //'max_size' => '8000',
                'file_name' => $no_reg,
                'remove_spaces' => TRUE
            );            
            $this->upload->initialize($config3);
            $this->upload->do_upload('kk');
            $kk = $this->upload->file_name;
            if (empty($_FILES['kk']['name'])) {
                $new_kk = $data_siswa[0]['kartu_keluarga'];
            } else {
                if($data_siswa[0]['kartu_keluarga']!=''){
                    unlink(realpath(APPPATH . '../assets/frontend/uploads/kartu_keluarga/' . $data_siswa[0]['kartu_keluarga']));
                }
                $new_kk = $kk;
            }
            /*end*/
            /*upload akta kelahiran*/
            $config4 = array(
                'upload_path' => realpath(APPPATH . '../assets/frontend/uploads/akta_lahir'),
                'allowed_types' => 'jpg||png||jpeg||bmp',
                //'max_size' => '8000',
                'file_name' => $no_reg,
                'remove_spaces' => TRUE
            );            
            $this->upload->initialize($config4);
            $this->upload->do_upload('akta_lhr');
            $akta_lhr = $this->upload->file_name;
            if (empty($_FILES['akta_lhr']['name'])) {
                $new_akta_lhr = $data_siswa[0]['akta_lahir'];
            } else {
                if($data_siswa[0]['akta_lahir']!=''){
                    unlink(realpath(APPPATH . '../assets/frontend/uploads/akta_lahir/' . $data_siswa[0]['akta_lahir']));
                }
                $new_akta_lhr = $akta_lhr;
            }
            /*end*/            
        }
        //resize image
        $config1_ = array(
            'source_image'  => realpath(APPPATH.'../assets/frontend/uploads/foto/'.$foto),
            'quality'       => '80%',
            'width'         => 800            
        );        
        $this->image_lib->initialize($config1_);
        $this->image_lib->resize();

        $config2_ = array(
            'source_image'  => realpath(APPPATH.'../assets/frontend/uploads/ktp_ortu/'.$ktp_ortu),
            'quality'       => '80%',
            'width'         => 800            
        );            
        $this->image_lib->initialize($config2_);
        $this->image_lib->resize();

        $config3_ = array(
            'source_image'  => realpath(APPPATH.'../assets/frontend/uploads/kartu_keluarga/'.$kk),
            'quality'       => '80%',
            'width'         => 800            
        );        
        $this->image_lib->initialize($config3_);
        $this->image_lib->resize();

        $config4_ = array(
            'source_image'  => realpath(APPPATH.'../assets/frontend/uploads/akta_lahir/'.$akta_lhr),
            'quality'       => '80%',
            'width'         => 800            
        );            
        $this->image_lib->initialize($config4_);
        $this->image_lib->resize();

        $data_update = array(
            'foto' => $new_foto,
            'ktp_ortu' => $new_ktp_ortu,
            'kartu_keluarga' => $new_kk,
            'akta_lahir' => $new_akta_lhr
        );
        $where       = "no_registrasi = '" . $no_reg . "'";
        $res         = $this->db->update('calon_siswa', $data_update, $where);
        if ($res >= 1) {
            redirect('calon_siswa/konfirmasi_pembayaran_');
        }
    }
    public function konfirmasi_pembayaran_()
    {
        $no_reg     = $this->session->userdata('no_reg');
        $data_siswa = $this->model_calon_siswa->md_data_siswa($no_reg);
        $data       = array(
            'data' => $data_siswa
        );
        $this->load->view('frontend/konfirmasi_pembayaran', $data);
    }
    public function konfirmasi_pembayaran()
    {
        $username   = $this->input->post('no_reg');
        $password   = $this->input->post('tgl_lhr');
        $cek        = $this->model_calon_siswa->md_cek_siswa($username, $password);
        $data_siswa = $this->model_calon_siswa->md_data_siswa($username);
        if (count($cek) == 1) {
            foreach ($data_siswa as $key => $value) {
                $this->session->set_userdata(array(
                    'no_reg' => $value['no_registrasi']
                ));
            }
            $data = array(
                'data' => $data_siswa
            );
            $this->load->view('frontend/konfirmasi_pembayaran', $data);
        } else {
            $this->session->set_flashdata('notif', '<center><div style="margin-top: 110px;" class="alert alert-danger" role="alert"> Gagal Masuk <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('calon_siswa/ppdb');
        }
    }
    public function do_konfirm_bayar()
    {
        $no_reg     = $this->input->post('no_reg');
        $data_siswa = $this->model_calon_siswa->md_data_siswa($no_reg);
        if ($this->input->post('konfirmasi')) {
            /*upload bukti pembayaran*/
            $config['upload_path']   = realpath(APPPATH . '../assets/frontend/uploads/bukti_bayar');
            $config['allowed_types'] = 'jpg||png||jpeg||bmp';
            $config['file_name']     = $no_reg;
            $config['remove_spaces'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->do_upload('bkt_pmbyrn');
            $bkt_pmbyrn = $this->upload->file_name;
            
            if (empty($_FILES['bkt_pmbyrn']['name'])) {
                $new_bkt_pmbyrn = $data_siswa[0]['bukti_bayar'];
            } else {
                if($data_siswa[0]['bukti_bayar']!=''){
                    unlink(realpath(APPPATH.'../assets/frontend/uploads/bukti_bayar/'.$data_siswa[0]['bukti_bayar']));
                }
                $new_bkt_pmbyrn = $bkt_pmbyrn;
            }
            /*end*/
        }
            $config2['source_image']= realpath(APPPATH . '../assets/frontend/uploads/bukti_bayar/'.$bkt_pmbyrn);
            $config2['quality']     = '80%';
            $config2['width']       = 800;
            $this->load->library('image_lib', $config2);
            $this->image_lib->resize();

        $data  = array(
            'nama_pembayar' => $this->input->post('nm_pmbyr'),
            'tanggal_bayar' => $this->input->post('tgl_byr'),
            'bukti_bayar' => $new_bkt_pmbyrn,
            'status' => '2'
        );
        $where = "no_registrasi = '" . $no_reg . "'";
        $res   = $this->db->update('calon_siswa', $data, $where);
        if ($res >= 1) {
            $this->session->set_flashdata('notif', '<center><div style="width: 667px;margin-bottom: 0px;" class="alert alert-success" role="alert"> Bukti Pembayaran Berhasil Diunggah dan Akan Segera Diproses <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('calon_siswa/konfirmasi_pembayaran_');
        }
    }
    public function kartu_ujian()
    {
        $username   = $this->input->post('no_reg');
        $password   = $this->input->post('tgl_lhr');
        $cek        = $this->model_calon_siswa->md_cek_siswa($username, $password);
        $data_siswa = $this->model_calon_siswa->md_data_siswa($username);
        if (count($cek) == 1) {
            if ($data_siswa[0]['status'] == 1) {
                $this->session->set_flashdata('notif', '<center><div style="margin-top: 110px;" class="alert alert-danger" role="alert"> Nomor Registrasi <b>'.$username.'</b> belum Melakukan Transfer Pembayaran.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('calon_siswa/ppdb');
            } else if ($data_siswa[0]['final'] == 0) {
                $this->session->set_flashdata('notif', '<center><div style="margin-top: 110px;" class="alert alert-danger" role="alert"> Nomor Registrasi <b>'.$username.'</b> belum Melakukan Finalisasi Data. Silahkan Klik Finalisasi pada menu <b>Transfer</b>.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('calon_siswa/ppdb');
            } else if ($data_siswa[0]['status'] == 2) {
                $this->session->set_flashdata('notif', '<center><div style="margin-top: 110px;" class="alert alert-danger" role="alert">Bukti Transfer Pembayaran Sedang Menunggu Validasi Paling Lambat 2 x 24 Jam.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('calon_siswa/ppdb');
            } else {
                foreach ($data_siswa as $key => $value) {
                    $this->session->set_userdata(array(
                        'no_reg' => $value['no_registrasi']
                    ));
                }
                /*redirect('calon_siswa/cetak_kartu_ujian');*/
                $data = array(
                    'data' => $data_siswa,
                    'jadwal' => $this->model_calon_siswa->md_jadwal()
                );
                $this->load->view('frontend/kartu_ujian', $data);
            }
        } else {
            $this->session->set_flashdata('notif', '<center><div style="margin-top: 110px;" class="alert alert-danger" role="alert"> Gagal Masuk <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('calon_siswa/ppdb');
        }
    }

    public function upload_dokumen_ppdb()
    {
        $username   = $this->input->post('no_reg');
        $password   = $this->input->post('tgl_lhr');
        $cek        = $this->model_calon_siswa->md_cek_siswa($username, $password);
        $data_siswa = $this->model_calon_siswa->md_data_siswa($username);
        $status_sis = $data_siswa[0]['status'];
        if (count($cek) == 1) {            
            if ($data_siswa[0]['status'] == 1) {
                $this->session->set_flashdata('notif', '<center><div style="margin-top: 110px;" class="alert alert-danger" role="alert"> Nomor Registrasi <b>'.$username.'</b> belum Melakukan Transfer Pembayaran.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('calon_siswa/ppdb');
            } else if ($data_siswa[0]['final'] == 0) {
                $this->session->set_flashdata('notif', '<center><div style="margin-top: 110px;" class="alert alert-danger" role="alert"> Nomor Registrasi <b>'.$username.'</b> belum Melakukan Finalisasi Data. Silahkan Klik Finalisasi pada menu <b>Transfer</b>.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('calon_siswa/ppdb');
            } else if ($data_siswa[0]['status'] == 2) {
                $this->session->set_flashdata('notif', '<center><div style="margin-top: 110px;" class="alert alert-danger" role="alert"> Bukti Transfer Pembayaran Sedang Menunggu Validasi Paling Lambat 2 x 24 Jam.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('calon_siswa/ppdb');
            }else{
                foreach ($data_siswa as $key => $value) {
                        $this->session->set_userdata(array(
                            'no_reg' => $value['no_registrasi']
                        ));
                    }
                    $data = array(
                        'data' => $data_siswa
                    );
                    $this->load->view('frontend/konfirmasi_pembayaran', $data);
                }                            
        } else {
            $this->session->set_flashdata('notif', '<center><div style="margin-top: 110px;" class="alert alert-danger" role="alert"> Gagal Masuk <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('calon_siswa/ppdb');
        }
    }

    public function do_dokumen_upload()
    {   
        $this->load->library('upload');   
        $this->load->library('image_lib');         
        $no_reg     = $this->input->post('no_reg');
        $data_siswa = $this->model_calon_siswa->md_data_siswa($no_reg);
        if ($this->input->post('berkas')) {
            /*upload dok_1*/
            $config1 = array(
                'upload_path' => realpath(APPPATH . '../assets/frontend/uploads/dokumen_ppdb'),
                'allowed_types' => 'jpg||png||jpeg||bmp',
                //'max_size' => '2048',
                'file_name' => $no_reg."_dok_1",
                'remove_spaces' => TRUE
            );            
            $this->upload->initialize($config1);
            $this->upload->do_upload('dok_1');
            $dok_1 = $this->upload->file_name;
            if (empty($_FILES['dok_1']['name'])) {
                $new_dok_1 = $data_siswa[0]['dok_1'];
            } else {
                if($data_siswa[0]['dok_1']!=''){
                    unlink(realpath(APPPATH . '../assets/frontend/uploads/dokumen_ppdb/' . $data_siswa[0]['dok_1']));
                }
                $new_dok_1 = $dok_1;
            }            
            /*end*/
            /*upload dok_2*/
            $config2 = array(
                'upload_path' => realpath(APPPATH . '../assets/frontend/uploads/dokumen_ppdb'),
                'allowed_types' => 'jpg||png||jpeg||bmp',
                //'max_size' => '2048',
                'file_name' => $no_reg."_dok_2",
                'remove_spaces' => TRUE
            );
            $this->upload->initialize($config2);
            $this->upload->do_upload('dok_2');
            $dok_2 = $this->upload->file_name;
            if (empty($_FILES['dok_2']['name'])) {
                $new_dok_2 = $data_siswa[0]['dok_2'];
            } else {
                if($data_siswa[0]['dok_2']!=''){
                    unlink(realpath(APPPATH . '../assets/frontend/uploads/dokumen_ppdb/' . $data_siswa[0]['dok_2']));
                }
                $new_dok_2 = $dok_2;
            }
            /*end*/
            /*upload dok_3*/
            $config3 = array(
                'upload_path' => realpath(APPPATH . '../assets/frontend/uploads/dokumen_ppdb'),
                'allowed_types' => 'jpg||png||jpeg||bmp',
                //'max_size' => '2048',
                'file_name' => $no_reg."_dok_3",
                'remove_spaces' => TRUE
            );            
            $this->upload->initialize($config3);
            $this->upload->do_upload('dok_3');
            $dok_3 = $this->upload->file_name;
            if (empty($_FILES['dok_3']['name'])) {
                $new_dok_3 = $data_siswa[0]['dok_3'];
            } else {
                if($data_siswa[0]['dok_3']!=''){
                    unlink(realpath(APPPATH . '../assets/frontend/uploads/dokumen_ppdb/' . $data_siswa[0]['dok_3']));
                }
                $new_dok_3 = $dok_3;
            }
            /*end*/
            /*upload dok_4*/
            $config4 = array(
                'upload_path' => realpath(APPPATH . '../assets/frontend/uploads/dokumen_ppdb'),
                'allowed_types' => 'jpg||png||jpeg||bmp',
                //'max_size' => '2048',
                'file_name' => $no_reg."_dok_4",
                'remove_spaces' => TRUE
            );            
            $this->upload->initialize($config4);
            $this->upload->do_upload('dok_4');
            $dok_4 = $this->upload->file_name;
            if (empty($_FILES['dok_4']['name'])) {
                $new_dok_4 = $data_siswa[0]['dok_4'];
            } else {
                if($data_siswa[0]['dok_4']!=''){
                    unlink(realpath(APPPATH . '../assets/frontend/uploads/dokumen_ppdb/' . $data_siswa[0]['dok_4']));
                }
                $new_dok_4 = $dok_4;
            }
            /*end*/
            /*upload dok_5*/
            $config5 = array(
                'upload_path' => realpath(APPPATH . '../assets/frontend/uploads/dokumen_ppdb'),
                'allowed_types' => 'jpg||png||jpeg||bmp',
                //'max_size' => '2048',
                'file_name' => $no_reg."_dok_5",
                'remove_spaces' => TRUE
            );            
            $this->upload->initialize($config5);
            $this->upload->do_upload('dok_5');
            $dok_5 = $this->upload->file_name;
            if (empty($_FILES['dok_5']['name'])) {
                $new_dok_5 = $data_siswa[0]['dok_5'];
            } else {
                if($data_siswa[0]['dok_5']!=''){
                    unlink(realpath(APPPATH . '../assets/frontend/uploads/dokumen_ppdb/' . $data_siswa[0]['dok_5']));
                }
                $new_dok_5= $dok_5;
            }
            /*end*/ 
            /*upload dok_6*/
            $config6 = array(
                'upload_path' => realpath(APPPATH . '../assets/frontend/uploads/dokumen_ppdb'),
                'allowed_types' => 'jpg||png||jpeg||bmp',
                //'max_size' => '2048',
                'file_name' => $no_reg."_dok_6",
                'remove_spaces' => TRUE
            );            
            $this->upload->initialize($config6);
            $this->upload->do_upload('dok_6');
            $dok_6 = $this->upload->file_name;
            if (empty($_FILES['dok_6']['name'])) {
                $new_dok_6 = $data_siswa[0]['dok_6'];
            } else {
                if($data_siswa[0]['dok_6']!=''){
                    unlink(realpath(APPPATH . '../assets/frontend/uploads/dokumen_ppdb/' . $data_siswa[0]['dok_6']));
                }
                $new_dok_6= $dok_6;
            }
            /*end*/
            /*upload dok_7*/
            $config7 = array(
                'upload_path' => realpath(APPPATH . '../assets/frontend/uploads/dokumen_ppdb'),
                'allowed_types' => 'jpg||png||jpeg||bmp',
                //'max_size' => '2048',
                'file_name' => $no_reg."_dok_7",
                'remove_spaces' => TRUE
            );            
            $this->upload->initialize($config7);
            $this->upload->do_upload('dok_7');
            $dok_7 = $this->upload->file_name;
            if (empty($_FILES['dok_7']['name'])) {
                $new_dok_7 = $data_siswa[0]['dok_7'];
            } else {
                if($data_siswa[0]['dok_7']!=''){
                    unlink(realpath(APPPATH . '../assets/frontend/uploads/dokumen_ppdb/' . $data_siswa[0]['dok_7']));
                }
                $new_dok_7= $dok_7;
            }
            /*end*/
            /*upload dok_8*/
            $config8 = array(
                'upload_path' => realpath(APPPATH . '../assets/frontend/uploads/dokumen_ppdb'),
                'allowed_types' => 'jpg||png||jpeg||bmp',
                //'max_size' => '2048',
                'file_name' => $no_reg."_dok_8",
                'remove_spaces' => TRUE
            );            
            $this->upload->initialize($config8);
            $this->upload->do_upload('dok_8');
            $dok_8 = $this->upload->file_name;
            if (empty($_FILES['dok_8']['name'])) {
                $new_dok_8 = $data_siswa[0]['dok_8'];
            } else {
                if($data_siswa[0]['dok_8']!=''){
                    unlink(realpath(APPPATH . '../assets/frontend/uploads/dokumen_ppdb/' . $data_siswa[0]['dok_8']));
                }
                $new_dok_8= $dok_8;
            }
            /*end*/     
        }
        
        //resize image        
        $config1_ = array(
            'source_image'  => realpath(APPPATH.'../assets/frontend/uploads/dokumen_ppdb/'.$dok_1),
            'quality'       => '80%',
            'width'         => 800            
        );
        //$this->load->library('image_lib',$config1_);        
        $this->image_lib->initialize($config1_);
        $this->image_lib->resize();

        $config_2 = array(
            'source_image'  => realpath(APPPATH.'../assets/frontend/uploads/dokumen_ppdb/'.$dok_2),
            'quality'       => '80%',
            'width'         => 800            
        );
        $this->image_lib->initialize($config_2);
        $this->image_lib->resize();

        $config_3 = array(
            'source_image'  => realpath(APPPATH.'../assets/frontend/uploads/dokumen_ppdb/'.$dok_3),
            'quality'       => '80%',
            'width'         => 800            
        );
        $this->image_lib->initialize($config_3);
        $this->image_lib->resize();

        $config_4 = array(
            'source_image'  => realpath(APPPATH.'../assets/frontend/uploads/dokumen_ppdb/'.$dok_4),
            'quality'       => '80%',
            'width'         => 800            
        );
        $this->image_lib->initialize($config_4);
        $this->image_lib->resize();

        $config_5 = array(
            'source_image'  => realpath(APPPATH.'../assets/frontend/uploads/dokumen_ppdb/'.$dok_5),
            'quality'       => '80%',
            'width'         => 800            
        );
        $this->image_lib->initialize($config_5);
        $this->image_lib->resize();

        $config_6 = array(
            'source_image'  => realpath(APPPATH.'../assets/frontend/uploads/dokumen_ppdb/'.$dok_6),
            'quality'       => '80%',
            'width'         => 800            
        );
        $this->image_lib->initialize($config_6);
        $this->image_lib->resize();
        
        $config_7 = array(
            'source_image'  => realpath(APPPATH.'../assets/frontend/uploads/dokumen_ppdb/'.$dok_7),
            'quality'       => '80%',
            'width'         => 800            
        );
        $this->image_lib->initialize($config_7);
        $this->image_lib->resize();

        $config_8 = array(
            'source_image'  => realpath(APPPATH.'../assets/frontend/uploads/dokumen_ppdb/'.$dok_8),
            'quality'       => '80%',
            'width'         => 800            
        );
        $this->image_lib->initialize($config_8);
        $this->image_lib->resize();

        /*$config1_ = array(
            'source_image'  => realpath(APPPATH.'../assets/frontend/uploads/dokumen_ppdb/'.$dok_1),
            'quality'       => '80%',
            'width'         => 800
            //'rotation_angle' => '90'
        );
        $this->load->library('image_lib', $config1_);
        $this->image_lib->resize();*/
        //$this->image_lib->rotate();
        /*$lebar = $this->upload->image_width;
        $tinggi = $this->upload->image_height;
        if ($lebar>$tinggi) {
            $config1_['rotation_angle'] = '90';
            $this->upload->initialize($config1_);
            $this->image_lib->rotate();
        }*/       

        $data_update = array(
            'dok_1' => $new_dok_1,
            'dok_2' => $new_dok_2,
            'dok_3' => $new_dok_3,
            'dok_4' => $new_dok_4,
            'dok_5' => $new_dok_5,
            'dok_6' => $new_dok_6,
            'dok_7' => $new_dok_7,
            'dok_8' => $new_dok_8           
        );
        $where       = "no_registrasi = '" . $no_reg . "'";
        $res         = $this->db->update('calon_siswa', $data_update, $where);
        if ($res >= 1) {
            redirect('calon_siswa/konfirmasi_pembayaran_');
        }
    }
} 