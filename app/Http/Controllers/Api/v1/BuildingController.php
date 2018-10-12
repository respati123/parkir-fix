<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Building;
use App\Images;
use App\Area;
use App\Vehicle_area;
use App\Building_tariff;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\Trail\DataBuildings;


class BuildingController extends Controller
{
    use DataBuildings;

    public function index() {
        $buildings = Building::all();
        if(!is_null($buildings)){
            foreach($buildings as $building){
                return response()->json($this->getAllData($building->id));
            }
        }
    }
    public function store(Request $request){
            $images   = $request['images'];
            $areas    = $request['areas'];
            $tariffs  = $request['tariffs'];
        //   return $tariffs;
            $buildings = Building::create([
                'name' => $request['name'],
                'categories_id' => $request['categories'],
                'location_id' => $request['locations'],
                'alamat' => $request['alamat'],
                'lat'    => $request['lat'],
                'lng'     => $request['lng'],
            ]);

            if(!is_null($images)){
                foreach($images as $image){
                        $imageBase = $image;  // your base64 encoded
                        $imageBase = str_replace('data:image/png;base64,', '', $imageBase);
                        $imageBase = str_replace(' ', '+', $imageBase);
                        $imageName = str_random(10).'.'.'png';
                        \File::put(storage_path(). '/images/' . $imageName, base64_decode($imageBase));

                        $this->setInputImages($buildings->id, $image);

                }
            }

            if(!is_null($areas)){
                foreach($areas as $area){

                        $model = Area::create([
                            'name' => $area['name'],
                            'building_id' => $buildings->id
                        ]);
                        $this->setInputVehicleArea($model->id, $area['count']);
                }
            }

            if(!is_null($tariffs)){
                foreach($tariffs as $tariff){

                    $model = Building_tariff::create([
                        'building_id' => $buildings->id,
                        'tariff_id' => $tariff['id_tariff']
                    ]);
                }
            }

            return response()->json([
                'status' => 'success'
            ], Response::HTTP_CREATED);




          // $buildings = Building::create([
          //      'name' => $request['name'],
          //      'categories_id' => $request['categories'],
          //      'location_id' => $request['location'],
          //      'alamat' => $request['alamat'],
          //      'lat'    => $request['lat'],
          //      'lng'     => $request['lng'],
          // ]);
          
     }

     private function setInputImages($id, $images){

          $image = Images::create([
               'building_id' => $id,
               'path_name' => $images,
          ]);
          
     }

     private function setInputVehicleArea($id_area, $counts){

          if(!is_null($counts)){
               foreach($counts as $count){
                    $model = Vehicle_area::create([
                         'area_id' => $id_area,
                         'vehicle_id' => $count['vehicle'],
                         'jumlah' => $count['jumlah']
                    ]);
               }
          }
     }
}
