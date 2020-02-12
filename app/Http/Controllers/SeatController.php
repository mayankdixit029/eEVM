<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Candidate;
use App\Seat;
use App\Party;
use App\Voter;
use App\District;
use App\State;

use Illuminate\Http\Request;


class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $seats=Seat::paginate(5);
        return view('seat.index')->withSeats($seats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $districts=District::all();
        return view('seat.create')->withDistricts($districts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $seat=new Seat;
        $seat->name=$request->name;
        $seat->candidate_id=$request->candidate_id;
        $seat->district_id=$request->district_id;
        $seat->save();
        return redirect('seat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seat=Seat::find($id);
    $districts=District::all();
        return view('seat.edit')->withDistricts($districts)->withSeat($seat);
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
        $seat=Seat::find($id);
        $seat->name=$request->name;
        $seat->candidate_id=$request->candidate_id;
        $seat->district_id=$request->district_id;
        $seat->save();
        return redirect('seat');
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
