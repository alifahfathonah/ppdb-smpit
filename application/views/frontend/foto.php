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
		<ul id="portfolio" class="clearfix portfolio">
	      <?php foreach ($data as $data) {
	            if (empty($data->id_gambar)) {
	                echo "<p style='text-align:center'>Belum Ada Gambar</p>";
	            }else{?>
	                <li>
	                    <a href="<?php echo base_url().'assets/backend/images/gallery/'.$data->foto;?>" title="<?php echo $data->deskripsi ?> - by : <?php echo $data->pengunggah ?>">
	                        <img src="<?php echo base_url().'assets/backend/images/gallery/'.$data->foto;?>" alt="<?php echo $data->deskripsi ?>">
	                    </a>
	                </li>
	        <?php }} ?>
	    </ul>
		<div class="col-lg-12">
			<div style="text-align:center"><?php echo $this->pagination->create_links(); ?></div>
		</div>
	</section>
</div>