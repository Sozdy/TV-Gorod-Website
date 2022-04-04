<?php

namespace App\Http\Controllers;

use App\Models\AdsPosition;
use Illuminate\Http\Request;

class AdsPositionController extends Controller
{

    public static function list()
    {
        return AdsPosition::pluck("name", "id");
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
     * @param  \App\Models\AdsPosition  $adsPosition
     * @return \Illuminate\Http\Response
     */
    public function show(AdsPosition $adsPosition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdsPosition  $adsPosition
     * @return \Illuminate\Http\Response
     */
    public function edit(AdsPosition $adsPosition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdsPosition  $adsPosition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdsPosition $adsPosition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdsPosition  $adsPosition
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdsPosition $adsPosition)
    {
        //
    }
}
