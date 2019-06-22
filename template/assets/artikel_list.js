$(document).ready(function() {
		
	load_artikel(1);
	function load_artikel(page) {
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
				
				// alert(data.kategori_data);
			}

		});
		return false;
	}

	function get_filter(class_name) {
		var filter = [];
		$('.' + class_name + ':checked').each(function() {
			filter.push($(this).val());
		});
		return filter;
	}

	$('.minimal').click(function() {
		load_artikel(1);
	});

	$('#btn_cari').on('click', function() {

		load_artikel(1);
	});

	$('#keyword').keyup(function(e) {
		if (e.keyCode == 13) {
			load_artikel(1);
		}

	});

	$(document).on('click', '.pagination li a', function(event) {
		event.preventDefault();
		var page = $(this).data('ci-pagination-page');
		load_artikel(page);
	});
	
	
})