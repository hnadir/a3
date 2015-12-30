<html>
<head>
    @section('head')
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    @show
</head>
<body>
<!--<div class="container">
    @yield('content')
</div>-->

<div class="content container">
	@if (Session::has('message'))
		<div class="flash alert-info">
			<p>{{ Session::get('message') }}</p>
		</div>
	@endif
	
	@if ($errors->any())
		<div class='flash alert-danger'>
			@foreach ( $errors->all() as $error )
				<p>{{ $error }}</p>
			@endforeach
		</div>
	@endif
 
	@yield('content')
</div>

@section('footer_scripts')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
@show
</body>
</html>