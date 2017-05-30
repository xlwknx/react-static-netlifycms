<? get_header(); ?>

<div class="intro">
    <div class="wrapper">
        <div class="introContentBlock">
            <?php dynamic_sidebar('pricing-intro-block'); ?>
        </div>
    </div>
</div>
<div class="pricingPlans">
    <div class="wrapper">
        <div class="pricingPlansContentBlock">
            <div class="pricingPlansMsg">
                <?php dynamic_sidebar('pricing-plans-msg'); ?>
            </div>
            <div class="comparisonBlock pricingPlanList">
                <?php dynamic_sidebar('pricing-plans-list'); ?>
            </div>
            <div class="pricingPlansEnterprise"></div>
        </div>
    </div>
</div>
<div class="enterprise">
    <div class="wrapper">
        <div class="enterpriseContentBlock">
            <div class="enterpriseOffer">
                <div class="enterpriseOffer-image"><img
                            src="/wp-content/themes/virgilsecurity/assets/pricing-caseIcon.png" alt=""></div>
                <div class="enterpriseOffer-msg">
                    <?php dynamic_sidebar('pricing-enterprise-offer-msg'); ?>
                </div>
                <ul class="enterpriseOffer-list">
                    <?php dynamic_sidebar('pricing-enterprise-offer-list'); ?>
                </ul>
            </div>
            <div class="enterprise-links">
                <?php dynamic_sidebar('pricing-enterprise-offer-links'); ?>
            </div>
        </div>
    </div>
</div>
<div class="includes">
    <div class="wrapper">
        <div class="includesContentBlock">
            <div class="blockMsg">
                <?php dynamic_sidebar('pricing-includes-msg'); ?>
            </div>
            <ul class="includesList">
                <?php dynamic_sidebar('pricing-includes-list'); ?>
            </ul>
        </div>
    </div>
</div>
<div class="conclusion">
    <div class="wrapper">
        <div class="conclusionContentBlock">
            <div class="blockMsg">
                <?php dynamic_sidebar('pricing-conclusion-msg'); ?>
            </div>
        </div>
    </div>
</div>

<? get_footer(); ?>
