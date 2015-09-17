@section('title')
    Virgil | Sign In
@show

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
            <div class="form-default">           
                <h2>Sign In</h2>
                @include('partial.error')
                <form action="/signin" method="post">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Your Email:</span>
                      <input type="text" name="email" class="form-control" placeholder="email@example.com" aria-describedby="basic-addon1" value="<?=Input::old('email')?>">
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Your Password:</span>
                      <input type="password" name="password" class="form-control" placeholder="" aria-describedby="basic-addon1">
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <button type="submit" class="btn btn-primary">Sign In</button>      
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <a href="/signup" class="btn btn-default">Create free Account</a>
                            </div>
                        </div>
                    </div>       
                    <div class="form-footer">
                        <a class="text-center" href="/reset-password">Can't access your account?</a>  
                    </div>                         
                </form>
            </div>
        </div>
    </div>
</div>
@stop