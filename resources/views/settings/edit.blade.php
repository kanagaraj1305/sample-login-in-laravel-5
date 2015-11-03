@extends('master.header')
@include('master.navbar')
@include('master.mainbar')
@section('content')
    <div class="portlet portlet-table">

        <div class="portlet-header">

            <h3>
                <i class="fa fa-group"></i>
                Edit Signups
            </h3>

        </div> <!-- /.portlet-header -->

        <div class="portlet-content">
            {!!Form::model($user,array('route'=>array('settings.update',$user->id),'method'=>'PUT'))!!}
            <div class="form-group">
                {!! Form::label('name','Name',array('class'=>'col-md-4 control-label'))!!}
                <div class="col-md-6">
                    {!! Form::text('name',null,array('class'=>'form-control'))!!}
                </div>
            </div>

                <div class="form-group">
                    {!! Form::label('email','Email Address',array('class'=>'col-md-4 control-label'))!!}
                    <div class="col-md-6">
                        {!! Form::text('email',null,array('class'=>'form-control'))!!}
                    </div>

                </div>



                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        {!!Form::submit('Update User',array('class'=>'btn btn-primary'))!!}

                    </div>
                </div>
           {!! Form::close()!!}
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

@stop