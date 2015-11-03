<?php

namespace App\Http\Controllers;

use App\Http\Requests\createUserRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Session;
use Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserApiController extends Controller
{
    //function  __construct(UserApiController $userapicontroller){
       // $this->beforeFilters('auth.basic',['on'=>'post']);
   // }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users=User::all();
        return $users;
        /*return response()->json([
            "msg"=>"success",
            "user"=>$users
        ],200);*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param createUserRequest $request
     * @return Response
     */
    public function store()
    {
        // store
         $user = new User;
         $user->name       = Input::get('name');
         $user->email      = Input::get('email');
         $user->password = Input::get('password');
         $user->save();

      //  User::create($request->all());
        // redirect
        Session::flash('message', 'Successfully created user!');
        return $user;
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
        //return view('user.show')->with('user',$user);
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
       // return view('user.edit')->with('user',$user);
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
        if($validator->fails()){
            return Redirect::to('user/'.$id.'/edit')->withErrors($validator)->withInput(Input::except('passowrd'));
        }else{
            $user=User::find($id);
            $user->name=Input::get('name');
            $user->email=Input::get('email');
            $user->save();
            Session::flash('message','Updated Successfully!!!');
            return Redirect::to('/');
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
        //delete
        $user=User::find($id);
        $user->delete();

        //Redirect
        Session::flash('message','User Successfully Deleted!!!');
        return Redirect::to('/');
    }
}
