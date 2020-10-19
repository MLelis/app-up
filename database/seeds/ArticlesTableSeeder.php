<?php

use Illuminate\Database\Seeder;
use Faker\Provider\pt_BR\Person;
use Faker\Provider\pt_BR\Internet;
use Faker\Provider\Color;
use Faker\Provider\Lorem;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {

            $data = [
                "name_car" => Person::firstNameMale(),
                "user_id" => 1,
                "link" => Internet::freeEmailDomain(),
                "year" => 1992,
                "fuel" => Lorem::word(),
                "doors" => 4,
                "mileage" => 150,
                "price" => 2500,
                "exchange" => Person::firstNameMale(),
                "color" => Color::colorName(),
                "created_at" => date('Y-m-d H:m:i')
            ];

            DB::table('articles')->insert($data);
        }
    }
}
