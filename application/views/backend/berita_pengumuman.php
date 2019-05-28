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
                        <span class="input-group-btn">
                            <a type="button" class="btn btn-default btn-sm" data-original-title="Tambah Data" data-toggle="tooltip" href="<?php echo base_url().'admin/informasi_baru';?>"><i class="fa fa-plus"></i> Tambah</a>
                        </span>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div style="text-align:right"><?php print $halaman;?></div>
                    </div>
                    <div class="col-lg-12">
                        <div class="table-responsive lowermost">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                      <th align="center" style="width:10px">No</th>
                                      <th>Judul</th>
                                      <th align="center" style="width:100px">Tanggal</th>
                                      <th style="width:10px; text-align: center;">Status</th>
                                      <th style="width:120px;text-align: center;">Status Aktif</th>
                                      <th style="width:120px;text-align: center;">Aksi</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php if(empty($data)) { ?>
                                            <tr><td colspan='9' style='text-align:center;color:red'><b>Tidak ada data !</b></td></tr>
                                    <?php } 
                                    $no=$norut+1; foreach ($data as $data) { ?>
                                    <tr>
                                        <td align="center"><?php echo $no++;?></td>
                                        <td><a class="btn btn-link tooltips" data-original-title="Ubah Data" data-toggle="tooltip" href="<?php echo base_url().'admin/informasi_ubah/'.$data['id'];?>"><?php echo $data['judul']; ?></a></td>
                                        <td><?php echo $data['tanggal'];?></td>
                                        <td style="text-align: center">
                                            <span class="label label-primary"><?php echo ucfirst($data['status']); ?></span>
                                        </td>
                                        <td style="text-align: center">
                                            <?php if($data['status_aktif'] == 1){ ?>
                                                <span class="label label-info">Publish</span>
                                            <?php }else if ($data['status_aktif'] == 2){ ?>
                                                <span class="label label-warning">Draft</span>
                                            <?php } ?>
                                        <td style="text-align:center">
                                            <a type="button" class="btn btn-info tooltips" data-original-title="Ubah Data" data-toggle="tooltip" href="<?php echo base_url().'admin/informasi_ubah/'.$data['id'];?>"><i class="fa fa-pencil"></i></a>
                                            <a type="button" class="btn btn-danger tooltips" data-original-title="Hapus Data" data-toggle="tooltip" href="<?php echo base_url().'admin/informasi_hapus/'.$data['id'];?>" onclick="return confirm('Apakah anda yakin akan menghapus ini?')"><i class="fa fa-times"></i></a>
                                        </td>
                                      </tr>
                                    <?php } ?>
                                  </tbody>  
                            </table>
                            <div style="text-align:right"><?php print $halaman;?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>