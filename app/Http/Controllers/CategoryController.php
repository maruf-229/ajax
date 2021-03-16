<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
//use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Image;
use Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $categories=DB::table('categories')->get();
        return view('category')->with('categories',$categories);
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
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json([
            'message' => $request->name,
            'class_name' => 'alert-success'
        ]);

//        $request->validate([
//            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//        ]);
//        $category = new Category;
//        $category->name = $request->name;
//        $category->description = $request->description;
//
//        if($request->hasFile('image')) {
//                $image = $request->file('image');
//                $new_name = rand() . '.' . $image->getClientOriginalExtension();
//                $image->move(public_path('images'), $new_name);
//                $category->image = $new_name;
//        }
//        $category->save();
//        return response()->json([
//            'message' => 'Image Upload Successfully',
//            'class_name' => 'alert-success'
//        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
