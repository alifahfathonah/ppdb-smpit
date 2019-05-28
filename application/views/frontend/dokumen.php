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
		<ul class="messages">
			<?php foreach ($data as $data) { 
				if (substr($data['tanggal'], 5,2) == '01' ) {
			        $bulan = "Januari"; }
			    if (substr($data['tanggal'], 5,2) == '02' ) {
			        $bulan = "Februari"; }
			    if (substr($data['tanggal'], 5,2) == '03' ) {
			        $bulan = "Maret"; }
			    if (substr($data['tanggal'], 5,2) == '04' ) {
			        $bulan = "April"; }
			    if (substr($data['tanggal'], 5,2) == '05' ) {
			        $bulan = "Mei"; }
			    if (substr($data['tanggal'], 5,2) == '06' ) {
			        $bulan = "Juni"; }
			    if (substr($data['tanggal'], 5,2) == '07' ) {
			        $bulan = "Juli"; }
			    if (substr($data['tanggal'], 5,2) == '08' ) {
			        $bulan = "Agustus"; }
			    if (substr($data['tanggal'], 5,2) == '09' ) {
			        $bulan = "September"; }
			    if (substr($data['tanggal'], 5,2) == '10') {
			        $bulan = "Oktober"; }
			    if (substr($data['tanggal'], 5,2) == '11') {
			        $bulan = "November"; }
			    if (substr($data['tanggal'], 5,2) == '12') {
			        $bulan = "Desember"; }
			?>
            <li>
                <i class="fa fa-file-o fa-4x"></i>
                <div class="message_date">
                    <h3 class="date text-info"><?php echo substr($data['tanggal'], 8,2); ?></h3>
                    <p class="month"><?php echo $bulan ?><br/><?php echo substr($data['tanggal'], 0,4); ?></p>
                </div>
                <div class="message_wrapper">
                    <h4 class="heading"><?php echo $data['nama'] ?></h4>
                    <blockquote class="message small"><?php echo $data['keterangan']?></blockquote>
                    <br>
                    <p class="url">
                        <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                        <a href="<?php echo base_url()."assets/frontend/uploads/dokumen/".$data['file'];?>"><i class="fa fa-paperclip"></i> <?php echo $data['file']?> </a>
                    </p>
                </div>
            </li>
			<?php } ?>
        </ul>
		<div class="col-lg-12">
			<div style="text-align:center"><?php echo $this->pagination->create_links(); ?></div>
		</div>
	</section>
</div>