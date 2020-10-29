<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use App\Http\Controllers\HomeControler;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;

//Create post Route
Route::get('/HomePage/Create/{log_user_id}',function($user_id)
{
	return view('public.ToHomePageMenu.CreateBlogPage',["log_user_id" => $user_id]);
});

Route::get('/HomePage',[HomeControler::class,"HomePage"]);

Route::get('/HomePage/{log_user_id}/MyPosts',[HomeControler::class,"MyPostsPage"]);
//Deleate post Route
Route::get('/HomePage/{log_user_id}/MyPosts/Deleate/{post_id}',[HomeControler::class,'DeletePost']);
//UpDate post form route
Route::get('/HomePage/{log_user_id}/MyPosts/UpDate/{post_id}',[HomeControler::class,"FormUpDatePost"]);
//UpDate post validation route
Route::post('/HomePage/{log_user_id}/MyPosts/UpDate/{post_id}',[HomeControler::class,"UpDatePost"]);
//Comment post route
Route::post('/HomePage/{log_user_id}/MyPosts/Comment/{post_id}',[HomeControler::class,"CommentsPost"]);
//news posts route
Route::post('/HomePage/Create/{log_user_id}',[HomeControler::class,"CreateValidation"]);
//Welcome page Route
Route::get('/HomePage/Profile/{log_user_id}',[HomeControler::class,"ProfilePage"]);
Route::get('/',[HomeControler::class,"WelcomePage"]);
////

//2.0
//All get routes
Route::get('/',[PageController::class,"GetWelcomePage"]);
Route::get('/register',[UserController::class,"ShowRegisterFrom"]);
Route::get('/login',[UserController::class,"ShowLoginForm"]);
Route::get('/homePage',[PageController::class,"GetHomePage"]);
Route::get('/homePage/workbench/create',[PageController::class,"GetCreatePostPage"]);
Route::get('/homePage/profile',[PageController::class,"GetProfilePage"]);
Route::get('/homePage/myPosts/upDate/{post_id}',[PageController::class,"GetUpDatePage"]);

Route::get('/homePage/myPosts/delete/{post_id}',[PostController::class,"DeletePost"]);
//All post routes
Route::post('/register',[UserController::class,"RegisterValidating"]);
Route::post('/login',[UserController::class,"LoginValidating"]);

Route::resource('posts','PostController');
