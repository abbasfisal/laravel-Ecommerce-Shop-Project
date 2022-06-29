<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\City;
use App\Models\Color;
use App\Models\Size;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{


    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        // \App\Models\User::factory(10)->create();


        $this->createAdmin();

        $this->makeCategory();

        $this->createSize();


        $this->createColors();

        $this->makeCityWithState();

        Schema::enableForeignKeyConstraints();

    }

    /**
     * create city with its states
     * @param int $cityCount
     * @param int $stateMinCount
     * @param int $stateMaxCount
     */
    private  function makeCityWithState($cityCount = 30, $stateMinCount = 5, $stateMaxCount = 15)
    {
        City::truncate();

        City::factory($cityCount)
            ->hasstates(rand($stateMinCount, $stateMaxCount))
            ->create();
        $this->command->info('Cities with its States just Seeded');

    }


    /**
     * create main category with its subcategories
     * @param int $MainCount
     * @param int $SubMinCount
     * @param int $SubMaxCount
     */
    private  function makeCategory($MainCount = 5, $SubMinCount = 2, $SubMaxCount = 6)
    {
        Category::truncate();
        Category::factory($MainCount)
                ->hassubcategories(rand($SubMinCount, $SubMaxCount))
                ->create();
        $this->command->info('Categories with its sub categories just Seeded');

    }

    /**
     * create size dummy data
     */
    private function createSize(): void
    {
        Size::truncate();
        $this->call(SizeSeeder::class);
        $this->command->info('Sizes just Seeded');
    }

    private function createColors(): void
    {
        Color::truncate();
        Color::factory(20)
             ->create();
        $this->command->info('Colors just Seeded');

    }

    private function createAdmin(): void
    {
        User::truncate();
        $this->call(AdminSeeder::class);
        $this->command->info('Admin just Seeded');

    }

}
