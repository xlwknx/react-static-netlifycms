@section('title')
Virgil | Reset Password
@show

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
            <div class="form-default">
                <h2>Update Password</h2>
                @if($updateResult)
                <div class="alert alert-success">
                    <h4>
                        {{$updateMessage}}
                    </h4>
                </div>
                @endif

                @if(Session::has('error') || $errors)
                <div class="alert alert-danger">
                    <h4>
                        {{Lang::get(Session::get('error'))}}
                    </h4>
                </div>
                @endif

                @if(!$updateResult)
                <form action="/reset-password" method="post">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">Your Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <input type="text" name="email" value="<?=Input::old('email')?>" class="form-control" placeholder="email@example.com" aria-describedby="basic-addon1">
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <a href="/signin" class="btn btn-default">Sign In</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <p>I'm not a registered user <a class="text-center" href="/signup">Sign up for free</a></p>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@stop