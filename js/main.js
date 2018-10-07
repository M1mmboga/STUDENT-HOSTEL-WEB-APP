$(document).ready(function(){

	getCategory();

	function getCategory(){

		$.post("php/get-category.php", function(data){
			$("#category").html(data);
			$("#category").val("");
		});

	}






});