function updateSidebarLinks(data){
	
	if(data.invalid.length <= 0)
		$('#mybooks-invalid-link').css('display', 'none');
	else
		$('#mybooks-invalid-link').css('display', 'block');

	if(data.valid.length <= 0)
		$('#mybooks-valid-link').css('display', 'none');
	else
		$('#mybooks-valid-link').css('display', 'block');

	if(data.sold.length <= 0)
		$('#mybooks-sold-link').css('display', 'none');
	else
		$('#mybooks-sold-link').css('display', 'block');

}


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
				updateSidebarLinks(data);							
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

	var root = $('html,body');
	$('div a[href*=#]:not([href=#])').click(function(){
		if(location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
			&& location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name='+ this.hash.slice(1) + ']');
			if(target.length) {
				root.animate({
					scrollTop: target.offset().top - $('#navigation').height() - 40
				}, 1000);
			}
			return false;
		}
	});
});