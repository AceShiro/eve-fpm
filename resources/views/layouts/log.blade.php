<html>

<head>
	@include('includes.head')
</head>


<body>	

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 text-center">

			<div class="navbar-spacer"></div>

					@yield('content')
				
			</div>


		</div>
	</div>
		

</div>

</body>


<footer>
	@include('includes.footer')

</footer>


</html>