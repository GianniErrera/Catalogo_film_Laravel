<!DOCTYPE html>
<html>
<head>
<title>Filmoteca</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>


</head>

<body style="background-color: #ededed">

  <div style = "margin:20px">
	<form method = "POST" action = "/">

		{{csrf_field()}}
<div class="mb-4">
  <label for="genere">Genere:</label>
  <select class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-grey-darker border border-grey rounded" id="genere" name="genere">
    <option>tutti</option>
    @foreach($generi as $genere)
		<option>{{$genere}}</option>
	@endforeach
   </select>
</div>

    <div class = "mb-4">
    <button type="submit" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-blue-lightest bg-blue hover:bg-blue-light">Filtra</button>
    </div>
  </form>
  </div>
<div class = 'block w-full overflow-auto scrolling-touch'>
<table class = "w-full max-w-full mb-4 bg-transparent">
@foreach ($films as $film)


<tr style="margin: 2px">

 @if ($film->locandina)

    @if (file_exists("storage/locandine/thumbnails/" . $film->id . "/" . $film->locandina->immagine))


    <td style = "margin:5px; width:20%"><img class="max-w-full h-auto border-1 border-grey rounded p-1" src = "/storage/locandine/thumbnails/{{$film->id}}/{{$film->locandina->immagine}}" style = "vertical-align:top;" ></td>

    @else
{{--     <td>"/storage/locandine/thumbnails/{{$film->id}}/{{$film->locandina->immagine}}"</td> --}}
   <td style = "margin:5px; width:20%"><img class="max-w-full h-auto border-1 border-grey rounded p-1" src = "https://via.placeholder.com/300x480.png/" style = "vertical-align: top;" ></td>
{{--     <td style = "margin:5px; width:20%"><img src = "https://via.placeholder.com/300x480.png/" style = "width = 80%; vertical-align: top;" ></td> --}}
     @endif

@else
<td style = "margin:5px; width:20%"><img class="max-w-full h-auto border-1 border-grey rounded p-1" src = "https://via.placeholder.com/300x480.png/"; style = "vertical-align: top;" ></td>
@endif




{{--  @if ($film->locandina) <td style = "margin:5px" width="20%"><img src = "/storage/locandine/{{$film->id}}/{{$film->locandina->immagine}}/" width = "80%"></td> --}}
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
</div>



</table>
</div>
<div class = "mb-4" style = "margin:20px">
  <form method = "GET" action = "/films/nuovo" >
   @csrf
    <button type="submit" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-blue-lightest bg-blue hover:bg-blue-light">Inserisci film</button></form>
</div>
{{$films->links()}}

</div>
</body>
</html>
