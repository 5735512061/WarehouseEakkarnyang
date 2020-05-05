<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	<title>คลังสินค้า เอกการยาง</title>
	@include("header")

</head>

<body class="animsition">

	@yield("content")

	@include("footer")

	<!-- js -->
	@yield("js")

	<!-- Jquery JS-->
	<script type="text/javascript" src="{{asset('/template/vendor/jquery-3.2.1.min.js')}}"></script>

	<!-- Bootstrap JS-->
	<script type="text/javascript" src="{{asset('/template/vendor/bootstrap-4.1/popper.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/template/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>

	<!-- Vendor JS -->
	<script type="text/javascript" src="{{asset('/template/vendor/slick/slick.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/template/vendor/wow/wow.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/template/vendor/animsition/animsition.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/template/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/template/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/template/vendor/counter-up/jquery.counterup.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/template/vendor/circle-progress/circle-progress.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/template/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
	<script type="text/javascript" src="{{asset('/template/vendor/chartjs/Chart.bundle.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/template/vendor/select2/select2.min.js')}}"></script>

	<!-- Main JS-->
	<script type="text/javascript" src="{{asset('/template/js/main.js')}}"></script>

</body>
</html>