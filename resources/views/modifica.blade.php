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
<body>

<div class = "container" style = "margin:15px">

<br/>
    <form method = "POST" action = "/films/modifica/{{$film->id}}">

  @method('PATCH')
  {{csrf_field()}}





<!-- {{--   <div>
  
<h3><a href="/categoria/nuova">oppure crea una nuova categoria</a></h3>

</div> --}} -->
<div class="form-group">
    <label for="titolo">Titolo</label><br/>
    <textarea id="titolo" name = "titolo" class = "form-control" placeholder='Titolo' required>{{$film->titolo}}</textarea> 
  </div>

  <div class="form-group">
    <label for="anno">Anno</label><br/>
    <textarea id="anno" name = "anno" class = "form-control" placeholder='Anno'>{{$film->anno}}</textarea> 
  </div>


  <div class="form-group">
    <label for="genere">Scegli un genere esistente oppure lascia il campo vuoto:</label>
    <select class="form-control" id="genere" name="genere">
      
     <option>{{$film->genere}}</option>
      @foreach($generi as $key => $genere)
      <option value = "{{ $genere }}">{{ $genere }}</option>
    @endforeach 
     </select>
  
  <label for="genere">oppure inserisci un genere nuovo</label>
    <textarea id = "genere_nuovo" name = "genere_nuovo" class="custom-select" placeholder='Genere'></textarea>
    
    
  </div>

   <div class="form-group">
    <label for="regista">Regista</label><br/>
    <textarea id="regista" name = "regista" class = "form-control" placeholder='Regista' required>{{$film->regista}}</textarea> 
  </div>


  <hr>
  <div class = "form-group">
  <button type="submit" class="btn btn-primary">Modifica</button>
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