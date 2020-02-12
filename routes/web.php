<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::middleware(['auth', 'users'])->group(function(){
Route::get('voter','VoterController@index')->name('voter.index');
Route::post('voter/{id}/save_vote','VoterController@save_vote')->name('voter
.save_vote');
Route::get('voter/show','CandidateController@show');
});

Route::middleware(['auth', 'admins'])->group(function(){

    Route::get('candidate','CandidateController@index')->name('candidate.index');
    Route::get('candidate/create','CandidateController@create');
    Route::post('candidate/store','CandidateController@store');
    Route::get('candidate/{id}/show','CandidateController@show');
    Route::get('candidate/{id}/edit','CandidateController@edit');
    Route::put('candidate/{id}/update','CandidateController@update');
    Route::delete('candidate/{id}/delete','CandidateController@delete');

    
    
    
    Route::get('seat','SeatController@index')->name('seat.index');
    Route::get('seat/create','SeatController@create');
    Route::post('seat/store','SeatController@store');
    Route::get('seat/{id}/show','SeatController@show');
    Route::get('seat/{id}/edit','SeatController@edit');
    Route::put('seat/{id}/update','SeatController@update');
    Route::delete('seat/{id}/delete','SeatController@delete');
    
    Route::get('party','PartyController@index')->name('party.index');
    Route::get('party/create','PartyController@create');
    Route::post('party/store','PartyController@store');
    Route::get('party/{id}/show','PartyController@show');
    Route::get('party/{id}/edit','PartyController@edit');
    Route::put('party/{id}/update','PartyController@update');
    Route::delete('party/{id}/delete','PartyController@delete');
    


    Route::get('state','StateController@index')->name('state.index');
    Route::get('state/create','StateController@create');
    Route::post('state/store','StateController@store');
    Route::delete('state/{id}/delete','StateController@delete');
    
    
    Route::get('district','DistrictController@index')->name('district.index');
    Route::get('district/create','DistrictController@create');
    Route::post('district/store','DistrictController@store');
    Route::get('district/{id}/show','DistrictController@show');
    Route::get('district/{id}/edit','DistrictController@edit');
    Route::put('district/{id}/update','DistrictController@update');
    Route::delete('district/{id}/delete','DistrictController@delete'); 
    });
   
       

  