<?php

namespace Database\Seeders;

use App\Models\TaskStatus;
use Illuminate\Database\Seeder;

class TaskStatusSeeder extends Seeder
{
    public function run(): void
    {
        // 固定ステータスの配列
        $statuses = ['未着手', '進行中', '完了'];

        // 各ステータスをデータベースに挿入
        foreach ($statuses as $status) {
            TaskStatus::create(['name' => $status]);
        }
    }
}

