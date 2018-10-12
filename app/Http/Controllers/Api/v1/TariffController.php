<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Tariff;
use App\VehicleTypes;
use App\Classes;

class TariffController extends Controller
{
    public function show($id){
        $tariff = Tariff::findOrfail($id);
        
        return response()->json([
            'data' => $tariff
        ], Response::HTTP_OK);
    }

    public function store(Request $request){
        $user = $request['user'];
        $tarr = $request['tariff'];
        $tariff = new Tariff();
        $tariff->create([
            'vehicle_types_id' => $tarr['vehicle'],
            'classes_id' => $tarr['classes'],
            'nominal' => $tarr['nominal'],
            'created_at' => "2018-08-09",
            'created_by' => $user,
            'modified_at' => "2018-08-09",
            'modified_by' => $user
        ]);

        return response()->json([
            'status' => 'success'
        ], Response::HTTP_CREATED);
    }
    
    public function update(Request $request, $id){
        // return $request->all();
        $tarr = $request['tariff'];
        $user = $request['user'];
        $tariff = Tariff::findOrFail($id);
        
        $tariff->update([
            'vehicle_id' => $tarr['vehicle'],
            'classes_id' => $tarr['classes'],
            'nominal'    => $tarr['nominal'],
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $user,
            'modified_at' => date('Y-m-d'),
            'modified_by' => $user
        ]);

        return response()->json([
            'status' => 'success'
        ], Response::HTTP_OK);
    }

    public function index(){
        $tariffs = Tariff::paginate(15);
        $tariffs->load(['VehicleTypes','Classes']);
        return response()->json([
            'data' => $tariffs 
        ], Response::HTTP_ACCEPTED);
    }

    public function destroy($id){
        $tariffs = Tariff::destroy($id);

        return response()->json([
            'status' => 'success'
        ], Response::HTTP_ACCEPTED);
    }

    public function getTariff(Request $request){
        global $vehicle_id;
        global $classes_id;
        $vehicle_id = $request['vehicle_id'];
        $classes_id = $request['classes_id'];

        $tariff = Tariff::where([
            ['vehicle_types_id','=',$vehicle_id],
            ['classes_id','=',$classes_id]
        ])->with(['VehicleTypes' => function($query){
            global $vehicle_id;
            $query->where('id','=',$vehicle_id)->get();
        }])->with(['Classes' => function($query){
            global $classes_id;
            $query->where('id','=',$classes_id)->get();
        }])->get();
        
        return response()->json([
            'data' => $tariff
        ], Response::HTTP_OK);
    }
}
