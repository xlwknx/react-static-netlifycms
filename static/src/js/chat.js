function initTabs() {
    $(document).ready(function(){
        $('#step-tabs .stepControl').click(function(){
            var tab_id = $(this).attr('data-tab');

            $('.stepContent').removeClass('current');
            $('.stepControl').removeClass('current');

            if (tab_id === 'step3') {
                $('.iphone1').addClass('slideOut').removeClass('slideIn');
                $('.iphone2').addClass('slideIn').removeClass('slideOut');
            } else if ($('.iphone1').hasClass('slideOut')) {
                $('.iphone1').removeClass('slideOut rearIphone').addClass('slideIn frontIphone');
                $('.iphone2').removeClass('slideIn frontIphone').addClass('slideOut rearIphone');
            }
    
            $(this).addClass('current');
            $("#" + tab_id).addClass('current');
        })
    })
}

function initSwapPrices() {
    var enabled = false;
    function swipePrices(e) {
        enabled = !enabled;
        var status = enabled ? 'on' : 'off';
        var oldStaus = !enabled ? 'on' : 'off';

        $("div[data-switch-control]").each((i, el) => {
            $(el).removeClass(oldStaus).addClass(status);
        });

        $("span[data-price]").each(enabled ? increasePrice : decreasePrice);
    }

    function increasePrice(i, el) {
        var price = el.innerHTML;
        el.innerHTML = Math.round(price * 10 / 12);
    }

    function decreasePrice(i, el) {
        var price = el.innerHTML;
        el.innerHTML = Math.round(price * 12 / 10);
    }

    $("div[data-switch]").each((i, el) => $(el).click(swipePrices));
}
  
function init() {
    initTabs();
    initSwapPrices();
}

export default {
    init: init
}

