<?php

namespace App\Http\Controllers\Api\Trail;

use App\Menu;
use App\Permission;
use App\Role;
use Illuminate\Support\Facades\Session;
use App\User;

trait DataUser {

    private $user = array();
    private $roles;

    public function getAllDataUser($idUser){
        $user = User::findOrFail($idUser);
        // return $user->load('Role');
        $this->roles = $user->role;
        // return $this->roles;
        // if(count($this->roles) > 0) {
        return $this->getRelationDataFromRole();
        // } else {
        //     foreach($this->roles as $role){
        //         if($role->name == 'admin'){
                    
        //         }
        //     }
        // }
    }

    private function getRelationDataFromRole(){

        // return $this->getMenus();
        $arrayFromRoleData = array();
        $arrayFromRoleData['permissions'] = $this->getPermissions();
        $arrayFromRoleData['menus'] = $this->getMenus();

        return $arrayFromRoleData;
    }

    private function getPermissions(){

        $arrayPermission = array();
        foreach($this->roles as $role){
            if($role->name == "admin"){
                return $permission = Permission::all(['id','name']);
            } else {

                $modelRole = Role::findOrFail($role->id);
                
                if(count($modelRole->permission) > 0){
                    foreach($modelRole->permission as $permission){
                        array_push($arrayPermission, array(
                            'id' => $permission->id, 
                            'name' => $permission->name
                        ));
                    }
                    continue;
                }
                continue;
            }
        }
        return $this->multi_array_value($arrayPermission, 'id');
    }

    private function getMenus(){

        $arrayMenus = array();
        foreach($this->roles as $role){
            if($role->name == 'admin'){
                $menu = Menu::where('parent_id', '=', -1)->get(['id', 'name', 'parent_id']);
                foreach($menu as $m){
                    array_push($arrayMenus, array(
                        'id' => $m->id,
                        'name' => $m->name,
                        'parent_id' => $m->parent_id,
                        'sub'       => array()
                    ));
                }
                return $this->setSubsMenu($arrayMenus);
            } else {

                $modelRole = Role::findOrFail($role->id);
                if(count($modelRole->menu) > 0){
                    foreach($modelRole->menu as $menu){
                        array_push($arrayMenus, array(
                            'id' => $menu->id,
                            'name' => $menu->name,
                            'sub' => array()
                        ));
                    }
                }
            }
        }
        return $this->setSubsMenu(
            $this->multi_array_value($arrayMenus, 'id')
        );

    }

    private function setSubsMenu($parent){
        $arrayPermissionSub = Menu::where('parent_id','!=',-1)->get(['id','name','parent_id']);
        $i = 0;
        foreach($parent as $p){
           foreach($arrayPermissionSub as $sub){
               if($p['id'] === $sub->parent_id){
                   array_push($parent[$i]['sub'], $sub);
               }
           }
           $i++;
        }
        return $parent;
    }

    private function multi_array_value($array, $key){
        
        $temp_array = array();
        $key_array = array();
        $k = 0;

        for($i = 0; $i < count($array); $i++){
            if(!in_array($array[$i][$key], $key_array)){
                $key_array[$k] = $array[$i][$key];
                $temp_array[$k] = $array[$i]; 
                $k++;
            }
        }
        return $temp_array;
    }
}
