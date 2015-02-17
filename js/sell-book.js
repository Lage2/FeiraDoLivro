var isbn_input;
var title_input;
var author1_input;
var author2_input;
var price_input;


function clearForm(event){
	isbn_input.empty();
	price_input.empty();
	title_input.empty();
	author1_input.empty();
	author2_input.empty();
}

function checkISBN(event){
	
	var isbn = isbn_input.val();

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
					
					title_input.val(data.title);
					author1_input.val(data.author1);
					if(data.author2==='none') author2_input.attr('disabled','disabled'); else author2.val(data.author2);

					$('#book-cover-holder').append("<img class='book-cover' src=images/"+isbn+".jpg>");

				}else
					console.log("Error: "+data.error);
					//toggleErrorAlert(data.error);
			}, 
			error: function(jqXHR, textStatus, errorThrown){
				console.log("Fail: "+textStatus+' || '+errorThrown);
		}
	});

	}else
		console.log('do nothing');
}

function registerBookSale(event){

	var isbn 	= isbn_input.val();
	var price 	= price_input.val();

	if(!validateISBN(isbn)){
		console.log("error isbn");
		return;
	}

	if(!validatePrice(price)){
		console.log("error price");
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
		
				console.log(data);

				if (data.error == 0){
					//DO something
					console.log("success");
				}else
					console.log("Error: "+data.error);
					//toggleErrorAlert(data.error);
			}, 
			error: function(jqXHR, textStatus, errorThrown){
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