<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Carbon\Carbon;
use Cookie;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Session::get('user');
          if(!$user){
           return view('auth.login');
           }else{
             return redirect()->route('index');
           }
       
    }

    // public function customLogin(Request $request)
    // {  

      
    //     $data = "";
    //     $user = DB::table('tbl_users')->get();
    //     $request->validate([
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);
   
    //     $user = $request->only('email', 'password');
    //     if (Auth::attempt($user)) {
    //         $user = Auth::User();
    //         Session::put('user', $user);
    //             $this->addCookies($user);
    //         return redirect()->intended('dashboard')
    //                     ->withSuccess('Signed in');
    //     }
        
    //     return redirect("/")->with('error','Login details are not valid');
    // }

public function customLogin(Request $request)
{
    $user = DB::table('tbl_users')->get();
    $this->validate($request, [
        'email'    => 'required',
        'password' => 'required',
    ]);

    if(filter_var($request->input('email'), FILTER_VALIDATE_EMAIL)) {
        //user sent their email 
        Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]);
    } else{
        //they sent their username instead 
        Auth::attempt(['userId' => $request->input('email'), 'password' => $request->input('password')]);  
    }   

    if ( Auth::check() ) {
        $user = Auth::User();
             Session::put('user', $user);
                    $this->addCookies($user);
            return redirect()->intended('dashboard')->withSuccess('Signed in');
    }

//Nope, something wrong during authentication 
  return redirect("/")->with('error','Login details are not valid');
    
} 


public function autoLogin($token, Request $request){
    $user = User::findOrFail(base64_decode($token));
    Auth::loginUsingId($user->userId);
    if ( Auth::check() ) {
        $user = Auth::User();
             Session::put('user', $user);
                    $this->addCookies($user);
            return redirect()->intended('dashboard')->withSuccess('Signed in');
    }
    return redirect('/');
}






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Session::flush();
        Cookie::queue(Cookie::forget('user'));
        // Cookie::forget('user');
        return redirect()->route('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addCookies($user)
    {
        $data = [
                    'id' => $user->userId,
                    'email' => $user->email
                ];
               $userJson = json_encode($data);
            Cookie::queue('user', $userJson , 7200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function checkAuth()
    {
    if(Session::has('user')){
       return true;
    }elseif(Cookie::get('user')){
        $cookies = json_decode($cookieData);
            $id = $cookies['id'];
           $details = DB::table('tbl_users')->where('userId', $id)->first(); 
           if($details){
            Session::put('user', $details);
            return true;
           }else{
            return false;
           }  
    }else{
        return false;
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
