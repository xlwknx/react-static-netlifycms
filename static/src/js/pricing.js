function initSwapPrices() {
    var enabled = false;
    function swipePrices(e) {
        enabled = !enabled;
        var status = enabled ? 'on' : 'off';
        var oldStaus = !enabled ? 'on' : 'off';

        $("div[data-switch-control]").each(function(i, el) {
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

    $("div[data-switch]").each(function(i, el) {
        $(el).click(swipePrices);
    });
}

function init() {
    initSwapPrices();
}

export default {
    init: init
}

