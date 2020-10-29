<!DOCTYPE html>
<html>
<head>
	<title>Welcome page</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/welcomePage_CSS.css')}}">
</head>
<script type="text/javascript" src="{{asset('js/jQuery.js')}}"></script>
<body>
	<div class="head_div">
		<ul>
			<li><h1>Welcome to BlogBlo!</h1></li>
			<li><a href="{{asset('/register')}}" class="btn_Reg">Sign up</a></li>
			<li><a href="{{asset('/login')}}" class="btn_Log">Sign in</a></li>
		</ul>
	</div>
</body>
</html>