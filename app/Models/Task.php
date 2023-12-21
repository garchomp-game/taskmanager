<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'status_id',
        'due_data',
        'user_id',
        'team_id'
    ];

    public static function validationRules()
    {
        return [
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'status_id'   => 'required|integer|exists:task_statuses,id',
            'due_date'    => 'nullable|date',
        ];
    }


    /**
     * このタスクを所有しているユーザーを取得します。
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * このタスクが属しているチームを取得します。
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team(): \Illuminate\Database\Eloquent\Relations\BelongsTo

    {
        return $this->belongsTo(Team::class);
    }

    /**
     * このタスクの現在のステータスを取得します。
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TaskStatus::class, 'status_id');
    }
}
