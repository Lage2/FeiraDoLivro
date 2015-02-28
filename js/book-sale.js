var isbn_input;
var no_books = false;

function validateISBN(isbn){
	var filter = /^[0-9]{13}$/;
	return filter.test(isbn);
}

function toggleNoBooks(hasBooks){

	if(!hasBooks){

		if(no_books) $(".panel-body").toggle();	

		no_books = true;

	}else{
		no_books = false;
	}
}

function toggleErrorAlert(message){

	message = "<p><i class='fa fa-times'></i>  "+ message + "</p>";
	$('#error').empty();
	$('#error').append(message);
	$('#error').toggle('fast');
	setTimeout ( "$('#error').toggle('slow')" , 3000 );
}

function populate4SaleTable(books){

	console.log("BOOKS 4 SALE: "+books.length);

	if(books.length > 0){

		toggleNoBooks(true);

		$('#available-books-4sale').find("tr:gt(0)").remove();

		$.each(books, function(index, book){

			var authors;
			if(book.author2=="")
				authors = decodeURIComponent(escape(book.author1));
			else
				authors = decodeURIComponent(escape(book.author1)) + ', ' + decodeURIComponent(escape(book.author2));


			var item = "<tr class="+ ((index % 2) ? 'color':'')+">"
						+ "<td class='book-cover'><image src='images/"+book.isbn+".jpg' align='middle'></td>"
						+ "<td>"
						+	"<div class='book-info'>"
						+		"<ul>"
						+			"<li><span>Produto:  </span>"+book.id+"</li>"
						+			"<li><span>ISBN:  </span>"+book.isbn+"</li>"
						+           "<li><span>Título:  </span>"+ book.title +"</li>"
						+           "<li><span>Autores:  </span>"+authors+"</li>"
						+		"</ul>"
						+	"</div>"
						+ "</td>"
						+ "<td class='book-price'>"+book.price+"</td>";

			$('#available-books-4sale').append(item);
			
		});

	}else toggleNoBooks(false);

	isbn_input.val("");
}

function queryBooks4Sale(event){

	var data = new FormData();
	var isbn = isbn_input.val().trim();

	if(!(isbn==='')){
		if(validateISBN(isbn))
			data.append('isbn', isbn);
		else
			toggleErrorAlert("O ISBN especificado não é valido, por favor tente novamente.");
	}

	$.ajax({
		url: 'database/search-book-4sale.php',
		type: 'post',
		data: data,
		cache: false,
		dataType: 'json',
		processData: false,
		contentType: false,
		success: function(data, textStatus, jqXHR){
	
			console.log(data);

			if (data.error == 0){
				populate4SaleTable(data.books);
			}else
				console.log("error: "+data.error);
			}, 
		error: function(jqXHR, textStatus, errorThrown){
			console.log("Fail: "+textStatus+' || '+errorThrown);
		}
	});
}



$(document).ready(function(){
	
	isbn_input = $('#isbn');
	queryBooks4Sale(null);
	$('#search').on('click', queryBooks4Sale);

});