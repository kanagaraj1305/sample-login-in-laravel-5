<?php

namespace App\Http\Controllers;

use App\Http\Requests\createUserRequest;
use App\User;
use Collective\Html\FormBuilder;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
//use Rhubarb\Crown\Sessions\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Session;
use Response;
use App\Http\Middleware\Authenticate;


class SettingsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if(Auth::check()) {
            $email_id=Session::get('email_id');
           // $us=DB::table('users');
            $users = User::all();
            return view('settings.index')->with('users', $users);
            //return redirect::to('settings.index')->with('users', $users);
        }else{
            return redirect::to('auth/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param createUserRequest $request
     * @return Response
     */
    public function store(createUserRequest $request)
    {

        $rules=array(
            'name'=>'required',
            'email'=>'required|email'
        );
        $validator=Validator::make(Input::all(),$rules);
        if($validator->fails()){
            return redirect::to('settings.create')->withErrors($validator)->withInput(Input::except('password'));
        }else{
            $user=new User();
            $user->name=Input::get('name');
            $user->email=Input::get('email');
            $user->password=bcrypt(Input::get('password'));
            $user->save();

            Session::flash('message','Successfully Created');
            return redirect::to('settings');
        }

       /* User::create($request->all());
        Session::flash('message','User Created Successfully!!!');
        return redirect::to('settings');*/
    }
    public function store_ajax(){
        $rules=array(
            'name'=>'required',
            'email'=>'required|email'
            );
        $validator=Validator::make(Input::all(),$rules);
        if($validator->fails()){
            //return redirect::to('settings.create')->withErrors($validator);
            return $validator;
        }else{
            $user=new User();
            $user->name=Input::get('name');
            $user->email=Input::get('email');
            $user->password=bcrypt(Input::get('password'));
            $user->save();

           // Session::flash('message','Successfully Created');
            return $user;
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user=User::find($id);
        return view('settings.show')->with('user',$user);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show_user()
    {
        $id=Input::get('id');
        $user=User::find($id);
        //return view('settings.show')->with('user',$user);
        return $user;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        return view('settings.edit')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit_table()
    {
        $id=Input::get('id');
        $user=User::find($id);
       // return view('settings.edit')->with('user',$user);
        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $rules=array(
            'name'=>'required',
            'email'=>'required|email'
        );
        $validator=Validator::make(Input::all(),$rules);
        if($validator->fails()) {
            return redirect::to('settings.edit')->withErrors($validator);
        }else{
            $user=User::find($id);
            $user->name=Input::get('name');
            $user->email=Input::get('email');
            $user->save();
            Session::flash('message','Updated Successfully!!!');
            return redirect::to('settings');
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update_user()
    {
        $id=Input::get('id');
        $rules=array(
            'name'=>'required',
            'email'=>'required|email'
        );
        $validator=Validator::make(Input::all(),$rules);
        if($validator->fails()) {
            return redirect::to('settings.edit')->withErrors($validator);
        }else{
            $user=User::find($id);
            $user->name=Input::get('name');
            $user->email=Input::get('email');
            $user->save();
            //Session::flash('message','Updated Successfully!!!');
            //return redirect::to('settings');
            return $user;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        Session::flash('message','Record Deleted Succesfully!!!');
        return redirect::to('settings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy_user()
    {
        $id = input::get('id');
        $user=User::find($id);
        $user->delete();
       // Session::flash('message','Record Deleted Succesfully!!!');
       // return redirect::to('settings');
        return $user;
    }
}
