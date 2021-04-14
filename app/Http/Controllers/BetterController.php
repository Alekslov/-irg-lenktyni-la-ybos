<?php

namespace App\Http\Controllers;

use App\Models\Better;
use Illuminate\Http\Request;
use App\Models\Horse;

class BetterController extends Controller
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
        $horses = Horse::all();
        if($request->horse_id) {
            $betters = Better::where('horse_id', $request->horse_id)->get();
            $filterBy = $request->horse_id;
        }
        else {
            $betters = Better::all();
        }
        $horses = $horses->sortBy('name');
        // $betters = Better::all();
        $betters = $betters->sortByDESC('bet');
        return view('better.index', [
            'horses' => $horses,
            'betters' => $betters,
            'filterBy' => $filterBy ?? 0,
            'sortBy' => $sortBy ?? 0
            ]);
        


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $horses = Horse::all();
        $horses = $horses->sortBy('name');
        return view('better.create', ['horses' => $horses]);
        // $horses = Horse::all();
        // $horses = Horse::orderBy('name');
        // return view('better.create', ['horses' => $horses]);
    //     $horses = Horse::all();
    //    return view('better.create', ['horses' => $horses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $better = new better;
        $better->name = $request->better_name;
        $better->surname = $request->better_surname;
        $better->bet = $request->better_bet;
        $better->horse_id = $request->horse_id;
        $better->save();
        return redirect()->route('better.index')->with('success_message', 'Sekmingai pridėtas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Better  $better
     * @return \Illuminate\Http\Response
     */
    public function show(Better $better)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Better  $better
     * @return \Illuminate\Http\Response
     */
    public function edit(Better $better)
    {
        $horses = Horse::all();
        $horses = $horses->sortBy('name');
        return view('better.edit', ['better' => $better, 'horses' => $horses]);
        // $horses = Horse::all();
        // $horses = Horse::orderBy('name');
        // return view('horse.index', ['horses' => $horses]);
      
        // return view('horse.index', ['horses' => $horses]);
        // $horses = Horse::all();
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Better  $better
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Better $better)
    {
        $better->name = $request->better_name;
        $better->surname = $request->better_surname;
        $better->bet = $request->better_bet;
        $better->horse_id = $request->horse_id;
        $better->save();
        return redirect()->route('better.index')->with('success_message', 'Sėkmingai pakeistas.');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Better  $better
     * @return \Illuminate\Http\Response
     */
    public function destroy(Better $better)
    {
        $better->delete();
        return redirect()->route('better.index')->with('success_message', 'Sekmingai ištrintas.');
    }
}
