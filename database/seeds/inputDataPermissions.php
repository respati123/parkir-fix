<?php

use Illuminate\Database\Seeder;

class inputDataPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for($i = 0; $i <= 10000; $i++){

            $permissions = new \App\Permission();
            $permissions->name = "edit";
            $permissions->created_at = "2018-08-10";
            $permissions->created_by = "respati";
            $permissions->modifier_at = "2018-08-10";
            $permissions->modifier_by = "respati";
            $permissions->save();
        }
    }
}
