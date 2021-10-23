$(document).ready(function () {
    (function () {
        $('#modal-auth-form').on('submit', function (event) {
            event.preventDefault();

            var formData = $(this).serializeArray();
            var formDataObj = {};

            var isValidForm = true;

            for (var i = 0; i < formData.length; i++) {
                if (!formData[i]['value']) {
                    isValidForm = false;
                    break;
                }
                formDataObj[formData[i]['name']] = formData[i]['value'];
            }

            if (isValidForm) {
                var request = BX.ajax.runComponentAction(
                    'ig:auth',
                    'logIn',
                    {
                        mode: 'ajax',
                        data: {
                            email: formDataObj['LOGIN[EMAIL]'],
                            password: formDataObj['LOGIN[PASSWORD]']
                        }
                    }
                );

                request.then(function (response) {
                    if (response.data['IS_AUTHORIZED']) {
                        window.location = '/personal/';
                    } else {
                        $.fancybox.open(response.data['ERROR_MESSAGE']);
                    }
                });
            }
        });

        $('#modal-reg-form').on('submit', function (event) {
            event.preventDefault();

            var formData = $(this).serializeArray();
            var formDataObj = {};

            var isValidForm = true;

            for (var i = 0; i < formData.length; i++) {
                console.log(formData[i]['name']);
                console.log(formData[i]['value']);
                if (!formData[i]['value']) {
                    isValidForm = false;
                    break;
                }

                formDataObj[formData[i]['name']] = formData[i]['value'];
            }

            var request = BX.ajax.runComponentAction(
                'ig:auth',
                'addNewUser',
                {
                    mode: 'ajax',
                    data: {
                        email: formDataObj['REGISTRATION[EMAIL]'],
                        pass: formDataObj['REGISTRATION[PASSWORD]'],
                        confirmPass: formDataObj['REGISTRATION[CONFIRM_PASSWORD]'],
                        name: formDataObj['REGISTRATION[NAME]'],
                        phone: formDataObj['REGISTRATION[PHONE]'],
                        checkbox: formDataObj['REGISTRATION[CHECKBOX]'],
                    }
                }
            );

            request.then(function (response) {
                if (response.data['REGISTRATION_SUCCESSFUL']) {
                    window.location = '/personal/';
                } else {
                    $.fancybox.open(response.data['ERROR_MESSAGE']);
                }
            });
        });

        $('#modal-recovery-form').on('submit', function (event) {
            event.preventDefault();

            var email = $('#modal-recovery-email').val();

            BX.ajax.runComponentAction(
                'ig:auth',
                'resetPassword',
                {
                    mode: 'ajax',
                    data: {
                        email: email
                    }
                }
            );

            $.fancybox.close();
            $.fancybox.open('Новый пароль был выслан на ' + email);
        });
    })();
});