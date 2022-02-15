$(document).ready(function(){

	//event ketika keyword ditulis
	$('#keyword').on('keyup', function(){
		//munculkan icon cari
		$('.rounded').show();
		//ajax menggunakan load
		//$('#container').load('ajax/tampil.php?keyword='+ $('#keyword').val());

		//$.get()
		$.get('ajax/tampil.php?keyword='+ $('#keyword').val(), function(data){
			$('#container').html(data);
			$('.rounded').hide();
		})
	});


});