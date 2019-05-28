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
          				<a href="#" data-toggle="modal" data-target="#dokumen_tambah"><button class="btn btn-default">Tambah <i class="fa fa-plus"></i></button></a>
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
						              <th style="width:10px">No</th>
                                      <th>Nama</th>
                                      <th>Keterangan</th>
                                      <th style="width:10px">File</th>
                                      <th style="width:10px">Status</th>
						              <th style="text-align:center;width:130px">Aksi</th>
						            </tr>
						      	</thead>
					            <tbody>
					                <?php $no=0;
					                foreach ($data as $data) {?>
					                <tr>                      
					                  <td data-title="no" style="text-align:center"><?php echo ++$no; ?></td>
                                      <td data-title="nama"><?php echo $data['nama']; ?></td>
                                      <td data-title="Keterangan"><?php echo $data['keterangan']; ?></td>
					                  <td data-title="file" style="text-align:center !important;"><?php 
					                        if (empty($data['file'])) {
					                            echo '<span class="label label-danger"><i class="fa fa-times"></i></span>';
                                            }else{
                                                echo '<span class="label label-success"><i class="fa fa-check"></i></span>';
					                        }?></td>
					                  <td><?php 
                                            if ($data['status']==0) {
                                                echo '<span class="label label-danger"><i class="fa fa-times"></i></span>';
                                            }else{
                                                echo '<span class="label label-success"><i class="fa fa-check"></i></span>';
                                            }?></td>
					                  <td data-title="Aksi" style="text-align:center">
					                    <a 
                                            href="javascript:;"
                                            data-id="<?php echo $data['id'] ?>"
                                            data-nama="<?php echo $data['nama'] ?>"
                                            data-keterangan="<?php echo $data['keterangan'] ?>"
                                            data-file="<?php echo base_url().'assets/frontend/uploads/dokumen/'.$data['file'] ?>"
                                            data-status="<?php echo $data['status'] ?>"
                                            data-toggle="modal" data-target="#dokumen_ubah">
                                            <button class="btn btn-info tooltips" data-original-title="Ubah Data" data-toggle="tooltip" data-placement="top" title="">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                        </a>
					                    <a href="<?php echo base_url().'admin/dokumen_hapus/'.$data['id'];?>" data-original-title="Hapus Data" class="btn btn-danger tooltips" data-toggle="tooltip" data-placement="top" title="" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="fa fa-times fa-fw"></i></a>
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
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="dokumen_tambah" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Tambah Dokumen</h4>
            </div>
            <div class="modal-body">
                <form class="cmxform form-horizontal adminex-form" id="signupForm" action="<?=base_url()?>Admin/dokumen_tambah" method="post" enctype="multipart/form-data" novalidate="novalidate" role="form">
                    <div class="form-group">
                        <label for="Nama" class="col-lg-2 col-sm-2 control-label">Nama</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="avatar" class="control-label col-lg-2">File</label>
                        <div class="col-lg-10">
                          <div class="fileupload fileupload-new" data-provides="fileupload">
                              <div class="fileupload-new thumbnail" style="width:100%; padding:10px; height: 40px">
                                  <?php echo "Tidak ada file dipilih"; ?>
                              </div>
                              <div class="fileupload-preview fileupload-exists thumbnail" style="width:100%;height: 100%" ></div>
                              <span class="btn btn-default btn-file" style="left: 5px;">
                                  <span class="fileupload-new"><i class="fa fa-paper-clip"></i>Pilih File</span>
                                  <span class="fileupload-exists">Ubah</span>
                                  <input type="file" class="default" name="file"/>
                              </span>
                              <span>
                                  <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i>&nbsp;Hapus&nbsp;</a>
                              </span>
                          </div>
                          <span class="label label-danger ">EXT :</span>
                          <span>
                              &nbsp;besar file ≤ 1MB
                          </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Keterangan</label>
                        <div class="col-lg-10">
                            <textarea class="form-control mytextarea" name="keterangan"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Status</label>
                        <div class="col-lg-10">
                            <select name="status" class="form-control" required>
                                <option value="1">Semua Orang</option>
                                <option value="0">Hanya Saya</option>
                            </select>
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
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="dokumen_ubah" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Ubah Data</h4>
            </div>
            <div class="modal-body">
                <form class="cmxform form-horizontal adminex-form" id="signupForm" action="<?=base_url()?>admin/dokumen_ubah" method="post" enctype="multipart/form-data" novalidate="novalidate" role="form">
                    <input type="hidden" name="id" id="Id">
                    <div class="form-group ">
                        <label for="avatar" class="control-label col-lg-2">File</label>
                        <div class="col-lg-10">
                          <div class="fileupload fileupload-new" data-provides="fileupload">
                              <div class="fileupload-new thumbnail" style="width:100%; padding:10px; height: 100%">
                                  <div id="File"></div>
                              </div>
                              <div class="fileupload-preview fileupload-exists thumbnail" style="width:100%; height: 100%" ></div>
                              <span class="btn btn-default btn-file" style="left: 5px;">
                                  <span class="fileupload-new"><i class="fa fa-paper-clip"></i>Pilih File</span>
                                  <span class="fileupload-exists">Ubah</span>
                                  <input type="file" class="default" name="file"/>
                              </span>
                              <span>
                                  <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i>&nbsp;Hapus&nbsp;</a>
                              </span>
                          </div>
                          <span class="label label-danger ">EXT :</span>
                          <span>
                              &nbsp;besar file ≤ 1MB
                          </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="judul" class="col-lg-2 col-sm-2 control-label">Nama</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="Nama" name="nama">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Keterangan</label>
                        <div class="col-lg-10">
                            <textarea id="Keterangan" class="form-control mytextarea" name="keterangan"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Status</label>
                        <div class="col-lg-10">
                            <select name="status" id="status" class="form-control" required>
                                <option value="1">Semua Orang</option>
                                <option value="0">Hanya Saya</option>
                            </select>
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
        $('#dokumen_ubah').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal        = $(this)

            // Isi nilai pada field
            modal.find('#Id').attr("value",div.data('id'));
            modal.find('#Nama').attr("value",div.data('nama'));
            modal.find('#File').html('<a href="+div.data('file')+'">'+div.data('nama')+' (Klik untuk download)</a>');
            tinyMCE.get('Keterangan').setContent(div.data('keterangan'));
            
            modal.find('#status option').each(function(){
                  if ($(this).val() == status )
                    $(this).attr("selected","selected");
            });
        });
    });
</script>