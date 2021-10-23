$(document).ready(function() {
    (function () {

        var sortForm = $('#products-sort'),
            sort = $('#products-sort input[name="SORT"]'),
            order = $('#products-sort input[name="ORDER"]');


        $('.select__link').on('click', function () {
            var resultSort = $(this).attr('data-sort'),
                resultOrder = $(this).attr('data-order');

            sort.val(resultSort);
            order.val(resultOrder);
            sortForm.submit();
            return false;
        });

    })();
});