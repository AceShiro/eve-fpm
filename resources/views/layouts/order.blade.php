<html>

<head>
	@include('includes.head')
</head>


<body>	
	@include('includes.navbar')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">

			<div class="navbar-spacer"></div>

			<div class="col-md-2">
				<div class="col-md-2 box-t box-sidebar">
					@include('includes.sidebar')
				</div>
				
			</div>

			<div class="col-md-10">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					@yield('content')
				</div>
				
			</div>


		</div>
	</div>
		

</div>

</body>


<footer>
	@include('includes.footer')

</footer>


</html>