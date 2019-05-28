<div class="">



    <div class="clearfix"></div>



    <div class="row">



        <div class="col-md-12 col-sm-12 col-xs-12">



            <div class="x_panel">



                <div class="x_title">



                    <h2><?php echo $title;?></h2>



                    <ul class="nav navbar-right panel_toolbox">



                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>



                        <li><a class="close-link"><i class="fa fa-close"></i></a> </li>



                    </ul>



                    <div class="clearfix"></div>



                </div>



                <div class="x_content">



                    <?=$this->session->flashdata('notif')?>



                        <div class="col-md-3">



                            <form method="POST" action="<?php echo base_url('admin/validasi_pembayaran_cari/');?>">



                                <div class="input-group m-bot15">



                                    <input type="text" name="cari" class="form-control" placeholder="Cari No.Reg / Nama" autocomplete="off"> 



                                    <span class="input-group-btn">



                                        <input type="submit" name="submit" class="btn btn-default" value="Cari">



                                    </span> 



                                </div>



                            </form>



                        </div>                        



                        <div class="col-md-3"> </div>



                        <div class="col-md-3" style="text-align:right">



                            <?php print $halaman;?> </div>



                        <div class="col-lg-12">



                            <div class="table-responsive lowermost">



                                <table class="table table-stripped">



                                    <thead>



                                        <tr>



                                            <th align="center" style="width:10px">NO</th>



                                            <th align="center" style="width:10px">FOTO</th>



                                            <th>NO. REG / NAMA</th>



                                            <th style="width:10px;text-align:center;">JK</th>



                                            <th style="text-align:center;width:120px;">TTL</th>



                                            <th style="width:150px;text-align: center;">NAMA AYAH / IBU</th>



                                            <th style="width:200px;text-align: center;">ASAL SEKOLAH</th>



                                            <th style="width:120px;text-align: center;">FILE UPLOAD</th>



                                            <th style="width:130px;text-align: center;">AKSI</th>



                                        </tr>



                                    </thead>



                                    <tbody>



                                        <?php if(empty($data)) { ?>



                                        <tr>



                                            <td colspan='9' style='text-align:center;color:red'><b>Tidak ada data !</b> </td>



                                        </tr>



                                        <?php } $no=$norut+1; foreach ($data as $data) { ?>



                                        <tr>



                                            <td align="center">



                                                <?php echo $no++;?> </td>



                                            <td>



                                                <?php echo '<img src="'.base_url(). 'assets/frontend/uploads/foto/'.$data[ 'foto']. '" width="60px" height="70px">'; ?> </td>



                                            <td>



                                                <?php echo $data[ 'no_registrasi']. '<br>'.$data[ 'nama'];?> </td>



                                            <td>



                                                <?php echo $data[ 'jenis_kelamin'];?> </td>



                                            <td>



                                                <?php echo $data[ 'tempat_lahir']. '<br>'.$data[ 'tanggal_lahir'];?> </td>



                                            <td>



                                                <?php echo $data[ 'nama_ayah']. '<br>'.$data[ 'nama_ibu'];?> </td>



                                            <td>



                                                <?php echo $data[ 'asal_sekolah'];?> </td>



                                            <td>

                                                <?php 

                                                if(!empty($data[ 'akta_lahir'])) { echo '<a href="javascript:;" data-tampil_file="'.base_url(). 'assets/frontend/uploads/akta_lahir/'.$data[ 'akta_lahir']. '" data-toggle="modal" data-target="#tampil-file"><i class="fa fa-check-circle fa-fw"></i>Akta Lahir</a><br>'; } 

                                                else{

                                                    echo '<a href="" data-toggle="modal" data-target="#no-data" style="color:red"><i class="fa fa-check-circle fa-fw"></i>Akta Lahir</a><br>';

                                                }

                                                if(!empty($data[ 'ktp_ortu'])) { echo '<a href="javascript:;" data-tampil_file="'.base_url(). 'assets/frontend/uploads/ktp_ortu/'.$data[ 'ktp_ortu']. '" data-toggle="modal" data-target="#tampil-file"><i class="fa fa-check-circle fa-fw"></i>KTP Ortu</a><br>'; }

                                                else{

                                                    echo '<a href="" data-toggle="modal" data-target="#no-data" style="color:red"><i class="fa fa-check-circle fa-fw"></i>KTP Ortu</a><br>';

                                                }

                                                if(!empty($data[ 'kartu_keluarga'])) { echo '<a href="javascript:;" data-tampil_file="'.base_url(). 'assets/frontend/uploads/kartu_keluarga/'.$data['kartu_keluarga']. '" data-toggle="modal" data-target="#tampil-file"><i class="fa fa-check-circle fa-fw"></i>Kartu Keluarga</a><br>'; } 

                                                else{

                                                    echo '<a href="" data-toggle="modal" data-target="#no-data" style="color:red"><i class="fa fa-check-circle fa-fw"></i>Kartu Keluarga</a><br>';

                                                }

                                                if(!empty($data[ 'bukti_bayar'])) { echo '<a href="javascript:;" data-tampil_file="'.base_url(). 'assets/frontend/uploads/bukti_bayar/'.$data[ 'bukti_bayar']. '" data-toggle="modal" data-target="#tampil-file"><i class="fa fa-check-circle fa-fw"></i>Bukti Bayar</a><br>'; } 

                                                else{

                                                    echo '<a href="" data-toggle="modal" data-target="#no-data" style="color:red"><i class="fa fa-check-circle fa-fw"></i>Bukti Bayar</a><br>';

                                                }                                                

                                               $dok_1 = $data['dok_1'];

                                                $dok_2 = $data['dok_2'];

                                                $dok_3 = $data['dok_3'];

                                                $dok_4 = $data['dok_4'];

                                                $dok_5 = $data['dok_5'];

                                                $dok_6 = $data['dok_6'];

                                                $dok_7 = $data['dok_7'];

                                                $dok_8 = $data['dok_8'];

                                                

                                                if(!empty($dok_1) && !empty($dok_2) && !empty($dok_3) && !empty($dok_4) && !empty($dok_5) && !empty($dok_6) && !empty($dok_7) && !empty($dok_8)) { echo '<a href="'.base_url().'admin/formulir_ppdb/'.$data['no_registrasi'].'" target="_blank"><i class="fa fa-check-circle fa-fw"></i>Formulir Pendaftaran</a><br>'; }

                                                else{

                                                    echo '<a href="" data-toggle="modal" data-target="#no-data" style="color:red"><i class="fa fa-check-circle fa-fw"></i>Formulir Pendaftaran</a><br>';

                                                }

                                                 ?>

                                             </td>



                                            <td style="text-align:center; vertical-align:middle">


                                                <?php if($data['final']=="0") {$pesan='Data Belum Difinalisasi Oleh Calon Siswa. Apakah Tetap Akan Divalidasi ?';} else {$pesan='Apakah Yakin akan melakukan validasi ?';} ?>
                                                <?php if (!empty($data['bukti_bayar'])) { echo 'Pembayaran<br>'. date( "d-M-Y",strtotime($data[ 'tanggal_bayar'])); ?>



                                                <div style="text-align:center">

                                                   <a href="javascript:;" data-no_registrasi="<?php echo $data['no_registrasi'] ?>" data-pesan="<?php echo $pesan; ?>" class="menu-ico" data-toggle="modal" data-target="#validasi">
                                                        <div class="btn btn-info"> <i class="fa fa-check-square"></i> Validasi</div>
                                                    </a>



                                                </div>



                                                <?php } else { echo '<div style="color:red"><i>Calon Siwa Belum Mengunggah Bukti Pembayaran</i></div>'; } ?> </td>



                                        </tr>



                                        <?php } ?> </tbody>



                                </table>



                                <div style="text-align:right">



                                    <?php print $halaman;?> </div>



                            </div>



                        </div>



                </div>



            </div>



        </div>



    </div>



