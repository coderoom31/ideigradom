(function () {
    window.SmartFilter = function (urlPage) {
        this.urlPage = urlPage;
        this.clearUrl = 'filter/clear/apply/';
        this.form = $('#form-filter');

        this.inputCheckbox = this.form.find('input[type=checkbox]');

        this.inputCheckbox.on('change', this.dataChanged.bind(this));
    };

    SmartFilter.prototype.dataChanged = function (event) {
        var formData = {ajax: 'y'};
        this.form.serializeArray().forEach(function (element) {
            if (element.value) {
                formData[element.name] = element.value;
            }
        });
        this.ajaxRequest(formData);
    };

    SmartFilter.prototype.ajaxRequest = function (data) {
        BX.ajax.loadJSON(
            this.urlPage,
            data,
            this.filterApply.bind(this)
        );
    };

    SmartFilter.prototype.filterApply = function (resultData) {
        var url = resultData.FILTER_AJAX_URL;

        url = this.clearUrlEmptyFilter(url);

        // Реализация отображения фильтра в адресной строке
        window.history.pushState(null, null, url);

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                pageType: 'AJAX',
                action: 'filterApply'
            }
        })
            .done(function (data) {
                var result = JSON.parse(data);
                $('#jsCatalogList').html(result.catalog);
                $('.cat__title span').html(resultData.ELEMENT_COUNT + ' шт.');
            });
    };

    SmartFilter.prototype.clearUrlEmptyFilter = function (url) {

        if (url.indexOf(this.clearUrl) !== -1) {
            url = url.replace(this.clearUrl, '');
        }

        return url;

    };

})();