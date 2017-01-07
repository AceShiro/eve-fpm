<html>

<head>
	@include('includes.head')
</head>


<body>

	<div id="wrapper">
		@include('includes.navbar')

		@include('includes.sidebar')

		<div id="page-wrapper">
			@yield('content')
		</div>

	</div>

</body>


<footer>
	@include('includes.footer')

</footer>


</html>