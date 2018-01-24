function initTabs() {
    $(document).ready(function(){
        $('#step-tabs .stepControl').click(function(){
            let tab_id = $(this).attr('data-tab');

            $('.stepContent').removeClass('current');
            $('.stepControl').removeClass('current');
    
            $(this).addClass('current');
            $("#"+tab_id).addClass('current');
        })
    })
}
  
function init() {
    initTabs();
}

export default {
    init: init
}

