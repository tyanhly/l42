<?php

class NerdsController extends \BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // get request data
        $page = \Input::get('page', 1);
        $perPage = \Input::get('perPage', Config::get('constants.perPage'));
        $skip = ($page - 1) * $perPage;
        
        $orderBy = \Input::get('orderBy', 'id');
        $orderValue = \Input::get('orderValue', 'DESC');
        
        $perPageForm["perPageList"] = Config::get('constants.perPageList');
        $perPageForm["defaultPerPage"] = $perPage;
        
        $keywords = \Input::get('keywords', null);
        
        $validator = Validator::make(
            Input::all(), Config::get('constants.listPageValidator')
        );
        if ($validator->fails()){
//             dd($validator->errors()->first());
            App::abort(404, $validator->errors()->first());
        }
        $query = Nerd::orderBy($orderBy, $orderValue);
        
//         dd($keywords);
        if($keywords!==null){
            $query->where('id', 'like', "%$keywords%");
            $query->orwhere('name', 'like', "%$keywords%");
            $query->orwhere('email', 'like', "%$keywords%");
            $query->orwhere('nerd_level', 'like', "%$keywords%");
        }
        
        $count = $query->count();
        $data = $query->skip($skip)->take($perPage)->get()->toArray();
//         dd($data);
        $nerds = \Paginator::make($data, $count, $perPage);

        return View::make('nerds.index',array(
            'nerds' => $nerds,
            'keywords' => $keywords,
            'perPageForm' => $perPageForm,
            'orderBy' => $orderBy,
            'orderValue' => $orderValue
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // load the create form (app/views/nerds/create.blade.php)
        return View::make('nerds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
            'nerd_level' => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);
        
        // process the login
        if ($validator->fails()) {
            return Redirect::to('nerds/create')->withErrors($validator)->withInput(Input::except('password'));
        } else {
            // store
            $nerd = new Nerd();
            $nerd->name = Input::get('name');
            $nerd->email = Input::get('email');
            $nerd->nerd_level = Input::get('nerd_level');
            $nerd->save();
            
            // redirect
            Session::flash('message', 'Successfully created nerd!');
            return Redirect::to('nerds');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id            
     * @return Response
     */
    public function show($id)
    {
        // get the nerd
        $nerd = Nerd::find($id);
        
        // show the view and pass the nerd to it
        return View::make('nerds.show')->with('nerd', $nerd);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id            
     * @return Response
     */
    public function edit($id)
    {
        // get the nerd
        $nerd = Nerd::find($id);
        
        // show the edit form and pass the nerd
        return View::make('nerds.edit')->with('nerd', $nerd);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id            
     * @return Response
     */
    public function update($id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
            'nerd_level' => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);
        
        // process the login
        if ($validator->fails()) {
            return Redirect::to('nerds/' . $id . '/edit')->withErrors($validator)->withInput(Input::except('password'));
        } else {
            // store
            $nerd = Nerd::find($id);
            $nerd->name = Input::get('name');
            $nerd->email = Input::get('email');
            $nerd->nerd_level = Input::get('nerd_level');
            $nerd->save();
            
            // redirect
            Session::flash('message', 'Successfully updated nerd!');
            return Redirect::to('nerds');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id            
     * @return Response
     */
    public function destroy($id)
    {
        // delete
        $nerd = Nerd::find($id);
        $nerd->delete();
        
        // redirect
        Session::flash('message', 'Successfully deleted the nerd!');
        return Redirect::to('nerds');
    }
}