<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Implementation of Cube Summation">
		<meta name="author" content="Diego Barrera">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Code challenge</title>

		{{ HTML::style('packages/bootstrap/css/bootstrap.min.css') }}
		{{ HTML::script('packages/bootstrap/js/bootstrap.min.js') }}
	</head>
    <body>
    	@if (count($errors) > 0)
		    <div class="alert alert-danger">
		        <ul>
		            <li>{{ $errors }}</li>
		        </ul>
		    </div>
		@endif

        <div class="container">
            @yield('content')
        </div>

	    <footer class="footer navbar-fixed-bottom navbar-inverse">
			<div class="container">
				<br>
				<div class="col-md-11">
					<p class="text-muted">
						Diego Barrera Guevara
					</p>
				</div>
			</div>
	    </footer>
    </body>
</html>
