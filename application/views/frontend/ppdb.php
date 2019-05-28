<section id="title">
  <div class="col-lg-12">
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="title-section" style="border:none">
          <h1 class="title"><b>Tahapan Pendaftaran</b></h1>
          <p>Ikuti petunjuk dibawah ini.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<center><?php echo $this->session->flashdata('notif') ?></center>
<section id="services">
  <div class="col-lg-12">
    <div class="row">
      <div class="col-lg-3 col-md-6 text-center">
        <div class="service-boxp">
          <a href="" class="menu-ico" data-toggle="modal" data-target="#daftar">
            <div class="ico-ppdb"> <i class="fa fa-4x fa-sign-in wow bounceIn"></i> </div>
          </a>
          <h3>Daftar Online</h3> <small><p>Tahap ini calon peserta dapat mendaftar secara online melalui web ini dengan mengisi form pendaftaran dan akan mendapatkan user name dan password yang akan digunakan selama proses seleksi. Klik pada gambar untuk informasi lebih lanjut.</p></small> </div>
      </div>
      <div class="col-lg-3 col-md-6 text-center">
        <div class="service-boxp">
          <a href="" class="menu-ico" data-toggle="modal" data-target="#konfirmasi">
            <div class="ico-ppdb"> <i class="fa fa-4x fa-money wow bounceIn" data-wow-delay=".1s"></i> </div>
          </a>
          <h3>Transfer</h3> <small><p>Setelah mengisi form pendaftaran, silahkan transfer biaya pendaftaran Setelah itu silahkan upload bukti transfer, maka anda akan mendapatkan nomor registrasi beserta jadwal daftar online dan test non akademik Klik pada gambar untuk informasi lebih lanjut. Nominal yang ditransfer adalah sebesar <b>Rp 300.000</b> + 3 Digit Terakhir nomor pendaftaran. <b>Rekening BNI Cabang Bengkulu No.Rek : 0247791228 a.n. Bpk. Syaidina Hamzah</b></p></small> </div>
      </div>
      <div class="col-lg-3 col-md-6 text-center">
        <div class="service-boxp">
          <a href="" class="menu-ico" data-toggle="modal" data-target="#kartu_ujian">
            <div class="ico-ppdb"> <i class="fa fa-4x fa-print wow bounceIn" data-wow-delay=".2s"></i> </div>
          </a>
          <h3>Cetak Kartu</h3> <small><p>Setelah melakukan transfer, peserta menunggu konfirmasi admin, kemudian peserta dapat mencetak kartu ujian.</p></small> </div>
      </div>
      <div class="col-lg-3 col-md-6 text-center">
        <div class="service-boxp">
          <a href="" class="menu-ico" data-toggle="modal" data-target="#dokumen_ppdb">
            <div class="ico-ppdb"> <i class="fa fa-4x fa-file-o wow bounceIn"></i> </div>
          </a>
          <h3>Dokumen PPDB</h3> <small><p>Peserta selesai melakukan pencetakan kartu ujian, peserta diharapkan untuk mengunduh dokumen PPDB lalu diisi secara manual. Setelah dokumen PPDB diisi dengan benar, lakukan upload dokumen.</p></small> </div>
      </div>
    </div>
  </div>
