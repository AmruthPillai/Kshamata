<?php

namespace App\Http\Controllers;

use App\Woman;
use Illuminate\Http\Request;

use Cornford\Googlmapper\Facades\MapperFacade as Mapper;

class WomanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $women = Woman::all();

        return view('women.index')->with('women', $women);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $woman = Woman::with('trackRecords')
            ->find(request()->id);

        $recentTrackRecord = $woman->trackRecords()->orderBy('created_at', 'desc')->get();

        // -76.293495,-86.868115
        $latlng = $recentTrackRecord->first()->location;
        $latlng_explode = explode(",", $latlng);

        Mapper::map(
          $latlng_explode[0],
          $latlng_explode[1],
          ['zoom' => 4]
        );

        return view('women.show')->with('woman', $woman)->with('latlng', $latlng_explode);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Woman  $woman
     * @return \Illuminate\Http\Response
     */
    public function edit(Woman $woman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Woman  $woman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Woman $woman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Woman  $woman
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $woman = Woman::find($id);
        $woman->trackRecords()->delete();
        $woman->delete();

        $women = Woman::all();

        return view('women.index')->with('women', $women);
    }
}
