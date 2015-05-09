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

// 	    Qrcode::storageImage($value, "/tmp/qrcode1.png");
// 	    Qrcode::render($value);
// 	    Qrcode::renderBase64($value);
// 	    Qrcode::renderBase64Dom($value);
// die;
		return View::make('hello');

	}

}
