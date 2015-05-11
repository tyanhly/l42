<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{

	    $value = "https://github.com/tyanhly/vcode_qrcode";

	    //or for fully options
	    //$value = array(
	        //    'chs' => "250x250",
	        //    'cht' => "qr",
	        //    'chl' => "https://github.com/tyanhly/vcode_qrcode"
	        //    'chld'=> "H|1",         // H(QML)|1, H|2, H|3, H|4, H|10, H|40,
	        //    'choe'=> "UTF-8"        // UTF-8, Shift_JIS, ISO-8859-1
	        //);

// 	    Qrcode::storageImage($value,"/home/tyanhly/Pictures/qrcode.png");
// 	    Qrcode::render($value);
// 	    Qrcode::renderBase64Dom($value, "/home/tyanhly/Pictures/logo.gif", 0.5);
// 	    Qrcode::renderBase64($value, "/home/tyanhly/Pictures/logo.gif", 0.5);

// 	    Qrcode::storageImage($value,  "/home/tyanhly/Pictures/qrcode1.png","/home/tyanhly/Pictures/logo.gif", 0.5);

	    $qrcode = new Vcode\Qrcode\Qrcode(array(
	        'qrcode::google_config_default' => array(
	            'chs' => "250x250",
	            'cht' => "qr",
	            'chld'=> "H|1",         // H(QML)|1, H|2, H|3, H|4, H|10, H|40,
	            'choe'=> "UTF-8"        // UTF-8, Shift_JIS, ISO-8859-1
	        ),
	        'qrcode::template_simple' => '/home/tyanhly/env/projects/l42/workbench/vcode/qrcode/src/template/simple.tpl',
	        'qrcode::storage_dir'     => '/tmp'
	    ));
	    $qrcode->storageImage($value, "/home/tyanhly/Pictures/destination.png", "/home/tyanhly/Pictures/DSC_0001.JPG",0.7);
	    //$qrcode->render($value);
	    //$qrcode->renderBase64($value, "logo.png");
	    //$qrcode->renderBase64Dom($value, "logo.png");
	    die;
		return View::make('hello');

	}

}
