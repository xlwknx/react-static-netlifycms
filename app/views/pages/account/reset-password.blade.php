@section('title')
    Virgil | Reset Password
@show

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
            <div class="form-default">           
                <h2>Reset Password</h2>
                @include('partial.success')
                @include('partial.error')
                @if(!Session::has('message'))
                    <form action="/account/password/reset" method="post">
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
                                    <a href="/account/signin" class="btn btn-default">Sign In</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-footer">
                           <p>I'm not a registered user <a class="text-center" href="/account/signup">Sign up for free</a></p>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@stop