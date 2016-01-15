<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RequestController extends Controller
{
	
	public function getBasetest(Request $request)
    {
        $input = $request->input('test');
        echo $input;
    }
	
	public function getUrl(Request $request)
	{
	if(!$request->is('request/*'))
	{
		abort(404);
	}
	$uri=$request->path();
	$url=$request->url();
	echo $uri;
	echo '<br>';
	echo $url;
	}
	public function getInputData(Request $request)
	{
		$name=$request->input('name','default');
		echo print_r($request->all());
		echo '<br>';
		echo $name;
		echo '<br>';
		echo $request->input('test.er.name');
	}
	public function getCookie(Request $request)
	{
		$cookies=$request->cookie();
		dd($cookies);
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
