<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */ 
    public function run(): void
    {
        for($i=0;$i<=100;$i++){
        $faker = Faker::create();
        $customer = new Customer;
        $customer->name = $faker->name;
        $customer->email = $faker->email; 
        $customer->address = $faker->address; 
        $customer->gender = 'male'; 
        $customer->city = $faker->city; 
        $customer->state = $faker->state; 
        $customer->number = rand(0,10); 
        $customer->password=md5($faker->password);
        $customer->confirm_password=md5($faker->password);
        $customer->date = $faker->date; 
        $customer->save();
        }
    }
}
