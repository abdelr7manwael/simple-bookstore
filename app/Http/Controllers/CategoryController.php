<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    //Category
    function create(){
        $cat = Category::get();
        return view('categories/create',['categories'=>$cat]);
    }

    //save Category
    function savecategory(Request $request){
        $validator = \Validator::make($request->all(),[
            'name'=>'required|min:3'
        ]);
        if($validator->fails()){
            return redirect('categories/create')
                   ->withErrors($validator)
                   ->withInput();
        }
        $cat = new Category;
        $cat->name = $request->name;
        $cat->save();
        return redirect('categories/create');

    }

}
