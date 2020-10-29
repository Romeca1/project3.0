<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/registerPage_CSS.css')}}">
	<script type="text/javascript" src="{{asset('js/jQuery.js')}}"></script>
</head>
<body>
	<div class="form_div">
		<form method="post" action="{{asset('/test/register')}}">
			{{@csrf_field()}}
			<div class="logo_form_div">
				<img src="{{asset('img/blogIcon.png')}}">
			</div>
			@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
			<div class="input_name_div">
				<label>
					<p class="input-paragraph">Enter user name</p>
					<input type="text" name="name" placeholder="Enter name:" value="{{old('name')}}">
				</label>
			</div>
			<div class="input_email_div">
				<label>
					<p class="input-paragraph">Enter email</p>
					<input type="text" name="email" placeholder="Enter email:">
				</label>
			</div>
			<div class="input_password_div">
				<label>
					<p class="input-paragraph">Enter password</p>
					<input type="password" name="pass" placeholder="Enter password:">
				</label>
			</div>
			<div class="input_password_div">
				<label>
					<p class="input-paragraph">Repeat password</p>
					<input type="password" name="pass2" placeholder="Enter repeated password:">
				</label>
			</div>
			<div class="submit_div">
				<input type="submit" class="input_submit_button">
			</div>
			<div>
				@if(isset($messeg_error))
				<p class="error_p">{{$messeg_error}}</p>
				@endif

				@if(isset($errors))
				@foreach($errors as $error)
				<p class="error_p">{{$error}}</p>
				@endforeach
				@endif
			</div>
		</form>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('input').on('focus',function(){
				$(this).css("background-color","#C29B1B");
			});
			$('input').on('focusout',function(){
				$(this).css("background-color","#F1CF60");
			});

		});
	</script>
</body>
</html>