<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Location;
use Illuminate\Http\Response;

class LocationsController extends Controller
{
     public function index(){

          $location = Location::paginate(15);

          return response()->json([
               'data' => $location
          ], Response::HTTP_OK);
    }

    public function store(Request $request){

          $location = Location::create(['name' => $request['name']]);

          return response()->json([
                'status' => 'success'
          ]);
    }

    public function show($id){

          $location = Location::findOrFail($id);

          return response()->json([
               'data' => $location
          ], Response::HTTP_OK);
    }

    public function destroy($id){

      $location = Location::destroy($id);

      return response()->json([
            'status' => 'success'
      ], Response::HTTP_OK);
    }
}
