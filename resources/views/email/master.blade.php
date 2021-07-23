<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>

<body style="margin: 100px; padding: 0px; background-color: #f3f3f3;">
	
	<div style="
	display: block;
	max-width: 728px;
	margin: 0px auto;
	width: 60%;
	">
		<img src="{{ url('static/imagenes/icono.png') }}" 
			style=" width: 30%; display: block; padding-left: 50%; margin-left: -101px;
			">
		<div style="background-color: white;
		padding: 24px;
		">
			@yield('content')
		</div>
		

		
	</div>
</body>
</html>
