$(document).ready(function(){	
	var upload_bukti = {	
		beforeSend: function()
		{
			$("#progress1").show();
			//clear everything
			$("#bar1").width('0%');
			$("#message1").html("");
			$("#percent1").html("0%");
		},	
		uploadProgress: function(event, position, total, percentComplete)
		{
			$("#bar1").width(percentComplete+'%');
			$("#percent1").html(percentComplete+'%');
			$("#pesan1").html('<center style="color:red;font-weight:bold">...Unggah Bukti Pembayaran Sedang Berlangsung...</center>');

		},	
		success: function()
		{
			$("#bar1").width('100%');
			$("#percent1").html('100%');
			$("#pesan1").html('<center style="color:green;font-weight:bold">...Unggah Bukti Pembayaran Selesai...</center>');
			window.location.assign("konfirmasi_pembayaran_");
		}
	};
	 $("#uploadBukti").ajaxForm(upload_bukti);

});
