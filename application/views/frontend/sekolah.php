<section id="title">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="title-section">
					<h2 class="title"><?php echo $title;?></h2>
					<hr class="primary"> </div>
			</div>
		</div>
</section>
<div class="col-lg-12">
	<section id="post">
		<div class="col-lg-12 blog">
			<div class="blog-text">
				<img class="img-responsive text-center" src="<?php echo base_url('assets/frontend/images/profil/'.$data[0]['foto']);?>" alt="">
				<p><?php echo $data[0]['keterangan']; ?></p>
			</div>
		</div>
	</section>
</div>