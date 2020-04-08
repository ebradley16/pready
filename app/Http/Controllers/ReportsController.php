<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;

class ReportsController extends Controller
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
        $reports = Report::orderBy('created_at', 'asc')->paginate(5);

        // $articles = Article::all();
          
         return view('reports.index')->with('reports', $reports);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('reports.create');
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
            'title' => 'required',
            'score' => 'required',
            'report' => 'required',
            'teams' => 'required'       
            
            ]);

            // Create Report

            $report = new Report;
            $report->title = $request->input('title');
            $report->score = $request->input('score');
            $report->report = $request->input('report');
            $report->teams = $request->input('teams');
            $report->save();

            return redirect('/reports')->with('success', 'Match Report Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = Report::find($id);
        return view('reports.show')->with('report', $report);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report = Report::find($id);
        return view('reports.edit')->with('report', $report);
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
            'title' => 'required',
            'score' => 'required',
            'report' => 'required',
            'teams' => 'required'      
            
            ]);

            // Create Report

            $report = Report::find($id);
            $report->title = $request->input('title');
            $report->score = $request->input('score');
            $report->report = $request->input('report');
            $report->teams = $request->input('teams');
            $report->save();

            return redirect('/reports')->with('success', 'Report has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = Report::find($id);
        $report->delete();

        return redirect('/reports')->with('success', 'Report has been successfully removed');

    }
}
