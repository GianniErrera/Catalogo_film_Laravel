<!DOCTYPE html>
<html>
<head>
	<title>Filmoteca</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</head>
<body>
	
	
<div class = "row">
	<div class = "col-sm-4" style = "margin:20px">
		
	@if ($film->locandina) <img src = "/storage/locandine/thumbnails/{{$film->id}}/{{$film->locandina->immagine}}/" width="360">
	@else
		<img src = "https://via.placeholder.com/360x480.png">
	@endif	
		
	</div>
	<div class = "col-sm-6" style = "margin:20px">
	<h1>{{$film->titolo}}</h1>
	<br/>
	<h1>{{$film->anno}}</h1>
	<br/>
	<h2>{{$film->genere}}</h2>
	<br/>
	<h2>{{$film->regista}}</h2>
	<br/>
	<br/>
		<div class = "form-group">
  			<form method = "GET" action = "/films/modifica/{{$film->id}}" > 
     		{{csrf_field()}}
    		<button type="submit" class="btn btn-primary">Modifica</button></form>
		</div>
	</div>
</div>
</body>
</html>