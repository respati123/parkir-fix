<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Response;


class CategoriesController extends Controller
{
    public function index(){
        $category = Category::paginate(15);
        return response()->json([
            'data' => $category
        ], Response::HTTP_OK);
    }

    public function store(Request $request){
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return response()->json([
            'status' => 'success'
        ], Response::HTTP_OK);
    }

    public function show($id){
        $category = Category::findOrFail($id);
        
        return response()->json([
            'data' => $category
        ], Response::HTTP_OK);
    }

    public function update(Request $request, $id){
        $category = Category::findOrFail($id);

        $category->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json([
            'status' => 'success'
        ], Response::HTTP_OK);
    }

    public function destroy($id){
        
        $classes = Category::destroy($id);
        return response()->json([
            'status' => 'success'
        ]);
    }
}
