<? get_header('dark'); ?>

<div class="contactUs">
    <div class="wrapper">
        <div class="contactUsContentBlock">
            <div class="contactUsMsg">
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
            <div class="partnershipMsg">
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

<? get_footer(); ?>
