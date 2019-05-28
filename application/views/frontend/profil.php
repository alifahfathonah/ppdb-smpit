                <section id="title">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <div class="title-section">
                                <h2 class="title"><?php echo $title;?></a></h2> 
                                <hr class="primary">
                            </div>
                        </div>
                    </div>
                </section>
                <section id="profil">
                    <div class="col-lg-12">
                        <div class="row">
                            <?php if(empty($data[0]['id'])){
                                echo "<p class='text-center'>Data tidak Tersedia</p>";
                            }else{
                            foreach ($data as $data) { ?>
                            <div class="col-md-6 col-sm-6">
                                <div class="panel">
                                    <div class="panel-body border">
                                        <h4><?php echo $data['nama']?></h4>
                                        <div class="media portfolio">
                                            <a class="gambar pull-left" href="<?php 
                                                if (empty($data['foto'])) {
                                                  echo base_url().'assets/backend/images/notfound.jpg';
                                                }else{
                                                    echo base_url()."assets/frontend/images/profil/".$data['foto'];
                                                }?>" title="<?php echo $data['nama'];?>">
                                                <img class="thumb media-object" src="<?php 
                                                if (empty($data['foto'])) {
                                                  echo base_url().'assets/backend/images/notfound.jpg';
                                                }else{
                                                    echo base_url()."assets/frontend/images/profil/".$data['foto'];
                                                }?>" alt="<?php echo $data['nama'];?>">
                                            </a>
                                            <div class="media-body">
                                                <?php echo $data['keterangan']?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }} ?>
                            <div class="col-md-12 text-center">
                                <?php print $halaman;?> 
                            </div>
                        </div>
                    </div>
                </section>