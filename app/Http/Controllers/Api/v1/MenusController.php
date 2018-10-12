<?php

namespace App\Http\Controllers\Api\v1;

use App\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class MenusController extends Controller
{
    public function index(){

        $temp = array();
        $dataArray = array();
        $parentArray = array();
        $menu = Menu::where('parent_id','=',-1)->paginate(15);
        // return $menu[1];
        for($i = 0; $i < count($menu); $i++){
            $id = $menu[$i]['id'];
            $subMenu = Menu::where('parent_id','=',$id)->get();
            if(count($subMenu) > 0){
                $menu[$i]['sub'] = [];
                for($k = 0; $k < count($subMenu); $k++){
                    $menu[$i]['sub'] = $subMenu;
                }
            }
            continue;
        }
        return response()->json([
            $menu
        ], Response::HTTP_ACCEPTED);
    }

    public function store(Request $request){

        $name       = $request->input('name');
        $value     = $request->input('value');

        // $createUrl = $this->createUrl($name);

        Menu::create([
            'name' => $name,
            'parent_id' => $value,
            'created_by' => 'respati',
            'created_at' => '2018-08-01',
            'modifier_by' => 'respati',
            'modifier_at' => '2018-08-01',
        ]);

        return response()->json([
            'success',
        ], Response::HTTP_OK);
    }

    public function update(Request $request, $id){
        $menus = $request['subs'];
        $users = $request->input('users');
        // return $menus;
        $newMenu = array();
        // $updateUser = User::findOrDie($id);

        foreach($menus as $menu){
            if($menu['database'] == false){
                $create = new Menu();
                $create->name = $menu['name'];
                $create->parent_id = $id;
                $create->created_at = $menu['created_at'];
                $create->created_by = $menu['created_by'];
                $create->modifier_at = $menu['modifier_at'];
                $create->modifier_by = $menu['modifier_by'];
                $create->save();
                // array_push($newMenu, $create->id);
            }
        }

        $menusParent = Menu::findOrFail($id);
        $menusParent->update([
            'name' => $users['name']
        ]);

        return $newMenu;
    }

    public function deleteMenus($id, $array){
        
    }

    public function show($id){
        
        $temp = array(); 
        $menu = Menu::findOrFail($id);
        $subMenu = Menu::where('parent_id','=',$id)->get();
        if(count($subMenu) > 0){
            foreach ($subMenu as $key => $sub) {
                $temp['sub'][$key] = $sub;
        // return $key;
            } 
        } else {
           $temp['sub'] = [];
        }
        $temp['user'] = $menu;
        return response()->json([
            'menu' => $temp
        ], Response::HTTP_ACCEPTED);
    }

    public function getLastId(){
        $lastId = Menu::orderBy('id', 'DESC')->first();
        return response()->json([
            'id'=> $lastId
        ], Response::HTTP_OK);
    }
}
