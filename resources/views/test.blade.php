<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
	
	$(function () {
		var url = 'https://maps.googleapis.com/maps/api/geocode/json';
		$.ajax({
			url: url,
			method: 'GET',
			data: {'address': 'Carmen, Cagayan de Oro City', 'key': 'AIzaSyA4g5tTbLP8pq1P6W0VtAc7TY8bMcc3Mm0'},
			success: function(resp) {
				console.log(resp);
			}
		})
	});
</script>
</html>