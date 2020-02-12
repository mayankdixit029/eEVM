<?php

namespace App\Http\Controllers;
use App\Candidate;
use App\Seat;
use App\Party;
use App\Voter;
use App\State;
use App\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts=District::paginate(5);
        return view('district.index')->withDistricts($districts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states=State::all();

      return view('district.create')->withStates($states);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $district =new District;
        $district->name=$request->name;
       
        $district->state_id=$request->state_id;
        
    
        $district->save();

        return redirect('district');
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
        $states=State::all();
        $district=District::find($id);
        return view('district.edit')->withDistrict($district)->withStates($states);
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
        $district=District::find($id);
        $district->name=$request->name;
       
        $district->state_id=$request->state_id;
        
    
        $district->save();

        return redirect('district');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        
        $district=District::find($id);
        $district->delete(); 
        return redirect('district');
    }
}
