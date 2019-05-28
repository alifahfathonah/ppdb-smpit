<!DOCTYPE html>



<html lang="en">



<head>



    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">



    <!-- Meta, title, CSS, favicons, etc. -->



    <meta charset="utf-8">



    <meta http-equiv="X-UA-Compatible" content="IE=edge">



    <meta name="viewport" content="width=device-width, initial-scale=1">



    <meta name="description" content="Rumah AITI">



    <meta name="author" content="Rumah AITI">



    <title><?php echo $title;?> | SMP IT Kota Bengkulu </title>



    <link rel="shortcut icon" href="<?php echo base_url('assets/backend/images/logo_aiti.png');?>" type="image/png">







    <!-- Bootstrap core CSS -->



    <link href="<?php echo base_url('assets/backend/css/bootstrap.min.css');?>" rel="stylesheet">



    <link href="<?php echo base_url('assets/backend/fonts/css/font-awesome.min.css');?>" rel="stylesheet">



    <link href="<?php echo base_url('assets/backend/css/animate.min.css');?>" rel="stylesheet">



    <link href="<?php echo base_url('assets/backend/css/bootstrap-fileupload.min.css');?>" rel="stylesheet">







    <!-- Custom styling plus plugins -->



    <link href="<?php echo base_url('assets/backend/css/custom.css');?>" rel="stylesheet">



    <script src="<?php echo base_url('assets/backend/js/jquery.min.js');?>"></script>







    <!--[if lt IE 9]>



        <script src="../assets/js/ie8-responsive-file-warning.js"></script>



    <![endif]-->







    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->



    <!--[if lt IE 9]>



      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>



      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>



    <![endif]-->







</head>



