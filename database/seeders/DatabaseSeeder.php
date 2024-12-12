<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Car;
use App\Models\CarImage;
use App\Models\CarType;
use App\Models\City;
use App\Models\FuelType;
use App\Models\Maker;
use App\Models\Model;
use App\Models\State;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        CarType::factory()->sequence(
            ['name' => 'Sedan'],
            ['name' => 'Hutchback'],
            ['name' => 'Suv'],
            ['name' => 'Pickup Truck'],
            ['name' => 'Minivan'],
            ['name' => 'Jeep'],
            ['name' => 'Coupe'],
            ['name' => 'Crossover'],
            ['name' => 'Sports Car'],
        )->count(9)->create();

        FuelType::factory()->sequence(
            ['name' => 'Gasoline'],
            ['name' => 'Diesel'],
            ['name' => 'Electric'],
            ['name' => 'Hybrid'],
        )->count(4)->create();

        $states = [
            'California' => ['Los Angeles', 'Sans Francisco', 'San Diego'],
            'Texas' => ['Houston', 'Sans Francisco', 'San Diego'],
            'Florida' => ['Miami', 'Sans Francisco', 'San Diego'],
            'New York' => ['New York city', 'Sans Francisco', 'San Diego'],
            'Illinois' => ['Chicago', 'Sans Francisco', 'San Diego'],
            'Pennsylvania' => ['Philadelphia', 'Sans Francisco', 'San Diego'],
            'Ohio' => ['Columbus', 'Sans Francisco', 'San Diego'],
            'Georgia' => ['Atlanta', 'Sans Francisco', 'San Diego'],
            'North Carolina' => ['Charlotte', 'Sans Francisco', 'San Diego'],
            'Michigan' => ['Detroit', 'Sans Francisco', 'San Diego'],

        ];
        foreach ($states as $state => $cities) {
            State::factory()
                ->state(['name' => $state])
                ->has(
                    City::factory()
                        ->count(count($cities))
                        ->sequence(
                            ...array_map(fn($city) => ['name' => $city], $cities)
                        )
                )->create();
        };

        $makers = [
            'Toyota' => ['Camry', 'Corolla', 'Highlander'],
            'Ford' => ['F-150', 'Escape', 'Explorer'],
            'Honda' => ['Civic', 'Accord', 'CR-V'],
            'Chevrolet' => ['Silverado', 'Equinox', 'Malibu'],
            'Nissan' => ['Altima', 'Sentra', 'Rogue'],
            'Lexus' => ['RX400', 'RX450', 'RX350'],
        ];
        foreach ($makers as $maker => $models) {
            Maker::factory()
                ->state(['name' => $maker])
                ->has(
                    Model::factory()
                        ->count(count($models))
                        ->sequence(...array_map(fn($model) => ['name' => $model], $models))
                )->create();
        };
        User::factory()
            ->count(3)
            ->create();
        User::factory()
            ->count(2)
            ->has(
                Car::factory()
                ->count(50)
                ->has(
                    CarImage::factory()
                    ->count(5)
                    ->sequence(fn(Sequence $sequence)=>['position'=>$sequence->index % 5 + 1]),
                    'images'
                )
                ->hasFeatures()
                ,'favouriteCars'
            )->create();
    }
}
