<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Task
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $team_id
 * @property string $title
 * @property string $description
 * @property int $status_id
 * @property string|null $due_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\TaskStatus|null $status
 * @property-read \App\Models\Team|null $team
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\TaskFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task query()
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereUserId($value)
 * @method static array<string, string> validationRules() バリデーションルールを返す
 * @mixin \Eloquent
 */
class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'status_id',
        'due_date',
        'user_id',
        'team_id'
    ];
    /**
     * @return array<string,string>
     */
    public static function validationRules(): array
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
