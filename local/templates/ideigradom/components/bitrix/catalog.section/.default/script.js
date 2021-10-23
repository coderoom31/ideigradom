$(document).ready(function() {
    (function () {
        $('.main').on('click', '.pag__btn-more', function () {
            $.ajax(
                {
                    'type': 'post',
                    'url': $(this).attr('data-url'),
                    data: {
                        action: 'showMore'
                    }
                }
            )
                .done(function (response) {
                    var result = JSON.parse(response);
                    $('.cat__grid').append(result.items);
                    $('.pag').html(result.pagination);

                    window.ideigradom.favorite.reInit();
                    window.ideigradom.cart.reInit();
                });
        });
    })();
});