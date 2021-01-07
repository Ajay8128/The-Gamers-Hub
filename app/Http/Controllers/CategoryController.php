<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use Session;

class CategoryController extends Controller
{
   
    public function __construct(){
        $this->middleware('auth');//see post controller for all the info about this 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // display a view of all our categories
        //it will also have a form to create a new category 

        $categories=Category::all();
        return view('categories/index')->withCategories($categories);//with*** is what you want to call it in the views
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // we do not need this because we are creating in the index itself
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Save a new category and then redirect back to the index. 
        $this->validate($request,array(
            'name'=>'required| max:255'
        ));
        // store in the database
        $category=new Category;
        $category->name=$request->name;//request object contains what we type in the input
        $category->save();
        Session::flash('success','The Category Was Saved Successfully!');
        return redirect()->route('categories.index');
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
