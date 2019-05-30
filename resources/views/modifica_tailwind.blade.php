<!DOCTYPE html>
<html>
<head>
	<title>Filmoteca</title>
<!-- 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
</head>
<body style="background-color: #ededed">

<div class = "container mx-auto" style = "margin:15px">


    <form method = "POST" action = "/films/modifica/{{$film->id}}" enctype = "multipart/form-data">

  @method('PATCH')
  {{csrf_field()}}





<!-- {{--   <div>

<h3><a href="/categoria/nuova">oppure crea una nuova categoria</a></h3>

</div> --}} -->
<div class="mb-4">
    <label for="titolo">Titolo</label><br/>
    <textarea id="titolo" name = "titolo" class = "block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-grey-darker border border-grey rounded" placeholder='Titolo' required>{{$film->titolo}}</textarea>
  </div>

  <div class="mb-4">
    <label for="anno">Anno</label><br/>
    <textarea id="anno" name = "anno" class = "block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-grey-darker border border-grey rounded" placeholder='Anno'>{{$film->anno}}
    </textarea>
  </div>

<br>
  <div class="mb-4" style="border: 2px solid #dddddd">
    <label for="genere">Scegli un genere esistente oppure scegli nessuna selezione:</label>
    <select class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-grey-darker border border-grey rounded" id="genere" name="genere">

     <option>{{$film->genere}}</option>
     <option value = "">nessuna selezione</option>
      @foreach($generi as $key => $genere)
      <option value = "{{ $genere }}">{{ $genere }}</option>
    @endforeach
     </select>

  <br>
  <br>
  <label for="genere">oppure inserisci un genere nuovo</label>
    <textarea id = "genere_nuovo" name = "genere_nuovo" class="custom-select" placeholder='Genere'></textarea>
    <br>
    <br>

  </div>

   <div class="mb-4">
    <label for="regista">Regista</label><br/>
    <textarea id="regista" name = "regista" class = "block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-grey-darker border border-grey rounded" placeholder='Regista' required>{{$film->regista}}</textarea>
  </div>

  <div class="mb-4">
    <label for="immagine">Immagine locandina - facoltativo</label><br/>
    <input type = "file" id="locandina" name = "locandina" class = "block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-grey-darker border border-grey rounded">
    @if ($film->locandina)
    <br>
    &nbsp;&nbsp;&nbsp;&nbsp;{{$film->locandina->immagine}}
    @endif
  </textarea>
  </div>


  <hr>
  <div class = "mb-4">
  <button type="submit" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-blue-lightest bg-blue hover:bg-blue-light">Modifica</button>
    </div>

   @if ($errors->any())
            <div class="notification is-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif

</form>

</div>


  <script src="/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script>
      $(document).ready(function(){
          $('#genere').select2();
       });
    </script>

</body>
</html>
