<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Laravel\Socialite\Facades\Socialite;
use Image;

class SocialController extends Controller
{

   public function login()
   {
      if (Auth::check()) {
         return redirect()->route('index');
      }

      return View('auth.login');
   }

   public function loginAuth(Request $request)
   {
      $this->validate($request, [
         'email'    => 'required',
         'password' => 'required',
      ]);

      $login_type = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL)
         ? 'email'
         : 'username';

      $request->merge([
         $login_type => $request->input('email')
      ]);

      if (Auth::attempt($request->only($login_type, 'password'))) {
         return redirect()->route('index');
      }

      return redirect()->back()
         ->withInput()
         ->withErrors([
            'email' => 'Invalid email or password please try again',
         ]);
   }

   public function check(Request $request)
   {
      $username = $request->query('username');
      if ($username) {
         $user = user::where('username', $username)->first();
         if ($user) {
            return response()->json([
               'isAvailable' => false,
               'message' => 'This username is already taken.',
            ]);
         } else {
            return response()->json([
               'isAvailable' => true,
               'message' => 'You can use this username.',
            ]);
         }
      }
      $email = $request->query('email');
      if ($email) {
         $user = user::where('email', $email)->first();
         if ($user) {
            return response()->json([
               'isAvailable' => false,
               'message' => 'This email is already taken.',
            ]);
         } else {
            return response()->json([
               'isAvailable' => true,
               'message' => 'You can use this email.',
            ]);
         }
      }
   }

   public function register()
   {
      if (Auth::check()) {
         return redirect()->route('index');
      }

      return View('auth.register');
   }

   public function registerAuth(Request $request)
   {
      $user = User::where('username', $request->username)->orWhere('email', $request->email)->first();
      if (!$user) {
         $user = new User;
         $user->username = $request->username;
         $user->email = $request->email;
         $user->mobile = $request->mobile;
         $user->password = Hash::make($request->password);
         $user->save();
         Auth::loginUsingId($user->id);

         return redirect()->route('manage.index');
      }
   }

   public function logout()
   {
      Auth::logout();

      return redirect()->route('login');
   }
}
