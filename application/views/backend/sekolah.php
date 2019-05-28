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
                	<form class="cmxform form-horizontal adminex-form" id="signupForm" action="<?=base_url()?>Admin/sekolah_ubah" method="post" enctype="multipart/form-data" novalidate="novalidate" role="form">
                    <input type="hidden" name="url" value="<?php echo $_SERVER['REQUEST_URI'];?>">
                    <input type="hidden" name="status" value="<?php echo $data[0]['status']?>">
                    <input type="hidden" name="id" value="<?php echo $data[0]['id']?>">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Nama" class="col-lg-2 col-sm-2 control-label">Judul</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="nama" placeholder="Tuliskan Judul" value="<?php echo $data[0]['nama']?>" required>
                            </div>
                        </div>
                         <div class="form-group" style="text-align:center">
                            <input type="hidden" name="upload" value="submit"></input>
                            <button class="btn btn-success" type="Submit"><i class="fa fa-pencil"></i> Simpan</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">File</label>
                            <div class="col-lg-10">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width:100%; padding:10px;height:40px">
                                        <?php if ($data[0]['foto']==""){
                                            echo "Tidak ada file dipilih";    
                                        }else{ ?>
                                            <a target="_blank" href='<?php echo base_url().'assets/frontend/images/profil/'.$data[0]['foto'];?>'><?php echo $data[0]['foto']?></a>
                                        <?php } ?>
                                    </div>
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="width:100%;height:40px"></div>
                                    <span class="btn btn-default btn-file" style="left: 5px;">
                                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i>Pilih File</span>
                                        <span class="fileupload-exists">Ubah</span>
                                        <input type="file" class="default" name="files">
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
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <textarea class="form-control mytextarea" name="keterangan"><?php echo $data[0]['keterangan']?></textarea>
                        </div>
                    </div>
                </form>
          		</div>
        	</div>
    	</div>
  	</div>
</div>