<!DOCTYPE html>

<html lang="en">



<head>

	<meta content='text/html; charset=UTF-8' http-equiv='Content-Type' />

	<title>SMP IT Bengkulu</title>

	<meta name="author" content="Rumah AITI">

	<meta name="description" content="">

	<meta name="keyword" content="">

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Bootstrap Core CSS -->

	<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/bootstrap.min.css'); ?>" type="text/css">

	<!-- Custom Fonts -->

	<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'> -->

	<link rel="stylesheet" href="<?php echo base_url('assets/frontend/font-awesome/css/font-awesome.min.css'); ?>" type="text/css">

	<!-- Plugin CSS -->

	<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/animate.min.css'); ?>" type="text/css">

	<!-- Custom CSS -->

	<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/creative.css'); ?>" type="text/css">

	<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/bootstrap-fileupload.min.css'); ?>" type="text/css">
</head>



<body>

	<div class="container">

		<div class="row">

			<div class="col-lg-8" style="float: none; margin: 75px auto;">

				<div class="panel panel-primary">

					<div class="panel-heading">

						<h3 class="panel-title">Registrasi </h3> </div>

					<div class="panel-body">

						<div class="form-horizontal">

							<div class="col-lg-12">

								<div class="alert alert-success alert-block fade in">

									<button type="button" class="close close-sm" data-dismiss="alert"> <i class="fa fa-times"></i> </button>

									<h4>                                        Info :                                    </h4>

									<p>Simpan atau cetak Nomor Registrasi anda yang digunakan untuk proses selanjutnya.<br>Kemudian Silahkan Transfer Biaya Pendaftaran sebesar <b>Rp <?php echo number_format(300000+substr($data[0]['no_registrasi'],9,3),0,",",".").',-'; ?></b> ke Rekening BNI Cabang Bengkulu No.Rek :2<b>0247791228</b> a.n. <b>Bpk. Syaidina Hamzah</b></p>

								</div>

							</div>

							<div class="form-group" style="border: 1px solid #ddd; display: flex;">

								<label class="col-lg-12 text-center">No Registrasi : <span class="primary" style="font-size: 35px"><?php echo $data[0]['no_registrasi'] ?></span> </label>

							</div>

							<div class="col-lg-8">

								<div class="form-group">

									<label class="col-sm-6 control-label">Nama</label>

									<div class="col-sm-6">

										<label class="control-label">:

											<?php echo $data[0]['nama'] ?> </label>

									</div>

								</div>

								<div class="form-group">

									<label class="col-sm-6 control-label">Tempat, Tanggal Lahir</label>

									<div class="col-sm-6">

										<label class="control-label">:

											<?php echo $data[0]['tempat_lahir']. ", ".date( "d-m-Y",strtotime($data[0]['tanggal_lahir'])) ?> </label>

									</div>

								</div>

								<div class="form-group">

									<label class="col-sm-6 control-label">Jenis Kelamin</label>

									<div class="col-sm-6">

										<label class="control-label">:

											<?php $jk=$data[0]['jenis_kelamin']; if($jk=="L" ) { echo "Laki-Laki"; }elseif ($jk=="P" ) { echo "Perempuan"; }?> </label>

									</div>

								</div>

								<div class="form-group">

									<label class="col-sm-6 control-label">Asal Sekolah</label>

									<div class="col-sm-6">

										<label class="control-label">:

											<?php echo $data[0]['asal_sekolah'] ?> </label>

									</div>

								</div>

							</div>

							<div class="col-lg-4"> <img class="img-responsive" src="<?php echo base_url().'assets/frontend/uploads/foto/'.$data[0]['foto'] ?>" /> </div>

						</div>

					</div>

				</div>

				<div>

					<a href="<?php echo base_url('calon_siswa/keluar'); ?>" class="btn btn-primary btn-lg"><i class="fa fa-backward fa-fw"></i>Kembali</a>

					<a href="<?php echo base_url('calon_siswa/cetak_pendaftaran'); ?>" target="_blank" class="btn btn-primary btn-lg" style="float:right;"><i class="fa fa-print fa-fw"></i>Cetak</a>

				</div>

			</div>

		</div>

	</div>	

	<!-- jQuery -->

	<script src="<?php echo base_url('assets/frontend/js/jquery.js');?>"></script>

	<!-- Bootstrap Core JavaScript -->

	<script src="<?php echo base_url('assets/frontend/js/bootstrap.min.js');?>"></script>

	<script src="<?php echo base_url('assets/frontend/js/bootstrap-fileupload.min.js');?>"></script>

	<!-- Plugin JavaScript -->

	<script src="<?php echo base_url('assets/frontend/js/jquery.easing.min.js');?>"></script>

	<script src="<?php echo base_url('assets/frontend/js/wow.min.js');?>"></script>
</body>
</html>