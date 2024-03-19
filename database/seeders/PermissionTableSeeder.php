<?php



namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;



class PermissionTableSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()

    {

        $permissions = [

            'login.perform',
            'login.index',
            'logout.perform',
            'register.perform',
            'register.index',
            'roles-list',
            'roles-show',
            'roles-create',
            'roles-edit',
            'roles-delete',
            'permissions-list',
            'permissions-show',
            'permissions-create',
            'permissions-edit',
            'permissions-delete',
            'users-list',
            'user-show',
            'users-create',
            'users-edit',
            'users-delete',
            'dashboard'

        ];



        foreach ($permissions as $permission) {

            $per = Permission::create(['name' => $permission]);
        }

        $getPermissions = Permission::all();
        foreach ($getPermissions as $permission) {

            DB::table('role_has_permissions')->insert(['role_id' => 1, 'permission_id' => $permission->id]);
        }
    }
}
