$(document).ready(function() {

	$('#rmore').click(function() {
		$('#hiddenTxt').toggle();
		if ($('#rmore').html() == "Read more ...") {
			$('#rmore').html('Hide');
		} else {
			$('#rmore').html('Read more ...');
		}
	});

	$('#donateBtn').click(function() {
		window.location.href = '/donate';
		return false;
	});
	
	
	
	$('#closeModal').click(function(){
		$.modal.close();
	});

	$('#closeModalError').click(function(){
		$.modal.close();
	});
	
	
	$('#donateDo').click(function() {

		var url = '/donate/add';

		if (!$('#firstName').val()) {
			alert('Your Name is mandatory!');
		} else if (!$('#lastName').val()) {
			alert('Your Surname is mandatory!');
		} else if (!$('#cardNumber').val()) {
			alert('The credit card number is mandatory!');
		} else if (!$('#expiration').val()) {
			alert('The credit card expiration number is mandatory!');
		} else if (!$('#cvv').val()) {
			alert('The credit card CVV number is mandatory!');
		} else {
			
			var payload = JSON.stringify({
				firstName : $('#firstName').val(),
				lastName : $('#lastName').val(),
				email : $('#email').val(),
				comment : $('#comment').val(),
				amount : $('#amount').val(),
				cardNumber : $('#cardNumber').val(),
				expiration : $('#expiration').val(),
				cvv : $('#cvv').val()
			}
			);

			$.ajax({
				type : "POST",
				url : url,
				beforeSend: function(xhr, type) {
			        if (!type.crossDomain) {
			            xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
			        }
			    },
				data : {
					donation : payload
				},
				success : function(data) {
					if (data=="true"){
						$('#success').modal();
					}
				},
				error : function(data, textStatus, errorThrown) {
					$('#failure').modal();
				},
			});

		}
	});

});

function donateRefresh() {
	$('#donateAmount').html($('#amount').val() + " $");
}
