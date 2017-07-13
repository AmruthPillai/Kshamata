<?php

use Illuminate\Database\Seeder;

class TrackRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 25;

        for ($i = 0; $i < $limit; $i++) {
            $dateTimeThisYear = $faker->dateTimeThisYear;
            DB::table('track_records')->insert([
                'employer_name' => $faker->name,
                'salary' => $faker->numberBetween(1000, 6000),
                'location' => $faker->latitude . ',' . $faker->longitude,
                'created_at' => $dateTimeThisYear,
                'updated_at' => $dateTimeThisYear,
            ]);
        }
    }
}
