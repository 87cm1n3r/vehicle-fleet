<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vehicle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->word(),
            'registration_number'=>$this->faker->regexify('[A-Z]{2,3} [0-9A-Z]{3,5}'),
            'mileage'=>$this->faker->randomNumber(5, false)
        ];
    }
}
