<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),  // ユーザーID
            'team_id' => Team::factory(),  // チームID（nullable）
            'title' => $this->faker->sentence, // タイトル
            'description' => $this->faker->paragraph, // 説明
            'status_id' => $this->faker->numberBetween(1, 3), // ステータスID
            'due_date' => $this->faker->dateTimeBetween('+1 week', '+1 month') // 期限日
        ];
    }
}

