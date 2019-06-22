$(document).ready(function() {
	toastr.options = {
			"closeButton" : true,
			"debug" : false,
			"newestOnTop" : false,
			"progressBar" : true,
			"positionClass" : "toast-top-right",
			"preventDuplicates" : false,
			"onclick" : null,
			"showDuration" : "300",
			"hideDuration" : "1000",
			"timeOut" : "5000",
			"extendedTimeOut" : "1000",
			"showEasing" : "swing",
			"hideEasing" : "linear",
			"showMethod" : "fadeIn",
			"hideMethod" : "fadeOut"
		}

	$('#kirim_komentar').on('click', function() {
		var artikel_id = $('#artikel_id').val();
		var komentar_nama = $('#komentar_nama').val();
		var komentar_email = $('#komentar_email').val();
		var komentar_isi = $('#komentar_isi').val();
		if (komentar_nama == '') {
			Command: toastr["error"]("Nama belum di Input !", "KQC | Pesan")
			$('#komentar_nama').focus();
			return false;
		}
		if (komentar_email == '') {
			Command: toastr["error"]("Email belum di Input !", "KQC | Pesan")
			$('#komentar_email').focus();
			return false;
		}
		if (komentar_isi == '') {
			Command: toastr["error"]("Isi Komentar belum di Input !", "KQC | Pesan")
			$('#komentar_isi').focus();
			return false;
		}
		var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(!regex.test(komentar_email)) {
			Command: toastr["error"]("Format Email yang di Input tidak tepat !", "KQC | Pesan")
			$('#komentar_email').focus();
            return false;
        }
		$.ajax({
			type : "POST",
			url : base_url + "kirim_komentar",
			dataType : "JSON",
			data : {
				artikel_id : artikel_id,
				komentar_nama : komentar_nama,
				komentar_email : komentar_email,
				komentar_isi : komentar_isi
			},
			success : function(data) {
				Command: toastr["success"]("Terima kasih telah menulis komentar di artikel ini, \n Komentar anda akan muncul jika lulus ferifikasi.", "KQC | Pesan")
				$('[name="komentar_nama"]').val("");
				$('[name="komentar_email"]').val("");
				$('[name="komentar_isi"]').val("");
			
			},
			error : function(errMsg, txtStatus, errorThrown) {
				alert('gagal ' + errMsg + txtStatus);
			},
		});
		return false;
	});
	
	function get_filter(class_name) {
		var filter = [];
		$('.' + class_name + ':checked').each(function() {
			filter.push($(this).val());
		});
		return filter;
	}
	
	$('.minimal').click(function() {
		load_list_artikel(1);
	});

	$('#btn_cari').on('click', function() {

		load_list_artikel(1);
	});

	$('#keyword').keyup(function(e) {
		if (e.keyCode == 13) {
			load_list_artikel(1);
		}

	});
	
	function load_list_artikel(page) {
		$('#artikel_list').html('<div id="loading" style="" ></div>');

		var keyword = $('#keyword').val();
		var kategori = get_filter('kategori');

		$.ajax({
			type : "POST",
			dataType : "JSON",
			url : base_url + "artikel/get_artikel/" + page,
			data : {
				keyword : keyword,
				kategori : kategori
			},
			success : function(data) {
				$('#artikel_list').html(data.artikel_data);
				$('#page_artikel').html(data.pagination_link);
				$('#content_artikel_detail').remove();
				// alert(data.kategori_data);
			}

		});
		return false;
	}
	
	$(document).on('click', '.pagination li a', function(event) {
		event.preventDefault();
		var page = $(this).data('ci-pagination-page');
		load_list_artikel(page);
	});	

});