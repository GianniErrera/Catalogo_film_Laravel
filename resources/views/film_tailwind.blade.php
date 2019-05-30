<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Filmoteca</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</head>
<body style="background-color: #ededed">
	
	
<div class = "flex flex-wrap">
	<div class = "sm:w-1/3 pr-4 pl-4" style = "margin:20px;">
		
	@if ($film->locandina) <img src = "/storage/locandine/{{$film->id}}/{{$film->locandina->immagine}}" style = 'max-width:100%;
max-height:100%' class="img-rounded" >
	@else
		<img src = "https://via.placeholder.com/360x480.png" class="img-rounded">
	@endif	
		
	</div>
	<div class = "sm:w-1/2 pr-4 pl-4" style = "margin:20px">
	<h1>{{$film->titolo}}</h1>
	<br/>
	<h1>{{$film->anno}}</h1>
	<br/>
	<h2>{{$film->genere}}</h2>
	<br/>
	<h2>{{$film->regista}}</h2>
	<br/>
	<br/>
		<div class = "mb-4">
  			<form method = "GET" action = "/films/modifica/{{$film->id}}" > 
     		{{csrf_field()}}
    		<button type="submit" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-blue-lightest bg-blue hover:bg-blue-light">Modifica</button></form>
		</div>
	</div>
</div>
</body>
</html>