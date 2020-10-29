<!DOCTYPE html>
<html>
<head>
	<title>UpDate post</title>
</head>
<body>
	
	<form method="post" action="{{asset('')}}">
		{{csrf_field()}}
		<label for="new_head">
			<p>New header:</p>
			<input type="text" name="new_head" value="{{$post[0]->head}}">	
		</label>
		<label for="new_body">
			<p>New body:</p>
			<textarea name="new_body">{{$post[0]->body}}</textarea>	
		</label>
		<input type="submit" value="UpDate">
	</form>
	<div class="errors_div">
			@if ($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
			<span>{{ $error }}</span><br>
			@endforeach
		</div>
		@endif
	</div>
</body>
</html>