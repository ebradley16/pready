<?php

namespace App\Http\Controllers;

use App\Tactic;
use Illuminate\Http\Request;

class TacticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        $tactic = Tactic::find($id);

        // check for correct user

        if(auth()->user()->id !==$tactic->user_id){
            return redirect('/tactics')->with('error', 'Unauthorized Page');
        }

        return view('tactics.edit')->with('tactic', $tactic);
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
        $this->validate($request, [
            'tactic' => 'required',
            'focus' => 'required',
            'point1' => 'required',
            'point2' => 'required',
            'point3' => 'required'      
            ]);

            // Create Tactic

            $tactic = Tactic::find($id);
            $tactic->tactic = $request->input('goal');
            $tactic->focus = $request->input('focus');
            $tactic->point1 = $request->input('point1');
            $tactic->point2 = $request->input('point2');
            $tactic->point3 = $request->input('point3');
            $tactic->save();

            return redirect('/tactics')->with('success', 'Tactic has been successfully updated');
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
