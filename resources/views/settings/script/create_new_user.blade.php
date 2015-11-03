@section('script')
    <script type="text/javascript">
        $('#create_new').click(function(sdf){
           // alert('hi');
            $('#create_new_content').lightbox_me({
                centered:true,
                onLoad:function(){
                   $('#create_new_content').find('input:first').focus()
                    $('#register_new').click(function(ged){
                       var name=$('#name').val();
                       var email=$('#email').val();
                       var password=$('#password').val();
                        var token=$('#token').val();
                       var confirm_password=$('#password_confirmation').val();
                        $.ajax({
                                type:"post",
                                url:'ajax/newuser',
                                //{!! URL::to('settings') !!},
                                data:{
                                    _token:token,
                                    name:name,
                                    email:email,
                                    password:password
                                },
                            success:function(data){
                               // alert(data);
                                console.log(data);
                                var appendhtml='<tr id="user-'+data.id+'"> <td>'+data.id+'</td><td>'+data.name+'</td><td>'+data.email+'</td><td><a href="settings/'+data.id+'/edit" class="btn btn-xs btn-secondary" data-original-title="edit">Edit</a></td><td class="text-center">Delete</td><td><a href="settings/show/'+data.id+'" class="btn btn-xs btn-secondary" data-original-title="view"><i class="fa fa-check"></i></a></td><td><a href="javascript:void(0)" id="delete_'+data.id+'" class="btn btn-danger btn-sm" onclick="delete_user('+data.id+')">Delete</a> </td></tr>';
                                $('#userlisttable').append(appendhtml);
                                $('#create_new_content').trigger('close');
                            }
                        });
                    });
                }
            });
        });


        function delete_user(id){
            var token=$('meta[name="csrf_token"]').attr('content');
            $.ajax({
                type:'DELETE',
                url:'ajax/deleteuser',
                data:{
                    id:id,
                    _token:token
                },
                success:function(data){
                    $('#user-'+data.id).remove();
                    console.log(data);
                }
            });
        }
        /*View User*/
        function view_user(id){
            var token=$('meta[name="csrf_token"]').attr('content');
            $('#viewuserd').lightbox_me({
                centered:true,
                onLoad:function(){
                    $('#viewuserd').find('input:first').focus()
                    $.ajax({
                        type:'GET',
                        url:'ajax/showuser',
                        data:{
                            id:id,
                            _token:token
                        },
                        success:function(data){
                            console.log(data);
                         var appe='<tr id="user-'+data.id+'"><td>'+data.id+'</td><td>'+data.name+'</td><td>'+data.email+'</td></tr>';
                            $('#viewappenduser').html(appe);

                        }
                    });
                }
            });
        }
        /* Close View user light box */
        $('#closeviewuser').click(function(asd){
            $('#viewuserd').trigger('close');
        });
    /* Edit User */

        function edit_user(id){
            var token=$('meta[name="csrf_token"]').attr('content');
            $('#edituserd').lightbox_me({
                centered:true,
                onLoad:function(){
                    $('#viewuserd').find('input:first').focus()
                    $.ajax({
                        type:'GET',
                        url:'ajax/edituser',
                        data:{
                            id:id,
                            _token:token
                        },
                        success:function(data){
                            console.log(data);
                            var form='<div class="form-group"><label class="col-md-4 control-label">Name</label><div class="col-md-6">';
                            form+='<input type="text" class="form-control" name="name" id="name1" value="'+data.name+'"></div></div>';
                            form+='<div class="form-group"><label class="col-md-4 control-label">Email</label><div class="col-md-6">';
                            form+='<input type="text" class="form-control" name="email" id="email1" value="'+data.email+'"></div></div>';
                            form+='<div class="form-group"><div class="col-md-6 col-md-offset-4">';
                            form+='<a href="javascript:void(0)" class="btn btn-secondary btn-sm" id="update_'+data.id+'" onclick="update_user('+data.id+')">Update</a>';
                            form+='</div></div>';
                            $('#edituserp').html(form);

                        }
                    });
                }
            });
        }
        /* Update user */
        function update_user(id){
            var token=$('meta[name="csrf_token"]').attr('content');
            var name=$('#name1').val();
            var email=$('#email1').val();
            $.ajax({
                type:"PUT",
                url:"ajax/updateuser",
                data:{
                    _token:token,
                    id:id,
                    name:name,
                    email:email
                },
                success:function(data){
                    console.log(data);
                    $('#edituserd').trigger('close');
                    var rephtm='<table class="table table-striped table-bordered table-checkable"><tr id="user-'+data.id+'"><td>'+data.id+'</td><td>'+data.name+'</td><td>'+data.email+'</td><td><a href="settings/'+data.id+'/edit" class="btn btn-xs btn-secondary" data-original-title="edit">Edit</a></td><td class="text-center">{!! Form::open(["method"=>"DELETE","route"=>["settings.destroy",'+data.id+'],"id"=>"deletedata"]) !!}{!! Form::submit("Delete",array("class"=>"btn btn-xs btn-primary"))!!}{!! Form::close()!!}</td><td><a href="settings/show/'+data.id+'" class="btn btn-xs btn-secondary" data-original-title="view"> <i class="fa fa-check"></i></a></td><td><a href="javascript:void(0)" id="delete_'+data.id+'" class="btn btn-danger btn-sm" onclick="delete_user('+data.id+')">Delete</a> </td><td><a href="javascript:void(0)" class="btn btn-secondary btn-sm" id="view_'+data.id+'" onclick="view_user('+data.id+')">View</a> </td><td><a href="javascript:void(0)" class="btn btn-secondary btn-sm" id="edit_'+data.id+'" onclick="edit_user('+data.id+')">Edit</a> </td></tr></table>';
                    $('#user-'+data.id).html(rephtm);
                }
            });
        }
       /* Close Edit user light box */
        $('#closeedituser').click(function(asd){
            $('#edituserd').trigger('close');
        });
    </script>
@stop