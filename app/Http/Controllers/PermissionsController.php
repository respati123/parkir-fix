<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;




class PermissionsController extends Controller
{

    public function permissionPost(Request $request){


        date_default_timezone_set('Asia/Calcutta');

        $permissions = new Permission();
        $permissions->name = $request->input('name');
        $permissions->created_at = "2018-08-01";
        $permissions->created_by = "Respati";
        $permissions->modifier_at = "2018-08-01";
        $permissions->modifier_by = "Respati";
        $permissions->save();

        return response()->json('success');
    }

    public function permissionGet(){

        $permission = Permission::all();
        return response()->json(['data' => $permission], 200);
    }

    public function checkIsAdmin(){

        if(User::all()->count() > 0){

            return response()->json([
                'status' => false
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'status' => 'true'
            ]);
        }
    }
}
