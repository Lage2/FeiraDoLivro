function toggleSuccessAlert(message){

	message = "<p><i class='fa fa-check'></i>  "
			+ message
			+ "</p>";

	$('#error').css('display', 'none');
	$('#success').append(message);
	$('#success').toggle('fast');
	$('#submit').attr('disabled', 'disabled');
	setTimeout("location.href = 'index.php';", 5000);	
}

function toggleErrorAlert(message){

	message = "<p><i class='fa fa-times'></i>  "+ message + "</p>";
	$('#error').empty();
	$('#error').append(message);
	$('#error').toggle('fast');
	setTimeout ( "$('#error').toggle('slow')" , 3000 );

}