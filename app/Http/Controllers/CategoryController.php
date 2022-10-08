<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CategoryResource;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request as FacadesRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole('admin')){
            return Inertia::render('Category/Index',[
            'category' => CategoryResource::collection(Category::query()
                                            ->when(FacadesRequest::input('search'),function($query,$search){
                                                $query->where('category','like', "%{$search}%");
                                            })
                                            ->latest()
                                            ->paginate(5)
                                            ->withQueryString()),
            'filters' => FacadesRequest::only(['search'])
        ]);
        }else{
            return redirect('dashboard');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->hasRole('admin')){
            return Inertia::render('Category/Create');
        }else{
            return redirect('dashboard');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category'=>['required','min:3'],
        ]);
        Category::create([
            'category'=>$request->category,
        ]);

        return Redirect::route('category.index');
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
    public function edit(Category $category)
    {
        if(Auth::user()->hasRole('admin')){
            return Inertia::render('Category/Edit',[
                'category'=>$category,
            ]);
        }else{
            return redirect('dashboard');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Category $category)
    {
        $request->validate([
            'category'=>['required','min:3'],
        ]);

        $category->update([
            'category'=>$request->category,
        ]);
        return Redirect::route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        
        $category->delete();
        return Redirect::back();
    }
}
