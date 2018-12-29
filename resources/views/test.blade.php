<!DOCTYPE html>
<html>
<head>	
<title>Filmoteca</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>


</head>

<body>
  <div style = "margin:20px">
	<form method = "POST" action = "/">

		{{csrf_field()}}
<div class="form-group">
  <label for="genere">Genere:</label>
  <select class="form-control" id="genere" name="genere">
    <option>tutti</option>
    @foreach($generi as $genere)
		<option>{{$genere}}</option>
	@endforeach	
   </select>
</div>

  <div class = "form-group">
  <button type="submit" class="btn btn-primary">Filtra</button>
    </div>

    </form>
<table>
@foreach ($films as $film)


<tr>

 @if ($film->locandina)  

    @if (file_exists("storage/locandine/thumbnails/" . $film->id . "/" . $film->locandina->immagine))  


    <td style = "margin:5px"; width="10%"><img src = "/storage/locandine/thumbnails/{{$film->id}}/{{$film->locandina->immagine}}" width = "80%"; vertical-align: top; ></td>
    
    @else 
{{--     <td>"/storage/locandine/thumbnails/{{$film->id}}/{{$film->locandina->immagine}}"</td> --}}
   <td style = "margin:5px"; width="10%"><img src = "https://via.placeholder.com/300x480.png/" width = "80%"; vertical-align: top; ></td>
{{--     <td style = "margin:5px"; width="10%"><img src = "https://via.placeholder.com/300x480.png/" width = "80%"; vertical-align: top; ></td> --}}
     @endif	

@else 
<td style = "margin:5px"; width="10%"><img src = "https://via.placeholder.com/300x480.png/" width = "80%"; vertical-align: top; ></td>
@endif




{{--  @if ($film->locandina) <td style = "margin:5px" width="10%"><img src = "/storage/locandine/{{$film->id}}/{{$film->locandina->immagine}}/" width = "80%"></td> --}}
{{-- @else <td></td>
@endif  --}}  

<td>
<a href = "/films/{{$film->id}}" ><h3>{{$film->titolo}}</a> - {{$film->anno}}
</h3>
<h5>
	{{$film->genere}}  -  {{$film->regista}}
</h5>
	<br/>
	<br/>
</td>
</tr>

@endforeach	
</table>



</table>
</div>
<div class = "form-group" style = "margin:20px">
  <form method = "GET" action = "/films/nuovo" > 
   @csrf
    <button type="submit" class="btn btn-primary">Inserisci film</button></form>
</div>
{{$films->links()}}

</div>
</body>
</html>