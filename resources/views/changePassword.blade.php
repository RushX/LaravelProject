@extends('layouts.app')

@section('content')

<script>
    function changepwd(){
        $.ajax({
     type: 'POST',
     url: 'change-password',
     data: {"current_password":document.getElementById('password').value,
        "_token":"{{csrf_token()}}","new_password":document.getElementById('new_password').value,"new_confirm_password":document.getElementById('new_confirm_password').value},
        success: function()
        {
            document.getElementById('status').className="text-success";
            document.getElementById('status').innerHTML='Password Has Been Changed';
            
        },
        error: function(data)
        {
            document.getElementById('status').innerHTML="";
            let allErrors = Object.values(data.responseJSON)
            let Errors =allErrors[1]
            _.each(Errors,(err)=>{
                _.each(err,(er)=>{
                    document.getElementById('status').className="text-danger";
                    document.getElementById('status').innerHTML+=er+"<br>";
                })
            }) 
        }
 });



        
         }
        </script>
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">
            
            <div class="card">

                <div class="card-header">Laravel - Change Password </div>

   

                <div class="card-body">

                    <form action="javascript:void(0)">

                        @csrf 

   

                         @foreach ($errors->all() as $error)

                            <p class="text-danger">{{ $error }}</p>

                         @endforeach 

  

                        <div class="form-group row">
                            <span id="status">
                            </span>


                            <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>

  

                            <div class="col-md-6">

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="current_password" autocomplete="current-password">

                            </div>
                            @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

  

                        <div class="form-group row">

                            <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>

  

                            <div class="col-md-6">

                                <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">

                            </div>

                        </div>

  

                        <div class="form-group row">

                            <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>

    

                            <div class="col-md-6">

                                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">

                            </div>

                        </div>

   

                        <div class="form-group row mb-0">

                            <div class="col-md-8 offset-md-4">

                                <button type="submit" onclick="changepwd()" class="btn btn-primary">

                                    Update Password

                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection