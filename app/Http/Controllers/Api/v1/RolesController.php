<?php

namespace App\Http\Controllers\Api\v1;

use App\Menu;
use App\Permission;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class RolesController extends Controller
{
    public function store(Request $request){

        $rolesRequest   = $request->input('roles');
        $roleName       = $request->input('name');
        $menus          = $request->input('menus');

        $menusValue = array();
        $roleValue = array();
      for($i = 0; $i < count($rolesRequest); $i++){
          $temp = $rolesRequest[$i];
          $roleValue[$i] = $temp['value'];
      }

      foreach ($menus as $key => $menu){
          $menusValue[$key] = $menu['value'];
      }

      $roles = new Role();
      $roles->name          = $roleName['value'];
      $roles->created_by    = 'respati';
      $roles->created_at    = '2018-02-18';
      $roles->modifier_by   = 'respati';
      $roles->modifier_at   = '2018-02-18';
      $roles->save();
      $roles->permission()->sync($roleValue);
      $getLastId = $roles->id;
      $insertMenu = Role::findOrFail($getLastId);
      $insertMenu->menu()->sync($menusValue);

      return response()->json([
          'message' => 'success',
          'data'    => $roles->permission()->get()
      ]);

    }

    public function index(){

        $roles = Role::paginate(15);
        $data = $roles->load(['Permission', 'menu']);

        return response()->json([
           'data' => $data,
        ]);
    }

    public function show($id){

        $roles = Role::find($id);
        $data = $roles->load(['Permission','Menu']);

        return response()->json(['data' => $data], Response::HTTP_OK);
    }


    public function update(Request $request, $id){

       $role = $request->input('role');
       $name = $request->input('name');
       $menu = $request->input('menu');

      $rolesArray = array();
      forEach($role as $key => $r){
        $rolesArray[$key] = $r['value'];
      }

      $menuArray = array();
      foreach ($menu as $key => $m) {
        $menuArray[$key] = $m['value'];
      }

        $post = Role::find($id);
        $post->update([
            'name' => $name['name']
        ]);

        $post->permission()->sync($rolesArray);
        $post->menu()->sync($menuArray);

        return response()->json('success', Response::HTTP_OK);
    }

    public function getMenus(){

        $menu = Menu::where('parent_id', '=',-1)->get();
        return response()->json($menu, Response::HTTP_OK);
    }
}
