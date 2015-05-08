<?php

namespace Vcode\Qrcode;

/**
 * @author tungly
 * reference https://developers.google.com/chart/infographics/docs/qr_codes
 */
class GoogleQrcode
{

    /**
     * 
     * @var unknown
     */
    public static $_defaulInformation = array(
        'chs' => "250x250",
        'cht' => "qr",
        'chld'=> "H|10",         // H(QML)|1, H|2, H|3, H|4, H|10, H|40,  
        'choe'=> "UTF-8"        // UTF-8, Shift_JIS, ISO-8859-1
    );
    
    public static function createDomQrcode ($input) {
        $url = self::getUrl($input);
        return "<img src='$url' />";
    }
    
    public static function getUrl($input){

        if(!isset($input['chl'])){
            throw new QrcodeException(QrcodeException::DONT_HAVE_CHL);
        }
        $info = array(
            'chs' => isset($input['chs'])?$input['chs']: self::$_defaulInformation['chs'],
            'cht' => isset($input['cht'])?$input['cht']: self::$_defaulInformation['cht'],
            'chld'=> isset($input['chld'])?$input['chld']: self::$_defaulInformation['chld'],
            'choe'=> isset($input['choe'])?$input['choe']: self::$_defaulInformation['choe'],
            'chl' => $input['chl'],
        );
        
        $params = http_build_query($info);
        $url = "https://chart.googleapis.com/chart?$params" ;
        return $url;
    }
    
}