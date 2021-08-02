(function($){
	$.fn.checkboxTable = function() {
	target = this;
 
	// Клик по checkbox в шапке таблицы.
	$(target).on('click', 'thead :checkbox', function() {
		var check = this;
		$(this).parents('table').find('tbody :checkbox').each(function(){
			if ($(check).is(':checked')) {
				$(this).prop('checked', true);
				$(this).parents('tr').addClass('selected');
			} else {
				$(this).prop('checked', false);
				$(this).parents('tr').removeClass('selected');
			}
		});
	});
 
	// Клик по checkbox в строке таблицы.
	$(target).on('click', 'tbody :checkbox', function() {
		var parents = $(this).parents('table');
			if ($(this).is(':checked')) {
				$(this).parents('tr').addClass('selected');
				$(parents).find('thead :checkbox').prop('checked', true);
			} else {
				$(this).parents('tr').removeClass('selected');
				if ($(parents).find('tbody :checkbox:checked').length == 0) {
					$(parents).find('thead :checkbox').prop('checked', false);
				}
			}
		}); 
	};
})(jQuery);

jQuery(document).ready(function($){
	$('button').on('click', function(e){
	var button = e.target.id;
	var values = [];
		$('[name="chekUser"]:checked').each(function(){
		  values.push($(this).val());
		}); 

		$.ajax({
			method: "POST",
			url: "function.php",
			data: {
				button:button,
				values:values				 
			}
		});
		window.location.reload();
			
		
    }); 
});
    
    
