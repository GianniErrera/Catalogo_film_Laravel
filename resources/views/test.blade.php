<!DOCTYPE html>
<html>
<head>
	<title>Filmoteca</title>
	
</head>
<body>
	<div>
<table style = "width: 100%">
	<tr>
		<th>Titolo</th>
		<th>Anno</th>
	</tr>	
@foreach ($films as $film)
<tr>
<td>			
{{$film->titolo}}
</td>			
<td>			
{{$film->anno}}
</td>
</tr>
@endforeach	


</table>
</div>
<div style="display: inline-block">
{{$films->links()}}
</div>

</table>
</body>
</html>