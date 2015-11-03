<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
//use Rhubarb\Stem\Models\Validation\Validator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Support\Facades\Response;
use App\Http\Middleware\Authenticate;

class LoginController extends Controller
{
   /* public function __construct(Guard $auth){
        $this->auth=$auth;
    }*/
    public function __construct(){
        //$this->auth=$auth;
        $this->middleware('guest');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('auth.login.index');
    }

    /**
     * @return Redirect
     */
    public function login(){
        $rules=array(
            'email'=>'required',
            'password'=>'required'
        );
        $validator=Validator::make(Input::all(),$rules);
        if($validator->fails()) {
            return redirect('/')->withErrors($validator);
        }else{
            $user=array(
            'email'=>Input::get('email'),
            'password'=>Input::get('password')
            );
            if(Auth::validate($user)){
                if(Auth::attempt($user)){
                    // Grab Authenticated User's Data Once
                    $user_data = Auth::user();

                    Session::put('user_id', $user_data->id);
                    Session::put('name', $user_data->name);
                    Session::put('email_id', $user_data->email);

                    return redirect::to('settings');
                }
            }else{
                /*Session::flash('message','Login Failed');
                return redirect('auth/login');*/
                return Redirect::back()
                    ->withInput()
                    ->withErrors('That Email/password does not exist.');
            }
        }
       /* $email = Input::get('email');
        $password = Input::get('password');

        if (Auth::attempt(['email' => $email, 'password' => $password]))
        {
            return Redirect::intended('/settings/index');
        }

        return Redirect::back()
            ->withInput()
            ->withErrors('That Email/password combo does not exist.');*/

    }

    /**
     * Show the form for logout
     *
     * @param Request $request
     * @return Response
     */
    public function logout(Request $request) {
        Auth::logout(); // logout user
       // return Redirect::to('auth.login'); //redirect back to login
        Session::flush();
        Session::forget('email_id');
        Session::forget('name');
        $request->session()->forget('name');
        $request->session()->flush();
        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