</section>
<marquee onmouseover="this.stop()" onmouseout="this.start()" style="color:red !important;font-weight:bold"><a target="_blank" style="color:red;font-size:20px" href="<?php echo base_url('Home/kontak'); ?>">Silahkan hubungi kami jika menemukan permasalahan ketika mendaftarkan siswa</a></marquee>
<!-- Modal -->
<div class="modal fade" id="daftar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="form-horizontal">      
      <form id="pendaftaran" action="<?php echo base_url().'calon_siswa/do_daftar'; ?>" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>          
          <h4 class="modal-title" id="myModalLabel">Daftar</h4> </div>
        <div class="modal-body">          
          <div class="form-group">
            <label class="col-lg-3 col-sm-3 control-label">Nama</label>
            <div class="col-lg-9">
              <input type="text" name="nama" class="form-control" placeholder="Nama" required> </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 col-sm-3 control-label">Tempat Lahir</label>
            <div class="col-lg-9">
              <input type="text" name="tmpt_lhr" class="form-control" placeholder="Tempat Lahir" required> </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 col-sm-3 control-label">Tanggal Lahir</label>
            <div class="col-lg-9">
              <input type="text" name="tgl_lhr" class="form-control tanggal" placeholder="Tanggal Lahir" required readonly> </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 col-sm-3 control-label">Jenis Kelamin</label>
            <div class="col-lg-9">
              <input type="radio" name="jk" value="L" required> Laki-laki
              <input type="radio" name="jk" value="P" required> Perempuan </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 col-sm-3 control-label">Alamat</label>
            <div class="col-lg-9">
              <textarea class="form-control" name="almt_rmh" required></textarea>
            </div>
          </div>
          <div class="form-group ">
            <label for="avatar" class="control-label col-lg-3">Foto</label>
            <div class="col-lg-9">
              <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-new thumbnail" style="width:100%; height:200px;padding:10px">
                  <?php echo "Tidak ada file dipilih"; ?> </div>
                <div class="fileupload-preview fileupload-exists thumbnail" style="width:100%;height:200px;"></div> <span class="btn btn-default btn-file" style="left: 5px;">

                              <span class="fileupload-new"><i class="fa fa-paper-clip"></i>Pilih File</span> <span class="fileupload-exists">Ubah</span>
                <input type="file" class="default" name="foto" required> </span> <span>

                              <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i>&nbsp;Hapus&nbsp;</a>

                          </span> </div> <span class="label label-danger ">EXT : JPG | PNG | JPEG | BMP</span> <span>

                          &nbsp;Ukuran foto 3x4 | besar file ≤ 1MB

                      </span> </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 col-sm-3 control-label">Asal Sekolah</label>
            <div class="col-lg-9">
              <input type="text" name="asal_sklh" class="form-control" placeholder="Asal Sekolah" required> </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 col-sm-3 control-label">Nama Ayah</label>
            <div class="col-lg-9">
              <input type="text" name="nm_ayah" class="form-control" placeholder="Nama Ayah" required> </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 col-sm-3 control-label">Nama Ibu</label>
            <div class="col-lg-9">
              <input type="text" name="nm_ibu" class="form-control" placeholder="Nama Ibu" required> </div>
          </div>
          <div class="form-group ">
            <label for="avatar" class="control-label col-lg-3">KTP Orang Tua</label>
            <div class="col-lg-9">
              <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-new thumbnail" style="width:100%;height:200px; paddinging:10px">
                  <?php echo "Tidak ada file dipilih"; ?> </div>
                <div class="fileupload-preview fileupload-exists thumbnail" style="width:100%;height:200px;"></div> <span class="btn btn-default btn-file" style="left: 5px;">

                              <span class="fileupload-new"><i class="fa fa-paper-clip"></i>Pilih File</span> <span class="fileupload-exists">Ubah</span>
                <input type="file" class="default" name="ktp_ortu" required/> </span> <span>

                              <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i>&nbsp;Hapus&nbsp;</a>

                          </span> </div> <span class="label label-danger ">EXT : JPG | PNG | JPEG | BMP</span> <span>

                          &nbsp;besar file ≤ 1MB

                      </span> </div>
          </div>
          <div class="form-group ">
            <label for="avatar" class="control-label col-lg-3">Kartu Keluarga</label>
            <div class="col-lg-9">
              <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-new thumbnail" style="width:100%;height:200px; padding:10px">
                  <?php echo "Tidak ada file dipilih"; ?> </div>
                <div class="fileupload-preview fileupload-exists thumbnail" style="width:100%;height:200px;"></div> <span class="btn btn-default btn-file" style="left: 5px;">

                              <span class="fileupload-new"><i class="fa fa-paper-clip"></i>Pilih File</span> <span class="fileupload-exists">Ubah</span>
                <input type="file" class="default" name="kk" required/> </span> <span>

                              <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i>&nbsp;Hapus&nbsp;</a>

                          </span> </div> <span class="label label-danger ">EXT : JPG | PNG | JPEG | BMP</span> <span>

                          &nbsp;besar file ≤ 1MB

                      </span> </div>
          </div>
          <div class="form-group ">
            <label for="avatar" class="control-label col-lg-3">AKTA Kelahiran</label>
            <div class="col-lg-9">
              <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-new thumbnail" style="width:100%;height:200px; padding:10px">
                  <?php echo "Tidak ada file dipilih"; ?> </div>
                <div class="fileupload-preview fileupload-exists thumbnail" style="width:100%;height:200px;"></div> <span class="btn btn-default btn-file" style="left: 5px;">

                              <span class="fileupload-new"><i class="fa fa-paper-clip"></i>Pilih File</span> <span class="fileupload-exists">Ubah</span>
                <input type="file" class="default" name="akta_lhr" required/> </span> <span>

                              <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i>&nbsp;Hapus&nbsp;</a>

                          </span> </div> <span class="label label-danger ">EXT : JPG | PNG | JPEG | BMP</span> <span>

                          &nbsp;besar file ≤ 1MB

                      </span> </div>
          </div>
          <!-- Progress bar -->
          <div class="panel-body">
            <div class="form-group">
              <div id="percent">0%</div>
              <div class="progress">
                <progress id="progress" max="100" value="0" class="hide"></progress>
                <div id="bar"></div>                
              </div>           
              <div id="pesan"></div> 
          </div>
          </div>
        <!-- Progress bar -->
        </div>        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times fa-fw"></i>Tutup</button>
          <input type="submit" name="daftar" value="Daftar" class="btn btn-primary">
        </div>
      </div>
    </form>    
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="form-horizontal">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
          <h4 class="modal-title" id="myModalLabel">Silahkan Masuk</h4> </div>
        <div class="modal-body">
          <form action="<?php echo base_url().'calon_siswa/konfirmasi_pembayaran' ?>" method="post">
            <div class="form-group">
              <label class="col-lg-3 col-sm-3 control-label">No. Reg</label>
              <div class="col-lg-9">
                <input type="text" name="no_reg" class="form-control" placeholder="Nomor Registrasi"> </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 col-sm-3 control-label">Tanggal Lahir</label>
              <div class="col-lg-9">
                <input type="text" name="tgl_lhr" class="form-control tanggal" placeholder="Tanggal Lahir" readonly> </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset-3 col-lg-9">
                <button type="submit" class="btn btn-primary">Masuk</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              </div>
            </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="upload_dokumen_ppdb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="form-horizontal">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
          <h4 class="modal-title" id="myModalLabel">Silahkan Masuk</h4> </div>
        <div class="modal-body">
          <form action="<?php echo base_url().'calon_siswa/upload_dokumen_ppdb' ?>" method="post">
            <div class="form-group">
              <label class="col-lg-3 col-sm-3 control-label">No. Reg</label>
              <div class="col-lg-9">
                <input type="text" name="no_reg" class="form-control" placeholder="Nomor Registrasi"> </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 col-sm-3 control-label">Tanggal Lahir</label>
              <div class="col-lg-9">
                <input type="text" name="tgl_lhr" class="form-control tanggal" placeholder="Tanggal Lahir" readonly> </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset-3 col-lg-9">
                <button type="submit" class="btn btn-primary">Masuk</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              </div>
            </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- modal -->
