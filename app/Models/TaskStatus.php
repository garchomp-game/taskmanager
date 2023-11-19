<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
        /**
     * このステータスに関連するタスクのコレクションを取得します。
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->hasMany(Task::class);
    }
}
