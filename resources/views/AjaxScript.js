$(document).ready(function() {
  <?php echo "Hey you";
 ?>  var bottoni = document.getElementsByClassName('pop');
  console.log(bottoni.length);
  for (var i = 0; i < bottoni.length; i++) {
  bottoni[i].addEventListener('click', funzione);

  }
  function closure () {
    return "OK";
  }
  function funzione() {
    risultato = "GGG";
  console.log(risultato,'click');
  var element = $(this);
  var title = element.attr('id');
  
  var chiamata = new XMLHttpRequest();
  var url = 'http://www.omdbapi.com/?t=';
  var apikey = '&apikey=1543505e';
  chiamata.open('GET', url + title + apikey);
  chiamata.onload = function () {
    var element = $(this);
  var title = element.attr('id');

    console.log(risultato,'click');
          if (chiamata.status == 200) {
            console.log(title,'click');

            var ricercaApi = JSON.parse(chiamata.responseText);
          
          risultato += '<b>Titolo film: </b>' + ricercaApi.Title + "<br><b>Anno: </b>" + ricercaApi.Year + "<br><b>Regista: </b>" + ricercaApi.Director; 
          return  risultato;        
          }
  console.log(risultato);
  
  
          }
  
      
  chiamata.send();


  }


})
</script>


<script>
$(document).ready(function() {
  $('.pop').popover({
    title:funzione,
    html: true
  });

  function funzione() {
  var risultato = "";
  var element = $(this);
  var title = element.attr('id');
  var chiamata = new XMLHttpRequest();
  var url = 'http://www.omdbapi.com/?t=';
  var apikey = '&apikey=1543505e';
  chiamata.open('GET', url + title + apikey);
  chiamata.onload = function () {
          if (chiamata.status == 200) {
            var ricercaApi = JSON.parse(chiamata.responseText);
          
          risultato += '<b>Titolo film: </b>' + ricercaApi.Title + "<br><b>Anno: </b>" + ricercaApi.Year + "<br><b>Regista: </b>" + ricercaApi.Director;         
          }
  console.log(risultato);
  return risultato;
          }
  chiamata.send();
  }

})
</script>
 
<script>
$(document).ready(function() {
  $('.pop').popover({
    title: funzione,
    html: true
  });
  function closure () {
    return "OK";
  }
  function funzione() {
  var risultato = "";
  var element = $(this);
  var title = element.attr('id');
  var chiamata = new XMLHttpRequest();
  var url = 'http://www.omdbapi.com/?t=';
  var apikey = '&apikey=1543505e';
  chiamata.open('GET', url + title + apikey);
  chiamata.onload = function () {
          if (chiamata.status == 200) {

            var ricercaApi = JSON.parse(chiamata.responseText);
          
          risultato += '<b>Titolo film: </b>' + ricercaApi.Title + "<br><b>Anno: </b>" + ricercaApi.Year + "<br><b>Regista: </b>" + ricercaApi.Director;         
          }
  console.log(risultato);
  
  
          }
  
      
  chiamata.send();
return "OK";

  }


})
</script>




<script>
$(document).ready(function() {
  $('.pop').popover({
    title:funzione,
    html: true
  });

  function funzione() {
  var risultato = "asd"; 
  var element = $(this);
  
  var base = 'http://www.omdbapi.com/?t=';
  var apikey = '&apikey=1543505e';
  var title = element.attr('id');
  var indirizzo = base + title + apikey;
  
  var response = $.ajax({
      url : indirizzo,
      method: "GET",
      dataType: "json",
           
      })
  .done(function(){
    
    var ris = JSON.parse(response.responseText);
    if (ris.Title != undefined) {
      risultato += ris.Title;
      console.log("fin qui funziona", risultato); // qui il titolo è dentro la variabile risultato
      
    }
    else {
      console.log("Titolo non trovato");
    }
    })
  
   setTimeout(function afterFiveSeconds() {
  return risultato
}, 5000)
  console.log("invece qui non funziona", risultato); // qui il titolo non è dentro la variabile risultato, infatti 
  
  
  }  
  

  })
  

</script>
 
