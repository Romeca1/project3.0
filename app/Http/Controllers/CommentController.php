<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\User;
class CommentController extends Controller
{
    public function create(CommentRequest $request,$post_id)
    {
    	 Comment::create([
    	 	'post_id' => $post_id,
    	 	'user_name' => User::find(session('user_id'))->fname,
    	 	'comment' => $request['comment']
    	 ]);
    	 return redirect('/homePage');
    }
    public function destroy(Comment $comment)
    {
    	$comment->delete();
    	return redirect('/homePage');
    }
    
}
