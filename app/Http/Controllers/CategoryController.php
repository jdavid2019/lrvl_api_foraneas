<?php

namespace App\Http\Controllers;

use App\Models\Category;
use http\Env\Response;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getAllCategory() {
       $category = Category::all();
       return response()->json($category,200);
    }

    public function getCategoryxId($id) {
        //first or none -> is_null
        //get -> $value->isEmpty()
        $category = Category::find($id);
        if(is_null($category)){
            return response()->json(['Message' => 'Not found'],404);
        }
        return response()->json($category,200);
    }

    public function getCategoryxType($category_name){
        $category = Category::where('category_name',$category_name)->get();
        if($category->isEmpty()){
            return response()->json(['Message' => 'Not found'],404);
        }
        return response()->json($category,200);
    }

    public function createCategory(Request $request) {
        $category = Category::create($request->all());
        return response()->json($category,200);
    }

    public function updateCategory(Request $request,$id) {
        $category = Category::find($id);;
        if(is_null($category)){
            return response()->json(['Message' => 'Not found'],404);
        }
        $category->update($request->all());
        return response()->json($category,200);
    }

    public function deleteCategory($id) {
        $category = Category::find($id);
        if(is_null($category)){
            return response()->json(['Message' => 'Not found'],404);
        }
        $category->delete();
        return response()->json(['Message' => 'Data remove succesfully'],200);
    }
}
