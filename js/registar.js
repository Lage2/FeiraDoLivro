var error = false;
var username_input  = $('input[name=username]');
var email_input		= $('input[name=email]');
var password_input  = $('input[type=password]');
var accepts_input   = $('input[type=checkbox]')

function clear_alerts(){
	$('#error').empty();
	$('#success').empty();
}

function validateUsernameField(event){
	event.stopPropagation();

	var username = username_input.val();

	if(!validateUsername(username))
		toggleErrorAlert("Por valor insira ");

}

function validateFields(event){
	
	var username = username_input.val();
	var email 	 = email_input.val();
	var password = password_input.val();

	var res;

	if(accepts_input.is(':checked')){

		res = validateUsername(username);
		if(!res.valid)
			return res;

		res = validateEmail(email);
		if(!res.valid)
			return res;

		res = validatePassword(password);
		if(!res.valid)
			return res;

		return {'valid':true};
		
	}else{

		return {
			'valid': false,
			'message': 'Para se registar precisa de concordar com os regulamentos.'
		};
	}
}

function processUser(event){
	
	clear_alerts();

	var validation_res = validateFields();

	if(!validation_res.valid){
		console.log("here "+validation_res.message);
		toggleErrorAlert(validation_res.message);
		return;
	}
	
	var data = new FormData();

	data.append('username', username_input.val());
	data.append('email', email_input.val());
	data.append('password', password_input.val());
	
	$.ajax({
		url: 'database/process-regiter.php',
		type: 'post',
		data: data,
		cache: false,
		dataType: 'json',
		processData: false,
		contentType: false,
		success: function(data, textStatus, jqXHR){
	
			if (typeof data.error === 'undefined'){
				console.log("Success: "+data.error);
				toggleSuccessAlert();
			}else
				toggleErrorAlert(data.error);
		}, 
		error: function(jqXHR, textStatus, errorThrown){
			console.log("Fail: "+textStatus);
		}
	});
}

/* MAIN */
$(document).ready(function(){

	var username_input  	= $('input[name=username]');
	var email_input			= $('input[name=email]');
	var password_input		= $('input[name=password]');
	var confirm_pass_input	= $('input[name=passwordc]');
	var accepts_input   	= $('input[type=checkbox]');
	
	$('#submit').on('click', processUser);
	var username_input.on('blur', validateUsernameField);

});