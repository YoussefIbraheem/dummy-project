<?php

namespace Database\Factories;

use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProviderFactory extends Factory
{
    protected $model = Provider::class;

    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
