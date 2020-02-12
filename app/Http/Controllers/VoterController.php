<?php

namespace App\Http\Controllers;
use App\Candidate;
use App\Seat;
use App\Party;
use App\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class VoterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save_vote(Request $request,$id)
    {  
       
        if(Auth::user()->status == 0)
    {    $candidate=Candidate::find($id);
         $counting=$candidate->count;
        $counting++;
        $candidate->count=$counting;
        $candidate->save();
        Auth::user()->status=1;
        Auth::user()->save();
       
        return redirect('/home');
    }
      else
      {
          return view('voter.show');
      }
    }
    public function index()
    {
    $candidates=Candidate::all();
    return view('voter.index')->withCandidates($candidates);
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
    {//
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
