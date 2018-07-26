<head>
	<title>Project 6</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	 <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<nav class="navbar navbar-default">
<div class="container-fluid">
</div>	
</nav>
<div class="container">
<div class="panel panel-default">
		<div id="log">
		<h2 class="form-signin-heading">Login In</h2>
		{!! Form::open(array('route' => 'login', 'class' => 'form')) !!}

		<div class="form-group">
		{!!Form::text('username',null,
			array('required',
				  'class'=>'form-control',
				  'placeholder'=>'Username'))!!}
		</div>
		<div class="form-group">
		{{ Form::password('password', array('class' => 'form-control','placeholder'=>'Password')) }}
		</div>
		<div class="form-group">		  
		{!!Form::submit('LogIn',
			array('class'=>'btn btn-lg btn-primary form-control'))!!}
		</div>
		<label>New User?</label>
		<br>
		<a type="button" class="btn btn-lg btn-primary form-control" href="{{ url('/register') }}">Register</a>

{!! Form::close() !!}
</div>
</div>
</div>
</body>
