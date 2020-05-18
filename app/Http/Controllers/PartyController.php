<?php

namespace App\Http\Controllers;
use App\Party;
use App\Candidate;
use App\Seat;

use App\Voter;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Photo;

class PartyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $parties=Party::paginate(5);
       return view('party.index')->withParties($parties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('party.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $party = new Party;
        $party->name=$request->name;
        if($request->file('image'))
        {
            $filename=$this->uploadImage($request->file('image'));

            $party->image=$filename;

        }
        $party->save();
        return redirect('party');
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
        $party=Party::find($id);
        return view('party.edit')->withParty($party);
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
        $party=Party::find($id);
        $party->name=$request->name;
        if($request->file('image'))
        {
            if($party->image !== null){
                $this->deleteImage($party->image);
            }

            $filename = $this->uploadImage($request->file('image'));

            $party->image = $filename;
        }

        $party->save();
        return redirect('party');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $party=Party::find($id);
        $party->delete();

        if($party->image)
        {
            $this->deleteImage($party->image);
        }

        return redirect('party');
    }
    public function uploadImage($image){

        //generating random string from current time
            $random_name=time();

        //getting image extension
         $extension = $image->getClientOriginalExtension();

         //generating new image name
         $filename = time() . '.' . $extension;

         //Saving image here
         Photo::make($image)->save(public_path('/' . $filename));

         return $filename;
     }
     public function deleteImage($image)
     {
         $filename = public_path() . '/' . $image;
 
         unlink($filename);
 
     }
}
