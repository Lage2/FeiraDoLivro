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