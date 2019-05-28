$(document).ready(function(){	
	var upload_berkas = {	
		beforeSend: function()
		{
			$("#progress2").show();
			//clear everything
			$("#bar2").width('0%');
			$("#message2").html("");
			$("#percent2").html("0%");
		},	
		uploadProgress: function(event, position, total, percentComplete)
		{
			$("#bar2").width(percentComplete+'%');
			$("#percent2").html(percentComplete+'%');
			$("#pesan2").html('<center style="color:red;font-weight:bold">...Pembaharuan Berkas Sedang Berlangsung...</center>');

		},	
		success: function()
		{
			$("#bar2").width('100%');
			$("#percent2").html('100%');
			$("#pesan2").html('<center style="color:green;font-weight:bold">...Pembaharuan Berkas Selesai...</center>');
			window.location.assign("konfirmasi_pembayaran_");
		}
	};
	 $("#uploadBerkas").ajaxForm(upload_berkas);

});
