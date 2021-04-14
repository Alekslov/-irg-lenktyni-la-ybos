<?php

namespace App\Http\Controllers;

use App\Models\Horse;
use Illuminate\Http\Request;
use Validator;

class HorseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ('name' == $request->sort) {
            $horses = Horse::orderBy('name')->get();
        }
        else {
            $horses = Horse::all();
        }
        return view('horse.index', ['horses' => $horses]);
        
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('horse.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {           
            $validator = Validator::make($request->all(),
            [
                'horse_name' => ['required', 'min:3', 'max:100'],
                
            ],
            [
            'horse_name.min' => 'Vardas turi sudaryti nuo 3 iki 100 raidžių.',
            
            ]
            );
            if ($validator->fails()) {
                $request->flash();
                return redirect()->back()->withErrors($validator);
            }
     
            $horse = new horse;
            $horse->name = $request->horse_name;
            $horse->wins = $request->horse_wins;
            $horse->runs = $request->horse_runs;
            $horse->about = $request->horse_about;

            $horse->save();
            return redirect()->route('horse.index')->with('success_message', 'Sekmingai pridėtas.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function show(Horse $horse)
    {
        return view('horse.show', ['horse' => $horse]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function edit(Horse $horse)
    {
        return view('horse.edit', ['horse' => $horse]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Horse $horse)
    {
        $validator = Validator::make($request->all(),
        [
            'horse_name' => ['required', 'min:3', 'max:100'],
            
        ],
 [
 'horse_name.min' => 'Vardas turi sudaryti nuo 3 iki 100 raidžių.',
 
 ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $horse->name = $request->horse_name;
        $horse->wins = $request->horse_wins;
        $horse->wins = $request->horse_wins;
        $horse->save();
        return redirect()->route('horse.index')->with('success_message', 'Sėkmingai pakeistas.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Horse $horse)
    {
        if($horse->horseBetter->count()){
            return redirect()->route('horse.index')->with('info_message', 'Trinti negalima, nes ji dalyvauja lošime.');
        }
        $horse->delete();
        return redirect()->route('horse.index')->with('success_message', 'Sekmingai ištrintas.');
 
 
    }
}
