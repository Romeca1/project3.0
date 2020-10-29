<?php
	namespace App\Http\Controllers;

	use Illuminate\Support\Facades\Redirect;
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use App\Models\User;
	use App\Http\Requests\UserRegisterRequest;
	use App\Http\Requests\UserLoginRequest;

	class UserController extends Controller{
		
		public function ShowLoginForm()
		{
			return view('public.LoginPage');
		}

		public function LoginValidating(UserLoginRequest $request)
		{
			if(!is_null($request['pass']) && !is_null($request['email'])){
				$user = User::where(["email" => $request['email'],"password" => $request['pass']])->first();
				if(!is_null($user)){
					session_start();
					session(['user_id' => $user->id]);
					return redirect('/homePage');
				}
				return Redirect::back()->withErrors(['err', 'No such email or password was found']);
			}
		}

		public function ShowRegisterFrom()
		{
			return view('public.RegisterPage');
		}

		public function RegisterValidating(UserRegisterRequest $request)
		{
			User::create([
				'fname' => $request['name'],
				'email' => $request['email'],
				'password' => $request['pass']
			]);
			return redirect('/login');
		}

	}
?>