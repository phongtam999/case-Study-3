<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewLogin()
    {
        return view('auth.login');
    }

   //xử lí đăng nhập
   public function login(Request $request){
    $validated = $request->validate([
        'email' => 'required',
        'password'=>'required|min:6',
    ],
        [
            'email.required'=>'Không được để trống',
            'password.required'=>'Không được để trống',
            'password.min'=>'Lớn hơn :min',
        ]
);

      $credentials = $request->validate([
          'email' => ['required', 'email'],
          'password' => ['required'],
      ]);

      if (Auth::attempt($credentials)) {

          $request->session()->regenerate();

          return redirect()->route('products.index');
      }
      // dd($request->all());
      return back()->withErrors([
          'email' => 'The provided credentials do not match our records.',
      ])->onlyInput('email');
  }

  //Hiển Thị Đăng Ký
  public function viewRegister()
  {
      return view('auth.register');
  }
  //xử lí đăng ký
  public function register(Request $request){
    $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|unique:users',
        'password'=>'required|min:6',
    ],
        [
            'name.required'=>'Không được để trống',
            'email.required'=>'Không được để trống',
            'email.unique'=>'Trùng Email',
            'password.required'=>'Không được để trống',
            'password.min'=>'Lớn hơn :min',
        ]
);
      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      try {
          $user->save();
          return redirect()->route('login');
      } catch (\Exception $e) {
          Log::error("message:".$e->getMessage());
      }
  }

      public function logout(Request $request)
      {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
      }

}
