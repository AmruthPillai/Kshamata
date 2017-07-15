<?php

namespace App\Http\Controllers;

use App\Woman;
use App\TrackRecord;
use Illuminate\Http\Request;

class TrackRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TrackRecord::all();
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
        $woman = Woman::find(request()->id);

        $trackRecord = new TrackRecord;

        $trackRecord->employer_name = request()->employer_name;
        $trackRecord->salary = request()->salary;
        $trackRecord->location = request()->location;

        $woman->trackRecords()->save($trackRecord);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return TrackRecord::find(request()->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TrackRecord  $trackRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(TrackRecord $trackRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TrackRecord  $trackRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrackRecord $trackRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TrackRecord  $trackRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrackRecord $trackRecord)
    {
        //
    }
}
