<?php

namespace App\Http\Controllers\Goods;

use Former;
use Response;
use Illuminate\Http\Request;
use App\Models\Goods\GoodsClass;
use App\Http\Controllers\AdminController;
use App\Http\Requests;
use Illuminate\Contracts\Auth\Authenticatable;

class ClassGoodsController extends AdminController
{
	
	  public function __construct()
	  {
		  parent::__construct();
	  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		 # $this->theme->prependTitle(trans('user::user.names').' :: ');

        return $this->theme->of('Goods.class.index')->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return '231';
       
       // return view('Goods.class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return view('Goods\class.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
