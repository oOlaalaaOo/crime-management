$(document).ready(function() {

	if ($('#adding-case').length > 0) {
		// $go_to_step_2 = $('#go-to-step-2');
		// $go_to_step_1 = $('#go-to-step-1');
		// $step_1 = $('#step-1');
		// $step_2 = $('#step-2');

		// $step_2.hide('fast');
		// $go_to_step_1.hide('fast');

		// $go_to_step_2.on('click', function(e) {
		// 	e.preventDefault();

		// 	$step_1.fadeOut('slow');
		// 	$(this).fadeOut('slow');

		// 	$step_2.fadeIn('slow');
		// 	$go_to_step_1.fadeIn('slow');
		// });

		// $go_to_step_1.on('click', function(e) {
		// 	e.preventDefault();

		// 	$step_1.fadeIn('slow');
		// 	$(this).fadeOut('slow');

		// 	$step_2.fadeOut('slow');
		// 	$go_to_step_2.fadeIn('slow');
		// });
		
		$region = $('#region_id');
		$province = $('#province_id');
		$cities = $('#city_id');
		$crime_type = $('#crime_type');
		$crime_category = $('#crime_category');

		$region.on('change', function(e) {
			e.preventDefault();

			$.ajax({
				url:  'http://localhost:8000/location/get_provinces/' + $(this).val(),
				type: 'GET',
				success: function(resp) {
					console.log(resp);
					$province.empty();
					var data = resp.provinces;
					data.forEach((d) => {
						$province.append($('<option>', { 
					        value: d.provCode,
					        text : d.provDesc 
					    }));
					});
				}
			})
		});

		$province.on('change', function(e) {
			e.preventDefault();

			$.ajax({
				url:  'http://localhost:8000/location/get_cities/' + $(this).val(),
				type: 'GET',
				success: function(resp) {
					console.log(resp);
					$cities.empty();
					var data = resp.cities;
					data.forEach((d) => {
						$cities.append($('<option>', { 
					        value: d.citymunCode,
					        text : d.citymunDesc 
					    }));
					});
				}
			})
		});

		$crime_type.on('change', function(e) {
			e.preventDefault();
			var id = 0;
			if ($(this).val() != '') {
				id = $(this).val();
			}

			$.ajax({
				url:  'http://localhost:8000/crime/get-crime-categories/' + id,
				type: 'GET',
				success: function(resp) {
					console.log(resp);
					$crime_category.empty();
					var data = resp.crime_categories;
					data.forEach((d) => {
						$crime_category.append($('<option>', { 
					        value: d.crime_category_id,
					        text : d.name 
					    }));
					});
				}
			})
		});
	}


});