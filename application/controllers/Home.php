<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {

        parent::__construct();

        $this->load->model('model_home');

    }

    function index() {

        $data = array(

            'title' => 'Home',

            'data' => $this->model_home->slider(3, 0),
            'pengumuman' => $this->model_home->pengumuman(3, 0),
            'berita' => $this->model_home->berita(3, 0),

            'isi' => 'frontend/home'

        );

        $this->load->view('layout_web', $data);

    }

    function sekolah() {

        $data = array(

            'title' => 'Profil Sekolah',

            'data' => $this->model_home->profil(null, null, 'sekolah'),

            'isi' => 'frontend/sekolah'

        );

        $this->load->view('layout_web', $data);

    }

    function kesiswaan() {

        $data = array(

            'title' => 'Profil Kesiswaan',

            'data' => $this->model_home->profil(null, null, 'kesiswaan'),

            'isi' => 'frontend/sekolah'

        );

        $this->load->view('layout_web', $data);

    }

    function kurikulum() {

        $data = array(

            'title' => 'Profil Kurikulum',

            'data' => $this->model_home->profil(null, null, 'kurikulum'),

            'isi' => 'frontend/sekolah'

        );

        $this->load->view('layout_web', $data);

    }

    function sarana($id = NULL) {

        $this->db->where('status', 'sarana');

        $jml                  = $this->db->get('profil');

        //pengaturan pagination

        $config['base_url']   = base_url() . 'home/sarana';

        $config['total_rows'] = $jml->num_rows();

        $config['per_page']   = '10';

        $config['first_page'] = 'Awal';

        $config['last_page']  = 'Akhir';

        $config['next_page']  = '«';

        $config['prev_page']  = '»';

        //inisialisasi config

        $this->pagination->initialize($config);

        $data = array(

            'title' => 'Sarana & Prasarana - SMP IT Bengkulu',

            'halaman' => $this->pagination->create_links(),

            'norut' => $id,

            'data' => $this->model_home->profil($config['per_page'], $id, 'sarana'),

            'isi' => 'frontend/profil'

        );

        $this->load->view('layout_web', $data);

    }

    function kontak() {

        $data = array(

            'title' => 'Kontak',

            'isi' => 'frontend/kontak'

        );

        $this->load->view('layout_web', $data);

    }

    function dokumen($id = NULL) {

        $this->db->where('status', '1');

        $jml                  = $this->db->get('dokumen');

        //pengaturan pagination

        $config['base_url']   = base_url() . 'home/dokumen';

        $config['total_rows'] = $jml->num_rows();

        $config['per_page']   = '5';

        $config['first_page'] = 'Awal';

        $config['last_page']  = 'Akhir';

        $config['next_page']  = '«';

        $config['prev_page']  = '»';

        //inisialisasi config

        $this->pagination->initialize($config);

        $data = array(

            'title' => 'Dokumen',

            'halaman' => $this->pagination->create_links(),

            'norut' => $id,

            'data' => $this->model_home->dokumen($config['per_page'], $id),

            'isi' => 'frontend/dokumen'

        );

        $this->load->view('layout_web', $data);

    }

    function berita($id = NULL) {

        $this->db->where('status', 'berita');

        $this->db->where('status_aktif', '1');

        $jml                  = $this->db->get('pengumuman_berita');

        //pengaturan pagination

        $config['base_url']   = base_url() . 'home/berita';

        $config['total_rows'] = $jml->num_rows();

        $config['per_page']   = '5';

        $config['first_page'] = 'Awal';

        $config['last_page']  = 'Akhir';

        $config['next_page']  = '«';

        $config['prev_page']  = '»';

        //inisialisasi config

        $this->pagination->initialize($config);

        $data = array(

            'title' => 'Berita',

            'halaman' => $this->pagination->create_links(),

            'norut' => $id,

            'data' => $this->model_home->berita($config['per_page'], $id),

            'pengumuman' => $this->model_home->pengumuman(5, 0),

            'berita' => $this->model_home->berita(5, 0),

            'isi' => 'frontend/berita'

        );

        $this->load->view('layout_web', $data);

    }

    function detail($id) {

        $data = array(

            'data' => $this->model_home->berita_detail($id),

            'pengumuman' => $this->model_home->pengumuman(5, 0),

            'berita' => $this->model_home->berita(5, 0),

            'isi' => 'frontend/berita_detail'

        );

        $this->load->view('layout_web', $data);

    }

    function pengumuman($id = NULL) {

        $this->db->where('status', 'pengumuman');

        $this->db->where('status_aktif', '1');

        $jml                  = $this->db->get('pengumuman_berita');

        //pengaturan pagination

        $config['base_url']   = base_url() . 'home/pengumuman';

        $config['total_rows'] = $jml->num_rows();

        $config['per_page']   = '5';

        $config['first_page'] = 'Awal';

        $config['last_page']  = 'Akhir';

        $config['next_page']  = '«';

        $config['prev_page']  = '»';

        //inisialisasi config

        $this->pagination->initialize($config);

        $data = array(

            'title' => 'Pengumuman',

            'halaman' => $this->pagination->create_links(),

            'norut' => $id,

            'data' => $this->model_home->pengumuman($config['per_page'], $id),

            'pengumuman' => $this->model_home->pengumuman(5, 0),

            'berita' => $this->model_home->berita(5, 0),

            'isi' => 'frontend/berita'

        );

        $this->load->view('layout_web', $data);

    }

    function ppdb() {

        redirect('calon_siswa/ppdb');

    }

    function guru($id = NULL) {

        $this->db->where('status', 'guru');

        $jml                  = $this->db->get('profil');

        //pengaturan pagination

        $config['base_url']   = base_url() . 'home/guru';

        $config['total_rows'] = $jml->num_rows();

        $config['per_page']   = '10';

        $config['first_page'] = 'Awal';

        $config['last_page']  = 'Akhir';

        $config['next_page']  = '«';

        $config['prev_page']  = '»';

        //inisialisasi config

        $this->pagination->initialize($config);

        $data = array(

            'title' => 'Data Guru - SMP IT Bengkulu',

            'halaman' => $this->pagination->create_links(),

            'norut' => $id,

            'data' => $this->model_home->profil($config['per_page'], $id, 'guru'),

            'isi' => 'frontend/profil'

        );

        $this->load->view('layout_web', $data);

    }

    function alumni($id = NULL) {

        $this->db->where('status', 'alumni');

        $jml                  = $this->db->get('profil');

        //pengaturan pagination

        $config['base_url']   = base_url() . 'home/alumni';

        $config['total_rows'] = $jml->num_rows();

        $config['per_page']   = '10';

        $config['first_page'] = 'Awal';

        $config['last_page']  = 'Akhir';

        $config['next_page']  = '«';

        $config['prev_page']  = '»';

        //inisialisasi config

        $this->pagination->initialize($config);

        $data = array(

            'title' => 'Data Alumni - SMP IT Bengkulu',

            'status' => 'alumni',

            'halaman' => $this->pagination->create_links(),

            'norut' => $id,

            'data' => $this->model_home->profil($config['per_page'], $id, 'alumni'),

            'isi' => 'frontend/profil'

        );

        $this->load->view('layout_web', $data);

    }

    function prestasi($id = NULL) {

        $this->db->where('status', 'prestasi');

        $jml                  = $this->db->get('profil');

        //pengaturan pagination

        $config['base_url']   = base_url() . 'home/prestasi';

        $config['total_rows'] = $jml->num_rows();

        $config['per_page']   = '10';

        $config['first_page'] = 'Awal';

        $config['last_page']  = 'Akhir';

        $config['next_page']  = '«';

        $config['prev_page']  = '»';

        //inisialisasi config

        $this->pagination->initialize($config);

        $data = array(

            'title' => 'Data Prestasi - SMP IT Bengkulu',

            'status' => 'prestasi',

            'halaman' => $this->pagination->create_links(),

            'norut' => $id,

            'data' => $this->model_home->profil($config['per_page'], $id, 'prestasi'),

            'isi' => 'frontend/profil'

        );

        $this->load->view('layout_web', $data);

    }

    function galeri() {

        $hal      = number_format($this->uri->segment(3));

        $per_page = 20;

        $pcfg     = array(

            'base_url' => base_url() . 'home/galeri',

            'per_page' => $per_page,

            'total_rows' => $this->model_home->all_album(),

            'first_link' => 'Awal',

            'last_link' => 'Akhir'

        );

        $this->pagination->initialize($pcfg);

        $data = array(

            'title' => 'Galeri SMP IT Kota Bengkulu',

            'data' => $this->model_home->data_album($per_page, $hal),

            'jmldata' => $pcfg['total_rows'],

            'isi' => 'frontend/galeri'

        );

        $this->load->view('layout_web', $data);

    }

    function foto($id) {

        $per_page = 20;

        if ($this->uri->segment(4)) {

            $hal = number_format(($this->uri->segment(4) - 1) * $per_page);

        } else {

            $hal = number_format(1);

        }

        $pcfg = array(

            'base_url' => base_url() . 'home/foto/' . $id . '/',

            'per_page' => $per_page,

            'total_rows' => $this->model_home->all_foto(' where album.id_album=' . $id . ' and album_foto.status=1'),

            'first_link' => 'Awal',

            'last_link' => 'Akhir'

        );

        $this->pagination->initialize($pcfg);

        $idku = ' where album.id_album = ' . $id . ' and album_foto.status=1';

        $data = array(

            'title' => 'Galeri Foto SMP IT Kota Bengkulu',

            'data2' => $this->model_home->foto(' where album.id_album =' . $id . ' and album.status=1'),

            'jmldata' => $pcfg['total_rows'],

            'data' => $this->model_home->data_foto($per_page, $hal, $idku),

            'isi' => 'frontend/foto'

        );

        $this->load->view('layout_web', $data);

    }

}

