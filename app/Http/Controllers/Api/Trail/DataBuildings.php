<?php

namespace App\Http\Controllers\Api\Trail;

use App\Area;
use App\Tariff;
use App\Images;
use App\Building_tariff;
use App\Vehicle_area;
use App\VehicleTypes;
use Illuminate\Support\Facades\DB;


trait DataBuildings {

     public $id;
     public $combineData = array();

     public function getAllData($building_id){
          $this->id = $building_id;          
          return $this->getAreaRelation();
          // $combineData['tariffs'] = $this->getTariffRelation();
          // $combineData['images'] = $this->getImagesRelation();
          return $this->combineData;
     }

     private function getAreaRelation(){
          $areasTemp = [];
          // global $areas;
          $areas = Area::where('building_id','=',$this->id)->get();
          return $areas;
          // if(!is_null($areas)){
          //      foreach($areas as $key => $area){
          //           $areasTemp[$key]['id'] = $area['id'];
          //           $areasTemp[$key]['name'] = $area['name'];
          //           $vehicle_areas = Vehicle_area::where('area_id','=',$area['id'])->get();
          //           if(!is_null($vehicle_areas)){
          //                foreach($vehicle_areas as $vehicle){
          //                     $areasTemp[$key]['vehicle_area'] = array(['jumlah' => $vehicle['jumlah']]);
          //                     $vehicle_types = VehicleTypes::findOrFail($vehicle['id']);
          //                     if(!is_null($vehicle_types)){
          //                          // foreach($)
          //                     }

          //                }
          //           }
          //      }
          // }
     }
}