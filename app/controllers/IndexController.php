<?php

class IndexController extends BaseController {

	public function dashboard()
	{
		return View::make('index.dashboard');
	}

	public function about(){
	    return View::make('index.about');
	}
    /**
     * 
     */
    public function profile()
    {
        return View::make('index.profile');
    }

}
