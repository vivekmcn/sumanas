<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = array(
    				[
			            'name' => 'Product 1',
			            'price' => 99.99,
			            'description' => 'This is the first product',
			            'status' => 1,
			            'is_active' => 1,
			            'created_at' => date("Y-m-d h:i:s"),
			            'updated_at' => date("Y-m-d h:i:s")
		        	],
		        	[
		        		'name' => 'Product 2',
			            'price' => 91.99,
			            'description' => 'This is the second product',
			            'status' => 1,
			            'is_active' => 1,
			            'created_at' => date("Y-m-d h:i:s"),
			            'updated_at' => date("Y-m-d h:i:s")
		        	],
		        	[
		        		'name' => 'Product 3',
			            'price' => 9.99,
			            'description' => 'This is the third product',
			            'status' => 1,
			            'is_active' => 1,
			            'created_at' => date("Y-m-d h:i:s"),
			            'updated_at' => date("Y-m-d h:i:s")
		        	],
		        	[
		        		'name' => 'Product 4',
			            'price' => 999.99,
			            'description' => 'This is the fourth product',
			            'status' => 1,
			            'is_active' => 1,
			            'created_at' => date("Y-m-d h:i:s"),
			            'updated_at' => date("Y-m-d h:i:s")
		        	],
		        	[
		        		'name' => 'Product 5',
			            'price' => 99.99,
			            'description' => 'This is the fifth product',
			            'status' => 1,
			            'is_active' => 1,
			            'created_at' => date("Y-m-d h:i:s"),
			            'updated_at' => date("Y-m-d h:i:s")
		        	],
		        	[
		        		'name' => 'Product 6',
			            'price' => 99.99,
			            'description' => 'This is the sixth product',
			            'status' => 1,
			            'is_active' => 1,
			            'created_at' => date("Y-m-d h:i:s"),
			            'updated_at' => date("Y-m-d h:i:s")
		        	]
    			);
		DB::table('products')->insert($data);
    }
}