<div class="modal fade" id="kartu_ujian" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="form-horizontal">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
          <h4 class="modal-title" id="myModalLabel">Silahkan Masuk</h4> </div>
        <div class="modal-body">
          <form action="<?php echo base_url().'calon_siswa/kartu_ujian' ?>" method="post">
            <div class="form-group">
              <label class="col-lg-3 col-sm-3 control-label">No. Reg</label>
              <div class="col-lg-9">
                <input type="text" name="no_reg" class="form-control" placeholder="Nomor Registrasi"> </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 col-sm-3 control-label">Tanggal Lahir</label>
              <div class="col-lg-9">
                <input type="text" name="tgl_lhr" class="form-control tanggal" placeholder="Tanggal Lahir" readonly> </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset-3 col-lg-9">
                <button target="_blank" type="submit" class="btn btn-primary" onclick="this.form.target='_blank';return true;">Masuk</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              </div>
            </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<!-- modal -->
<div class="modal fade" id="dokumen_ppdb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="form-horizontal">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
          <h4 class="modal-title" id="myModalLabel">Dokumen PPDB</h4> </div>
        <div class="modal-body">
          <center><table class="table">
            <tr>
              <td><b>Unduh Dokumen</b></td>
              <td><a target="_blank" href='<?php echo base_url().'assets/frontend/uploads/dokumen_ppdb/'.$data[0]['file'];?>'><i class="fa fa-2x fa-download fa-fw"></i><b>Formulir Pendaftaran</b></a>
            </tr>
            <tr>
              <td><b>Unggah Dokumen</b></td>
              <td><a href="" data-toggle="modal" data-target="#upload_dokumen_ppdb" data-dismiss="modal"><i class="fa fa-2x fa-upload fa-fw"></i><b>Formulir Pendaftaran</b></a></td>
            </tr>
          </table>          
        </div>        
      </div>
    </div>
  </div>
</div>
</div>