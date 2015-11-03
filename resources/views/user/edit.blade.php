<html>
<head>
    <title>Laravel</title>

    <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

    <style>
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
            margin-bottom: 40px;
        }

        .quote {
            font-size: 24px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        {!! HTML::ul($errors->all()) !!}
        {!!Form::model($user,array('route'=>array('user.update',$user->id),'method'=>'PUT'))!!}
        <div class="form-group">
           {!!Form::label('name','Name')!!}
           {!!Form::text('name',null,array('class'=>'form-control'))!!}
        </div>
        <div class="form-group">
            {!!Form::label('email','Email')!!}
            {!!Form::text('email',null,array('class'=>'form-control'))!!}
        </div>
        {!!Form::submit('Edit User',array('class'=>'btn btn-primary'))!!}
        {!!Form::close()!!}
       <!--
        <form class="form-horizontal" role="form" method="POST" action="{{ action('UsersController@store') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label class="col-md-4 control-label">Name</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">E-Mail Address</label>
                <div class="col-md-6">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Register
                    </button>
                </div>
            </div>
        </form>--!>
        @if($errors->any())
            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach

        @endif

    </div>
</div>
</body>
</html>
