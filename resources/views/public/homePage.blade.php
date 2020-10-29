<!DOCTYPE html>
<html>
<head>
	<title>home page</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/homePage_CSS.css')}}">
	<script type="text/javascript" src="{{asset('js/jQuery.js')}}"></script>
</head>
<body>
	<div class="nav_div">
		<ul>
			<li><a href="{{asset('/homePage/profile')}}">Profile</a></li>
			<li><a href="{{asset('/homePage/post/show')}}">My posts</a></li>
			<li><a href="{{asset('/')}}">Log out</a></li>
		</ul>
	</div>
	<div class="body_div">
		
		@if(isset($posts))
			@foreach($posts as $value)		
				<div class="row_posts">
					<h3>{{$value->head}}</h3>
					<div class="body_post">
						<p class="body_text" id="p{{$value->id}}">
						<?php
							$count = 1;
							for ($i = 0;$i<strlen($value->body);$i++) {
								if($count == 60){
									echo '<br>';
									$count = 0;
								}
								$count++;
								echo $value->body[$i];
							}
						?>
						</p>
					</div>
					<hr>
					<div class="create-comment" id="f{{$value->id}}">
						<form method="post" action="{{
							url('/HomePage/' . session('user_id') . '/MyPosts/Comment/' . session('user_id'))
						}}">
						{{csrf_field()}}
							<textarea name="comment" placeholder="Enter your comment:" rows="5" cols="65"></textarea>
							<br>
							<input class="sbmt_btn" type="submit" value="comment">
						</form>
						<div class="comments">
							@foreach(App\Models\Comment::where("posts_id",$value->id)->get() as 	$comment)
								<h1>{{$comment->user_name}}</h1>
								<?php
									$bcount = 1;
										for ($i = 0;$i<strlen($comment->comment);$i++) {
										if($bcount == 60){
											echo '<br>';
											$bcount = 0;
										}
										$bcount++;
										echo $comment->comment[$i];
									}
								?>
							@endforeach
						</div>
					</div>
					<div class="btns">
						<button class="btn_see" id="{{$value->id}}">See</button>
						<button class="btn_see_comment" id="{{$value->id}}">Comments</button>
					</div>
				</div>
			@endforeach
		@endif
	</div>
	
	<script>
		$(document).ready(function() {
			$(".body_div").on("click",".row_posts .btns .btn_see",function() {
				$("#p" + $(this).attr("id")).show(500);
				$(this).text("Close");
				$(this).attr("class","btn_close");
			});
			$(".body_div").on("click",".row_posts .btns .btn_close",function(){
				$("#p" + $(this).attr("id")).hide(500);
				$(this).text("See");
				$(this).attr("class","btn_see");
			});
			$(".body_div").on("click",".row_posts .btns .btn_see_comment",function() {
				$("#f" + $(this).attr("id")).show(500);
				$(this).text("Close");
				$(this).attr("class","btn_hide_comment");
			});
			$(".body_div").on("click",".row_posts .btns .btn_hide_comment",function() {
				$("#f" + $(this).attr("id")).hide(500);
				$(this).text("Comment");
				$(this).attr("class","btn_see_comment");
			});
		});
	</script>
</body>
</html>