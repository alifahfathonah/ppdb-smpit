<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?php echo $title;?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?=$this->session->flashdata('notif')?>
                    <div class="col-md-4">
                        <form method="POST" action="<?php echo base_url('admin/user');?>">
                            <div class="input-group m-bot15">
                                <input type="text" name="cari" class="form-control" placeholder="Cari User" autocomplete="off">
                                <span class="input-group-btn">
                                    <input type="submit" name="submit" class="btn btn-default" value="Cari">
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <span class="input-group-btn">
                            <a href="javascript:;" data-toggle="modal" data-target="#tambah-data">
                            <button class="btn btn-default" data-original-title="Tambah Dosen" data-toggle="tooltip" type="button" style="border"><i class="fa fa-plus"></i> Tambah</button></a>
                        </span>
                    </div>
                    <div class="col-md-4"><div style="text-align:right"><?php print $halaman;?></div></div>
                    <div class="col-lg-12">
                        <div class="table-responsive lowermost">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                      <th align="center" style="width:10px">No.</th>
                                      <th>Nama Lengkap</th>
                                      <th>Username</th>
                                      <th style="text-align: center;">Status</th>
                                      <th style="width:10px;text-align: center;">Password</th>
                                      <th style="width:111px;text-align: center;">Aksi</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach ($data as $data): ?>
                                      <tr>
                                        <td align="center"><?php echo ++$norut ?></td>
                                        <td><?php echo $data['nama'] ?></td>
                                        <td><?php echo $data['username'] ?></td>
                                        <td align="center">
                                            <?php 
                                            if ($data['status']==1) {
                                                echo "Aktif";
                                            }else{
                                                echo 'Non-Aktif';
                                            } ?>
                                        </td>
                                        <td>
                                            <a
                                                data-id2="<?php echo $data['id_user'] ?>"
                                                href="javascript:;"
                                                data-toggle="modal" data-target="#edit-password">
                                                <button class="btn btn-info tooltips" data-original-title="Ubah Password" data-toggle="tooltip" data-placement="top" title="">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                            </a>
                                        </td>
                                        <td>
                                          <a 
                                            href="javascript:;"
                                            data-id="<?php echo $data['id_user'] ?>"
                                            data-nama="<?php echo $data['nama'] ?>"
                                            data-username="<?php echo $data['username'] ?>"
                                            data-status="<?php echo $data['status'] ?>"
                                            data-toggle="modal" data-target="#edit-data">
                                            <button class="btn btn-info tooltips" data-original-title="Ubah Data" data-toggle="tooltip" data-placement="top" title="">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            </a>
                                            <a type="button" class="btn btn-danger tooltips" data-original-title="Hapus Ciri" data-toggle="tooltip" data-placement="top" title="" href="<?php echo base_url().'admin/user_hapus/'.$data['id_user'];?>" onclick="return confirm('Apakah anda yakin akan menghapus ini?')"><i class="fa fa-times"></i></a>
                                       </td>
                                      </tr>
                                    <?php endforeach ?>
                                  </tbody>  
                            </table>
                            <!-- <div style="text-align:right"><?php print $halaman;?></div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="cmxform form-horizontal adminex-form" id="signupForm" method="POST" action="<?php echo base_url('admin/user_tambah'); ?>" novalidate="novalidate" role="form">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Tambah User</h4>
                </div>
                <div class="modal-body">
                    <table class='table' width='100%' border='0' cellpadding='2' cellspacing='0'>
                        <tr>
                            <td>Username</td>
                            <td>
                                <div class="form-group">
                                    <input name="username" id="username1" type="text" class="form-control" required/>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td>
                                <div class="form-group">
                                    <input name="nama" id="nama1" type="text" class="form-control"/>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>
                                <div class="form-group">
                                    <input name="password" type="password" class="form-control"/>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>
                                <div class="form-group">
                                    <select name="status" id="Status" class="form-control" required>
                                      <option value="1">Aktif</option>
                                      <option value="0">Non-Aktif</option>
                                    </select>
                                </div>
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
<!-- modal -->
<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-password" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="<?php echo base_url('admin/password_ubah'); ?>">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Ubah Data User</h4>
                </div>
                <div class="modal-body">
                    <table class='table' width='100%' border='0' cellpadding='2' cellspacing='0'>
                        <tr>
                            <td>Password</td>
                            <td>
                                <div class="form-group">
                                    <input name="id" id="id3" type="hidden" class="form-control"/>
                                    <input name="password" type="password" class="form-control" required/>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Ulangi Password</td>
                            <td>
                                <div class="form-group">
                                    <input name="password1" type="password" class="form-control"/>
                                </div>
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
<!-- modal -->
<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="cmxform form-horizontal adminex-form" enctype="multipart/form-data" id="signupForm" method="POST" action="<?php echo base_url('admin/user_ubah'); ?>">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Ubah Data User</h4>
                </div>
                <div class="modal-body">
                    <table class='table' width='100%' border='0' cellpadding='2' cellspacing='0'>
                        <tr>
                            <td>Username</td>
                            <td>
                                <div class="form-group">
                                    <input name="id" id="id1" type="hidden" class="form-control" required/>
                                    <input name="username" id="username1" type="text" class="form-control" required/>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td>
                                <div class="form-group">
                                    <input name="nama" id="nama1" type="text" class="form-control"/>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>
                                <div class="form-group">
                                    <select name="status" id="Status" class="form-control" required>
                                      <option value="1">Aktif</option>
                                      <option value="0">Non-Aktif</option>
                                    </select>
                                </div>
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
<!-- modal -->
<script>
    $(document).ready(function() {
        // Untuk sunting
        $('#edit-password').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var Idku          = div.data('id2');
            var modal         = $(this)

            // Isi nilai pada field
            modal.find('#id3').attr("value",Idku);
        });
        $('#edit-data').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan

            var Id            = div.data('id');
            var Nama          = div.data('nama');
            var Username      = div.data('username');
            var Status     = div.data('status');

            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#id1').attr("value",Id);
            modal.find('#nama1').attr("value",Nama);
            modal.find('#username1').attr("value",Username);
            modal.find('#Status option').each(function(){
                  if ($(this).val() == Status )
                    $(this).attr("selected","selected");
            });
        });

    });
</script>