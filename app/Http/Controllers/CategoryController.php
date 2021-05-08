<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            ['image' => $_FILES["image"]["name"]],
            ['image' => 'max:35']);
        if ( $validator->fails() )
        {
            return Redirect::back()->withErrors($validator);
        }
        
        $imagenTemporal = $_FILES["image"]["tmp_name"];
        $fullImgPath ="img/".$_FILES["image"]["name"];

        $category = new Category($this->validateCategory());
        $category->img = $fullImgPath;
        $category->save();

        move_uploaded_file($imagenTemporal, $fullImgPath);
        $fp = fopen($fullImgPath, 'r+b');
        fclose($fp);
        return redirect()->route('categories.admin.list');
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
        return view("layouts.categories.edit", compact("category"));
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

        if(!$_FILES["image"]["name"] == null){
            $validator = Validator::make(
                ['image' => $_FILES["image"]["name"]],
                ['image' => 'max:35']);
            if ( $validator->fails() )
            {
                return Redirect::back()->withErrors($validator);
            }

            $imagenTemporal = $_FILES["image"]["tmp_name"];
            $fullImgPath ="img/".$_FILES["image"]["name"];

            $category->img = $fullImgPath;
            $category->update($this->validateCategory());

            move_uploaded_file($imagenTemporal, $fullImgPath);
            $fp = fopen($fullImgPath, 'r+b');
            fclose($fp);
        }else{
            $category->update($this->validateCategory());
        }
        return redirect()->route('categories.admin.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.admin.list');
    }

    function categoryList ()
    {
        $categories = Category::paginate(20);
        return view('layouts.categories.list', compact('categories'));
    }

    public function validateCategory()
    {
        return request()->validate([
            'name' => 'required|max:25',
            "description:es" => "required|max:150",
            "description:en" => "required|max:150",
            'image' => 'file|mimes:jpg,png'
        ]);
    }
}
