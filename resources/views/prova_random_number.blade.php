<!DOCTYPE html>
<html>
<head>
	<title>Random number generator</title>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
<body>
<br>
<button id = "random_generator" style = "margin:10px">Clicca per generare un numero casuale tra 1 e 100</button>
<br>
<br>
<div id = "random_number" style = "margin:40px">Questo è un div</div>
</body>
<script type="text/javascript">
document.getElementById('random_generator').addEventListener('click', generatore);

function generatore() {

	var response = $.ajax({
	url: '/genera_numero',
	method: 'GET',
	dataType: 'html'
	})
	.done(function() {
		console.log('wtf', response);
	var output = response.responseText;
	console.log(output);
	document.getElementById('random_number').innerHTML = output;
	})
}	
</script>
</html>