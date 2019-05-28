<section id="title">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="title-section">
					<h2 class="title"><?php echo $data[0]['judul'];?></h2>
					<hr class="primary"> </div>
			</div>
		</div>
</section>
<div class="col-lg-8">
	<section id="post">
		<div class="col-lg-12 blog">
			<div class="blog-text">
				<img class="img-responsive text-center" src="
				<?php if (empty($data[0]['foto'])) {
                	echo base_url().'assets/backend/images/notfound.jpg';
                }else{
                	echo base_url()."assets/frontend/uploads/informasi_foto/".$data[0]['foto'];
                }?>" alt="<?php echo $data[0]['judul'];?>">
				<?php echo $data[0]['isi'];?>
				<?php if (!empty($data[0]['file'])): ?>
					<hr/>
					<p class="url">
	                    <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
	                    <a href="<?php echo base_url()."assets/frontend/uploads/informasi_file/".$data[0]['file'];?>"><i class="fa fa-paperclip"></i> <?php echo $data[0]['file']?> </a>
	                </p>
				<?php endif ?>
			</div>
		</div>
	</section>
</div>
<div class="col-lg-4">
	<div class="widget">
		<h2 class="widget-title"><i class="fa fa-bullhorn"></i> Pengumuman </h2>
		<div class="widget-content">
			<ul>
				<?php foreach ($pengumuman as $pengumuman) { ?>
				<li>
					<div class="item-content">
						<div class="item-thumbnail">
							<a href="<?php echo base_url().'home/detail/'.$pengumuman['id'];?>" target="_blank"><img src="
							<?php if (empty($pengumuman['foto'])) {
		                    	echo base_url().'assets/backend/images/notfound.jpg';
		                    }else{
		                    	echo base_url().'assets/frontend/uploads/informasi_foto/'.$pengumuman['foto'];
		                    }?>
							"></a>
						</div>
						<div class="item-title">
							<a href="<?php echo base_url().'home/detail/'.$pengumuman['id'];?>"><?php echo $pengumuman['judul'];?></a>
						</div>
					</div>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>
	<div class="widget">
		<h2 class="widget-title"><i class="fa fa-newspaper-o"></i> Berita </h2>
		<div class="widget-content">
			<ul>
				<?php foreach ($berita as $berita) { ?>
				<li>
					<div class="item-content">
						<div class="item-thumbnail">
							<a href="<?php echo base_url().'home/detail/'.$berita['id'];?>" target="_blank"><img src="
							<?php if (empty($berita['foto'])) {
		                    	echo base_url().'assets/backend/images/notfound.jpg';
		                    }else{
		                    	echo base_url().'assets/frontend/uploads/informasi_foto/'.$berita['foto'];
		                    }?>"></a>
						</div>
						<div class="item-title">
							<a href="<?php echo base_url().'home/detail/'.$berita['id'];?>"><?php echo $berita['judul'];?></a>
						</div>
					</div>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>