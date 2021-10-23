$(document).ready(function () {
    var locationInput = $('.location-search');
    locationInput.selectize({
        valueField: 'code',
        labelField: 'label',
        searchField: 'label',
        placeholder: 'Выбрать город',
        create: false,
        render: {
            option: function (item, escape) {
                return '<div class="title">' + escape(item.label) + '</div>';
            }
        },
        onInitialize: function (callback) {
            // Подстановка города по ip пользователя
            var cityName = this.$input.attr('data-ip-city');

            if (cityName) {
                var selectize = this;
                var query = {
                    c: 'ig:city-selection',
                    action: 'search',
                    mode: 'class',
                    q: cityName
                };

                $.ajax({
                    url: '/bitrix/services/main/ajax.php?' + $.param(query, true),
                    type: 'POST',
                    success: function (res) {
                        selectize.addOption(res.data);
                        window.locationData = res.data;
                        selectize.setValue(res.data[0]['code']);
                    }
                });
            }
        },
        load: function (q, callback) {
            if (!q.length) return callback();

            var query = {
                c: 'ig:city-selection',
                action: 'search',
                mode: 'class'
            };

            var data = {q: q};

            $.ajax({
                url: '/bitrix/services/main/ajax.php?' + $.param(query, true),
                type: 'POST',
                data: data,
                error: function () {
                    callback();
                },
                success: function (res) {
                    if (res.status === 'success') {
                        window.locationData = res.data;
                        callback(res.data);
                    } else {
                        callback();
                    }
                }
            });
        }
    });
});