<body class="nav-md">



    <!-- PRELOADER -->



    <div class="preloader">



        <div class="do-loader">&nbsp;</div>



    </div>



    <!-- PRELOADER -->



    <div class="container body">



        <div class="main_container">



            <div class="col-md-3 left_col">



                <div class="left_col scroll-view">



                    <div class="navbar nav_title" style="border: 0;">



                        <a href="<?php echo base_url('login');?>" class="site_title"><i class="fa fa-home"></i> <span><b>DASHBOARD</b></span></a>



                    </div>



                    <div class="clearfix"></div>



                    <!-- menu prile quick info -->



                    <div class="profile">



                        <div class="profile_pic">



                            <img src="<?php echo base_url('assets/backend/images/logo_aiti.png');?>" alt="..." class="img-circle profile_img">



                        </div>



                        <div class="profile_info">



                            <span>Selamat Datang,</span>



                            <h2><?php echo $this->session->userdata('nama');?></h2>



                        </div>



                    </div>



                    <!-- /menu prile quick info -->



                    <br />



                    <!-- sidebar menu -->



                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">



                        <div class="menu_section">



                            <h3>Admin</h3>



                            <?php if ($this->session->userdata('tipe_user')==1) {



                                $usernya='admin';



                            }else{



                                $usernya='dashboard';



                            }?>



                            <ul class="nav side-menu">



                                <li><a href="<?php echo base_url('login');?>"><i class="fa fa-home"></i> Dashboard </a></li>



                                <li><a><i class="fa fa-file-text"></i> Data Sekolah <span class="fa fa-chevron-down"></span></a>



                                    <ul class="nav child_menu" style="display: none">

                                        <li><a href="<?php echo base_url('admin/sekolah');?>"><i class="fa fa-home"></i> Sekolah</a></li>

                                        <li><a href="<?php echo base_url('admin/kesiswaan');?>"><i class="fa fa-users"></i> Kesiswaan</a></li>

                                        <li><a href="<?php echo base_url('admin/kurikulum');?>"><i class="fa fa-book"></i> Kurikulum</a></li>

                                        <li><a href="<?php echo base_url('admin/sarana');?>"><i class="fa fa-building"></i> Sarana Prasarana</a></li>

                                    	<li><a href="<?php echo base_url('admin/alumni');?>"><i class="fa fa-users"></i> Alumni</a></li>



                                        <li><a href="<?php echo base_url('admin/guru');?>"><i class="fa fa-user"></i> Guru</a></li>



                                        <li><a href="<?php echo base_url('admin/prestasi');?>"><i class="fa fa-trophy"></i> Prestasi</a></li>



                                        <li><a href="<?php echo base_url('admin/dokumentasi');?>"><i class="fa fa-bullhorn "></i> Galeri</a></li>



                                    </ul>



                                </li>



                                <li><a><i class="fa fa-file-text"></i> Manajemen Informasi <span class="fa fa-chevron-down"></span></a>



                                    <ul class="nav child_menu" style="display: none">



                                        <li><a href="<?php echo base_url('admin/informasi/semua');?>"><i class="fa fa-file-text "></i> Semua Informasi </a></li>



                                        <li><a href="<?php echo base_url('admin/informasi/berita');?>"><i class="fa fa-newspaper-o"></i> Berita </a></li>



                                        <li><a href="<?php echo base_url('admin/informasi/pengumuman');?>"><i class="fa fa-bullhorn "></i> Pengumuman </a></li>



                                        <li><a href="<?php echo base_url('admin/dokumen');?>"><i class="fa fa-file "></i> Dokumen </a></li>

                                        <li><a href="<?php echo base_url('admin/dokumen_ppdb');?>"><i class="fa fa-file "></i> Dokumen PPDB </a></li>

                                        <li><a href="<?php echo base_url('admin/jadwal');?>"><i class="fa fa-calendar "></i> Jadwal Ujian </a></li>

                                    </ul>



                                </li>



                                <li><a><i class="fa fa-file-text"></i> Calon Siswa <span class="fa fa-chevron-down"></span></a>



                                    <ul class="nav child_menu" style="display: none">



                                        <li><a href="<?php echo base_url('admin/calon_siswa/semua');?>"><i class="fa fa-users"></i> Daftar Calon Siswa </a></li>



                                        <li><a href="<?php echo base_url('admin/validasi_pembayaran');?>"><i class="fa fa-money"></i> Validasi Pembayaran </a></li>



                                    </ul>



                                </li>



                                <li><a href="<?php echo base_url('admin/user');?>"><i class="fa fa-user"></i> Pengaturan User </a></li>



                            </ul>



                        </div>



                    </div>



                    <!-- /sidebar menu -->



                    <div class="sidebar-footer hidden-small">



                        <a href="<?php echo base_url('login/logout');?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout" style="width:100%">



                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>



                        </a>



                    </div>



                </div>



            </div>



            <!-- top navigation -->



            <div class="top_nav">



                <div class="nav_menu">



                    <nav class="" role="navigation">



                        <div class="nav toggle">



                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>



                        </div>



                        <ul class="nav navbar-nav navbar-right">



                            <li class="">



                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">



                                    <!-- <img src="<?php //echo base_url('assets/backend/images/logo.jpg');?>" alt=""> --><i class="fa fa-user fa-fw"></i> 

                                    <?php echo $this->session->userdata('nama');?> <span class=" fa fa-angle-down"></span>



                                </a>



                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="<?php echo base_url('home');?>" target="_blank"><i class="fa fa-globe pull-right"></i> Go to Website</a></li>



                                    <li><a href="<?php echo base_url('login/logout');?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>



                                    </li>



                                </ul>



                            </li>



                        </ul>



                    </nav>



                </div>



            </div>



            <!-- /top navigation -->



            <!-- page content -->



            <div class="right_col" role="main">



                <?php $this->load->view($isi); ?>



                <!-- footer content -->



                <footer>



                    <div class="">



                        <p class="pull-right"> 2015 &copy; Rumah AITI</p>



                    </div>



                    <div class="clearfix"></div>



                </footer>



                <!-- /footer content -->



            </div>



            <!-- /page content -->



        </div>



    </div>



    <div id="custom_notifications" class="custom-notifications dsp_none">



        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group"></ul>



        <div class="clearfix"></div>



        <div id="notif-group" class="tabbed_notifications"></div>



    </div>



    <script src="<?php echo base_url('assets/backend/js/bootstrap.min.js');?>"></script>



    <script src="<?php echo base_url('assets/backend/js/bootstrap-fileupload.min.js');?>"></script>



    <script src="<?php echo base_url('assets/backend/js/custom.js');?>"></script>







    <script src="<?php echo base_url('assets/backend/js/tinymce/tinymce.min.js');?>"></script>



    <script type="text/javascript">



     



    tinymce.init({



      selector: ".mytextarea",



      height:263,



      plugins: [



        "advlist autolink lists jbimages link charmap print preview anchor",



        "searchreplace visualblocks code fullscreen",



        "insertdatetime media table contextmenu paste emoticons"



      ],



      toolbar: "insertfile undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link jbimages media | print preview fullscreen | forecolor backcolor emoticons",



      relative_urls: false



        



    });



     



    </script>

</body>



</html>