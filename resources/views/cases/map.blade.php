<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    
    <link rel="icon" href="{{ URL::asset('assets/img/logo.png_32x32.png') }}" type="image/png">
    <!-- Styles -->
    <link href="{{ asset('inspinia/css/bootstrap.min.css') }} " rel="stylesheet">
    <link href="{{ asset('inspinia/font-awesome/css/font-awesome.css') }} " rel="stylesheet">
    <link href="{{ asset('inspinia/css/plugins/footable/footable.core.css') }} " rel="stylesheet">
    <link href="{{ asset('inspinia/css/plugins/toastr/toastr.min.css') }} " rel="stylesheet">
    <link href="{{ asset('inspinia/css/animate.css') }} " rel="stylesheet">
    <link href="{{ asset('inspinia/css/style.css') }} " rel="stylesheet">
    <link href="{{ asset('inspinia/css/plugins/slick/slick.css') }} " rel="stylesheet">
    <link href="{{ asset('inspinia/css/plugins/slick/slick-theme.css') }} " rel="stylesheet">
    <link href="{{ asset('inspinia/css/plugins/chosen/bootstrap-chosen.css') }} " rel="stylesheet">
    <link href="{{ asset('inspinia/css/plugins/dataTables/datatables.min.css') }} " rel="stylesheet">
    <link href="{{ asset('inspinia/css/plugins/daterangepicker/daterangepicker-bs3.css') }} " rel="stylesheet">
 </head>
 <body class="skin-3">
 	<div id="wrapper">
 		<br /><br />
		<div class="col-sm-8 col-sm-offset-2">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h2>Map</h2>
				</div>
				<div class="ibox-content">
					<div id="map" style="width:100%;height:400px;">
					</div>
				</div>
			</div>
		</div>
 	</div>
    <script>
    function myMap() {

        var lat = '{{ $case_details->crime_coordinate_lat }}';
        var lng = '{{ $case_details->crime_coordinate_long }}';
        // console.log(lat + ' ' + lng);
        var mapProp= {
            center:new google.maps.LatLng(lat,lng),
            zoom:18,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById("map"), mapProp);
        var marker = new google.maps.Marker({
            position: mapProp.center,
            animation: google.maps.Animation.BOUNCE
        });
        marker.setMap(map);
    }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4g5tTbLP8pq1P6W0VtAc7TY8bMcc3Mm0&callback=myMap"></script>
    
 </body>
 </html>
