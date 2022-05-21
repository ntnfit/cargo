<?php
  
namespace Database\Seeders;

use App\Models\Customer;
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
        //    'role-list',
        //    'role-create',
        //    'role-edit',
        //    'role-delete',
        //    'order-list',
        //    'order-create',
        //    'order-edit',
        //    'order-delete',
        //    'infor-list',
        //    'infor-edit',
        //    'customer-list',
        //    'customer-edit',
        //    'customer-delete',
        //    'receiver-list',
        //    'receiver-edit',
        //    'receiver-delete'
        // 'agent-list',
        // 'agent-create',
        // 'agent-edit',
        // 'agent-delete',
        // 'user-list',
        // 'user-delete',
        'user-create'

           
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}