<?php

use Illuminate\Database\Seeder;

class RolePermissionAddTabel extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('roles')->insert([
		[
		  'name'  =>'ss',
		  'permissions'=>'"name":"BeJson","url":"http://www.bejson.com","page":88,"isNonProfit":true',
		]
		]);
    }
}
#php artisan db:seed --class=RolePermissionAddTabel