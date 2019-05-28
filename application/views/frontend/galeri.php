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
<div class="col-lg-12">
	<section id="post">
		<div id="gallery" class="media-gal">
	        <?php foreach ($data as $data) {?>
	        <div class="item">
	            <a href="<?php echo base_url().'home/foto/'.$data->id_album.'/1';?>">
	                <img src="<?php echo base_url().'assets/backend/images/folder.png';?>" alt="" />
	            </a>
	            <p><?php if ($data->status==1) {
	                    echo '<i class="fa fa-users tooltips" data-original-title="Terlihat Semua Orang" data-toggle="tooltip" data-placement="top" title=""></i>';
	                }else{
	                    echo '<i class="fa fa-lock tooltips" data-original-title="Hanya Saya yang Melihat" data-toggle="tooltip" data-placement="top" title=""></i>';
	                };?> <?php echo $data->nama;?>
	            </p>
	        </div>
	        <?php } ?>
	    </div>
		<div class="col-lg-12">
			<div style="text-align:center"><?php echo $this->pagination->create_links(); ?></div>
		</div>
	</section>
</div>