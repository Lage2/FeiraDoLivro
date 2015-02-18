var isbn_input;
var title_input;
var author1_input;
var author2_input;
var price_input;


function clearForm(event){
	isbn_input.val("");
	price_input.val("");
	title_input.val("").removeAttr('disabled');
	author1_input.val("").removeAttr('disabled');
	author2_input.val("").removeAttr('disabled');
	$('#book-cover-holder').empty();
}

function toggleSuccessAlert(){

	var message = "<p><i class='fa fa-check'></i>  "
				+ "O seu pedido foi registado com sucesso."
				+ "</p>"

	$('#error').css('display', 'none');
	$('#success').append(message);
	$('#success').toggle('fast');
	//$('#submit').attr('disabled', 'disabled');
	setTimeout("location.href = 'index.php';", 5000);	
}

function toggleErrorAlert(message){

	message = "<p><i class='fa fa-times'></i>  "+ message + "</p>";
	$('#error').empty();
	$('#error').append(message);
	$('#error').toggle('fast');
	setTimeout ( "$('#error').toggle('slow')" , 3000 );
}

function checkISBN(event){
	console.log("updating...");	
	var isbn = isbn_input.val().trim();

	if(validateISBN(isbn)){
		console.log('query for '+isbn);

		var data = new FormData();
		data.append('isbn', isbn);

		$.ajax({
			url: 'database/search-book.php',
			type: 'post',
			data: data,
			cache: false,
			dataType: 'json',
			processData: false,
			contentType: false,
			success: function(data, textStatus, jqXHR){
		
				console.log(data);

				if (data.error == 0){
					console.log("Success: "+data.title+' || '+data.author1+' || '+data.author2);
					
					title_input.val(data.title).attr('disabled', 'disabled');
					author1_input.val(data.author1).attr('disabled', 'disabled');
					if(data.author2==='none') author2_input.attr('disabled','disabled'); else author2.val(data.author2);

					$('#book-cover-holder').empty().append("<img class='book-cover' src=images/"+isbn+".jpg>");

				}else
					console.log("Error: " + data.error);
 			}, 
			error: function(jqXHR, textStatus, errorThrown){
				console.log("Fail: "+textStatus+' || '+errorThrown);
			}
		});
	}else{
		console.log("invalid isbn :'"+isbn+"'");
	}
}

function registerBookSale(event){

	event.stopPropagation();

	var isbn 	= isbn_input.val();
	var price 	= price_input.val();

	if(!validateISBN(isbn)){
		console.log("Error: invalid ISBN");
		toggleErrorAlert("Por favor insira um ISBN válido.")
		return;
	}

	if(!validatePrice(price)){
		console.log("Error: invalid price");
		toggleErrorAlert("Por favor insira um preço válido.");
		return;	
	}

	var data = new FormData();
	data.append('isbn', isbn_input.val());
	data.append('name', title_input.val());
	data.append('author1', author1_input.val());
	data.append('author2', author2_input.val());
	data.append('price', price_input.val());

	$.ajax({
			url: 'database/process-sell-book.php',
			type: 'post',
			data: data,
			cache: false,
			dataType: 'json',
			processData: false,
			contentType: false,
			success: function(data, textStatus, jqXHR){

				if (data.error == 0){
					toggleSuccessAlert();
				}else{
					console.log("Error: "+data.error);
					toggleErrorAlert(data.error);
				}
			}, error: function(jqXHR, textStatus, errorThrown){
				console.log("Fail: "+textStatus+' || '+errorThrown);
		}
	});
}

$(document).ready(function(){

	isbn_input 		= $('#isbn');
	title_input 	= $('#title');
	author1_input 	= $('#author1');
	author2_input 	= $('#author2');
	price_input 	= $('#price');

	isbn_input.on('blur', checkISBN);
	$('#trash').on('click', clearForm);
	$('#submit').on('click', registerBookSale);
});