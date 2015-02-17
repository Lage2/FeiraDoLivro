var username_input  = $('input[name=username]');
var email_input		= $('input[name=email]');
var password_input  = $('input[name=password]');
var accepts_input   = $('input[type=checkbox]')

function clear_alerts(){
	$('#error').empty();
	$('#success').empty();
}

function validateUsername(username){
	if(username.length < 0)
			return {
				'valid': false,
				'message': 'O nome de utilizador é um campo obrigatório.'
			};

		if(username.length >= 30)
			return {
				'valid': false,
				'message': 'O nome de utilizador deve ter um máximo de 30 caractéres.'
			};

		if(!/^[a-z0-9]+$/i.test(username))
			return {
				'valid': false,
				'message': 'O nome de utilizador deve ter composto apenas por caracteres alfa-numéricos.'
			};

		return {'valid': true};
}

//TODO: acho
function validateEmail(email) { 
    var re = /^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*$/;
    
    if(re.test(email))
		return {'valid': true};
    else
    	return {
				'valid': false,
				'message': 'Por favor introduza um endereço e-mail correcto.'
			};
}

//TODO: acabar este
function validatePassword(password){
	


		return {'valid': true};
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
		$('#error').append(validation_res.message);
		$('#error').toggle('fast');
		$('#error').focus();
		return;
	}
	
	var data = new FormData();
	var user_data = {
		'username': username_input.val(),
		'email': 	email_input.val(),
		'password': password_input.val()
	};

	data.append('username', username_input.val());
	data.append('email', username_input.val());
	data.append('password', username_input.val());
	
	
	$.ajax({
		data: data,
		url: 'database/process-regiter.php',
		type: 'post',
		cache: false,
		processData: false,
		contentType: false,
		success: function(data, textStatus, jqXHR){
	
			console.log(data);

			if (typeof data.error === 'undefined'){
				console.log("Success: "+data.error);
			}else
				console.log("Error: "+data.error);
		}, 
		error: function(jqXHR, testStatus, errorThrown){
			console.log("Fail: "+textStatus);
		}
	});
}

/* MAIN */
$(document).ready(function(){
	console.log("'registar.php' page is ready...");

	$('#submit').on('click', processUser);
});