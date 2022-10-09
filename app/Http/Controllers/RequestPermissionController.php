<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\ProjectResource;
use App\Models\RequestPermission;
use Illuminate\Support\Facades\Redirect;

class RequestPermissionController extends Controller
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
    public function create($id)
    {
        if(Auth::check()){
            
            $project = ProjectResource::make(Project::find($id));
            $checkUser = Project::find($id);
            $reqPermission = RequestPermission::where('project_id',$id)->where('requester_id',Auth::id())->get();
            if(Auth::id()===$checkUser->user_id || count($reqPermission)!=0){
                return Redirect::route('project-board.show',$id);
            }else{
                return Inertia::render('Request/Create',[
                'canLogin' => Route::has('login'),
                'canRegister' => Route::has('register'),
                'project'=>$project
            ]);
            }
            
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'request'=>['required','min:3'],
        ]);
        RequestPermission::create([
            'project_id'=>$id,
            'requester_id'=>Auth::id(),
            'request'=>$request->input('request'),
        ]);

        return Redirect::route('project-board.show',$id);
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
        //
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
        //
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
