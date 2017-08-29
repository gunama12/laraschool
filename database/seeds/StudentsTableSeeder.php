<?php

use Illuminate\Database\Seeder;
use Faker\factory as Faker;
class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/*$faker = Faker::create();
    	for ($i=0; $i < 10 ; $i++) { 
    		# code...
    		  DB::table('students')->insert([
            'name' 				=> $faker->name,
            'account_number' 	=> $faker->text,
         
        ]);
    	}
        */

        $this->call(StudentsTableSeeder::class);
    }
}
