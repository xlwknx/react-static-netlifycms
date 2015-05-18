@section('title')
    Virgil | Contact Us
@show

@section('content')
<div class="page contact">
    <section class="contact-heading page-heading container">
        <h2>Contact Us</h2>
        <p>Looking for help or have a comment?</p>
    </section>

    <section class="contact-contacts container">
        <div class="contact-contacts-item">
            <img src="/img/contacts/contact-phone.png" />
            <p>+1 888-256-9014</p>
        </div>
        <div class="contact-contacts-item">
            <img src="/img/contacts/contact-print.png" />
            <p><a href="mailto:support@virgilsecurity.com">support@virgilsecurity.com</a></p>
        </div>
        <div class="contact-contacts-item social">
            <img src="/img/contacts/contact-social.png" />
            <p>
                <a class="twitter" href="http://twitter.com" target="_blank">
                    <img src="/img/social-twitter.png" alt="twitter" />
                </a>
                <a class="facebook" href="http://facebook.com" target="_blank">
                    <img src="/img/social-facebook.png" alt="facebook" />
                </a>
            </p>
        </div>
    </section>

    <form class="contact-form container">
        <div class="row">
            <div class="col-50">
                <div class="form-item">
                    <input class="form-input expand" type="text" name="name" placeholder="Your Name" />
                </div>
                <div class="form-item">
                    <input class="form-input expand" type="text" name="email" placeholder="Your Email" />
                </div>
                <div class="form-item">
                    <input class="form-input expand" type="text" name="product" placeholder="Product" />
                </div>
            </div>

            <div class="col-50">
                <textarea name="message" class="form-input expand" placeholder="Message"></textarea>
            </div>
        </div>
        <div class="row">
            <a href="mailto:support@virgilsecurity.com" class="btn-virgil btn-transparent contact-form-submit">SEND</a>
        </div>
    </form>
</div>
@stop
