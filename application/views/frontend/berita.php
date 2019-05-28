<section id="title">

	<div class="col-lg-12">

        <div class="row">

            <div class="col-lg-12 text-center">

                <div class="title-section">

                <h2 class="title"><?php echo $title;?></h2> 

                <hr class="primary">

            </div>

        </div>

    </div>

</section>

<div class="col-lg-8">

	<section id="post">

		<?php foreach ($data as $data) { ?>

	    <div class="col-lg-12">

	    	<div class="row blog">

	            <div class="col-md-5">

	            	<div class="post-cover">

	            		<a href="<?php echo base_url().'home/detail/'.$data['id'];?>" class="post-img hvr-pulse-shrink">

		                    <img class="img-responsive" src="

		                    <?php if (empty($data['foto'])) {

		                    	echo base_url().'assets/backend/images/notfound.jpg';

		                    }else{

		                    	echo base_url().'assets/frontend/uploads/informasi_foto/'.$data['foto'];

		                    }?>

		                    " alt="<?php echo $title;?>">

		                </a>

	            	</div>

	            </div>

	            <div class="col-md-7 post">

	                <h1 class="post-title"><a href="<?php echo base_url().'home/detail/'.$data['id'];?>"><?php echo $data['judul'];?></a></h1>

	                <div class="meta">

	                	<span><i class="fa fa-calendar"></i> <?php echo $data['tanggal'] ?></span>

	                	<span><i class="fa fa-user"></i> Admin</span>

	                </div>

	                <p><?php 

	                	$text  = word_limiter($data['isi'],20);

						$hasil = strip_tags($text);

	                	echo $hasil; ?>

	                </p>

	            </div>

	        </div>

	    </div>

		<?php } ?>

		<div class="col-lg-12">

			<div style="text-align:center"><?php print $halaman;?></div>

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