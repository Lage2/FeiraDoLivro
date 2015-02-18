var isbn_input;

function populate4SaleTable(books){

	$('#available-books-4sale').find("tr:gt(0)").remove();

	$.each(books, function(index, book){

		var authors;
		if(book.author2=="")
			authors = book.author1;
		else
			authors = book.author1 + ', ' + book.author2;


		var item = "<tr class="+ ((index % 2) ? 'color':'')+">"
					+ "<td class='book-cover'><image src='images/"+book.isbn+".jpg' align='middle'></td>"
					+ "<td>"
					+	"<div class='book-info'>"
					+		"<ul>"
					+			"<li><span>ISBN:  </span>"+book.isbn+"</li>"
					+           "<li><span>Título:  </span>"+ book.title +"</li>"
					+           "<li><span>Autores:  </span>"+authors+"</li>"
					+			"<li><span>Dono:  </span>"+book.seller+"</li>"
					+		"</ul>"
					+	"</div>"
					+ "</td>"
					+ "<td class='book-price'>"+book.price+"&euro;</td>";

		$('#available-books-4sale').append(item);
		
	});

	isbn_input.val("");
}

function queryBooks4Sale(event){

	var data = new FormData();
	var isbn = isbn_input.val();

	if(isbn!=""){
		console.log("searching for book "+isbn);
		data.append('isbn', isbn.trim());
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
				console.log("success"+data.books.length);
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