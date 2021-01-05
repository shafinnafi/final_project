<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
</head>
<body>
	<a href="#">Back</a> |
	<a href="/logout">logout</a>
	<br>
	
		<form method="post" enctype="multipart/form-data">

			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<fieldset>
				<legend>Create employee</legend>
			<table>
				<tr>
					<td>Name</td>
					<td><input type="text" name="name" value="{{old('name')}}"></td>
				</tr>
				<tr>
					<td>Title</td>
					<td><input type="text" name="username" value="{{old('title')}}"></td>
				</tr>
				<tr>
					<td>Price</td>
					<td><input type="text" name="password" value="{{old('price')}}"></td>
				</tr>
				<tr>
					<td>Stock</td>
					<td><input type="stock" name="contactNo" value="{{old('stock')}}"></td>
				</tr>
				
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Create"></td>
				</tr>
			</table>
			</fieldset>
		</form>

		@foreach($errors->all() as $err)
			{{$err}} <br>
		@endforeach
</body>
</html>