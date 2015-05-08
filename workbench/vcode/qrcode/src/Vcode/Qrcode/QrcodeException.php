<?php namespace Vcode\Qrcode;

class QrcodeException extends \Exception{


    const DONT_KNOW_ERROR                   = 0xFFF;
    const DONT_HAVE_CHL                     = 0x001;
    
    public static $msgs = array(
        self::DONT_KNOW_ERROR                           => 'APP_DONT_KNOW_ERROR',
        self::DONT_HAVE_CHL                           => 'DONT_HAVE_CHL',
    );
    
    public static function getMsg($code)
    {
        if (array_key_exists($code, self::$msgs)) {
            return self::$msgs[$code];
        } else {
            return self::$msgs[self::DONT_KNOW_ERROR];
        }
    }
    
    public function QrcodeException($code){
        parent::__construct(CartException::getMsg($code), $code);
    }
}