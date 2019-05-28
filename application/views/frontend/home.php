                <div class="skdslider">

                    <ul id="demo1" class="slides">

                        <?php foreach ($data as $data) { ?>

                        <li>

                            <img src="<?php echo base_url().'assets/backend/images/gallery/'.$data['foto']; ?>" />

                            <div class="slide-desc">

                                <h2><?php echo $data['nama']?></h2>

                                <p><?php echo $data['deskripsi']?></p>

                            </div>

                        </li>

                        <?php } ?>

                    </ul>

                </div>

                <section id="title">

                    <div class="col-lg-12">

                        <div class="row">

                            <div class="col-lg-12 text-center">

                                <div class="title-section">

                                <h2 class="title" style="font-family: fantasy">Ahlan Wa Sahlan</h2> 
				<p style="margin:0px;font-size:xx-large">Selamat Datang di Web <a href="#">SMPIT Bengkulu</a></p>
                                <p style="font-family: monospace;">Building Charracter to Become an Agent of Change</p></div>

                                <hr class="primary">

                            </div>

                        </div>

                    </div>

                </section>

                <section id="services">

                    <div class="col-lg-12">

                        <div class="row">

                            <a href="<?php echo base_url('home/berita');?>" class="menu-ico">

                                <div class="col-lg-15 col-md-6 text-center services border-right">

                                    <div class="service-box">

                                        <h3>Berita</h3>

                                        <div class="ico primary">

                                            <i class="fa fa-4x fa-newspaper-o wow bounceIn"></i>

                                        </div>

                                        <p>Temukan berita terbaru dari SMP IT Bengkulu.</p>

                                    </div>

                                </div>

                            </a>

                            <a href="<?php echo base_url('home/pengumuman');?>" class="menu-ico">

                                <div class="col-lg-15 col-md-6 text-center services border-right">

                                    <div class="service-box">

                                        <h3>Pengumuman</h3>

                                        <div class="ico info">

                                            <i class="fa fa-4x fa-bullhorn wow bounceIn" data-wow-delay=".1s"></i>

                                        </div>

                                        <p>Temukan pengumuman terbaru dari SMP IT Bengkulu.</p>

                                    </div>

                                </div>

                            </a>

                            <a href="<?php echo base_url('home/galeri');?>" class="menu-ico">

                                <div class="col-lg-15 col-md-6 text-center services border-right">

                                    <div class="service-box">

                                        <h3>Galeri</h3>

                                        <div class="ico warning">

                                            <i class="fa fa-4x fa-camera wow bounceIn" data-wow-delay=".2s"></i>

                                        </div>

                                        <p>Galeri kegiatan Siswa, Hasil Editing Siswa, Profile Sekolah, Pramuka, Ekstra Dll disini.</p>

                                    </div>

                                </div>

                            </a>

                             <a href="<?php echo base_url('home/dokumen');?>" class="menu-ico">

                                <div class="col-lg-15 col-md-6 text-center services border-right">

                                    <div class="service-box">

                                        <h3>Dokumen</h3>

                                        <div class="ico primary">

                                            <i class="fa fa-4x fa-file-o wow bounceIn"></i>

                                        </div>

                                        <p>Temukan berita terbaru dari SMP IT Bengkulu.</p>

                                    </div>

                                </div>

                            </a>

                            <a href="<?php echo base_url('calon_siswa/ppdb')?>" class="menu-ico">

                                <div class="col-lg-15 col-md-6 text-center services">

                                    <div class="service-box">

                                        <h3>PPDB</h3>

                                        <div class="ico danger">

                                            <i class="fa fa-4x fa-book wow bounceIn" data-wow-delay=".3s"></i>

                                        </div>

                                        <p>Penerimaan Peserta Didik Baru.</p>

                                    </div>

                                </div>

                            </a>

                        </div>

                    </div>
                    <div class="col-lg-12">
                        <div class="row latepost">
                            <h4><span>Latepost</span></h4>
                            <?php foreach ($berita as $berita): ?>
                            <div class="col-md-4">
                                <div class="thumbnail">
                                    <div class="post-label">
                                        <span>Berita</span>
                                    </div>
                                    <div class="img-hover">
                                        <a href="<?php echo base_url().'home/detail/'.$berita['id'];?>">
                                            <div class="thumbnail-hover"></div>
                                            <img src="<?php if (empty($berita['foto'])) {
                                                echo base_url().'assets/backend/images/notfound.jpg';
                                            }else{
                                                echo base_url().'assets/frontend/uploads/informasi_foto/'.$berita['foto'];
                                            }?>" class="img-responsive" alt="<?php echo $berita['judul'];?>">
                                        </a>
                                    </div>
                                    <div class="blog-list-detail">
                                        <div class="blog-header">
                                            <h2><a href="<?php echo base_url().'home/detail/'.$berita['id'];?>"><?php echo $berita['judul'];?></a></h2>
                                        </div>
                                        <nav class="blog-meta">
                                            <span><i class="fa fa-calendar"></i> <?php echo $berita['tanggal'] ?></span>
                                            <span><i class="fa fa-user"></i> Admin</span>
                                        </nav>
                                        <p class="small"><?php 
                                            $text  = word_limiter($berita['isi'],10);
                                            $hasil = strip_tags($text);
                                            echo $hasil; ?></p>
                                        <a class="btn btn-default btn-sm" href="<?php echo base_url().'home/detail/'.$berita['id'];?>" style="background:#78d18b; color:#fff; border:0">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                            <?php foreach ($pengumuman as $pengumuman): ?>
                            <div class="col-md-4">
                                <div class="thumbnail">
                                    <div class="post-label">
                                        <span>Pengumuman</span>
                                    </div>
                                    <div class="img-hover">
                                        <a href="<?php echo base_url().'home/detail/'.$pengumuman['id'];?>">
                                            <div class="thumbnail-hover"></div>
                                            <img src="<?php if (empty($pengumuman['foto'])) {
                                                echo base_url().'assets/backend/images/notfound.jpg';
                                            }else{
                                                echo base_url().'assets/frontend/uploads/informasi_foto/'.$pengumuman['foto'];
                                            }?>" class="img-responsive" alt="<?php echo $pengumuman['judul'];?>">
                                        </a>
                                    </div>
                                    <div class="blog-list-detail">
                                        <div class="blog-header">
                                            <h2><a href="<?php echo base_url().'home/detail/'.$pengumuman['id'];?>"><?php echo $pengumuman['judul'];?></a></h2>
                                        </div>
                                        <nav class="blog-meta">
                                            <span><i class="fa fa-calendar"></i> <?php echo $pengumuman['tanggal'] ?></span>
                                            <span><i class="fa fa-user"></i> Admin</span>
                                        </nav>
                                        <p class="small"><?php 
                                            $text  = word_limiter($pengumuman['isi'],10);
                                            $hasil = strip_tags($text);
                                            echo $hasil; ?></p>
                                        <a class="btn btn-default btn-sm" href="<?php echo base_url().'home/detail/'.$pengumuman['id'];?>" style="background:#78d18b; color:#fff; border:0">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </section>