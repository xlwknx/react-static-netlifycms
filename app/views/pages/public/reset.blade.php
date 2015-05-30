@section('title')
    Virgil | Reset Password
@show

@section('content')
    <div class="page reset">
        <section class="page-heading container">
            <h2>Reset Password</h2>

            <h4>We'll send you and e-mail with instructions to reset your password.</h4>
        </section>

        <form class="container">
            <div class="row">
                <div class="col-xs-44 col-xs-offset-2 col-sm-24 col-sm-offset-12">
                    <div class="row">
                        <div class="col-xs-48 form-item">
                            <input class="form-input expand" type="text" name="email" placeholder="Your Email Address"/>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-48 form-footer text-center">
                        <button type="submit" class="btn-virgil btn-transparent form-submit">RESET PASSWORD</button>
                    </div>
                </div>
            </div>
        </form>

        <section class="container check-email hide">
            Please check your inbox.
        </section>

        <section class="container text-center">
            <p>I'm not a registered user. <a href="/signup">Sign up for free</a></p>
        </section>
    </div>
@stop