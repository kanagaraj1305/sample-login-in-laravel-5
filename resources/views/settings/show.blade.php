@extends('master.header')
@include('master.navbar')
@include('master.mainbar')
@section('title','Show')
@section('content')

    <div class="portlet portlet-table">

        <div class="portlet-header">

            <h3>
                <i class="fa fa-group"></i>
                View Users
            </h3>
            <ul class="portlet-tools pull-right">
                <li>
                    <a class="btn btn-sm btn-default" href="{{ action('SettingsController@index') }}">
                        Home
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

                    </tr>
                    </thead>

                    <tbody>

                        <tr id="user-{{$user->id}}">
                            <td>{{ $user->id }}</td>
                            <td>{{$user->name}}</td>
                            <td>{{ $user->email }}</td>
                            <td><a href="{{ action('SettingsController@edit',$user->id) }}" class="btn btn-xs btn-secondary" data-original-title="edit">Edit</a></td>
                            <td class="text-center">
                                {!! Form::open(['method'=>'DELETE','route'=>['settings.destroy',$user->id]]) !!}
                                {!! Form::submit('Delete',array('class'=>'btn btn-xs btn-primary'))!!}

                                {!! Form::close()!!}
                            </td>

                        </tr>




                    </tbody>

                </table>


            </div> <!-- /.table-responsive -->

        </div> <!-- /.portlet-content -->



    </div> <!-- /.portlet -->

@stop