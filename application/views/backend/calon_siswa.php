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



                            <form method="POST" action="<?php echo base_url('admin/calon_siswa_cari/'.$st);?>">



                                <div class="input-group m-bot15">



                                    <input type="text" name="cari" class="form-control" placeholder="Cari No.Reg / Nama" autocomplete="off"> <span class="input-group-btn">



                                    <input type="submit" name="submit" class="btn btn-default" value="Cari">



                                </span> </div>



                            </form>



                        </div>



                        <!-- <div class="col-md-3"> <span class="input-group-btn">

                            <a href="<?php //echo base_url('Admin/calon_siswa_hapus_semua'); ?>" class="btn btn-default" data-original-title="Hapus Semua" data-toggle="tooltip" type="button" style="border" onclick="return confirm('Apakah anda yakin ingin menghapus semua data calon siswa?')"><i class="fa fa-times"></i> Hapus Semua Data</a>

                        </span> </div> -->



                        <div class="col-lg-6">



                            <div class="btn-group">



                                <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button"><i class="fa fa-users"></i>



                                    <?php echo ucfirst($st); ?> <span class="caret"></span> </button>



                                <ul role="menu" class="dropdown-menu">



                                    <li><a href="<?php echo base_url().'admin/calon_siswa/semua' ?>">Semua</a> </li>



                                    <li><a href="<?php echo base_url().'admin/calon_siswa/registrasi' ?>">Registrasi</a> </li>



                                    <li><a href="<?php echo base_url().'admin/calon_siswa/pembayaran' ?>">Pembayaran</a> </li>



                                    <li><a href="<?php echo base_url().'admin/calon_siswa/validasi' ?>">Validasi</a> </li>



                                </ul>



                            </div>



                            <div class="btn-group">



                                <a target="_blank" href="<?php echo base_url().'admin/calon_siswa_cetak/'.$st?>" class="btn btn-default" data-original-title="Cetak"><i class="fa fa-print"></i> Cetak</a>



                            </div>



                            <div class="btn-group">

                                <a target="_blank" href="<?php echo base_url().'admin/formulir_ppdb_semua'?>" class="btn btn-default" data-original-title="Cetak"><i class="fa fa-print"></i> Cetak Semua Formulir PPDB</a>

                            </div>



                        </div>



                        <div class="col-md-3" style="text-align:right">



                            <?php print $halaman;?> </div>



                        <div class="col-lg-12">



                            <br/>



                            <div class="table-responsive lowermost">



                                <table class="table table-striped table-bordered">



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



                                            <th style="width:120px;text-align: center;">AKSI</th>



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



                                                <?php echo $data['tempat_lahir'].'<br>'.date("d M Y",strtotime($data['tanggal_lahir']));?> </td>



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

                                                 ?> </td>





                                            <td style="text-align:center">



                                                <?php echo '<u>Status</u> <br><b>'; if($data[ 'status']==1) { ?>



                                                <div style="color:red">Didaftarkan</div>



                                                <?php } else if ($data[ 'status']==2) { ?>



                                                <div style="color:blue">Dibayarkan</div>



                                                <?php } else if ($data[ 'status']==3) { ?>



                                                <div style="color:green">Divalidasi</div>



                                                <?php } ?> </b>



                                                <a href="javascript:;" data-no_registrasi="<?php echo $data['no_registrasi'] ?>" data-nama="<?php echo $data['nama'] ?>" data-jenis_kelamin="<?php echo $data['jenis_kelamin'] ?>" data-tempat_lahir="<?php echo $data['tempat_lahir'] ?>" data-tanggal_lahir="<?php echo date("d M Y",strtotime($data['tanggal_lahir'])) ?>" data-nama_ayah="<?php echo $data['nama_ayah'] ?>" data-nama_ibu="<?php echo $data['nama_ibu'] ?>" data-asal_sekolah="<?php echo $data['asal_sekolah'] ?>" data-akta_lahir="<?php echo $data['akta_lahir'] ?>" data-ktp_ortu="<?php echo $data['ktp_ortu'] ?>" data-kartu_keluarga="<?php echo $data['kartu_keluarga'] ?>" data-bukti_bayar="<?php echo $data['bukti_bayar'] ?>" data-toggle="modal" data-target="#edit-data">



                                                    <button class="btn btn-info tooltips" data-original-title="Ubah Data" data-toggle="tooltip" data-placement="top" title=""> <i class="fa fa-pencil"></i> </button>



                                                </a> <a type="button" class="btn btn-danger tooltips" data-original-title="Hapus Data" data-toggle="tooltip" href="<?php echo base_url().'admin/calon_siswa_hapus/'.$data['no_registrasi'].'/'.$st;?>" onclick="return confirm('Apakah anda yakin akan menghapus ini?')"><i class="fa fa-times"></i>



                                                </a> </td>



                                        </tr>



                                        <?php } ?> </tbody>



                                </table>



                                <div style="text-align:right">



                                    <?php print $halaman;?> 



                                </div>



                            </div>



                        </div>



                </div>



            </div>



        </div>



    </div>



