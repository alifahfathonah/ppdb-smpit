                <div class="">
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <form class="form-horizontal" action="<?php echo base_url().$form;?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                <input type="hidden" value="<?php echo $id;?>" name="id"/>
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2><?php echo $judul;?></h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="form-group">
                                            <div class="x_panel">
                                                <div class="x_content">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 col-sm-2 control-label">Judul Informasi</label>
                                                            <div class="col-lg-10">
                                                                <input type="text" class="form-control" name="judul" value="<?php echo $judulnya; ?>" placeholder="Judul" required>
                                                            </div>
                                                        </div>
                                                        &nbsp;
                                                        <div class="form-group">
                                                            <label class="col-sm-2 col-sm-2 control-label">Status</label>
                                                            <div class="col-lg-10">
                                                                <select name="status" class="form-control" required>
                                                                <?php 
                                                                    if($status == 'berita'){
                                                                ?>
                                                                    <option selected="selected" value="<?php echo $status; ?>"><?php echo ucwords($status); ?></option>
                                                                    <option value="pengumuman">Pengumuman</option>
                                                                <?php }else if($status == 'pengumuman'){ ?>
                                                                    <option selected="selected" value="<?php echo $status; ?>"><?php echo ucwords($status); ?></option>
                                                                    <option value="berita">Berita</option>
                                                                <?php } else { ?>
                                                                    <option selected="selected" value="">--Pilih--</option>
                                                                    <option value="berita">Berita</option>
                                                                    <option value="pengumuman">Pengumuman</option>
                                                                <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        &nbsp;
                                                        &nbsp;
                                                        <div class="form-group">
                                                            <label class="col-sm-2 col-sm-2 control-label">Status Aktif</label>
                                                            <div class="col-lg-10">
                                                                <select name="status_aktif" class="form-control" required>
                                                                <?php 
                                                                    if($status_aktif == 1){
                                                                ?>
                                                                    <option selected="selected" value="<?php echo $status_aktif; ?>">Tampilkan</option>
                                                                    <option value="2">Draft</option>
                                                                <?php }else if($status_aktif == 2){ ?>
                                                                    <option selected="selected" value="<?php echo $status; ?>">Draft</option>
                                                                    <option value="1">Tampilkan</option>
                                                                <?php } else { ?>
                                                                    <option selected="selected" value="">--Pilih--</option>
                                                                    <option value="1">Tampilkan</option>
                                                                    <option value="2">Draft</option>
                                                                <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group" style="text-align:center">
                                                            <input type="hidden" name="upload" value="submit"></input>
                                                            <button class="btn btn-success" type="Submit"><i class="fa fa-pencil"></i> Simpan</button>
                                                            <a href="<?php echo base_url().$kembali;?>" class="btn btn-warning" type="button"><i class="fa fa-chevron-left fa-fw"></i> Kembali</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 col-sm-2 control-label">Foto</label>
                                                            <div class="col-lg-10">
                                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                    <div class="fileupload-new thumbnail" style="width:100%; padding:10px; height:40px">
                                                                        <?php if ($foto==""){
                                                                            echo "Tidak ada file dipilih";    
                                                                        }else{ ?>
                                                                            <img src='<?php echo base_url().'assets/frontend/uploads/informasi_foto/'.$foto;?>'>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="width:100%;height:40px"></div>
                                                                    <span class="btn btn-default btn-file" style="left: 5px;">
                                                                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i>Pilih File</span>
                                                                        <span class="fileupload-exists">Ubah</span>
                                                                        <input type="file" class="default" name="foto" data-show-preview="false">
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
                                                            <label class="col-sm-2 col-sm-2 control-label">File</label>
                                                            <div class="col-lg-10">
                                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                    <div class="fileupload-new thumbnail" style="width:100%; padding:10px;height:40px">
                                                                        <?php if ($file==""){
                                                                            echo "Tidak ada file dipilih";    
                                                                        }else{ ?>
                                                                            <a href='<?php echo base_url().'assets/frontend/uploads/informasi_file/'.$file;?>'><?php echo $file?></a>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="width:100%;height:40px"></div>
                                                                    <span class="btn btn-default btn-file" style="left: 5px;">
                                                                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i>Pilih File</span>
                                                                        <span class="fileupload-exists">Ubah</span>
                                                                        <input type="file" class="default" name="file" >
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
                                                        <br>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <br>
                                                        <textarea name="isi" class="mytextarea"><?php echo "$isinya"; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>