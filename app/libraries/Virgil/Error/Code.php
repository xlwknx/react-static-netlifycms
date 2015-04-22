<?php

namespace Virgil\Error;


class Code {

    // General errors
    const ROUTE_WAS_NOT_FOUND                           = 10001;
    const ROUTE_NOT_ALLOWED                             = 10002;


    // Account errors
    const ACCOUNT_NOT_FOUND                             = 30001;
    const ACCOUNT_ALREADY_EXISTS                        = 30002;
    const ACCOUNT_USERNAME_NOT_PROVIDED                 = 30003;
    const ACCOUNT_PASSWORD_NOT_PROVIDED                 = 30004;
    const ACCOUNT_TYPE_NOT_PROVIDED                     = 30005;
    const ACCOUNT_TYPE_NOT_FOUND                        = 30006;
    const ACCOUNT_NOT_CONFIRMED                         = 30007;
    const ACCOUNT_ALREADY_CONFIRMED                     = 30008;
    const ACCOUNT_CONFIRMATION_NOT_FOUND                = 30009;
    const ACCOUNT_CONFIRMATION_CODE_EXPIRED             = 30010;


    // Authentication errors
    const AUTHENTICATION_TOKEN_NOT_FOUND                = 40001;
    const AUTHENTICATION_TOKEN_EXPIRED                  = 40002;


    // Application errors
    const APPLICATION_NAME_NOT_PROVIDED                 = 50001;
    const APPLICATION_DESCRIPTION_NOT_PROVIDED          = 50002;
    const APPLICATION_URL_NOT_PROVIDED                  = 50003;
    const APPLICATION_NOT_FOUND                         = 50004;
    const APPLICATION_LIMIT_EXCEEDED                    = 50005;
    const APPLICATION_KEY_NOT_FOUND                     = 50006;
    const APPLICATION_SERVICE_NOT_RECOGNIZED            = 50007;
    const APPLICATION_CALL_LIMIT_EXCEEDED               = 50008;

}