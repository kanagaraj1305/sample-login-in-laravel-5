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
                <h1>Example</h1>
                <a href="user/create">Add New User</a>
                <table border="1">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Edit</td>
                        <td>Delete</td>
                        <td>View</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $key=>$value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td><a href="user/{{$value->id}}/edit" >Edit</a> </td>
                        <td>
                            {!! Form::open(['method'=>'DELETE','route'=>['user.destroy',$value->id]])!!}
                                {!! Form::submit('Delete',['class'=>'btn btn-danger'])!!}
                            {!! Form::close()!!}
                        </td>
                        <td><a href="user/show/{{$value->id}}">View</a> </td>
                    </tr>
                        @endforeach
                    </tbody>
                    </table>

            </div>
        </div>
    </body>
</html>
