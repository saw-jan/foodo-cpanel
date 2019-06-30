$(document).ready(function() {
	$.ajax({
		type: 'GET',
		url: 'order.php',
		async: false,
		success: function(text) {
			$('#order').html(text);
		}
	});
	setInterval(function() {
		$.ajax({
			type: 'GET',
			url: 'order.php',
			async: false,
			success: function(text) {
				$('#order').html(text);
			}
		});
	}, 5000);
	//add new restaurant
	//on res click event
	$('.res').click((event) => {
		var id = event.target.id;
		//alert(id);
		var resname = $(event.target).text();
		//alert(resname);
		resname = resname.replace(/ /g, ',');
		resname = resname.replace(/&/g, '.');
		resname = resname.replace(/,,/g, ',');
		$('.res-menu').load('resmenu.php?id=' + id + '&name=' + resname + '');
	});
});
function deleteQry(id) {
	if (confirm('Delete this?') == true) {
		window.location = 'dash.php?delid=' + id;
		return false;
	}
}
function deleteMenu(id, rid) {
	if (confirm('Delete Item?') == true) {
		window.location = 'dash.php?menudel=' + id + '&rid=' + rid;
		return false;
	}
}
