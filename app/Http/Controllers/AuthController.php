<?php
//
//namespace App\Http\Controllers;
//
//use Illuminate\Http\Request;
//use App\Models\User;
//use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Validator;
//
//class AuthController extends Controller
//{
//    public function showRegisterForm()
//    {
//        return view('auth.register');
//    }
//    public function register(Request $request)
//    {
//        $validator = Validator::make($request->all(), [
//           'name' => 'required|string|max:255',
//            'email' => 'required|string|email|max:255|unique:users',
//            'password' => 'required|string|min:6|confirmed',
//        ]);
//        if($validator->fails()){
//            return redirect()->back()->withErrors($validator)->withInput();
//        }
//        $user = User::create([
//           'name' =>
//        ]);
//    }
//}
