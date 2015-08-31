@section('title')
    Virgil | Sign In
@show

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
            <div class="form-default">           
                <h2>Sign In</h2>
                <form action="/session/signin" method="post">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Your Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="text" name="email" class="form-control" placeholder="email@example.com" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Your Password:</span>
                      <input type="password" name="password" class="form-control" placeholder="" aria-describedby="basic-addon1">
                    </div>
                    <button type="submit" class="btn-virgil btn-transparent form-submit">Login</button>
                </form>
                <!--<div class="form-page">
                    <div class="page signin">
                        <section class="page-heading container">
                            <h2>Sign In</h2>
                        </section>

                        
                            <div class="row">
                                <div class="col-xs-44 col-xs-offset-2 col-sm-24 col-sm-offset-12">
                                    <div class="row">

                                        <div class="col-xs-48 form-item">
                                            <input class="form-input expand" type="text" name="email" placeholder="Your Email Address" value="{{Input::old('email')}}"/>
                                        </div>
                                        <div class="col-xs-48 form-item">
                                            <input class="form-input expand" type="password" name="password" placeholder="Your Password"/>
                                        </div>
                                        <div class="col-xs-48 form-item text-center">
                                            <a href="/reset">Forgot Password</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-48 form-footer text-center">
                                        <button type="submit" class="btn-virgil btn-transparent form-submit">SIGN IN</button>
                                    </div>
                                </div>
                            </div>

                        <section class="container text-center">
                            <p>I'm not a registered user. <a href="/signup">Sign up for free</a></p>
                        </section>
                    </div> 
                </div>-->

            </div>
        </div>
    </div>
</div>



@stop