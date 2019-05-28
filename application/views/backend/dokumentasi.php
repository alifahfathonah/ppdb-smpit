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
                                    <div class="btn-group pull-left">
                                        <a href="#buat-data" data-toggle="modal"><button type="button" class="btn btn-default btn-sm"><i class="fa fa-folder-open"></i> Buat Album</button></a>
                                    </div>
                                    <div id="gallery" class="media-gal">
                                        <?php foreach ($data as $data) {?>
                                        <div class="item " >
                                            <a href="<?php echo base_url().$link.$data->id_album;?>">
                                                <img src="<?php echo base_url().'assets/backend/images/folder.png';?>" alt="" />
                                            </a>
                                            <p><?php if ($data->status==1) {
                                                    echo '<i class="fa fa-users tooltips" data-original-title="Terlihat Semua Orang" data-toggle="tooltip" data-placement="top" title=""></i>';
                                                }else{
                                                    echo '<i class="fa fa-lock tooltips" data-original-title="Hanya Saya yang Melihat" data-toggle="tooltip" data-placement="top" title=""></i>';
                                                };?> <?php echo $data->nama;?> </p>
                                            <p>
                                                <a 
                                                    href="javascript:;"
                                                    data-id_album="<?php echo $data->id_album ?>"
                                                    data-nama="<?php echo $data->nama ?>"
                                                    data-status="<?php echo $data->status ?>"
                                                    data-toggle="modal" data-target="#edit-data">
                                                    <button class="btn btn-info btn-xs tooltips" data-original-title="Ubah Data" data-toggle="tooltip" data-placement="top" title="">
                                                        <i class="fa fa-pencil fa-fw"></i>
                                                    </button>
                                                </a>
                                                <a href="<?php echo base_url().$hapus.$data->id_album;?>" data-original-title="Hapus Data" class="btn btn-danger btn-xs tooltips" data-toggle="tooltip" data-placement="top" title="" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="fa fa-times fa-fw"></i></a>
                                            </p>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-12 text-center clearfix">
                                        <ul class="pagination">
                                            <?php echo $this->pagination->create_links(); ?>
                                        </ul>
                                    </div>
                                    <!-- Modal  -->
                                    <div aria-labelledby="myModalLabel" role="dialog" id="buat-data" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="form-horizontal">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                        <h4 class="modal-title">Buat Album Baru</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="cmxform form-horizontal adminex-form" id="signupForm" action="<?=base_url().$form?>" method="post" enctype="multipart/form-data" novalidate="novalidate" role="form">
                                                            <div class="form-group">
                                                                <label for="Deskripsi" class="col-lg-2 col-sm-2 control-label">Nama Album</label>
                                                                <div class="col-lg-10">
                                                                <input type="hidden" name="id_album" id="id_album">
                                                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Album">
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <label for="tipe" class="control-label col-lg-2">Privasi</label>
                                                                <div class="col-lg-10">
                                                                    <select name="status" id="status" class="form-control" required>
                                                                      <option value="0">Hanya Saya</option>
                                                                      <option value="1">Semua Orang</option>
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
                                    </div>
                                    <!-- modal -->
                                    <!-- Modal -->
                                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                    <h4 class="modal-title">Ubah Album</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="cmxform form-horizontal adminex-form" id="signupForm" action="<?=base_url().$form_ubah?>" method="post" enctype="multipart/form-data" novalidate="novalidate" role="form">
                                                        <div class="form-group">
                                                            <label for="Deskripsi" class="col-lg-2 col-sm-2 control-label">Nama Album</label>
                                                            <div class="col-lg-10">
                                                            <input type="hidden" name="id_album" id="id_album">
                                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Album">
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label for="tipe" class="control-label col-lg-2">Privasi</label>
                                                            <div class="col-lg-10">
                                                                <select name="status" id="status" class="form-control" required>
                                                                  <option value="0">Hanya Saya</option>
                                                                  <option value="1">Semua Orang</option>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        <!--body wrapper end-->
<script>
    $(document).ready(function() {
        // Untuk sunting
        $('#edit-data').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan

            var id_album    = div.data('id_album');
            var nama        = div.data('nama');
            var status      = div.data('status');

            var modal   = $(this)

            // Isi nilai pada field
            modal.find('#id_album').attr("value",id_album);
            modal.find('#nama').attr("value",nama);

            // Membuat combobox terpilih berdasarkan jenis kelamin yg tersimpan saat pengeditan
            modal.find('#status option').each(function(){
                  if ($(this).val() == status )
                    $(this).attr("selected","selected");
            });

        });

    });
</script>