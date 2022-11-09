<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class TaskFactory extends Factory
{
    protected $model = Task::class;
    public function definition()
    {
        return [
            'name' => $this->faker->words(3,true),
            'description' => $this->faker->words(50,true),
            'user_id' => User::all()->random()->id,
        ];
    }

}
