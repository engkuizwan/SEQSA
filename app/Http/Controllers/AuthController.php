<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login(Request $request){

        $check = $request->all();
        //$2y$10$/UYbQcqwJHq5lA7lz1Opd.PQtL7/69FB9PmJSStP8i8MTY7kgoOt.
        // dd(Hash::make(123));
        
        if(Auth::guard('web')->attempt(["email"=>$check['email'], "password"=>$check['password']])){
            // dd(Auth::guard('web')->user()->role);
            if(Auth::guard('web')->user()->role == 0){
                // return redirect(route('projectadmin'))->with('error','Login successfully');
                return redirect(route('project.admin'));
            }elseif(Auth::guard('web')->user()->role == 1){
                return redirect(route('project.user',Auth::guard('web')->user()->id))->with('error','Account created successfully');
                // redirect(route('student.index'))
            }
        }

        


    }

    public function logoutaction(Request $request){

        $this->guard()->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect(route('login'));
    }
}
