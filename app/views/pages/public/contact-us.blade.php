@section('title')
    Virgil | Contact Us
@show

@section('content')
    <div class="page contact">
        <section class="contact-heading page-heading container">
            <h2>Contact Us</h2>

            <p>Looking for help or have a comment?</p>
        </section>

        <section class="container contact-contacts">
            <div class="row">
                <div class="col-sm-16 col-xs-24 contact-contacts-item">
                    <img src="/img/contacts/contact-phone.png"/>

                    <p>+1-571-348-4601</p>
                </div>
                <div class="col-sm-16 col-xs-24 contact-contacts-item">
                    <a href="mailto:support@virgilsecurity.com">
                        <img src="/img/contacts/contact-print.png"/>
                    </a>

                    <p><a href="mailto:support@virgilsecurity.com">support@virgilsecurity.com</a></p>
                </div>
                <div class="col-sm-16 hidden-xs contact-contacts-item social">
                    <img src="/img/contacts/contact-social.png"/>

                    <p>
                        <a class="twitter" href="https://twitter.com/VirgilSecurity" target="_blank">
                            <img src="/img/social-twitter.png" alt="twitter"/>
                        </a>
                        <a class="facebook" href="https://www.facebook.com/VirgilSec" target="_blank">
                            <img src="/img/social-facebook.png" alt="facebook"/>
                        </a>
                    </p>
                </div>
            </div>
        </section>

        <form class="container contact-form">
            <div class="row">
                <div class="col-xs-44 col-xs-offset-2 col-sm-21 form-item">
                    <div class="col-xs-48 form-item">
                        <input class="form-input expand" type="text" name="name" placeholder="Your Name"/>
                    </div>
                    <div class="col-xs-48 form-item">
                        <input class="form-input expand" type="text" name="email" placeholder="Your Email"/>
                    </div>
                    <div class="col-xs-48 form-item">
                        <input class="form-input expand" type="text" name="product" placeholder="Product"/>
                    </div>
                </div>
                <div class="col-xs-44 col-xs-offset-2 col-sm-21 form-item textarea">
                    <textarea name="message" class="form-input expand" placeholder="Message"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-44 col-xs-offset-2 contact-form-footer">
                    <a href="mailto:support@virgilsecurity.com" class="btn-virgil btn-transparent contact-form-submit">SEND</a>
                </div>
            </div>
        </form>
    </div>
@stop
