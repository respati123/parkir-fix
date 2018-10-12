<?php
/**
 * Created by PhpStorm.
 * User: respati
 * Date: 10/08/18
 * Time: 18:24
 */

namespace App\Http\Controllers\Api\v1;


use App\Http\Controllers\Controller;
use App\Permission;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PermissionsController extends Controller
{

    public function index(){
        $permission = Permission::paginate(10);
        return response()->json($permission);
    }

    public function store(Request $request){

        date_default_timezone_set('Asia/Calcutta');

        $permission = new Permission();
        $permission->name = $request->input('name');
        $permission->created_at = "2018-08-01";
        $permission->created_by = "Respati";
        $permission->modifier_at = "2018-08-01";
        $permission->modifier_by = "respati";
        $permission->save();

        return response()->json([
            'messages' => 'success'
        ], Response::HTTP_ACCEPTED);
    }

    public function show($id){

        $permissions = Permission::findOrFail($id);

        return response()->json([
            'data' => $permissions,
        ]);
    }

    public function update(Request $request, $id){


        $permission = Permission::findOrFail($id);
        $permission->update([
            'name' => $request->input('name')
        ]);

        return response()->json([
            'message' => 'success'
        ], Response::HTTP_OK);
    }

    public function destroy($id){
        $permission = Permission::findOrFail($id);

        $permission->delete();

        return response()->json([
            'messages' => 'success delete',

        ], Response::HTTP_OK);
    }
}