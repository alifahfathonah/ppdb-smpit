$(document).ready(function(){
    var daftar_siswa = {	
		beforeSend: function()
		{
			$("#progress").show();
			//clear everything
			$("#bar").width('0%');
			$("#message").html("");
			$("#percent").html("0%");
		},	
		uploadProgress: function(event, position, total, percentComplete)
		{
			$("#bar").width(percentComplete+'%');
			$("#percent").html(percentComplete+'%');
			$("#pesan").html('<center style="color:red;font-weight:bold">...Sedang Memproses Pendaftaran Anda...</center>');

		},	
		success: function()
		{
			$("#bar").width('100%');
			$("#percent").html('100%');
			$("#pesan").html('<center style="color:green;font-weight:bold">...Pendaftaran Anda Berhasil. Silahkan Tunggu...</center>');
			window.location.assign("pendaftaran_sukses");
		}
	};	
	////where myForm is the form id
     $("#pendaftaran").ajaxForm(daftar_siswa);	 
});
