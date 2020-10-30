<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PageController extends Controller
{
    public function GetWelcomePage()
    {
    	return view('public.WelcomePage');
    }
    public function GetHomePage()
    {
    	return view('public.homePage',['posts' => Post::all()]);
    }
    public function GetCreatePostPage()
    {
    	return view('public.ToHomePageMenu.CreateBlogPage');
    }
    public function GetMyPostPage()
    {
        $myPosts = Post::where('user_id',session('user_id'))->get();
        return view('public.ToHomePageMenu.MyPostPage',['posts' => $myPosts]);
    }
    public function GetProfilePage()
    {
    	return view('public.ToHomePageMenu.ProfilePage');
    }
    public function GetUpDatePage()
    {
    	return view('public.ToHomePageMenu.UpDatePost');
    }
}
