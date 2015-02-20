function populateBooks(element, books){

	if(books.length == 0){
		element.parent().toggle();
		return;
	}

	element.find("tr:gt(0)").remove();

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
					+		"</ul>"
					+	"</div>"
					+ "</td>"
					+ "<td class='book-price'>"+book.price+"</td>";

		element.append(item);
		
	});
}


function retrieveMyBooks(){

	var data = new FormData();


	$.ajax({
		url: 'database/search-my-books.php',
		type: 'post',
		data: data,
		cache: false,
		dataType: 'json',
		processData: false,
		contentType: false,
		success: function(data, textStatus, jqXHR){
	
			console.log(data);

			if (data.error == 0){
				populateBooks($('#mybooks-invalid'), data.invalid);
				populateBooks($('#mybooks-valid'), data.valid);
				populateBooks($('#mybooks-sold'), data.sold);								
			}else
				console.log("Error: " + data.error);
			}, 
		error: function(jqXHR, textStatus, errorThrown){
			console.log("Fail: "+textStatus+' || '+errorThrown);
		}
	});



}

$(document).ready(function(){
	retrieveMyBooks();
});