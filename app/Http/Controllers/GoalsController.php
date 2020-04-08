<?php

namespace App\Http\Controllers;

use App\Goal;
use App\User;
use Illuminate\Http\Request;
use Auth;

class GoalsController extends Controller
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
    public function index()
    {
        $user_id = auth()->user()->id;
        
        $user = User::find($user_id);
        return view('goals.index')->with('goals', $user->goals);






        // $goals = Goal::orderBy('created_at', 'asc')->paginate(5);

        // // $articles = Article::all();
          
        //  return view('goals.index')->with('goals', $goals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('goals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'goal' => 'required',
            'timeframe' => 'required',
            'behaviour1' => 'required',
            'behaviour2' => 'required',
            'behaviour3' => 'required',
            'achieved' => 'required'    
            
            ]);

            // Create Post

            $goal = new Goal;
            $goal->goal = $request->input('goal');
            $goal->timeframe = $request->input('timeframe');
            $goal->behaviour1 = $request->input('behaviour1');
            $goal->behaviour2 = $request->input('behaviour2');
            $goal->behaviour3 = $request->input('behaviour3');
            $goal->achieved = $request->input('achieved');
            $goal->user_id = auth()->user()->id;
            $goal->save();

            return redirect('/goals')->with('success', 'Goal Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $goal = Goal::find($id);
        return view('goals.show')->with('goal', $goal);

      
    }

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $goal = Goal::find($id);

        // check for correct user

        if(auth()->user()->id !==$goal->user_id){
            return redirect('/goals')->with('error', 'Unauthorized Page');
        }

        return view('goals.edit')->with('goal', $goal);
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
            'goal' => 'required',
            'timeframe' => 'required',
            'behaviour1' => 'required',
            'behaviour2' => 'required',
            'behaviour3' => 'required',       
            'achieved' => 'required'
            ]);

            // Create Goal

            $goal = Goal::find($id);
            $goal->goal = $request->input('goal');
            $goal->timeframe = $request->input('timeframe');
            $goal->behaviour1 = $request->input('behaviour1');
            $goal->behaviour2 = $request->input('behaviour2');
            $goal->behaviour3 = $request->input('behaviour3');
            $goal->achieved = $request->input('achieved');
            $goal->save();

            return redirect('/goals')->with('success', 'Goal has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $goal = Goal::find($id);
        $goal->delete();

        return redirect('/goals')->with('success', 'Goal has been successfully removed');
    }
}