</div>



<!-- modal -->

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tampil-file" class="modal fade">



    <div class="modal-dialog" style="width:40%;">



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



<!--                 </a> -->



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



<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data" class="modal fade">



    <div class="modal-dialog">



        <div class="modal-content">



            <form class="cmxform form-horizontal adminex-form" id="signupForm" method="POST" action="<?php echo base_url('admin/calon_siswa_tambah'); ?>" novalidate="novalidate" role="form">



                <div class="modal-header">



                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>



                    <h4 class="modal-title">Tambah Data User</h4> </div>



                <div class="modal-body">



                    <table class='table' width='100%' border='0' cellpadding='2' cellspacing='0'>



                        <tr>



                            <td>No. Registrasi</td>



                            <td>



                                <div class="form-group">



                                    <input name="no_registrasi" id="no_registrasi" type="text" class="form-control" /> </div>



                            </td>



                        </tr>



                        <tr>



                            <td>Nama Lengkap</td>



                            <td>



                                <div class="form-group">



                                    <input name="nama" id="nama" type="text" class="form-control" /> </div>



                            </td>



                        </tr>



                        <tr>



                            <td>Jenis Kelamin</td>



                            <td>



                                <div class="form-group">



                                    <select name="jenis_kelamin" id="Status" class="form-control" required>



                                        <option value="L">Laki - Laki</option>



                                        <option value="P">Perempuan</option>



                                    </select>



                                </div>



                            </td>



                        </tr>



                        <tr>



                            <td>Nama Ayah</td>



                            <td>



                                <div class="form-group">



                                    <input name="nama_ayah" id="nama_ayah" type="text" class="form-control" required/> </div>



                            </td>



                        </tr>



                        <tr>



                            <td>Nama Ibu</td>



                            <td>



                                <div class="form-group">



                                    <input name="nama_ibu" id="nama_ibu" type="text" class="form-control" required/> </div>



                            </td>



                        </tr>



                        <tr>



                            <td>Asal Sekolah</td>



                            <td>



                                <div class="form-group">



                                    <input name="asal_sekolah" id="asal_sekolah" type="text" class="form-control" required/> </div>



                            </td>



                        </tr>



                    </table>



                </div>



                <div class="modal-footer">



                    <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-minus fa-fw"></i> Batal</button>



                    <button class="btn btn-info" value="Tambah Data" type="submit"><i class="fa fa-plus fa-fw"></i> Simpan&nbsp;</button>



                </div>



            </form>



        </div>



    </div>



</div>



<!-- Modal -->



