<?php namespace Vcode\Qrcode;

class Qrcode {

    const TYPE_GOOGLE = 0x01;

    /**
     * Laravel application
     *
     * @var \Illuminate\Foundation\Application
     */
    public $app;
    public function __construct($app)
    {
        $this->app = $app;
    }
    
    public function render($value, $logoUrl, $type = self::TYPE_GOOGLE){
//         echo Config::get('qrcode::config.abc'); die;
        switch ($type) {
            
            case self::TYPE_GOOGLE :
                
                $result = GoogleQrcode::createDomQrcode(array('chl'=>$value));
            break;
            
            default:
                $result = GoogleQrcode::createDomQrcode(array('chl'=>$value));
            break;
        }
        echo $result;
    }
}