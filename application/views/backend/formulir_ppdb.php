<html>
<head>
	<title><?php echo $title ?></title>
	<style type="text/css">
		body {
		  background: rgb(204,204,204); 
		}
		page[size="A4"] {
		  background: white;
		  width: 21cm;
		  height: 29.7cm;
		  display: block;
		  margin: 0 auto;
		  margin-bottom: 0.5cm;
		  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
		}
		@media print {
		  body, page[size="A4"] {
		    margin: 0;
		    box-shadow: 0;
		  }
		}		
	</style>	
</head>
<body onload="window.print()">	
	<?php 
	for ($i=1; $i<=8 ; $i++) {
		if (empty($data[0]['dok_'.$i])){
				echo '<page size="A4"><center><img id="idgambar" src="'.base_url().'assets/backend/images/nodata.jpg'.'"></center></page>';
			}else{
				echo '<page size="A4"><center><img id="idgambar" style="width: 21cm;height: 29.7cm;" src="'.base_url().'assets/frontend/uploads/dokumen_ppdb/'.$data[0]['dok_'.$i].'"></center></page>';
			};		
	}
	?>
	
</body>
</html>