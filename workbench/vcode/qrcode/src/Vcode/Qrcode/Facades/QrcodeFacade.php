<?php

namespace Vcode\Qrcode\Facades;

use Illuminate\Support\Facades\Facade;

class QrcodeFacade extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'qrcode';
    }
}