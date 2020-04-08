<?php

namespace App\Http\Controllers\Ready;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PreReadiness;
use App\PostWellness;
use App\User;
use App\Goal;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Log;
use phpDocumentor\Reflection\Types\String_;

class ReadinessController extends Controller
{

/* Code used to allow only authenticated users access to the pages in the readiness controller */
    
    public function __construct() 
    {
    $this->middleware('auth');
    }

    public function preReadiness(Request $request)
    {
        return view('ready\actions\preReadiness');
    }
    
    public function postWellness(Request $request)
    {
        return view('ready\actions\postWellness');
    }

    public function tactics(Request $request)
    {
        return view('ready\actions\tactics');
    }

    public function goalSetting(Request $request)
    {
        return view('ready\actions\goalSetting');
    }

    public function matchReports(Request $request)
    {
        return view('ready\actions\matchReports');
    }

    // public function articles(Request $request)
    // {
    //     return view('articles');
    // }

    public function appointment(Request $request)
    {
        return view('ready\actions\appointment');
    }


    public function landing(Request $request)
    {
        Log::info('Readiness Controller >> landing');
        return view('admin\users\landingpageforuser');
    }

    
    public function manager(Request $request)
    {
        Log::info('Readiness Controller >> manager');
        return view('admin\users\landingpageformanager');
    }
    
    public function createReadiness(Request $req){
        Log::info('Readiness Controller>> createReadiness');
        $userId = Auth::user()->id;
        PreReadiness::create([
            'mood'       => $req->mood,
            'sleep'      => $req->sleep,
            'hydration'  => $req->hydration,
            'soreness'   => $req->soreness,
            'fatigue'    => $req->fatigue,
            'willingness'=> $req->willingness,
            'comment'    => $req->comment,
            'user_id'    => $userId
        ]);

        return redirect()->route('landing');
    }

    // public function getReadinessResults()
    // {
    //     Log::info('Readiness Controller>> getReadinessResults');
    //     $userId = Auth::user()->id;
    //     $results = PreReadiness::where('user_id', $userId)->get();
    //     Log::info('Readiness Controller>> getReadinessResults', [ 'results' => $results ]);
    //     return view('history', ['results' => $results]);

    // }



    // public function history($id)
    // {
    //     Log::info('Readiness Controller>> getReadinessResults');
    //     $userId = $user->id;
    //     $preReadinessResults = PreReadiness::where('user_id', $userId)->get();
    //     Log::info('Readiness Controller>> history', [ 'results' => $preReadinessResults ]);

    //     Log::info('Readiness Controller>> getWellnessResults');
    //     $userId = $user->id;
    //     $postWellnessResults = PostWellness::where('user_id', $userId)->get();
    //     Log::info('Readiness Controller>> history', [ 'results' => $postWellnessResults ]);

    //     return view('ready\actions\history', [
    //         'user' => $user,
    //         'preReadinessResults' => $preReadinessResults, 
    //          'postWellnessResults' => $postWellnessResults
             
    //          ]);

    // }

    // This function is grabbing the user id from landing page, and putting the results into pre and post variables and displaying to history view. 
    public function show($id){
        Log::info('Readiness Controller>> getReadinessResults');

        $preReadinessResults = PreReadiness::orderBy('created_at','DESC')->where('user_id', $id)->get();

        Log::info('Readiness Controller>> history', [ 'results' => $preReadinessResults ]);

        Log::info('Readiness Controller>> getWellnessResults');
// PW results are ordered descending using created_at, by id. 
        $postWellnessResults = PostWellness::orderBy('created_at','DESC')->where('user_id', $id)->get();
        
        Log::info('Readiness Controller>> history', [ 'results' => $postWellnessResults ]);

        return view('ready\actions\history', [
            'preReadinessResults' => $preReadinessResults, 
             'postWellnessResults' => $postWellnessResults
             
             ]);
    }


    public function historyOfTeam()
    {
        Log::info('Readiness Controller>> getReadinessResults');
        $manager = Auth::user()->id;
        $team    =User::where('manager_id', $manager)->get();
        
        $preReadinessResults = PreReadiness::orderBy('created_at','DESC')->wherein('user_id', $team->pluck('id')->toArray())->get();
        
        Log::info('Readiness Controller>> history', [ 'results' => $preReadinessResults ]);

        Log::info('Readiness Controller>> getWellnessResults');
       
        
        $postWellnessCollection = PostWellness::orderBy('created_at','DESC')->wherein('user_id',$team->pluck('id')->toArray())->get();
        
        Log::info('Readiness Controller>> history', [ 'results' => $postWellnessCollection ]);

        return view('ready\actions\historyOfTeam', [

            'manager' => $manager,
            'team' => $team,             
            'preReadinessResults' => $preReadinessResults, 
            'postWellnessCollection' => $postWellnessCollection
             
             ]);

    }


    public function historyOfPlayer()
    {
        Log::info('Readiness Controller>> getReadinessResults');
        $manager = Auth::user()->id;
        $team    =User::where('manager_id', $manager)->get();
        
        $preReadinessResults = PreReadiness::orderBy('created_at','DESC')->wherein('user_id', $team->pluck('id')->toArray())->get();
        
        Log::info('Readiness Controller>> history', [ 'results' => $preReadinessResults ]);

        Log::info('Readiness Controller>> getWellnessResults');
       
        
        $postWellnessCollection = PostWellness::orderBy('created_at','DESC')->wherein('user_id',$team->pluck('id')->toArray())->get();
        
        Log::info('Readiness Controller>> history', [ 'results' => $postWellnessCollection ]);

        return view('ready\actions\historyOfTeam', [

            'manager' => $manager,
            'team' => $team,             
            'preReadinessResults' => $preReadinessResults, 
            'postWellnessCollection' => $postWellnessCollection
             
             ]);

    }

    public function playerGoals()
    {
        Log::info('Readiness Controller>> getReadinessResults');
        $manager = Auth::user()->id;
        $team    = User::where('manager_id', $manager)->get();
        
        $playerGoals = Goal::orderBy('created_at','DESC')->wherein('user_id', $team->pluck('id')->toArray())->get();
        
       
        
        return view('ready\actions\playerGoals', [

            'manager' => $manager,
            'team' => $team,             
            'playerGoals' => $playerGoals, 
          
             
             ]);

    }


    public function createWellness(Request $req){
        Log::info('Readiness Controller>> createWellness');
        $userId = Auth::user()->id;
        PostWellness::create([
           
            'rpe'      => $req->rpe,
            'intensity'  => $req->intensity,
            'satisfaction'  => $req->satisfaction,
            'soreness'   => $req->soreness,
            'fatigue'    => $req->fatigue,
            'difficulty'=> $req->difficulty,
            'comment'    => $req->comment,
            'user_id'    => $userId
        ]);

        return redirect()->route('landing');
    }




}
