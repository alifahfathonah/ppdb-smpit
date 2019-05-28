$(document).ready(function(){	
	var upload_dokumen = {	
		beforeSend: function()
		{
			$("#progress3").show();
			//clear everything
			$("#bar3").width('0%');
			$("#message3").html("");
			$("#percent3").html("0%");
		},	
		uploadProgress: function(event, position, total, percentComplete)
		{
			$("#bar3").width(percentComplete+'%');
			$("#percent3").html(percentComplete+'%');
			$("#pesan3").html('<center style="color:red;font-weight:bold">...Unggah Formulir Sedang Berlangsung...</center>');

		},	
		success: function()
		{
			$("#bar3").width('100%');
			$("#percent3").html('100%');
			$("#pesan3").html('<center style="color:green;font-weight:bold">...Unggah Formulir Selesai...</center>');
			window.location.assign("konfirmasi_pembayaran_");
		}
	};
	 $("#uploadPPDB").ajaxForm(upload_dokumen);

});
