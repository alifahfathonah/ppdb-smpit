<!DOCTYPE html>
<html lang="en">
<head>

    <meta content='text/html; charset=UTF-8' http-equiv='Content-Type' />

    <title>SMP IT Bengkulu</title>

    <meta name="author" content="Rumah AITI">

    <meta name="description" content="">

    <meta name="keyword" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="shortcut icon" href="<?php echo base_url('assets/backend/images/logo_aiti.png');?>" type="image/png">

    <!-- Bootstrap Core CSS -->

    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/bootstrap.min.css'); ?>" type="text/css">

    <!-- Custom Fonts -->

    <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'> -->

    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/font-awesome/css/font-awesome.min.css'); ?>" type="text/css">

    <!-- Plugin CSS -->

    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/animate.min.css'); ?>" type="text/css">

    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/jquery-ui.css'); ?>" type="text/css">

    <!-- Custom CSS -->

    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/creative.css'); ?>" type="text/css">

    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/bootstrap-fileupload.min.css'); ?>" type="text/css">    

    <style>    
    .prog{ position:relative; width:400px; border: 1px solid #ddd; padding: 1px; border-radius: 3px; }
    .bar { background-color: #B4F5B4; width:0%; height:20px; border-radius: 3px; }
    .percent { text-align: center; font-weight: bold; }
    .hide{display:none;}
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>    <![endif]-->

</head>



<body>

    <div class="container">

        <div class="row">

            <div class="form-horizontal">

                <?php $fn=$data[0]['final']; $dis=""; if($fn==1){ $dis="disabled";echo "<center><h2 class='login-title' style='color:red'> Data Anda Telah Tersimpan Secara Permanen</h2></center>"; }else{ echo "<center><h2 class='login-title'> Silahkan Cek Data Anda dan Lakukan Finalisasi</h2><br><small><b>Catatan : Data harus DIFINALISASI. Jika data tidak DIFINALISASI data anda tidak akan diproses.</small></b></center>"; } ?>

                <?php $st=$data[0]['status']; $vis=""; $vis1="display:none"; 

                	if ($st==3) {

                		$vis="display:none"; $vis1="";

                	}

                ?>                                

                <?php echo $this->session->flashdata('notif') ?>

                <div class="modal-body">

                    <?php echo form_open_multipart( 'calon_siswa/do_daftar_update'); ?>

                    <div class="form-group">

                        <label class="col-lg-3 col-sm-3 control-label">Nomor Registrasi</label>

                        <div class="col-lg-9">

                            <input type="hidden" name="no_reg" value="<?php echo $data[0]['no_registrasi'] ?>">

                            <input type="text" class="form-control" value="<?php echo $data[0]['no_registrasi'] ?>" disabled> </div>

                    </div>

                    <div class="form-group">

                        <label class="col-lg-3 col-sm-3 control-label">Nama</label>

                        <div class="col-lg-9">

                            <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $data[0]['nama'] ?>" <?php echo $dis ?>> </div>

                    </div>

                    <div class="form-group">

                        <label class="col-lg-3 col-sm-3 control-label">Tempat Lahir</label>

                        <div class="col-lg-9">

                            <input type="text" name="tmpt_lhr" class="form-control" placeholder="Tempat Lahir" value="<?php echo $data[0]['tempat_lahir'] ?>" <?php echo $dis ?>> </div>

                    </div>

                    <div class="form-group">

                        <label class="col-lg-3 col-sm-3 control-label">Tanggal Lahir</label>

                        <div class="col-lg-9">

                            <input type="text" name="tgl_lhr" class="form-control tanggal" placeholder="Tanggal Lahir" value="<?php echo $data[0]['tanggal_lahir'] ?>" <?php echo $dis ?> readonly> </div>

                    </div>

                    <div class="form-group">

                        <label class="col-lg-3 col-sm-3 control-label">Jenis Kelamin</label>

                        <div class="col-lg-9">

                            <input type="radio" name="jk" value="L" <?php if($data[0][ 'jenis_kelamin']=='L' ){echo 'checked';}?>

                            <?php echo $dis ?>> Laki-laki

                            <input type="radio" name="jk" value="P" <?php if($data[0][ 'jenis_kelamin']=='P' ){echo 'checked';}?>

                            <?php echo $dis ?>> Perempuan </div>

                    </div>

                    <div class="form-group">

                        <label class="col-lg-3 col-sm-3 control-label">Alamat</label>

                        <div class="col-lg-9">

                            <textarea class="form-control" name="almt_rmh" <?php echo $dis ?>><?php echo $data[0][ 'alamat_rumah'] ?>

                            </textarea>

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="col-lg-3 col-sm-3 control-label">Asal Sekolah</label>

                        <div class="col-lg-9">

                            <input type="text" name="asal_sklh" class="form-control" placeholder="Asal Sekolah" value="<?php echo $data[0]['asal_sekolah'] ?>" <?php echo $dis ?>> </div>

                    </div>

                    <div class="form-group">

                        <label class="col-lg-3 col-sm-3 control-label">Nama Ayah</label>

                        <div class="col-lg-9">

                            <input type="text" name="nm_ayah" class="form-control" placeholder="Nama Ayah" value="<?php echo $data[0]['nama_ayah'] ?>" <?php echo $dis ?>> </div>

                    </div>

                    <div class="form-group">

                        <label class="col-lg-3 col-sm-3 control-label">Nama Ibu</label>

                        <div class="col-lg-9">

                            <input type="text" name="nm_ibu" class="form-control" placeholder="Nama Ibu" value="<?php echo $data[0]['nama_ibu'] ?>" <?php echo $dis ?>> </div>

                    </div>

                    <div class="modal-footer">

                        <div style="text-align:left;position:absolute">

                            <a href="<?php echo base_url().'calon_siswa/ppdb' ?>" class="btn btn-primary"><i class="fa fa-arrow-left fa-fw"></i><b>Kembali</b>

                    </a>

                        </div>

                        <a href="<?php echo base_url() ?>" class="btn btn-primary"><i class="fa fa-home fa-fw"></i><b>Home</b></a>



                        <a href="" data-toggle="modal" data-target="#berkas_siswa" class="btn btn-primary" style="<?php echo $vis; ?>"><i class="fa fa-check-square-o fa-fw"></i><b>Cek Berkas Siswa</b></a>



                        <a data-toggle="modal" data-target="#upload_bukti" class="btn btn-primary" style="<?php echo $vis; ?>"><i class="fa fa-upload fa-fw"></i><b>Upload Bukti Pembayaran</b></a>



                        <a href="" data-toggle="modal" data-target="#upload_dokumen" class="btn btn-primary" style="<?php echo $vis1; ?>"><i class="fa fa-upload fa-fw"></i><b>Upload Dokumen PPDB</b></a>



                        <button type="submit" class="btn btn-primary" <?php echo $dis ?> style="<?php echo $vis; ?>" onclick="return confirm('Apakah Anda Yakin Data yang diisi SUDAH BENAR ? Jika Sudah DIFINALISASI, Data tidak bisa diubah lagi')"><i class="fa fa-spinner fa-fw"></i><b>Finalisasi</b>

                        </button>

                    </div>

                </div>

                <?php echo form_close(); ?> </div>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="upload_bukti" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="form-horizontal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Upload Bukti Pembayaran</h4> </div>
                        <div class="modal-body">                            
                            <form id="uploadBukti" action="<?php echo base_url().'calon_siswa/do_konfirm_bayar'; ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="no_reg" value="<?php echo $data[0]['no_registrasi'] ?>">
                            <div class="form-group">
                                <label class="col-lg-3 col-sm-3 control-label">Nama Pembayar</label>
                                <div class="col-lg-9">
                                    <input type="text" name="nm_pmbyr" class="form-control" placeholder="Nama Pembayar Pendaftaran" value="<?php echo $data[0]['nama_pembayar'] ?>" required> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 col-sm-3 control-label">Tanggal Bayar</label>
                                <div class="col-lg-9">
                                    <input type="text" name="tgl_byr" class="form-control tanggal" placeholder="Tanggal Lahir" value="<?php echo $data[0]['tanggal_bayar'] ?>" required readonly> </div>
                            </div>
                            <div class="form-group ">
                                <label for="avatar" class="control-label col-lg-3">Bukti Pembayaran</label>
                                <div class="col-lg-9">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width:100%;height:200px; padding:10px">
                                            <?php if (empty($data[0][ 'bukti_bayar'])) { echo "Tidak ada file dipilih"; } else { ?>
                                            <img src="<?php echo base_url().'assets/frontend/uploads/bukti_bayar/'.$data[0]['bukti_bayar'] ?>">
                                            <?php } ?>
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="width:100%;height:200px;"></div>
                                        <span class="btn btn-default btn-file" style="left: 5px;">                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i>Pilih File</span> <span class="fileupload-exists">Ubah</span>
                                        <input type="file" class="default" name="bkt_pmbyrn"> </span>
                                        <span>                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i>&nbsp;Hapus&nbsp;</a>                    </span> </div>
                                    <span class="label label-danger ">EXT : JPG | PNG | JPEG | BMP</span>
                                    <span>                    &nbsp;besar file ≤ 1MB                </span>          
                                </div>                                
                            </div>                            
                            <!-- Progress bar -->
                              <div class="panel-body">
                                <div class="form-group">
                                  <div class="percent" id="percent1">0%</div>
                                  <div class="progress">
                                    <progress id="progress1" max="100" value="0" class="hide"></progress>              
                                    <div class="bar" id="bar1"></div>            
                                  </div>            
                                  <div id="pesan1"></div>
                              </div>
                              </div>
                            <!-- Progress bar -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times fa-fw"></i> Tutup</button>
                                <input type="submit" name="konfirmasi" value="Konfirmasi" class="btn btn-primary" <?php echo $dis ?>><!-- <i class="fa fa-floppy-o fa-fw"></i> Konfirmasi</button> -->
                            </div>
                        </div>
                        </form> 
                    </div>                        
                </div>
            </div>
        </div>
        <!-- Modal -->

        <!-- Modal -->

        <div class="modal fade" id="berkas_siswa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

            <div class="modal-dialog" role="document">

                <div class="form-horizontal">
                    <form id="uploadBerkas" action="<?php echo base_url().'calon_siswa/do_berkas_update'; ?>" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="no_reg" value="<?php echo $data[0]['no_registrasi'] ?>">

                    <div class="modal-content">

                        <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>

                            </button>

                            <h4 class="modal-title" id="myModalLabel">Cek Berkas Siswa</h4> </div>

                        <div class="modal-body">                           

                            <div class="form-group ">

                                <label for="avatar" class="control-label col-lg-3">Foto</label>

                                <div class="col-lg-9">

                                    <div class="fileupload fileupload-new" data-provides="fileupload">

                                        <div class="fileupload-new thumbnail" style="width:100%;height:200px; padding:10px">

                                            <?php if (empty($data[0][ 'foto'])) { echo "Tidak ada file dipilih"; } else { ?>

                                            <img src="<?php echo base_url().'assets/frontend/uploads/foto/'.$data[0]['foto'] ?>">

                                            <?php } ?>

                                        </div>

                                        <div class="fileupload-preview fileupload-exists thumbnail" style="width:100%;height:200px;"></div>

                                        <span class="btn btn-default btn-file" style="left: 5px;">                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i>Pilih File</span> <span class="fileupload-exists">Ubah</span>

                                        <input type="file" class="default" name="foto"> </span>

                                        <span>                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i>&nbsp;Hapus&nbsp;</a>                        </span> </div>

                                    <span class="label label-danger ">EXT : JPG | PNG | JPEG | BMP</span>

                                    <span>                        &nbsp;besar file ≤ 1MB                    </span> </div>

                            </div>

                            <div class="form-group ">

                                <label for="avatar" class="control-label col-lg-3">KTP Orang Tua</label>

                                <div class="col-lg-9">

                                    <div class="fileupload fileupload-new" data-provides="fileupload">

                                        <div class="fileupload-new thumbnail" style="width:100%; height:200px; padding:10px">

                                            <?php if (empty($data[0][ 'ktp_ortu'])) { echo "Tidak ada file dipilih"; } else { ?>

                                            <img src="<?php echo base_url().'assets/frontend/uploads/ktp_ortu/'.$data[0]['ktp_ortu'] ?>">

                                            <?php } ?>

                                        </div>

                                        <div class="fileupload-preview fileupload-exists thumbnail" style="width:100%;height:200px;"></div>

                                        <span class="btn btn-default btn-file" style="left: 5px;">

                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i>Pilih File</span>

                                        <span class="fileupload-exists">Ubah</span>

                                        <input type="file" class="default" name="ktp_ortu" /> </span>

                                        <span>                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i>&nbsp;Hapus&nbsp;</a>                        </span> </div>

                                    <span class="label label-danger ">EXT : JPG | PNG | JPEG | BMP</span> <span>                        &nbsp;besar file ≤ 1MB                    </span> </div>

                            </div>

                            <div class="form-group ">

                                <label for="avatar" class="control-label col-lg-3">Kartu Keluarga</label>

                                <div class="col-lg-9">

                                    <div class="fileupload fileupload-new" data-provides="fileupload">

                                        <div class="fileupload-new thumbnail" style="width:100%; height:200px; padding:10px">

                                            <?php if (empty($data[0][ 'kartu_keluarga'])) { echo "Tidak ada file dipilih"; } else { ?>

                                            <img src="<?php echo base_url().'assets/frontend/uploads/kartu_keluarga/'.$data[0]['kartu_keluarga'] ?>">

                                            <?php } ?>

                                        </div>

                                        <div class="fileupload-preview fileupload-exists thumbnail" style="width:100%;height:200px;"></div>

                                        <span class="btn btn-default btn-file" style="left: 5px;">

                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i>Pilih File</span>

                                        <span class="fileupload-exists">Ubah</span>

                                        <input type="file" class="default" name="kk" /> </span>

                                        <span>                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i>&nbsp;Hapus&nbsp;</a>                        </span> </div>

                                    <span class="label label-danger ">EXT : JPG | PNG | JPEG | BMP</span> <span>                        &nbsp;besar file ≤ 1MB                    </span> </div>

                            </div>

                            <div class="form-group ">

                                <label for="avatar" class="control-label col-lg-3">AKTA Kelahiran</label>

                                <div class="col-lg-9">

                                    <div class="fileupload fileupload-new" data-provides="fileupload">

                                        <div class="fileupload-new thumbnail" style="width:100%;height:200px; padding:10px">

                                            <?php if (empty($data[0][ 'akta_lahir'])) { echo "Tidak ada file dipilih"; } else { ?>

                                            <img src="<?php echo base_url().'assets/frontend/uploads/akta_lahir/'.$data[0]['akta_lahir'] ?>">

                                            <?php } ?>

                                        </div>

                                        <div class="fileupload-preview fileupload-exists thumbnail" style="width:100%;height:200px;"></div>

                                        <span class="btn btn-default btn-file" style="left: 5px;">

                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i>Pilih File</span>

                                        <span class="fileupload-exists">Ubah</span>

                                        <input type="file" class="default" name="akta_lhr" /> </span>

                                        <span>                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i>&nbsp;Hapus&nbsp;</a>                        </span> </div>

                                    <span class="label label-danger ">EXT : JPG | PNG | JPEG | BMP</span> <span>                        &nbsp;besar file ≤ 1MB                    </span> </div>

                            </div>
                            <!-- Progress bar -->
                              <div class="panel-body">
                                <div class="form-group">
                                  <div class="percent" id="percent2">0%</div>
                                  <div class="progress">
                                    <progress id="progress2" max="100" value="0" class="hide"></progress>              
                                    <div class="bar" id="bar2"></div>            
                                  </div>            
                                  <div id="pesan2"></div>
                              </div>
                              </div>
                            <!-- Progress bar -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times fa-fw"></i> Tutup</button>
                            <input type="submit" name="berkas" value='Simpan' class="btn btn-primary" <?php echo $dis; ?>>

                        </div>

                    </div>

                    </form>
                </div>

            </div>

        </div>

        <!-- Modal -->

        <div class="modal fade" id="upload_dokumen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

            <div class="modal-dialog modal-lg" role="document">

                <div class="form-horizontal">
                    <form id="uploadPPDB" action="<?php echo base_url().'calon_siswa/do_dokumen_upload'; ?>" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="no_reg" value="<?php echo $data[0]['no_registrasi'] ?>">

                    <div class="modal-content">

                        <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>

                            </button>

                            <h4 class="modal-title" id="myModalLabel">Unggah Dokumen PPDB</h4> </div>

                        <div class="modal-body">                         

                            <div class="form-group ">

                                <label for="avatar" class="control-label col-lg-3">Lembar Kendali Kelengkapan Persyaratan</label>

                                <div class="col-lg-9">

                                    <div class="fileupload fileupload-new" data-provides="fileupload">

                                        <div class="fileupload-new thumbnail" style="width:100%; height:200px; padding:10px">

                                            <?php if (empty($data[0][ 'dok_1'])) { echo "Tidak ada file dipilih"; } else { ?>

                                            <img src="<?php echo base_url().'assets/frontend/uploads/dokumen_ppdb/'.$data[0]['dok_1'] ?>">

                                            <?php } ?>

                                        </div>

                                        <div class="fileupload-preview fileupload-exists thumbnail" style="width:100%;height:200px;"></div>

                                        <span class="btn btn-default btn-file" style="left: 5px;">                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i>Pilih File</span> <span class="fileupload-exists">Ubah</span>

                                        <input type="file" class="default" name="dok_1"> </span>

                                        <span>                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i>&nbsp;Hapus&nbsp;</a>                        </span> </div>

                                    <span class="label label-danger ">EXT : JPG | PNG | JPEG | BMP</span>

                                    <span>                        &nbsp;besar file ≤ 1MB                    </span> </div>

                            </div>



                            <div class="form-group ">

                                <label for="avatar" class="control-label col-lg-3">Surat Permohonan Mengikuti PPDB</label>

                                <div class="col-lg-9">

                                    <div class="fileupload fileupload-new" data-provides="fileupload">

                                        <div class="fileupload-new thumbnail" style="width:100%; height:200px; padding:10px">

                                            <?php if (empty($data[0][ 'dok_2'])) { echo "Tidak ada file dipilih"; } else { ?>

                                            <img src="<?php echo base_url().'assets/frontend/uploads/dokumen_ppdb/'.$data[0]['dok_2'] ?>">

                                            <?php } ?>

                                        </div>

                                        <div class="fileupload-preview fileupload-exists thumbnail" style="width:100%;height:200px;"></div>

                                        <span class="btn btn-default btn-file" style="left: 5px;">

                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i>Pilih File</span>

                                        <span class="fileupload-exists">Ubah</span>

                                        <input type="file" class="default" name="dok_2" /> </span>

                                        <span>                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i>&nbsp;Hapus&nbsp;</a>                        </span> </div>

                                    <span class="label label-danger ">EXT : JPG | PNG | JPEG | BMP</span> <span>                        &nbsp;besar file ≤ 1MB                    </span> </div>

                            </div>



                            <div class="form-group ">

                                <label for="avatar" class="control-label col-lg-3">Biodata Siswa Baru Lbr.1</label>

                                <div class="col-lg-9">

                                    <div class="fileupload fileupload-new" data-provides="fileupload">

                                        <div class="fileupload-new thumbnail" style="width:100%; height:200px; padding:10px">

                                            <?php if (empty($data[0][ 'dok_3'])) { echo "Tidak ada file dipilih"; } else { ?>

                                            <img src="<?php echo base_url().'assets/frontend/uploads/dokumen_ppdb/'.$data[0]['dok_3'] ?>">

                                            <?php } ?>

                                        </div>

                                        <div class="fileupload-preview fileupload-exists thumbnail" style="width:100%;height:200px;"></div>

                                        <span class="btn btn-default btn-file" style="left: 5px;">

                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i>Pilih File</span>

                                        <span class="fileupload-exists">Ubah</span>

                                        <input type="file" class="default" name="dok_3" /> </span>

                                        <span>                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i>&nbsp;Hapus&nbsp;</a>                        </span> </div>

                                    <span class="label label-danger ">EXT : JPG | PNG | JPEG | BMP</span> <span>                        &nbsp;besar file ≤ 1MB                    </span> </div>

                            </div>



                            <div class="form-group ">

                                <label for="avatar" class="control-label col-lg-3">Biodata Siswa Baru Lbr.2</label>

                                <div class="col-lg-9">

                                    <div class="fileupload fileupload-new" data-provides="fileupload">

                                        <div class="fileupload-new thumbnail" style="width:100%; height:200px; padding:10px">

                                            <?php if (empty($data[0][ 'dok_4'])) { echo "Tidak ada file dipilih"; } else { ?>

                                            <img src="<?php echo base_url().'assets/frontend/uploads/dokumen_ppdb/'.$data[0]['dok_4'] ?>">

                                            <?php } ?>

                                        </div>

                                        <div class="fileupload-preview fileupload-exists thumbnail" style="width:100%;height:200px;"></div>

                                        <span class="btn btn-default btn-file" style="left: 5px;">

                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i>Pilih File</span>

                                        <span class="fileupload-exists">Ubah</span>

                                        <input type="file" class="default" name="dok_4" /> </span>

                                        <span>                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i>&nbsp;Hapus&nbsp;</a>                        </span> </div>

                                    <span class="label label-danger ">EXT : JPG | PNG | JPEG | BMP</span> <span>                        &nbsp;besar file ≤ 1MB                    </span> </div>

                            </div>



                             <div class="form-group ">

                                <label for="avatar" class="control-label col-lg-3">Blangko Daftar Prestasi</label>

                                <div class="col-lg-9">

                                    <div class="fileupload fileupload-new" data-provides="fileupload">

                                        <div class="fileupload-new thumbnail" style="width:100%; height:200px; padding:10px">

                                            <?php if (empty($data[0][ 'dok_5'])) { echo "Tidak ada file dipilih"; } else { ?>

                                            <img src="<?php echo base_url().'assets/frontend/uploads/dokumen_ppdb/'.$data[0]['dok_5'] ?>">

                                            <?php } ?>

                                        </div>

                                        <div class="fileupload-preview fileupload-exists thumbnail" style="width:100%;height:200px;"></div>

                                        <span class="btn btn-default btn-file" style="left: 5px;">

                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i>Pilih File</span>

                                        <span class="fileupload-exists">Ubah</span>

                                        <input type="file" class="default" name="dok_5" /> </span>

                                        <span>                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i>&nbsp;Hapus&nbsp;</a>                        </span> </div>

                                    <span class="label label-danger ">EXT : JPG | PNG | JPEG | BMP</span> <span>                        &nbsp;besar file ≤ 1MB                    </span> </div>

                            </div>



                            <div class="form-group ">

                                <label for="avatar" class="control-label col-lg-3">Tentang Latar Belakang</label>

                                <div class="col-lg-9">

                                    <div class="fileupload fileupload-new" data-provides="fileupload">

                                        <div class="fileupload-new thumbnail" style="width:100%; height:200px; padding:10px">

                                            <?php if (empty($data[0][ 'dok_6'])) { echo "Tidak ada file dipilih"; } else { ?>

                                            <img src="<?php echo base_url().'assets/frontend/uploads/dokumen_ppdb/'.$data[0]['dok_6'] ?>">

                                            <?php } ?>

                                        </div>

                                        <div class="fileupload-preview fileupload-exists thumbnail" style="width:100%;height:200px;"></div>

                                        <span class="btn btn-default btn-file" style="left: 5px;">

                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i>Pilih File</span>

                                        <span class="fileupload-exists">Ubah</span>

                                        <input type="file" class="default" name="dok_6" /> </span>

                                        <span>                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i>&nbsp;Hapus&nbsp;</a>                        </span> </div>

                                    <span class="label label-danger ">EXT : JPG | PNG | JPEG | BMP</span> <span>                        &nbsp;besar file ≤ 1MB                    </span> </div>

                            </div>



                            <div class="form-group ">

                                <label for="avatar" class="control-label col-lg-3">Surat Pernyataan Kesepakatan Ortu Dengan Sekolah</label>

                                <div class="col-lg-9">

                                    <div class="fileupload fileupload-new" data-provides="fileupload">

                                        <div class="fileupload-new thumbnail" style="width:100%; height:200px; padding:10px">

                                            <?php if (empty($data[0]['dok_7'])) { echo "Tidak ada file dipilih"; } else { ?>

                                            <img src="<?php echo base_url().'assets/frontend/uploads/dokumen_ppdb/'.$data[0]['dok_7'] ?>">

                                            <?php } ?>

                                        </div>

                                        <div class="fileupload-preview fileupload-exists thumbnail" style="width:100%;height:200px;"></div>

                                        <span class="btn btn-default btn-file" style="left: 5px;">

                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i>Pilih File</span>

                                        <span class="fileupload-exists">Ubah</span>

                                        <input type="file" class="default" name="dok_7" /> </span>

                                        <span>                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i>&nbsp;Hapus&nbsp;</a>                        </span> </div>

                                    <span class="label label-danger ">EXT : JPG | PNG | JPEG | BMP</span> <span>                        &nbsp;besar file ≤ 1MB                    </span> </div>

                            </div>                            



                            <div class="form-group ">

                                <label for="avatar" class="control-label col-lg-3">Surat Keterangan Dokter</label>

                                <div class="col-lg-9">

                                    <div class="fileupload fileupload-new" data-provides="fileupload">

                                        <div class="fileupload-new thumbnail" style="width:100%; height:200px; padding:10px">

                                            <?php if (empty($data[0][ 'dok_8'])) { echo "Tidak ada file dipilih"; } else { ?>

                                            <img src="<?php echo base_url().'assets/frontend/uploads/dokumen_ppdb/'.$data[0]['dok_8'] ?>">

                                            <?php } ?>

                                        </div>

                                        <div class="fileupload-preview fileupload-exists thumbnail" style="width:100%;height:200px;"></div>

                                        <span class="btn btn-default btn-file" style="left: 5px;">

                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i>Pilih File</span>

                                        <span class="fileupload-exists">Ubah</span>

                                        <input type="file" class="default" name="dok_8" /> </span>

                                        <span>                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i>&nbsp;Hapus&nbsp;</a>                        </span> </div>

                                    <span class="label label-danger ">EXT : JPG | PNG | JPEG | BMP</span> <span>                        &nbsp;besar file ≤ 1MB                    </span> </div>

                            </div>
                            <!-- Progress bar -->
                              <div class="panel-body">
                                <div class="form-group">
                                  <div class="percent" id="percent3">0%</div>
                                  <div class="progress">
                                    <progress id="progress3" max="100" value="0" class="hide"></progress>              
                                    <div class="bar" id="bar3"></div>            
                                  </div>            
                                  <div id="pesan3"></div>
                              </div>
                              </div>
                            <!-- Progress bar -->
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times fa-fw"></i> Tutup</button>

                            <input type="submit" name="berkas" value="Simpan" class="btn btn-primary">
                            <!-- <button type="submit" name="berkas" value="berkas" class="btn btn-primary" <?php //echo $dis; ?>><i class="fa fa-floppy-o fa-fw"></i> Simpan</button> -->

                        </div>

                    </div>
                </form>

                </div>

            </div>

        </div>

        <!-- jQuery -->

        <script src="<?php echo base_url('assets/frontend/js/jquery.js');?>"></script>
        <script src="<?php echo base_url('assets/frontend/js/jquery.form.min.js');?>">
        </script>
        <script src="<?php echo base_url('assets/frontend/js/progress_formulir.js');?>"></script>
        <script src="<?php echo base_url('assets/frontend/js/progress_berkas.js');?>"></script>
        <script src="<?php echo base_url('assets/frontend/js/progress_bukti.js');?>"></script>

        <!-- Bootstrap Core JavaScript -->

        <script src="<?php echo base_url('assets/frontend/js/bootstrap.min.js');?>"></script>

        <script src="<?php echo base_url('assets/frontend/js/bootstrap-fileupload.min.js');?>"></script>

        <!-- Plugin JavaScript -->

        <script src="<?php echo base_url('assets/frontend/js/jquery.easing.min.js');?>"></script>

        <script src="<?php echo base_url('assets/frontend/js/wow.min.js');?>"></script>
        <script src="<?php echo base_url('assets/frontend/js/jquery-ui.js');?>"></script>

    

         <script type="text/javascript">

           $(function() {

             $( ".tanggal" ).datepicker({

                dateFormat : "yy-mm-dd",

                yearRange: "-30",

                changeMonth: true,

                changeYear: true,

                 showButtonPanel: true

             });

           });

         </script>

</body>



</html>