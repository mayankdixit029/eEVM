<?php

namespace App\Http\Controllers\Api;
use App\Traits\ProcessResponseTrait;
use App\Candidate;
use App\Seat;
use App\Party;
use App\Voter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CandidateController extends Controller
{
    use ProcessResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates=Candidate::orderBy('created_at','desc')->with('party')->get();
        
        $seats=Seat::all();
        $parties=Party::all();
        return $this->processResponse($candidates,'success'); 
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
   * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        if(!$request->has('id'))
{
    $candidate=new Candidate;
    $candidate->name=$request->name;
    $candidate->slug=$this->slugify($candidate->name,'candidates');
  
    $candidate->seat_id=$request->seat_id;
    $candidate->party_id=$request->party_id;
    return $this->processResponse($candidate,'success', 'Candidate created');
}
else
{
    $candidate=Candidate::find($request->id);
    $candidate->name=$request->name;
   
    $candidate->slug=$this->slugify($request->name,'candidates');
    $candidate->seat_id=$request->seat_id;
    $candidate->party_id=$request->party_id;
    return $this->processResponse($candidate,'success', 'Candidate edited');
}
            // if($request->has('slug'))
            // {
            //     $slug = $this->slugify($request->name, 'candidates');
            // };
    
            // $candidate = Candidate::updateOrCreate(
            //     ['id' => $request->id],
            //     [
            //     'slug' => ($request->has('slug')) ? $this->slugify($request->name, 'candidates') : Candidate::find($request->id)->slug,
            //     'name' => $request->name,
            //     'seat_id'=>$request->seat_id,
            //     'party_id'=>$request->party_id
            //     ]
            // );

        
            return $this->processResponse($candidate,'success', 'Candidate created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        //
    }
}
