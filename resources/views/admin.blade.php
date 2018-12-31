<!DOCTYPE html>
<html>
<head>	
<title>Filmoteca</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>


</head>

<body>
  <div style = "margin:20px">
	<form method = "POST" action = "/segreto/admin">

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
<?php
$now = time();
$data_inserimento = strtotime($film->created_at);
$giorni_da_inserimento = floor(($now - $data_inserimento) / (3600 * 24));
?>

@if ($film->validato == "0" && $giorni_da_inserimento < 7) {{-- se film non è validato ed è stato inserito da meno di 7 giorni visualizza riga con colore giallo per evidenziare graficamente film non validato --}}
<tr class = "bg-warning">
  @else
<tr>
  @endif

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

<td style = "margin:auto" "display:block">
<a href = "/segreto/admin/films/{{$film->id}}" ><h3>{{$film->titolo}}</a> - {{$film->anno}}
</h3>
<h5>
	{{$film->genere}}  -  {{$film->regista}}
</h5>
	<br/>
	<br/>
  @if ($film->validato == "0" && $giorni_da_inserimento < 7)
<div class = "form-group" style = "margin:auto">
  <form method = "POST" action = "/segreto/admin/films/valida/{{$film->id}}" > 
   @csrf
   @method('PATCH')
    <button type="submit" class="button is-link">Valida film</button></form>
</div>
</td>
</tr>



@endif

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