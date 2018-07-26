<!DOCTYPE html>
<html>
<head>
	<title>Project 6</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	 <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
</head>
<body>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<ul class="nav navbar-nav navbar-left">
		    <li><a href="#">Project 6</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
		<li><a href="#"><?php echo Session::get('loginuser');?></a></li>		    
		    <li><a href="{{ url('/search') }}" class="btn btn-default" role="button">Search<span class="glyphicon glyphicon-search"></span></a></li>
		    <li><a href="{{url('/shoppingbasket')}}" class="btn btn-default" role="button">Shopping Basket <?php echo Session::get('basketcount');?> <span class="glyphicon glyphicon-shopping-cart"></span></a></li>
		    <li><a href="{{ url('/logout') }}" class="btn btn-default" role="button">Logout</a></li>
		</ul>
	</div>	
</nav>

