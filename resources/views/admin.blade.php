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
$titolo = urlencode($film->titolo);

$apikey = "1543505e";


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://www.omdbapi.com/?t=$titolo&apikey=$apikey",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

$response = json_decode($response, true); //because of true, it's in an array

if ($response['Response'] != "False") $ricerca = "prova";


else $ricerca = "Titolo non trovato";

  



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
<a href = "/segreto/admin/films/{{$film->id}}" ><h3>{{$film->titolo}}</a> - <font color = "red">@if ($response['Response'] != "False") {{$response['Title']}}


@else{{"Titolo non trovato"}}

  
  @endif
</font>
  {{$film->anno}}  @if ($response['Response'] != "False") - <font color = "red">{{$response['Year']}} @endif</font>
</h3>
<h5>
	<a href = "#" data-toggle="popover" title="Prova di popover" data-content="<?php echo $ricerca; ?>">{{$film->genere}}</a>  -  {{$film->regista}} @if ($response['Response'] != "False") <font color = "red">{{$response['Director']}} @endif</font>
</h5>
	<br/>
	<br/>
  @if ($film->validato == "0" && $giorni_da_inserimento < 7)
<div class = "form-group" style = "display:inline; margin:auto;">
  <form method = "POST" action = "/segreto/admin/films/valida/{{$film->id}}" > 
   @csrf
   @method('PATCH')
    <button type="submit" class="button is-link">Valida film</button></form>

  <form method = "POST" action = "/segreto/admin/films/elimina/{{$film->id}}" > 
   @csrf
   @method('DELETE')
    <button type="submit" class="button is-link">Elimina film</button></form>
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
<!-- <script>
  $('.api').popover({
    html: true,
    trigger: 'manual',
    content: $ricerca
  }).click(function(e) {
    $(this).popover('toggle');
  });


</script> -->

<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();   
});
</script>

</body>
</html>