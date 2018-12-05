<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table style = "width: 100%">
	<tr>
		<th>Titolo</th>
		<th>Anno</th>
	</tr>	
@foreach ($f as $film)
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


</table>
</body>
</html>