<!DOCTYPE html>
<html>
<head>
	<title>Profile page</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/_profilePage.css')}}">
</head>
<body>
	<div class="user_data_div">
		<p>name : {{$user_data[0]->fname}}</p>
		<p>email : {{$user_data[0]->email}}</p>
	</div>
</body>
</html>