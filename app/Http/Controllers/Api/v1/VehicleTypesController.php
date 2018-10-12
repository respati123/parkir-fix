<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\VehicleTypes;
use Illuminate\Http\Response;

class VehicleTypesController extends Controller
{
    public function index(){
        $vehicleTypes = VehicleTypes::paginate(15);
        return response()->json([
            'data' => $vehicleTypes
        ], Response::HTTP_OK);
    }

    public function store(Request $request){

        $vehicleTypes = new VehicleTypes();
        $vehicleTypes->create([
            'name' => $request['name'],
            'description' => $request['description']
        ]);

        return response()->json([
            'status' => 'success'
        ], Response::HTTP_CREATED);
    }

    public function show($id){

        $vehicleTypes = VehicleTypes::findOrFail($id);

        return response()->json([
            'data' => $vehicleTypes
        ], Response::HTTP_OK);
    }

    public function update(Request $request, $id){

        $vehicleTypes = VehicleTypes::findOrfail($id);

        $vehicleTypes->update([
            'name' => $request['name'],
            'description' => $request['description']
        ]);

        return response()->json([
            'status' => 'success'
        ], Response::HTTP_OK);
    }
}
