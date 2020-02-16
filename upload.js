$(document).ready(function() {
		Site.run();
		$('.fuel_type').val(0);
		$('input:checkbox').attr('checked', false); // Unchecks it
		total = 0;
		$('.total-amount-text').html(total);


	$.ajaxSetup({
		headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	var total = 0;
	if ($('input.price-checkbox').is(':checked')) {
		var amount = $(this).attr('data-price');
		amount = parseInt(amount);
		total = total + amount;
		$('.total-amount-text').text(total);
	}

	if ($('.stage_type').val() === null){
		$('input:checkbox').attr('checked', false); // Unchecks it
		total = 0;
		$('.total-amount-text').html(total);
	}

    $('input.price-checkbox').change(function() {
    	var amount = $(this).attr('data-price');
			amount = parseInt(amount);
	    if($(this).is(":checked")) {
			total = total + amount;
	    } else {
	    	total = total - amount;
	    }
	    $('.total-amount-text').text(total);
    });

	$('.stage_type').on('change', function() {
		$('input:checkbox').attr('checked', false); // Unchecks it
		total = 0;
		$('.total-amount-text').html(total);
		var opt = $(this).val();
        $.ajax({
            type: 'POST',
            data: { id: opt },
            url: '{{ route("ajax.price") }}',
            success: function(response){
            	total = 0;
            	amount = parseInt(response);
            	total = total + amount;
                $('.total-amount-text').html(total);
            },
        });
	});

	$('.fuel_type').on('change', function() {
		$('input:checkbox').attr('checked', false); // Unchecks it
		total = 0;
		$('.total-amount-text').html(total);
	});


    function fetchData(target, opt) {
        $.ajax({
            type: 'POST',
            data: { id: opt, list: target },
            url: '{{ route("ajax.data") }}',
            success: function(response){
                $('.' + target).html('<option selected="selected" disabled="disabled" value="0">---</option>');
                jQuery.each(response, function(i,post){
                    var newRow = "<option value=" + post.id + ">" + post.name + "</option>";
                    $(newRow).appendTo('.' + target);
                  });
            },
        });
    }
	$('.make').on('change', function() {
	    fetchData('model', $(this).val());
	});
	$('.model').on('change', function() {
	    fetchData('engine', $(this).val());
	});
	$('.fuel_type').on('change', function() {
	    fetchData('stage_type', $(this).val());
	});
});