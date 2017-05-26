<?php get_header() ?>

<div class="intro">
    <div class="wrapper">
        <div class="introContentBlock">
            <div class="introMsg">
                <?php dynamic_sidebar('features-intro-msg'); ?>
            </div>
            <ul class="introFeatures">
                <?php dynamic_sidebar('features-intro-feature'); ?>
            </ul>
        </div>
    </div>
</div>
<div class="cryptogram">
    <div class="wrapper">
        <div class="cryptogramContentBlock">
            <div class="cryptogramMsg">
                <?php dynamic_sidebar('features-cryptogram-msg'); ?>
            </div>
            <div class="comparisonBlock cryptogramList">
                <?php dynamic_sidebar('features-cryptogram-list'); ?>
            </div>
        </div>
    </div>
</div>

<div class="components">
    <div class="wrapper">
        <div class="componentsContentBlock">
            <div class="componentsOverview">
                <div class="componentsMsg">
                    <h2 class="componentsMsg-headline">Add Security everywhere you want just In Minutes using Virgil
                        tools</h2>
                </div>
                <ul class="componentList">
                    <li class="componentItem">
                        <div class="componentItem-image">
                            <img src="/wp-content/themes/virgilsecurity/assets/features-components-serviceIcon.png" alt="">
                        </div>
                        <div class="componentItem-info">
                            <h3 class="componentItem-headline">Virgil Keys Service</h3>
                            <p class="componentItem-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, seddo
                                eiusmod tempor incididunt ut labore et dolore magna utenim ad minim veniam</p>
                        </div>
                    </li>
                    <li class="componentItem">
                        <div class="componentItem-image">
                            <img src="/wp-content/themes/virgilsecurity/assets/features-components-apiIcon.png" alt="">
                        </div>
                        <div class="componentItem-info">
                            <h3 class="componentItem-headline">Virgil Keys API</h3>
                            <p class="componentItem-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, seddo
                                eiusmod tempor incididunt ut labore et dolore magna utenim ad minim veniam</p>
                        </div>
                    </li>
                    <li class="componentItem">
                        <div class="componentItem-image">
                            <img src="/wp-content/themes/virgilsecurity/assets/features-components-libraryIcon.png" alt="">
                        </div>
                        <div class="componentItem-info">
                            <h3 class="componentItem-headline">Virgil Crypto Libary</h3>
                            <p class="componentItem-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, seddo
                                eiusmod tempor incididunt ut labore et dolore magna utenim ad minim veniam</p>
                        </div>
                    </li>
                </ul>
                <div class="componentLinks">
                    <a href="" class="button-raisedWhiteBorder-static">
                        <i class="icon icon-book-white"></i>
                        <span>Documentation</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="languages">
    <div class="wrapper">
        <div class="languagesContentBlock">
            <img src="/wp-content/themes/virgilsecurity/assets/features-languages.png" alt="" class="languages-image">
        </div>
    </div>
</div>
<div class="faq">
    <div class="wrapper">
        <div class="faqContentBlock">
            <h2 class="faq-caption">FAQ</h2>
            <ul class="faqList">
                <li class="faqItem">
                    <div class="faqItem-count">01</div>
                    <div class="faqItem-text">
                        <p>Virgil consists of an open-source encryption library, which implements
                            Cryptographic Message Syntax (CMS) and Elliptic Curve Integrated Encryption Scheme
                            (ECIES) (including RSA schema), a Key Management API, and a cloud-based Key
                            Management Service (Virgil Keys). The Virgil Keys Service consists of a public key
                            service and a private key escrow service..</p>
                        <p>See our Technical Specifications for the up-to-date list of programming languages and
                            platforms supported by our library. Generally all modern platforms and programming
                            languages are supported.</p>
                    </div>
                </li>
                <li class="faqItem">
                    <div class="faqItem-count">02</div>
                    <div class="faqItem-text">
                        <p>No. Only the AES encryption key used to secure the payload (default AES-256) will
                            be re-encrypted for each individual recipient. The payload itself will not be
                            re-encrypted.</p>
                    </div>
                </li>
            </ul>
            <div class="faqContents">
                <ul class="faqContentList">
                    <li class="faqContentItem active">
                        <a href="" class="faqContentItem-link">
                            <span class="faqContentItem-linkCount">01</span>
                            <span class="faqContentItem-linkText">If I send a message to a channel that contains many recipients does it mean that the message will be encrypted as many times as there are recipients in the channel?</span>
                        </a>
                    </li>
                    <li class="faqContentItem">
                        <a href="" class="faqContentItem-link">
                            <span class="faqContentItem-linkCount">02</span>
                            <span class="faqContentItem-linkText">If I send a message to a channel that contains many recipients does it mean that the message will be encrypted as many times as there are recipients in the channel?</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php get_footer() ?>
