<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    protected $model = Service::class;

    public function definition(): array
    {

        return [
            'title' => [
                'en' => $this->faker->word,
                'ar' => $this->faker->word,
            ],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
