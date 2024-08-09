<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**,
 * @property int $id
 * @property int $task_id
 * @property string $action
 * @property string $detail
 */
class TaskHistory extends Model
{
    use HasFactory;

    protected $table = 'task_history';

    protected $fillable = ['task_id', 'action', 'detail', 'user_id'];
}
