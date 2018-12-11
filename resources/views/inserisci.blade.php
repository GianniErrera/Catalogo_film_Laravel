<!DOCTYPE html>
<html>
<head>
	<title>Filmoteca</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</head>
<body>
<div class = "container" style = "margin:15px">

<br/>
    <form method = "POST" action = "/films/nuovo">

  {{csrf_field()}}





<!-- {{--   <div>
  
<h3><a href="/categoria/nuova">oppure crea una nuova categoria</a></h3>

</div> --}} -->
<div class="form-group">
    <label for="titolo">Titolo</label><br/>
    <textarea id="titolo" name = "titolo" class = "form-control" placeholder='Titolo' required></textarea> 
  </div>

  <div class="form-group">
    <label for="anno">Anno</label><br/>
    <textarea id="anno" name = "anno" class = "form-control" placeholder='Anno'></textarea> 
  </div>

  <div class="form-group">
   

    <label for="genere">Scegli un genere(altrimenti lascia vuoto):</label>
    <select class="form-control" id="genere" name="genere">
      <option></option>
     
      @foreach($generi as $genere)
      <option>{{$genere}}</option>
    @endforeach 
     </select>
  
  <label for="genere">oppure inserisci un genere nuovo</label>
    <textarea id = "genere_nuovo" name = "genere_nuovo" class="custom-select" placeholder='Genere'></textarea>
    
  </div>

   <div class="form-group">
    <label for="regista">Regista</label><br/>
    <textarea id="regista" name = "regista" class = "form-control" placeholder='Regista' required></textarea> 
  </div>


  <hr>
  <div class = "form-group">
  <button type="submit" class="btn btn-primary">Inserisci</button>
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
</body>
</html>