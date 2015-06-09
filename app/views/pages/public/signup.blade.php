@section('title')
    Virgil | Sign Up
@show

@section('content')
    <div class="page signup">
        <section class="page-heading container">
            <h2>Sign Up</h2>
        </section>

        <form class="container" action="/session/signup" method="post">
            <div class="row">
                <div class="col-xs-44 col-xs-offset-2 col-sm-24 col-sm-offset-12">
                    <div class="row">
                        @if(Session::has('error'))
                            <div class="alert alert-danger">
                                <h4>{{Session::get('error')}}</h4>
                            </div>
                        @endif
                        <div class="col-xs-48 form-item">
                            <input class="form-input expand" type="text" name="email" placeholder="Your Email Address" value="{{Input::old('email')}}"/>
                        </div>
                        <div class="col-xs-48 form-item">
                            <input class="form-input expand" type="password" name="password" placeholder="Your Password"/>
                        </div>
                        <div class="col-xs-48 form-item">
                            <input class="form-input expand" type="text" name="company_name" placeholder="Company Name (optional)" value="{{Input::old('company_name')}}"/>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-48 form-footer text-center">
                        <button class="btn-virgil btn-transparent form-submit">CREATE ACCOUNT</button>
                    </div>
                </div>
            </div>
        </form>

        <section class="container text-center">
            By creating an account you agree to the Virgil Security<br/>
            <a href="/terms-of-service">Terms of Service</a> and <a href="/privacy-policy">Privacy Policy</a>
        </section>

        <section class="container text-center">
            <p>Already have an account? <a href="/signin">Sign in</a></p>
        </section>
    </div>
@stop