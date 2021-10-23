<?
use Bitrix\Main\{Engine\Controller, Mail\Event, UserTable};

class AuthAjax extends Controller
{
    const DEFAULT_USER_GROUP = [3, 4];

    public function configureActions(): array
    {
        return [
            'logIn' => [
                'prefilters' => []
            ],
            'addNewUser' => [
                'prefilters' => []
            ],
            'resetPassword' => [
                'prefilters' => []
            ]
        ];
    }

    public function logInAction(string $email, string $password)
    {
        global $USER;

        $result = [
            'IS_AUTHORIZED' => false,
            'ERROR_MESSAGE' => ''
        ];

        if (!check_email($email)) {
            $result['ERROR_MESSAGE'] = 'Неверный Email';
        } else {
            $USER = new CUser();

            $resultLogIn = $USER->Login($email, $password);

            if (is_bool($resultLogIn) && $resultLogIn) {
                $result['IS_AUTHORIZED'] = true;
            } else {
                $result['ERROR_MESSAGE'] = $resultLogIn['MESSAGE'];
            }
        }

        return $result;
    }

    public function addNewUserAction(string $email, string $pass, string $confirmPass, string $name, string $phone,
                                     string $checkbox) {
        global $USER;

        $result = [
            'REGISTRATION_SUCCESSFUL' => false,
            'ERROR_MESSAGE' => ''
        ];

        if (!check_email($email)) {
            $result['ERROR_MESSAGE'] = 'Неверный Email';
            return $result;
        }

        if ($checkbox !== 'on') {
            $result['ERROR_MESSAGE'] = 'Подтвердите условия политики конфиденциальности';
            return $result;
        }

        $dbUser = UserTable::getList(
            [
                'filter' => ['EMAIL' => $email]
            ]
        );

        if ($dbUser->fetch()) {
            $result['ERROR_MESSAGE'] = 'Пользователь с ' . $email . ' уже существует.';
            return $result;
        }

        $fields = [
            'LOGIN' => $email,
            'EMAIL' => $email,
            'LID' => SITE_ID,
            'ACTIVE' => 'Y',
            'PASSWORD' => $pass,
            'PERSONAL_PHONE' => $phone,
            'CONFIRM_PASSWORD' => $confirmPass,
            'GROUP_ID' => self::DEFAULT_USER_GROUP,
            'NAME' => htmlspecialchars($name)
        ];

        $user = new CUser();
        $userId = $user->Add($fields);
        if ($userId > 0) {
            $result['REGISTRATION_SUCCESSFUL'] = true;

            $USER->Authorize($userId);

            $mailFields = array(
                'EVENT_NAME' => 'NEW_REGISTRATION',
                'C_FIELDS' => [
                    'USER_ID' => $userId,
                    'LOGIN' => $email,
                    'EMAIL' => $email
                ],
                'LID' => SITE_ID,
            );

            Event::sendImmediate($mailFields);
        } else {
            $result['ERROR_MESSAGE'] = $user->LAST_ERROR;
        }

        return $result;
    }

    public function resetPasswordAction(string $email)
    {
        if (check_email($email)) {
            $dbUser = UserTable::getList(
                [
                    'filter' => [
                        'EMAIL' => $email
                    ]
                ]
            );

            if ($user = $dbUser->fetch()) {

                $newPassword = randString(6);

                $userObj = new CUser();
                $userObj->Update($user['ID'], ['PASSWORD' => $newPassword]);


                $mailFields = array(
                    'EVENT_NAME' => 'RESET_PASSWORD',
                    'C_FIELDS' => [
                        'EMAIL' => $email,
                        'NEW_PASSWORD' => $newPassword
                    ],
                    'LID' => SITE_ID,
                );

                Event::sendImmediate($mailFields);
            }
        }
    }
}
