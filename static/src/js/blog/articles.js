'use strict';

function initLoadMore() {
    const $articleList        = $('[data-article-list]');
    const $loadMoreElement    = $('[data-load-more]');
    const loadMoreUrlPattern  = $loadMoreElement.data('load-more-url');
    const loadMoreCurrentPage = $loadMoreElement.data('load-more-current-page');
    const loadMorePagesCount  = $loadMoreElement.data('load-more-pages-count');

    if (loadMoreCurrentPage >= loadMorePagesCount) {
        $loadMoreElement.hide();

        return;
    }

    var loadMoreNextPage = loadMoreCurrentPage + 1;

    $loadMoreElement
        .on('click.load-more', function (e) {
            $loadMoreElement.prop('disabled', true);
            $loadMoreElement.addClass('button-disabled');

            var loadMoreUrl = loadMoreUrlPattern.replace('%page%', loadMoreNextPage);

            $.get(loadMoreUrl, function (data) {
                const $data = $(data);

                $articleList.append($data.find('[data-article-list]').html());

                loadMoreNextPage++;

                if (loadMoreNextPage > loadMorePagesCount) {
                    $loadMoreElement.off('click.load-more');
                } else {
                    $loadMoreElement.prop('disabled', false);
                    $loadMoreElement.removeClass('button-disabled');
                }
            });

        })
}

function init() {
    initLoadMore();
}

export default {
    init: init
}
