<?php

namespace Virgil\Error;


class Code {

    // General errors
    const ROUTE_WAS_NOT_FOUND                           = 10001;
    const ROUTE_NOT_ALLOWED                             = 10002;

    const TOKEN_VALIDATION_TOKEN_NOT_FOUND              = 50006;
    const TOKEN_VALIDATION_RESOURCE_NOT_PROVIDED        = 50007;
    const TOKEN_VALIDATION_SERVICE_ID_NOT_PROVIDED      = 50008;
    const TOKEN_VALIDATION_TOKEN_NOT_YET_ACTIVATED      = 50009;

}