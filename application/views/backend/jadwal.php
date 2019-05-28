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
                	<div class="col-md-4">
          				<a href="#" name="tambah_user" data-toggle="modal" data-target="#tambah_user"><button class="btn btn-default">Tambah <i class="fa fa-plus"></i></button></a>
                	</div>
                	<div class="col-md-4"></div>
                	<div class="col-md-4" style="text-align:right">
                        <?php print $halaman;?>
                    </div>
      				<div class="col-lg-12">
                        <br/>
                        <div class="table-responsive lowermost">
                            <table class="table table-stripped">
						      	<thead>
						            <tr>
						              <th>No</th>
						              <th>Hari/Tgl</th>
						              <th>Jenis Tes</th>
						              <th>Waktu</th>
						            </tr>
						      	</thead>
					            <tbody>
					                <?php foreach ($data as $data) {?>
					                <tr>                      
					                  <td data-title="no" style="text-align:center"><?php echo ++$norut; ?></td>
					                  <td data-title="hari/tgl" style="text-align:center !important;"><?php echo $data['hari']."/".$data['tanggal'] ?></td>
					                  <td data-title="jenis_tes"><?php echo $data['jenis_tes']; ?></td>
					                  <td data-title="waktu"><?php echo $data['waktu']; ?></td>
					                  <td data-title="Aksi" style="text-align:center">
					                    <a 
                                            href="javascript:;"
                                            data-id="<?php echo $data['id'] ?>"
                                            data-hari="<?php echo $data['hari'] ?>"
                                            data-tanggal="<?php echo $data['tanggal'] ?>"
                                            data-jenis_tes="<?php echo $data['jenis_tes'] ?>"
                                            data-waktu="<?php echo $data['waktu'] ?>"
                                            data-toggle="modal" data-target="#ubah_jadwal">
                                            <button class="btn btn-info tooltips" data-original-title="Ubah Data" data-toggle="tooltip" data-placement="top" title="">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                        </a>
					                    <a href="<?php echo base_url().'admin/jadwal_hapus/'.$data['id'];?>" data-original-title="Hapus Data" class="btn btn-danger tooltips" data-toggle="tooltip" data-placement="top" title="" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="fa fa-times fa-fw"></i></a>
					                  </td>
					                </tr>
					                <?php } ?>
					            </tbody>                      
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
<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah_user" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Tambah Jadwal</h4>
            </div>
            <div class="modal-body">
                <form class="cmxform form-horizontal adminex-form" id="signupForm" action="<?=base_url()?>admin/jadwal_tambah" method="post" enctype="multipart/form-data" novalidate="novalidate" role="form">
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Hari</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="hari">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="tanggal">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Jenis Tes</label>
                        <div class="col-lg-10">
                            <textarea class="form-control mytextarea" name="jenis_tes"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Waktu</label>
                        <div class="col-lg-10">
                            <textarea class="form-control mytextarea" name="waktu"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button data-original-title="Kembali ke halaman sebelumnya" type="button" class="btn btn-warning tooltips" data-toggle="tooltip" data-dismiss="modal" data-placement="top" title=""><i class="fa fa-chevron-left fa-fw"></i> Kembali</button>
                            <button data-original-title="Simpan" type="submit" class="btn btn-success tooltips" data-toggle="tooltip" data-placement="top" title=""><i class="fa fa-plus fa-fw"></i>  Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- modal -->
<!-- Modal Ubah Ubah -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="ubah_jadwal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Ubah Data Jadwal </h4>
            </div>
            <div class="modal-body">
                <form class="cmxform form-horizontal adminex-form" id="signupForm" action="<?=base_url()?>admin/jadwal_ubah" method="post" enctype="multipart/form-data" novalidate="novalidate" role="form">
                    <input type="hidden" name="id" id="Id">
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Hari</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="Hari" name="hari">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="Tanggal" name="tanggal">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Jenis Tes</label>
                        <div class="col-lg-10">
                            <textarea id="Jenis_tes" class="form-control mytextarea" name="jenis_tes"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Waktu</label>
                        <div class="col-lg-10">
                            <textarea id="Waktu" class="form-control mytextarea" name="waktu"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button data-original-title="Kembali ke halaman sebelumnya" type="button" class="btn btn-warning tooltips" data-toggle="tooltip" data-dismiss="modal" data-placement="top" title=""><i class="fa fa-chevron-left fa-fw"></i> Kembali</button>
                            <button data-original-title="Simpan" type="submit" class="btn btn-success tooltips" data-toggle="tooltip" data-placement="top" title=""><i class="fa fa-plus fa-fw"></i>  Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- modal -->

<script>
    $(document).ready(function() {
        tinymce.init({});
        // Untuk sunting
        $('#ubah_jadwal').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal        = $(this)

            // Isi nilai pada field
            modal.find('#Id').attr("value",div.data('id'));
            modal.find('#Hari').attr("value",div.data('hari'));
            modal.find('#Tanggal').attr("value",div.data('tanggal'));
            tinyMCE.get('Jenis_tes').setContent(div.data('jenis_tes'));
            tinyMCE.get('Waktu').setContent(div.data('waktu'));
        });
    });
</script>