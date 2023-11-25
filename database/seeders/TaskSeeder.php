<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        // 例えば50件のタスクを生成
        Task::factory(50)->create();
    }
}

