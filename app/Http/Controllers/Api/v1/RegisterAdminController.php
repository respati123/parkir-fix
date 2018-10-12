<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Validator;
use App\User;
use App\Role;
use App\Menu;

use Illuminate\Support\Facades\Hash;




class RegisterAdminController extends Controller
{   

    // public function __construct()
    // {
    //     $this->middleware('isAdmin');
    // }

    public function register(Request $request){
        $validate = Validator::make($request->all(), [
            'email' => 'required|email|unique:users|string|max:30',
            'username' => 'required|unique:users',
            'password' => 'required'
        ]);
        if ($validate->fails()) {
            return response()->json([
                'status' => 'error',
                'error' => $validate->errors()
            ], Response::HTTP_OK);
        } else {
            $this->user = new User();
            $role = new Role();
            $role->name = "admin";
            $role->created_by = "admin";
            $role->created_at = "2018-09-09";
            $role->modifier_by = "admin";
            $role->modifier_at = "2018-09-09";
            $role->save();

            $user = new User();
            $user->name = $request['username'];
            $user->username = $request['username'];
            $user->email = $request['email'];
            $user->password = Hash::make($request['password']);
            $user->created_by = "admin";
            $user->created_at = "2018-09-09";
            $user->modifier_by = "admin";
            $user->modifier_at = "2018-09-09";
            $user->save();

            $setRelation = User::find($user->id);
            $setRelation->role()->attach([$role->id]);

            $menu = new Menu();
            $menu->name = "Super User";
            $menu->parent_id = -1;
            $menu->created_at = "2018-09-19";
            $menu->created_by = "admin";
            $menu->modifier_at = "2018-08-18";
            $menu->modifier_by = "admin";
            $menu->save();

            $id_menu = $menu->id;

            $child = ['Users','Roles','Permissions','Menus'];
            $arrayId = array();
            for($i = 0; $i < count($child); $i++){
                $menuChild = new Menu();
                $menuChild->name = $child[$i];
                $menuChild->parent_id = $id_menu;
                $menuChild->created_at = "2018-09-19";
                $menuChild->created_by = "Admin";
                $menuChild->modifier_at = "2018-09-19";
                $menuChild->modifier_by = "Admin";
                $menuChild->save();
                array_push($arrayId, $menuChild->id);
            }

            $menu_role = Role::findOrFail($role->id);
            $menu_role->menu()->attach($arrayId);

            $parking = new Menu();
            $parking->name = "Parkings";
            $parking->parent_id = -1;
            $parking->created_at = "2018-09-19";
            $parking->created_by = "admin";
            $parking->modifier_at = "2018-08-18";
            $parking->modifier_by = "admin";
            $parking->save();

            $parkir_child = ['Classes','Building','Categories','Location'];
            $parkirArray = array();
            for($i = 0; $i < count($parkir_child); $i++){
                $menuParkirChild = new Menu();
                $menuParkirChild->name = $parkir_child[$i];
                $menuParkirChild->parent_id = $parking->id;
                $menuParkirChild->created_at = "2018-09-19";
                $menuParkirChild->created_by = "Admin";
                $menuParkirChild->modifier_at = "2018-09-19";
                $menuParkirChild->modifier_by = "Admin";
                $menuParkirChild->save();
                array_push($parkirArray, $menuParkirChild->id);
            }
            $menu_role->menu()->attach($parkirArray);

            $customers = new Menu();
            $customers->name = "Customers";
            $customers->parent_id = -1;
            $customers->created_at = "2018-09-19";
            $customers->created_by = "admin";
            $customers->modifier_at = "2018-08-18";
            $customers->modifier_by = "admin";
            $customers->save();

            $customers_child = ['List customer','Loyalty'];
            $customersArray = array();
            for($i = 0; $i < count($customers_child); $i++){
                $menuCustomersChild = new Menu();
                $menuCustomersChild->name = $customers_child[$i];
                $menuCustomersChild->parent_id = $customers->id;
                $menuCustomersChild->created_at = "2018-09-19";
                $menuCustomersChild->created_by = "Admin";
                $menuCustomersChild->modifier_at = "2018-09-19";
                $menuCustomersChild->modifier_by = "Admin";
                $menuCustomersChild->save();
                array_push($customersArray, $menuCustomersChild->id);
            }
            $menu_role->menu()->attach($customersArray);


            $vehicles = new Menu();
            $vehicles->name = "Vehicles";
            $vehicles->parent_id = -1;
            $vehicles->created_at = "2018-09-19";
            $vehicles->created_by = "admin";
            $vehicles->modifier_at = "2018-08-18";
            $vehicles->modifier_by = "admin";
            $vehicles->save();

            $vehicles_child = ['Vehicle Types'];
            $vehiclesArray = array();
            for($i = 0; $i < count($vehicles_child); $i++){
                $menuvehiclesChild = new Menu();
                $menuvehiclesChild->name = $vehicles_child[$i];
                $menuvehiclesChild->parent_id = $vehicles->id;
                $menuvehiclesChild->created_at = "2018-09-19";
                $menuvehiclesChild->created_by = "Admin";
                $menuvehiclesChild->modifier_at = "2018-09-19";
                $menuvehiclesChild->modifier_by = "Admin";
                $menuvehiclesChild->save();
                array_push($vehiclesArray, $menuvehiclesChild->id);
            }
            $menu_role->menu()->attach($vehiclesArray);


            $financial = new Menu();
            $financial->name = "Financials";
            $financial->parent_id = -1;
            $financial->created_at = "2018-09-19";
            $financial->created_by = "admin";
            $financial->modifier_at = "2018-08-18";
            $financial->modifier_by = "admin";
            $financial->save();

            $financial_child = ['Tariff'];
            $financialArray = array();
            for($i = 0; $i < count($financial_child); $i++){
                $menufinancialChild = new Menu();
                $menufinancialChild->name = $financial_child[$i];
                $menufinancialChild->parent_id = $financial->id;
                $menufinancialChild->created_at = "2018-09-19";
                $menufinancialChild->created_by = "Admin";
                $menufinancialChild->modifier_at = "2018-09-19";
                $menufinancialChild->modifier_by = "Admin";
                $menufinancialChild->save();
                array_push($financialArray, $menufinancialChild->id);
            }
            $menu_role->menu()->attach($financialArray);



            return response()->json([
                'status' => 'success'
            ], Response::HTTP_OK);

        }
       
    }
}
