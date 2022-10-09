<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\ProjectResource;
use App\Models\RequestPermission;

class ProjectBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = ProjectResource::collection(Project::latest()->paginate(10));
        return Inertia::render('ProjectBoard/Index',[
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'project'=>$project
        ]);
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
        $project = ProjectResource::make(Project::find($id));
        $checkUser = Project::find($id);

        if(Auth::id()===$checkUser->user_id){
            return Inertia::render('ProjectBoard/Details',[
                'canLogin' => Route::has('login'),
                'canRegister' => Route::has('register'),
                'project'=>$project,
                'is_author'=>true
            ]);
        }else{
            $reqPermission = RequestPermission::where('project_id',$id)->where('requester_id',Auth::id())->get();
            
            if(count($reqPermission->toArray())!=0){
                return Inertia::render('ProjectBoard/Details',[
                    'canLogin' => Route::has('login'),
                    'canRegister' => Route::has('register'),
                    'project'=>$project,
                    'is_author'=>false,
                    'is_requested'=>true,
                ]);
            }else{
                return Inertia::render('ProjectBoard/Details',[
                    'canLogin' => Route::has('login'),
                    'canRegister' => Route::has('register'),
                    'project'=>$project,
                    'is_author'=>false,
                    'is_requested'=>false,
                ]);
            }
           
        }
        
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
