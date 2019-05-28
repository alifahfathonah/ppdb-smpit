<html>
<head>
	<title></title>	
	<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/bootstrap.min.css'); ?>" type="text/css">
	
	<style type="text/css">
	table{
			
	    border: 1px solid black;	    
	}
	th{
		background-color: #eee;
    	font-weight: bold;
    	text-align: center;
	}
	hr{
	    border-top: 3px double #8c8b8b;
	    margin-top: -4px;
	}
	p{
		width:100%;
		font-style:italic;
	}
	</style>	
</head>
<body onload="window.print()">
	<div class="page">
		<div class="page-potrait">
			<div class="nobreak">
				<table class="table" border="0" width="100%" cellspacing="5" cellpadding="5">
		<tr>
			<th colspan="4">BUKTI PENDAFTARAN</th>
		</tr>
		<tr>
			<td colspan="4"><hr></td>
		</tr>
		<tr>
			<td style="width: 37%;">No Registrasi</td>
			<td style="width: 10px;">:</td>
			<td><?php echo $data[0]['no_registrasi'] ?></td>    
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><?php echo $data[0][ 'nama'] ?></td>	    
		</tr>
		<tr>
			<td>Tempat, Tanggal Lahir</td>
			<td>:</td>
			<td><?php echo $data[0][ 'tempat_lahir']. ", ".date( "d-m-Y",strtotime($data[0][ 'tanggal_lahir'])) ?></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>:</td>
			<td><?php $jk=$data[0][ 'jenis_kelamin']; if($jk=="L" ) { echo "Laki-Laki"; }elseif ($jk=="P" ) { echo "Perempuan"; }?></td>
		</tr>
		<tr>
			<td>Asal Sekolah</td>
			<td>:</td>
			<td><?php echo $data[0][ 'asal_sekolah'] ?></td>
		</tr>
	</table>
	<p>Catatan: Simpan bukti pendaftaran ini sebagai pengingat nomor registrasi anda yang akan digunakan pada proses pendaftaran selanjutnya<br>Kemudian Silahkan Transfer Biaya Pendaftaran sebesar <b>Rp <?php echo number_format(300000+substr($data[0]['no_registrasi'],9,3),0,",",".").',-'; ?></b> ke Rekening BNI Cabang Bengkulu No.Rek : <b>0247791228</b> a.n. <b>Bpk. Syaidina Hamzah</b></p>
			</div>
		</div>
	</div>
</body>
</html>