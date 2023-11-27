<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
   

    // Email Verification
    public function verify_notice() 
    {
        $auth = Auth::user()->email_verified_at;
        if($auth != null)
        {
            return redirect('/home');
        }
        return view('auth.verify');
    }
    public function verify(EmailVerificationRequest $request) 
    {
        $request->fulfill();
     
        return redirect('/home');
    }
    public function verify_resend(Request $request) 
    {
        $request->user()->sendEmailVerificationNotification();
     
        return back()->with('message', 'Verification link sent!');
    }
    // Changing Password
    public function cng_pass_view()
    {
        return view('auth.changePass');
    }
    public function update_password(Request $request)
    {
        $request->validate([
            'current_pass'=>'required',
            'password' => 'required|min:8|confirmed',
        ]);
        $user = Auth::user();
        if(Hash::check($request->current_pass, $user->password))
        {
            $data = array(
                'password' => Hash::make($request->password),
            );
            DB::table('users')->where('id',Auth::id())->update($data);
            Auth::logout();
            return redirect()->route('home');
        }
        return redirect()->back()->with('error','Current Password Mismatched!');
    }
}