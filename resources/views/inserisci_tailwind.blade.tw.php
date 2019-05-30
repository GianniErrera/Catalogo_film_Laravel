<!doctype html>
<html lang="en">
  <head>
    <title>Inserisci film</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link rel= "stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
  </head>
  <body class = "bg-blue-darkest">
        <div class = "container mx-auto" style = "margin:15px">


            <form method = "POST" action = "/films/nuovo" enctype = "multipart/form-data">

              {{csrf_field()}}

              <div class="mb-4">
                <label for="titolo">Titolo</label><br/>
                <textarea id="titolo" name = "titolo" class = "block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-grey-darker border border-grey rounded" placeholder='Titolo' required></textarea>
              </div>

              <div class="mb-4">
                <label for="anno">Anno</label><br/>
                <textarea id="anno" name = "anno" class = "block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-grey-darker border border-grey rounded" placeholder='Anno'></textarea>
              </div>

              <div class="mb-4" style="border: 2px solid #dddddd">


                <label for="genere">Scegli un genere esistente(altrimenti lascia vuoto o nessuna selezione):</label>
                <select class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-grey-darker border border-grey rounded" id="genere" name="genere">
                 <option></option>
                 <option value = "">nessuna selezione</option>
                  @foreach($generi as $genere)
                  <option>{{$genere}}</option>
                @endforeach
                 </select>
                 <br>
              <label for="genere">oppure inserisci un genere nuovo</label>
                <textarea id = "genere_nuovo" name = "genere_nuovo" class="custom-select" placeholder='Genere'></textarea>
                <br>
                <br>


              </div>

               <div class="mb-4">
                <label for="regista">Regista</label><br/>
                <textarea id="regista" name = "regista" class = "block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-grey-darker border border-grey rounded" placeholder='Regista' required></textarea>
              </div>

              <div class="mb-4">
                <label for="immagine">Immagine locandina - facoltativo</label><br/>
                <input type = "file" id="locandina" name = "locandina" class = "block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-grey-darker border border-grey rounded"></textarea>
              </div>


              <hr>
              <div class = "mb-4">
              <button type="submit" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-blue-lightest bg-blue hover:bg-blue-light">Inserisci</button>
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


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            $('#genere').select2();
         });
    </script>
</body>
</html>
