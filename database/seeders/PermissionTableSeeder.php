<?php

namespace Database\Seeders;

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
            'Roles','Roles List','Role Create','Role Edit','Role Delete',
            'Users','Users List','User Create','User Edit','User Delete',
            'Vendors','Vendors List','Vendor Create','Vendor Edit','Vendor Delete','Vendor Show',
            'Categories','Caegories List','Category Create','Category Show','Category Edit','Category Delete',
            'Materials','Materials List','Material Create','Material Show','Material Edit','Material Delete',
            'Machines','Machines List','Machine Create','Machine Show','Machine Edit','Machine Delete',
            'Technologies', 'Technologies List', 'Technology Create', 'Technology Show', 'Technology Edit', 'Technology Delete',
            'Ideas', 'Ideas List', 'Idea Create', 'Idea Show', 'Idea Edit', 'Idea Delete',
            /* 'Ideas', 'Ideas List', 'Idea Create', 'Idea Show', 'Idea Edit', 'Idea Delete', */
            'Projects', 'Projects List', 'Projects Create', 'Projects Show', 'Projects Edit', 'Projects Delete',
            'Investfields', 'Investfields List', 'Investfields Create', 'Investfields Show', 'Investfields Edit', 'Investfields Delete',
            'HS Codes', 'HS Codes List', 'HS Codes Create', 'HS Codes Edit', 'HS Codes Show',  'HS Codes Delete',
        ];
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
