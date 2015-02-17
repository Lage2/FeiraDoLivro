function validateUsername(username){

	var filter = /^[a-z0-9]+$/i;

	if(username.length < 0)
		return false;

	if(username.length >= 30)
		return false;

	return filter.test(username);
}

function validatePassword(password){

		return {'valid': true};
}

function validateEmail(email) { 
    var filter = /^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*$/;
    return filter.test(email);
}

function validateISBN(isbn){
	var filter = /^[0-9]{13}$/;
	return filter.test(isbn);
}

/**
 * Examples:
 * 10
 * 0.0
 * 10.2
 */
function validatePrice(price){
	var filter = /^\d+([.,]\d)?$/;
	return  price > 0 && filter.test(price);
}