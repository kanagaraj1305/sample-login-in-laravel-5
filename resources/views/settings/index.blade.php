@extends('master.header')

    @include('master.navbar')

    @include('master.mainbar')
@section('title','Home')
@section('content')

    <div class="portlet portlet-table">

        <div class="portlet-header">

            <h3>
                <i class="fa fa-group"></i>
                Recent Signups
            </h3>

            <ul class="portlet-tools pull-right">
                <li>
                    <a class="btn btn-sm btn-default" href="settings/create">
                        Add User
                    </a>
                </li>
                <li>
                    <a class="btn btn-sm btn-primary" href="javascript:void(0)" id="create_new" name="create_new">
                        Create New User
                    </a>
                </li>
            </ul>

        </div> <!-- /.portlet-header -->

        <div class="portlet-content">


            <div class="table-responsive">

                <table id="user-signups" class="table table-striped table-bordered table-checkable">
                    <thead>
                    <tr>
                        <th class="">
                            ID
                        </th>
                        <th >Name</th>
                        <th>Email</th>
                        <th>Edit</th>
                        <th >Delete</th>
                        <th>View</th>
                        <th>Delete Ajax</th>
                        <th>View Ajax</th>
                        <th>Edit Ajax</th>
                    </tr>
                    </thead>

                    <tbody id="userlisttable">
                    @foreach($users as $key=>$value)
                        <tr id="user-{{$value->id}}">
                            <td>{{ $value->id }}</td>
                            <td>{{$value->name}}</td>
                            <td>{{ $value->email }}</td>
                            <td><a href="settings/{{ $value->id }}/edit" class="btn btn-xs btn-secondary" data-original-title="edit">Edit</a></td>
                            <td class="text-center">
                                {!! Form::open(['method'=>'DELETE','route'=>['settings.destroy',$value->id],'id'=>'deletedata']) !!}
                                {!! Form::submit('Delete',array('class'=>'btn btn-xs btn-primary'))!!}

                                {!! Form::close()!!}
                            </td>
                            <td>
                                <a href="settings/show/{{ $value->id }}" class="btn btn-xs btn-secondary" data-original-title="view">
                                    <i class="fa fa-check"></i>
                                </a>
                            </td>
                        <td><a href="javascript:void(0)" id="delete_{{$value->id}}" class="btn btn-danger btn-sm" onclick="delete_user('{{$value->id}}')">Delete</a> </td>
                        <td><a href="javascript:void(0)" class="btn btn-secondary btn-sm" id="view_{{$value->id}}" onclick="view_user('{{$value->id}}')">View</a> </td>
                        <td><a href="javascript:void(0)" class="btn btn-secondary btn-sm" id="edit_{{$value->id}}" onclick="edit_user('{{$value->id}}')">Edit</a> </td>
                        </tr>

                    @endforeach



                    </tbody>

                </table>


            </div> <!-- /.table-responsive -->

        </div> <!-- /.portlet-content -->



    </div> <!-- /.portlet -->

@stop
@section('displaynonecontent')
<div id="create_new_content" style="display: none;">
    <div class="portlet portlet-table ">

        <div class="portlet-header col-lg-12">

            <h3>
                <i class="fa fa-group"></i>
                New User
            </h3>

        </div> <!-- /.portlet-header -->

        <div class="portlet-content col-lg-12">
            <form class="form-horizontal" >
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="col-md-4 control-label">Name</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">E-Mail Address</label>
                    <div class="col-md-6">
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Password</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Confirm Password</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        {{--<button type="submit" class="btn btn-primary">
                            Register
                        </button>--}}
                        <a class="btn btn-primary" id="register_new" name="register_new">Register</a>
                    </div>
                </div>
            </form>
        </div>
        <ul>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <li class="text-danger"> {{ $error }} </li>
                @endforeach

            @endif
        </ul>
    </div>
</div>

 {{-- View Contents--}}
    <div id="viewuserd" style="display: none;">
        <div class="portlet portlet-table ">

            <div class="portlet-header col-lg-12">

                <h3>
                    <i class="fa fa-group"></i>
                    View User
                </h3>
                <ul class="portlet-tools pull-right">
                    <li>
                        <a href="javascript:;" class="btn btn-sm btn-icon" id="closeviewuser">
                            <i class="fa fa-times"></i>
                        </a>
                    </li>
                </ul>
            </div> <!-- /.portlet-header -->

            <div class="portlet-content col-lg-12" >
                <div class="table-responsive">

                    <table id="user-signups" class="table table-striped table-bordered table-checkable">
                        <thead>
                        <tr>
                            <th class="">
                                ID
                            </th>
                            <th >Name</th>
                            <th>Email</th>

                        </tr>
                        </thead>

                        <tbody id="viewappenduser">

                        </tbody>

                    </table>


                </div> <!-- /.table-responsive -->

            </div>

        </div>
    </div>

    {{--Edit user table--}}
<div id="edituserd" style="display: none;">
    <div class="portlet portlet-table ">

        <div class="portlet-header col-lg-12">

            <h3>
                <i class="fa fa-group"></i>
               Edit Users
            </h3>
            <ul class="portlet-tools pull-right">
                <li>
                    <a href="javascript:;" class="btn btn-sm btn-icon" id="closeedituser">
                        <i class="fa fa-times"></i>
                    </a>
                </li>
            </ul>
        </div> <!-- /.portlet-header -->

        <div class="portlet-content col-lg-12" id="edituserp">
            </div>

        </div>

    </div>
</div>

@stop

@extends('settings.script.create_new_user')
