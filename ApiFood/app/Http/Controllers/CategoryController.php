<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json( Category::get(), 200 );
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
        // Colocar en category.php:   protected $fillable = ['name','slug', ];
        
        $category = new Category;

        $category->name =$request->name;
        $category->slug =$request->slug;

        $category->save();
        
        return response()->json( [ "message" => "Record created"], 201 );
                                

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
        $cate = Category::find($id);

         if(is_null($cate)) {
           return response()->json( ["message" => "Record not found"],404);
         }

        return response()->json( $cate, 200 );

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
        $cate = Category::find($id);

        /* if(is_null($cate)) {
           return response()->json( ["message" => "Record not found"],404);
         }

        $cate-> update( $request->all() );*/
         $cate->name = $request->name;
         $cate->slug = $request->slug;
         $cate->save();

         return response()->json( [ "message" => "Record created"], 200 );
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
        $cate = Category::find($id);

         if(is_null($cate)) {
           return response()->json( ["message" => "Record not found"],404);
         }

        $cate-> delete();
        return response()->json(null, 204 );
    }
}
