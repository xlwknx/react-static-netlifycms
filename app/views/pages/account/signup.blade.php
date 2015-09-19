@section('title')
    Virgil | Sign Up
@show

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
            <div class="form-default">           
                <h2>Sign Up</h2>
                @include('partial.error')
                <form action="/account/signup" method="post">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Your Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="text" name="email" class="form-control" placeholder="email@example.com" aria-describedby="basic-addon1" value="<?=Input::old('email')?>">
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Your Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="password" name="password" class="form-control" placeholder="" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Confirm Password:</span>
                      <input type="password" name="confirm" class="form-control" placeholder="" aria-describedby="basic-addon1">
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <button type="submit" class="btn btn-primary">Sign Up</button>      
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <a href="/account/signin" class="btn btn-default">Have an Account?</a>
                            </div>
                        </div>
                    </div>       
                    <div class="form-footer">
                        <p>By creating an account you agree to the Virgil Security
                        <a href="/terms-of-service">Terms of Service</a> and <a href="/privacy-policy">Privacy Policy</a></p>
                    </div>                         
                </form>
            </div>
        </div>
    </div>
</div>
@stop