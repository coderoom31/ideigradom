$(document).ready(function () {
    (function () {
        // ###### Блок выбора города и доставки

        $('#locationSearch').on('change', function () {
            var cityCode = $(this).val();

            if (!cityCode) {
                $('#delivery').hide();
                $('#paymentWrapper').hide();

                return;
            }

            console.log("Я в функции 1");
            console.log(cityCode);

            getDelivery(cityCode);
        });

        function getDelivery(cityCode) {
            $('#delivery').show();

            console.log("Я в функции 2");

            var request = BX.ajax.runComponentAction(
                'ig:order',
                'getDelivery',
                {
                    mode: 'ajax',
                    data: {
                        cityCode: cityCode
                    }
                }
            );

            request.then(function (response) {
                var htmlDeliveryInputs = '',
                    htmlDeliveryDescription = '';

                for (var i = 0; i < response.data.length; i++) {
                    htmlDeliveryInputs += renderDelivery(response.data[i]);
                    htmlDeliveryDescription += renderAdditionalDeliveryDescription(
                        response.data[i]['additionalDescription'],
                        response.data[i]['id']
                    );
                }

                $('#delivery')
                    .html(htmlDeliveryInputs)
                    .append(htmlDeliveryDescription);

                $('input[name=DELIVERY_ID]').on('change', function () {
                    $('#paymentWrapper').show();
                    //window.loadingStart(false, document.getElementById('paymentWrapper'));
                    getPayment($(this).val());
                });
                //window.loadingEnd();
            });
        }

        function renderDelivery(delivery) {
            var html = '<div class="form__tab">';
            html += '<input type="radio" name="DELIVERY_ID" id="delivery-' + delivery.id + '" data-tab="' + delivery.id + '" value="' + delivery.id + '">';
            html += '<label for="delivery-' + delivery.id + '">';
            html += '<h3>' + delivery.name + '</h3>';
            html += delivery.text;
            html += '</label>';
            html += '</div>';

            return html;
        }

        function renderAdditionalDeliveryDescription(description, id) {
            if (description) {
                return '<div class="form__tab-block" data-tab-block="' + id + '">' + description + '</div>';
            } else {
                return '<div class="form__tab-block" data-tab-block="' + id + '"></div>';
            }
        }

        // ###### Блок выбора оплаты в зависимости от доставки

        function getPayment(deliveryId) {
            var request = BX.ajax.runComponentAction(
                'ig:order',
                'getPayment',
                {
                    mode: 'ajax',
                    data: {
                        deliveryId: deliveryId
                    }
                }
            );

            request.then(function (response) {
                var html = '';
                for (var i = 0; i < response.data.length; i++) {
                    html += renderPayment(response.data[i]);
                }
                $('#payment').html(html);

                //window.loadingEnd();
            });
        }

        function renderPayment(payment) {
            var html = '<div class="form__tab">';
            html += '<input type="radio" name="PAYMENT_ID" id="payment-' + payment.id + '" value="' + payment.id + '">';
            html += '<label for="payment-' + payment.id + '">';
            html += '<h3>' + payment.name + '</h3>';
            html += payment.text;
            html += '</label>';
            html += '</div>';

            return html;
        }

        // ###### Валидация выбраны ли доставка и оплата

        $('#submit-order-form').on('click', function (event) {
            var isCheckedDelivery =  $('input[name=DELIVERY_ID]:checked').length > 0,
                isCheckedPayment = $('input[name=PAYMENT_ID]:checked').length > 0;

            if (!isCheckedDelivery) {
                $.fancybox.open('Выберите вариант доставки');
                $('html, body').scrollTop($('#deliveryWrapper').offset().top);
                return false;
            }

            if (!isCheckedPayment) {
                $.fancybox.open('Выберите вариант оплаты');
                $('html, body').scrollTop($('#paymentWrapper').offset().top);
                return false;
            }

            event.preventDefault();
            sendOrder($('#order-form'));
        });

        function sendOrder (form) {
            var request = BX.ajax.runComponentAction(
                'ig:order',
                'newOrder',
                {
                    mode: 'ajax',
                    data: {
                        form: form.serializeArray()
                    }
                }
            );

            request.then(function (response) {
                if (response.data['ORDER_ID']) {
                    window.location = '/cart/success/?ORDER_ID=' + response.data['ORDER_ID'];
                }
                else {
                    window.loadingEnd();
                    $.fancybox.open(response.data['MESSAGE']);
                }
            });
        }

    })();
});