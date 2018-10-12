<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Classes;

class ClassesController extends Controller
{

    public function index(){

        $classes = Classes::paginate(15);
        return response()->json([
            'data' => $classes
        ]);
    }

    public function store(Request $request){
        
        $classes = Classes::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json([
            'status' => 'success'
        ], Response::HTTP_ACCEPTED);
    }

    public function update(Request $request, $id){
        $classes = Classes::findOrFail($id);
        $classes->update([
            'name' => $request['name'],
            'description' => $request['description']
        ]);

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function show($id){

        $classes = Classes::findOrfail($id);
        return response()->json([
            'data' => $classes
        ], Response::HTTP_OK);
    }

    public function destroy($id){
        
        $classes = Classes::destroy($id);
        return response()->json([
            'status' => 'success'
        ]);
    }
}