</div>



<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tampil-file" class="modal fade">



    <div class="modal-dialog" style="wiidth:40%">



        <div class="modal-content">



            <div class="modal-header">



                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>



                <h4 class="modal-title">DATA UPLOAD</h4> </div>



            <div class="modal-body" style="text-align:center">



                <div id="badan"> <img src="" class="" id="tampil_file" style="width:100%;"> </div>



            </div>



            <div class="modal-footer">



                <!-- <a target="_blank" href=""> -->



                    <button type="button" class="btn btn-info" data-dismiss="modal"><i class="fa fa-external-link fa-fw"></i> Batal</button>



            </div>



        </div>



    </div>



</div>

<!-- modal -->

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="no-data" class="modal fade">



    <div class="modal-dialog" style="width:40%;">



        <div class="modal-content">



            <div class="modal-header">



                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>



                <h4 class="modal-title">PEMBERITAHUAN</h4> </div>



            <div class="modal-body" style="text-align:center">



                <div id="badan" style="color:red;font-weight:bold"> Berkas belum di upload oleh calon siswa </div>



            </div>



            <div class="modal-footer">



                <!-- <a target="_blank" href=""> -->



                    <button type="button" class="btn btn-info" data-dismiss="modal"><i class="fa fa-external-link fa-fw"></i> Batal</button>



<!--                 </a> -->



            </div>



        </div>



    </div>



</div>

<!-- Modal -->
<div class="modal fade" id="validasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="form-horizontal">            
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>          
          <h4 class="modal-title" id="myModalLabel">Validasi</h4> </div>
        <div class="modal-body">
          <form action="<?php echo base_url().'admin/validasi_pembayaran_ubah' ?>" method="post">
            <input type="hidden" name="no_registrasi" id="no_registrasi" class="form-control">            
            <label id="pesan" style="color:red;text-align:center"></label>
        </div>        
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">YA</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">TIDAK</button>
        </div>
      </div>
    </form>    
    </div>
  </div>
</div>

<script>



    $(document).ready(function() {



        // Untuk sunting



        $('#tampil-file').on('show.bs.modal', function(event) {



            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan



            var modal = $(this)



                // Isi nilai pada field



            modal.find('#tampil_file').attr("src", div.data('tampil_file'));



        });



    });

</script>

<script>
    $(document).ready(function() {
        // Untuk sunting
        $('#validasi').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal         = $(this)

            // Isi nilai pada field
            modal.find('#no_registrasi').attr("value",div.data('no_registrasi'));
            modal.find('#pesan').html(div.data('pesan'));
        });
    });
</script>




