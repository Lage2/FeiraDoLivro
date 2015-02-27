var error = false;
var email_input;
var password_input;

function toggleErrorAlert(message){
	$('#error').empty();
	$('#error').append(message);
	$('#error').toggle('fast');
	setTimeout ( "$('#error').toggle('slow')" , 3000 );
}

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

	if(password === "")
		return {
				'valid': false,
				'message': 'Por favor introduza uma password correcta.'
			};


	return {'valid': true};
}

function validateFields(){

	var res = validateEmail(email_input.val());

	if(!res.valid){
		toggleErrorAlert(res.message);
		return false;
	}

	res = validatePassword(password_input.val());
	if(!res.valid){
		toggleErrorAlert(res.message);
		return false;
	}	

	return true;
}

function login(event){

	if(!validateFields())
		return;

	var data = new FormData();
	data.append('email', email_input.val());
	data.append('password', hex_sha512(password_input.val()));
	
		$.ajax({
		url: 'database/process-login.php',
		type: 'post',
		data: data,
		cache: false,
		dataType: 'json',
		processData: false,
		contentType: false,
		success: function(data, textStatus, jqXHR){
	
			if (typeof data.error === 'undefined'){
				$('#error').css('display', 'none');
				window.location.replace("index.php");
			}else
				toggleErrorAlert(data.message);
		}, 
		error: function(jqXHR, textStatus, errorThrown){
			console.log("Fail: "+textStatus);
		}
	});
	

}


$(document).ready(function(){

	email_input		= $('input[name=email]');
	password_input  = $('input[type=password]');

	$('#login').on('click', login);	
	$(document).keypress(function(e){
		if(e.keyCode == 13)
			login();
	});
});