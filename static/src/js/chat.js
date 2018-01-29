function initTabs() {

    var interval1, interval2, interval3;

    function startScene1() {
        endScene2();
        endScene3();

        var el = $('.step1-loading').removeClass('hidden');

        function loading() {
            var text = $('.step1-loading').text();
            text = text.replace(/\.+/, function(match) {
                return match.length < 3 ? match + '.' : '.';
            });
            $('.step1-loading').text(text);
        }
        
        interval1 = setInterval(loading, 500);
    }

    function startScene2() {
        endScene1();
        endScene3();

        $('.step2-scene').removeClass('hidden');
        var message = 'Hey Bob, are you crazy?';
        var currentMessage = '';
        
        interval2 = setInterval(startTyping, 100);

        function startTyping() {
            var currentChar = currentMessage.length;
            if (currentChar >= message.length - 1) {
                clearInterval(interval2);
                $('#step2-message').removeClass('hidden');
                $('.step2-sending-message').addClass('hidden');
            }
            currentMessage = currentMessage + message[currentChar];
            $('.step2-sending-message').text(currentMessage);
        }
    }

    function startScene3() {
        endScene1();
        endScene2();
        interval3 = setInterval(function() {
            $('#step3-message').removeClass('hidden')
        }, 2000);
    }

    function endScene1() {
        $('.step1-loading').addClass('hidden');
        clearInterval(interval1);
    }

    function endScene2() {
        $('.step2-scene').addClass('hidden');
        $('#step2-message').addClass('hidden');
        $('.step2-sending-message').removeClass('hidden');
        $('.step2-sending-message').text('');
        clearInterval(interval2);
    }

    function endScene3() {
        clearInterval(interval3);
        $('#step3-message').addClass('hidden');
    }

    $(document).ready(function(){
        startScene1();
        
        $('#step-tabs .stepControl').click(function(){
            var tab_id = $(this).attr('data-tab');

            $('.stepContent').removeClass('current');
            $('.stepControl').removeClass('current');

            switch (tab_id) {
                case 'step1':
                    startScene1();
                    break;
                case 'step2':
                    startScene2();
                    break;
                case 'step3':
                    startScene3();
                    break;
            }

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
    initTabs();
    initSwapPrices();
}

export default {
    init: init
}

