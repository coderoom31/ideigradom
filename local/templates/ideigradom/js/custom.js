$(document).ready(function() {
    (function () {
        $(document).on("mouseup", ".prod-detail__btn-cart", function() {
            var productId = $(this).attr("data-id");
            var quantity = 1;

            var request = BX.ajax.runComponentAction(
                'ig:basket',
                'add',
                {
                    mode: 'ajax',
                    data: {
                        productId: productId,
                        quantity: quantity
                    }
                }
            );

            request.then(function (response) {
                if (response.status === 'success') {
                    console.log("Все окей");
                } else {
                    console.log("Все не окей")
                    console.log(response)
                }
            });
        });

        $(document).on("click", ".cart-item__btn-delete", function() {
            var basketItemId = $(this).attr("data-basket-id");

            var request = BX.ajax.runComponentAction(
                'ig:basket',
                'remove',
                {
                    mode: 'ajax',
                    data: {
                        basketItemId: basketItemId,
                    }
                }
            );

            request.then(function (response) {
                if (response.status === 'success') {
                    console.log("Все окей");
                } else {
                    console.log("Все не окей")
                    console.log(response)
                }
            });
        });

        $(document).on("click", ".cart-action-minus", function() {
            var basketItemId = $(this).attr("data-basket-id");

            var request = BX.ajax.runComponentAction(
                'ig:basket',
                'changeQuantity',
                {
                    mode: 'ajax',
                    data: {
                        basketItemId: basketItemId,
                        quantity: quantity
                    }
                }
            );

            request.then(function (response) {
                if (response.status === 'success') {
                    console.log("Все окей");
                } else {
                    console.log("Все не окей")
                    console.log(response)
                }
            });
        });

        $(document).on("click", ".cart-action-plus", function() {
            var basketItemId = $(this).attr("data-basket-id");

            var request = BX.ajax.runComponentAction(
                'ig:basket',
                'changeQuantity',
                {
                    mode: 'ajax',
                    data: {
                        basketItemId: basketItemId,
                        quantity: quantity
                    }
                }
            );

            request.then(function (response) {
                if (response.status === 'success') {
                    console.log("Все окей");
                } else {
                    console.log("Все не окей")
                    console.log(response)
                }
            });
        });

        // ###### Промокод

        $(document).on("click", ".cart__promo-btn--submit", function(e) {
            e.preventDefault();
            var couponCode = $('#promo-text').val();

            var request = BX.ajax.runComponentAction(
                'ig:order',
                'checkCoupon',
                {
                    mode: 'ajax',
                    data: {
                        couponCode: couponCode,
                    }
                }
            );

            request.then(function (response) {
                if (response.status === 'success') {
                    window.location.reload();
                } else {

                }
            });
        });


        $(document).on("click", ".cart__promo-btn--delete", function(e) {
            e.preventDefault();

            var request = BX.ajax.runComponentAction(
                'ig:order',
                'deleteCoupon',
                {
                    mode: 'ajax',
                }
            );

            request.then(function (response) {
                if (response.status === 'success') {
                    window.location.reload();
                } else {

                }
            });
        });

        /**
         *
         * Избранное JS
         */

        var Favorite = function () {
            $('.prod-card__fav').on('mouseup', this.buttonHandler.bind(this));
            $('.prod-detail__btn-fav').on('mouseup', this.buttonHandler.bind(this));
        };

        Favorite.prototype.reInit = function () {
            $('.prod-card__fav').off();
            $('.prod-card__fav').on('mouseup', this.buttonHandler.bind(this));
            this.showAddedElement();
        };

        Favorite.prototype.buttonHandler = function (event) {
            event.preventDefault();
            event.stopPropagation();
            var button = $(event.currentTarget);

            var productId = button.attr('data-product-id');

            if (button.hasClass('active')) {
                this.remove(productId);
            }
            else {
                this.add(productId);
            }
        };

        Favorite.prototype.add = function (productId) {
            BX.ajax.runComponentAction(
                'ig:favorites',
                'add',
                {
                    mode: 'ajax',
                    data: {productId: productId}
                }
            );

            var count = +$('.header__amount-favorites').text() + 1;
            this.setCount(count);
        };

        Favorite.prototype.remove = function (productId) {
            BX.ajax.runComponentAction(
                'ig:favorites',
                'remove',
                {
                    mode: 'ajax',
                    data: {productId: productId}
                }
            );

            var count = +$('.header__amount-favorites').text() - 1;
            this.setCount(count);
        };

        Favorite.prototype.setCount = function (count) {
            $('.header__amount-favorites').text(count);
            $('.favorite-count').text(count);
        };

        Favorite.prototype.showAddedElement = function () {
            $('.prod-card__fav').each(function (index) {
                var productId = $(this).attr('data-product-id');

                if (window.favoriteList.indexOf(productId) !== -1) {
                    $(this).addClass('active');
                }
            });

            $('.prod-detail__btn-fav').each(function (index) {
                var productId = $(this).attr('data-product-id');

                if (window.favoriteList.indexOf(productId) !== -1) {
                    $(this).addClass('active');
                }
            });
        };

        window.ideigradom.favorite = new Favorite();

    })();
});