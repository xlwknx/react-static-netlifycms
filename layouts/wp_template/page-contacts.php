<? get_template_part('header/contacts') ?>

<div class="container">

    <div class="contactUs">
        <div class="wrapper">
            <div class="contactUsContentBlock">
                <div class="blockMsg">
                    <?php dynamic_sidebar('contact-us-msg'); ?>
                </div>
                <div class="contactUsBlock">
                    <?php dynamic_sidebar('contact-us-block'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="partnership">
        <div class="wrapper">
            <div class="partnershipContentBlock">
                <div class="blockMsg">
                    <?php dynamic_sidebar('contact-partnership-msg'); ?>
                </div>
                <div class="partnershipContacts">
                    <?php dynamic_sidebar('contact-partnership-contacts'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="map">
        <div class="wrapper">
            <div class="mapContentBlock">
                <div class="map-address">
                    <?php dynamic_sidebar('contact-map-address'); ?>
                </div>
            </div>
        </div>
    </div>

</div>

<? get_footer(); ?>
