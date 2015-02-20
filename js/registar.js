var error = false;
var username_input  	= $('input[name=username]');
var email_input			= $('input[name=email]');
var password_input		= $('input[name=password]');
var confirm_pass_input	= $('input[name=passwordc]');
var accepts_input   	= $('input[type=checkbox]');

function clear_alerts(){
	$('#error').empty();
	$('#success').empty();
}

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

function validateUsername(username){
	var filter = /^[a-z0-9._]+$/i;
	return filter.test(username);
}

function validateUsernameLength(username){
	return username.length > 5 && username.length <= 15;
}

/* Pelo menos 8 caracteres 1 número, uma letra e um caracter especial */
function validatePassword(password){
	//var filter = /^.*(?=.{8,})(?=.*[a-zA-Z])(?=.*\d)(?=.*[!#$%&? "]).*$/;
	var filter = /^(?=.*\d)(?=.*[a-z])(?=[A-Z]*)(?=[\W]*).{6,12}$/;
	return filter.test(password);
}


function validateEmail(email) { 
    var filter = /^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*$/;
    return filter.test(email);
}

function matchingPasswords(pass1, pass2){
	return pass1.trim() == pass2.trim();
}

function processUser(event){


	clear_alerts();

	var username 	= username_input.val().trim();
	var email 	 	= email_input.val().trim();
	var pass1	 	= password_input.val().trim();
	var pass2	 	= confirm_pass_input.val().trim();

	if(!validateUsername(username)){
		toggleErrorAlert("O nome de utilizador inserido não é válido, por favor insira um nome de utilizador com caractéres alfa-numéricos, '.' ou '_'.");
		return;
	}

	if(!validateUsernameLength(username)){
		toggleErrorAlert("O nome de utilizador inserido não é válido, este deve ter entre 5 e 15 caractéres.");
		return;
	}

	if(!validateEmail(email)){
		toggleErrorAlert("O endereço email inserido não é válido, por favor insira um endereço email válido.");
		return;	
	}

	if(!validatePassword(pass1)){
		toggleErrorAlert("A password inserida não é válida, as passwords devem ter entre 6 a 12 caractéres e pelo menos um número e uma letra.");
		return;	
	}

	if(!matchingPasswords(pass1, pass2)){
		toggleErrorAlert("Atenção, as passwords inseridas não coincidem.");
		return;
	}
	
	var data = new FormData();

	data.append('username', username);
	data.append('email', email);
	data.append('password', hex_sha512(pass1));
	data.append('passwordc', hex_sha512(pass2));
	
	$.ajax({
		url: 'database/process-regiter.php',
		type: 'post',
		data: data,
		cache: false,
		dataType: 'json',
		processData: false,
		contentType: false,
		success: function(data, textStatus, jqXHR){
	
			if (data.error == 0){
				toggleSuccessAlert("O seu registo foi realizado com sucesso, irá ser redireccionado para a página principal dentro de momentos.");
			}else
				toggleErrorAlert(data.message);
		}, 
		error: function(jqXHR, textStatus, errorThrown){
			console.log("Fail: "+textStatus);
		}
	});
}

/* MAIN */
$(document).ready(function(){

	username_input  	= $('input[name=username]');
	email_input			= $('input[name=email]');
	password_input		= $('input[name=password]');
	confirm_pass_input	= $('input[name=passwordc]');
	accepts_input   	= $('input[type=checkbox]');
	
	$('#submit').on('click', processUser);

});