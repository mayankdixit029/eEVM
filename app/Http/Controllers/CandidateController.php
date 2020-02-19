<?php

namespace App\Http\Controllers;
use App\Candidate;
use App\Seat;
use App\Party;
use App\Voter;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        $candidates=Candidate::paginate(5);
        $seats=Seat::all();
        $parties=Party::all();
        return view('candidate.index')->withCandidates($candidates)->withSeats($seats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $candidates=Candidate::all();
        $seats=Seat::all();
        $parties=Party::all();
        return view('candidate.create')->withCandidates($candidates)->withSeats($seats)->withParties($parties);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $isPresent=Candidate::where('seat_id',$request->seat_id)->where('party_id',$request->party_id)->count();
       if($isPresent >0){
       return redirect('candidate')->with('danger','One Party can have only one district ');}
       
    
        $candidate=new Candidate;
        $candidate->name=$request->name;
        $candidate->slug=$this->slugify($candidate->name,'candidates');
      
        $candidate->seat_id=$request->seat_id;
        $candidate->party_id=$request->party_id;
        
    
        $candidate->save();

        return redirect('candidate');
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
       $candidate=Candidate::find($id);
       $parties=Party::all();
       $seats=Seat::all();
       return view('candidate.edit')->withParties($parties)->withSeats($seats)->withCandidate($candidate);
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
        $candidate=Candidate::find($id);
        $candidate->name=$request->name;
       
        $candidate->slug=$this->slugify($request->name,'candidates');
        $candidate->seat_id=$request->seat_id;
        $candidate->party_id=$request->party_id;
        
    
        $candidate->save();

        return redirect('candidate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {   
       
        $candidate=Candidate::find($id);
        $candidate->delete(); 
        return redirect('candidate');
    }
}
