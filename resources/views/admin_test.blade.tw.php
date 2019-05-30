<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<title>Filmoteca</title>
<meta name = "csrf-token" content = "{{csrf_token()}}" >

{{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


</head>

<body style="background-color: #ededed">
  <div style = "margin:20px">

  <form method = "POST" action = "/segreto/admin">

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

<div class = 'block w-full overflow-auto scrolling-touch'>
<table class="w-full max-w-full mb-4 bg-transparent" style = 'table-layout:auto'>
@foreach ($films as $film)

<?php
$now = time();
$data_inserimento = strtotime($film->created_at);
$giorni_da_inserimento = floor(($now - $data_inserimento) / (3600 * 24));
?>
<div class="container mx-auto" style = "margin:2px">
@if ($film->validato == "0" && $giorni_da_inserimento < 7) {{-- se film non è validato ed è stato inserito da meno di 7 giorni visualizza riga con colore giallo per evidenziare graficamente film non validato --}}
<tr class = "bg-yellow" style = "margin: 2px">
  @else
<tr style = "margin: 2px">
  @endif

 @if ($film->locandina)

    @if (file_exists("storage/locandine/thumbnails/" . $film->id . "/" . $film->locandina->immagine))


    <td style = "margin:5px"; width="20%"><img class = "max-w-full h-auto border-1 border-grey rounded p-1" src = "/storage/locandine/thumbnails/{{$film->id}}/{{$film->locandina->immagine}}" ; vertical-align: top; ></td>

    @else
{{--     <td>"/storage/locandine/thumbnails/{{$film->id}}/{{$film->locandina->immagine}}"</td> --}}
   <td style = "margin:5px"; width="20%"><img class="max-w-full h-auto border-1 border-grey rounded p-1" src = "https://via.placeholder.com/300x480.png/"  vertical-align: top; ></td>
{{--     <td style = "margin:5px"; width="10%"><img src = "https://via.placeholder.com/300x480.png/" width = "80%"; vertical-align: top; ></td> --}}
     @endif

@else
<td style = "margin:5px"; width="20%"><img class="max-w-full h-auto border-1 border-grey rounded p-1" src = "https://via.placeholder.com/300x480.png/" vertical-align: top; ></td>
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

  <div class="flex flex-wrap">
      <div class = "mb-4">
      <button class = "bottoni inline-block align-middle text-center select-none border font-normal whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-blue-lightest bg-blue hover:bg-blue-light" id = {{$film->id}} style="margin-left:15px" >
        Ricerca nel database OMDBApi
      </button>
      </div>

      @if ($film->validato == "0" && $giorni_da_inserimento < 7)

      <div class = "mb-4">

      <form method = "POST" action = "/segreto/admin/films/valida/{{$film->id}}" >
      @csrf
      @method('PATCH')
        <button type="submit" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-blue-lightest bg-blue hover:bg-blue-light" style="margin-left:5px">Valida film
        </button>
      </div>

      </form>

      <br>

      <div class = "mb-4">
      <form method = "POST" action = "/segreto/admin/films/elimina/{{$film->id}}" >
      @csrf
      @method('DELETE')
        <button type="submit" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-blue-lightest bg-blue hover:bg-blue-light" style="margin-left:5px">Elimina film</button>
      </form>
      </div>
      @endif
  </div>



</div>
</td>
<td style = "margin:auto" "display:block">

    <div id = div-{{$film->id}}></div>
  </td>
</tr>
</div>




@endforeach
</table>
</div>




</div>
<div class = "container mx-auto" style="border: 1px solid black;" id = "contenitore"></div>


<div class = "mb-4" style = "margin:20px">
  <form method = "GET" action = "/films/nuovo" >
   @csrf
    <button type="submit" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-blue-lightest bg-blue hover:bg-blue-light">Inserisci film</button></form>
</div>
{{$films->links()}}

</div>

</script>



<script>
  $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
$(document).ready(function() {
  var bottoni = document.getElementsByClassName('bottoni');
  for (var i = 0; i < bottoni.length; i++)
    {
      bottoni[i].addEventListener('click', ricerca);
    }
    function ricerca() {

      var element = $(this);
      var id = element.attr('id');
      console.log(id);
      var response = $.ajax({
        url: '/scarica_info_da_API/' + id,
        method: 'POST',
        data: {_token: '{{csrf_token()}}',
        id: id},
        dataType: 'text'
      })
        .done(function() {
          document.getElementById('div-'+ id).innerHTML = response.responseText;
          console.log("Se gira questo stiamo messi benone", response.responseText);
        })

  }
})

</script>








</body>
</html>
