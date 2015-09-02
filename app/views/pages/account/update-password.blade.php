@section('title')
Virgil | Reset Password
@show

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
            <div class="form-default">
                <h2>Update Password</h2>
                @if(!empty($updateMessage))
                <div class="alert alert-success">
                    {{$updateMessage}}
                </div>
                @endif

                @if(Session::has('error') || $errors->any())
                <div class="alert alert-danger">
                    {{Lang::get(Session::get('error'))}}
                </div>
                @endif

                @if(empty($updateMessage))
                <form action="/update-password/{{$resetToken}}" method="post">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">Your Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <input type="password" name="password" class="form-control" placeholder="" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">Confirm Password:</span>
                        <input type="password" name="confirm_password" class="form-control" placeholder="" aria-describedby="basic-addon1">
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <button type="submit" class="btn btn-primary">Update Password</button>
                            </div>
                        </div>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@stop