<!DOCTYPE html>
<html>
<head>
	<title>My post</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/MyPostsPage_CSS.css')}}">
	<script type="text/javascript" src="{{asset('js/jQuery.js')}}"></script>
</head>
<body>
	<a href="{{asset('/homePage')}}" class="back_to_homePage_btn">Back</a>
	<a href="{{asset('/homePage/workbench/create')}}" class="back_to_homePage_btn">Create new</a>
	<div class="table_posts">
	@foreach($posts as $post)		
		<div class="row_posts">
			<h3>{{$post->head}}</h3>
			<div class="body_div" id="b{{$post->id}}">				
				<p class="body_text">
				<?php
					$count = 1;
					for ($i = 0;$i<strlen($post->body);$i++) {
						if($count == 120){
							echo "/n";
							$count = 0;
						}
						$count++;
						echo $post->body[$i];
					}
				?>
				</p>
				<button class="Close_btn" id="{{$post->id}}">close</button>
			</div>
			<div class="UpDate-form">
				<form method="post" action="">
					{{ csrf_field() }}
					<input type="text" name="new_head" value="{{$post->head}}">
					<br><textarea rows="5" cols="55" name="new_body">{{$post->body}}</textarea>
					<br><input type="submit" value="Up Date">
				</form>
			</div>
			<ul>
				<li class="Del_btn">
					<form action="{{ route('posts.destroy', $post->id) }}" method="POST">
					     {{ method_field('DELETE') }}
					     {{ csrf_field() }}
					     <button class="btn btn-danger">Delete Post</button>
					</form>
				</li>
				<li class="UpD_btn"><a href="#">UpDate</a></li>
				
				<li class="See_btn" id="{{$post->id}}"><button>See post</button></li>
				
				<li class="Comment_btn"><a>See comment</a></li>
			</ul>
		</div>
	@endforeach
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".See_btn").on("click",function(){
				$("#b" + $(this).attr("id")).show(500);
			});
			$(".table_posts").on("click",".row_posts .body_div .Close_btn",function(){
				$("#b" + $(this).attr("id")).hide(500);
			});
			$(".table_posts").on("click",".row_posts ul li .UpD_btn a",function(){
				//todo
			});
		});
	</script>
</body>
</html>