<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">



    <div class="modal-dialog">



        <div class="modal-content">



            <form method="POST" action="<?php echo base_url('admin/calon_siswa_ubah'); ?>">



                <div class="modal-header">



                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>



                    <h4 class="modal-title">Ubah Data Calon Siswa</h4> </div>



                <div class="modal-body">



                    <table class='table' width='100%' border='0' cellpadding='2' cellspacing='0'>



                        <tr>



                            <td>No. Registrasi</td>



                            <td>



                                <div class="form-group">



                                    <input name="no_registrasi" id="no_registrasi" type="text" class="form-control" readonly /> </div>



                            </td>



                        </tr>



                        <tr>



                            <td>Nama Lengkap</td>



                            <td>



                                <div class="form-group">



                                    <input name="nama" id="nama" type="text" class="form-control" /> </div>



                            </td>



                        </tr>



                        <tr>



                            <td>Jenis Kelamin</td>



                            <td>



                                <div class="form-group">



                                    <select name="jenis_kelamin" id="Status" class="form-control" required>



                                        <option value="L">Laki - Laki</option>



                                        <option value="P">Perempuan</option>



                                    </select>



                                </div>



                            </td>



                        </tr>



                        <tr>



                            <td>Tempat Lahir</td>



                            <td>



                                <div class="form-group">



                                    <input name="tempat_lahir" id="tempat_lahir" type="text" class="form-control" required/> </div>



                            </td>



                        </tr>



                        <tr>



                            <td>Tanggal Lahir</td>



                            <td>



                                <div class="form-group">



                                    <input name="tanggal_lahir" id="tanggal_lahir" type="text" class="form-control" readOnly/> </div>



                            </td>



                        </tr>



                        <tr>



                            <td>Nama Ayah</td>



                            <td>



                                <div class="form-group">



                                    <input name="nama_ayah" id="nama_ayah" type="text" class="form-control" required/> </div>



                            </td>



                        </tr>



                        <tr>



                            <td>Nama Ibu</td>



                            <td>



                                <div class="form-group">



                                    <input name="nama_ibu" id="nama_ibu" type="text" class="form-control" required/> </div>



                            </td>



                        </tr>



                        <tr>



                            <td>Asal Sekolah</td>



                            <td>



                                <div class="form-group">



                                    <input name="asal_sekolah" id="asal_sekolah" type="text" class="form-control" required/> </div>



                            </td>



                        </tr>

                        <!--

                        <tr>



                            <td>Akta Kelahiran</td>



                            <td>



                                <div class="form-group">



                                    <input name="akta_lahir" id="akta_lahir" type="text" class="form-control" required/> </div>



                            </td>



                        </tr>

                        <tr>



                            <td>KTP Orang Tua</td>



                            <td>



                                <div class="form-group">



                                    <input name="ktp_ortu" id="ktp_ortu" type="text" class="form-control" required/> </div>



                            </td>



                        </tr>



                        <tr>



                            <td>Kartu Keluarga</td>



                            <td>



                                <div class="form-group">



                                    <input name="kartu_keluarga" id="kartu_keluarga" type="text" class="form-control" required/> </div>



                            </td>



                        </tr>



                        <tr>



                            <td>Bukti Bayar</td>



                            <td>



                                <div class="form-group">



                                    <input name="bukti_bayar" id="bukti_bayar" type="text" class="form-control" required/> </div>



                            </td>



                        </tr>-->



                    </table>



                </div>



                <div class="modal-footer">



                    <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-minus fa-fw"></i> Batal</button>



                    <button class="btn btn-info" value="Ubah Data" type="submit"><i class="fa fa-plus fa-fw"></i> Simpan&nbsp;</button>



                </div>



            </form>



        </div>



    </div>



</div>



<!-- modal -->



<script>



    $(document).ready(function() {



        // Untuk sunting



        $('#edit-data').on('show.bs.modal', function(event) {



            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan



            var modal = $(this)



                // Isi nilai pada field



            modal.find('#no_registrasi').attr("value", div.data('no_registrasi'));



            modal.find('#nama').attr("value", div.data('nama'));



            modal.find('#tempat_lahir').attr("value", div.data('tempat_lahir'));



            modal.find('#tanggal_lahir').attr("value", div.data('tanggal_lahir'));



            modal.find('#jenis_kelamin').attr("value", div.data('jenis_kelamin'));



            modal.find('#asal_sekolah').attr("value", div.data('asal_sekolah'));



            modal.find('#nama_ayah').attr("value", div.data('nama_ayah'));



            modal.find('#nama_ibu').attr("value", div.data('nama_ibu'));



            modal.find('#akta_lahir').attr("value", div.data('akta_lahir'));



            modal.find('#kartu_keluarga').attr("value", div.data('kartu_keluarga'));



            modal.find('#ktp_ortu').attr("value", div.data('ktp_ortu'));



            modal.find('#bukti_bayar').attr("value", div.data('bukti_bayar'));



        });



        $('#tampil-file').on('show.bs.modal', function(event) {



            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan



            var modal = $(this)



                // Isi nilai pada field



            modal.find('#tampil_file').attr("src", div.data('tampil_file'));



        });



    });



</script>