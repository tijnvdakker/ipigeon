<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function check(Request $request) {

    	$request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        $user = [
            'username'=>$request->get('username'),
            'password'=>$request->get('password')
        ];

    	if (Auth::attempt($user)) {
            return $this->redirect();	
    	} else {
    		return redirect('/login')->with('error', 'Incorrect username/password');
    	}
    }

    public function show() {
    	return view('/login');
    }

    public function redirect() {
        switch (Auth::user()->role->id) {
            case 1:
                return redirect('dashboard/overview');
            case 2:
                return redirect('orders/pending');
            case 3:
                return redirect('reservations/overview');
            default: 
                abort(404);
        }
    }
}
