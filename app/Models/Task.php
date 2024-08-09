<?php

namespace App\Models;

use App\Traits\ApiFormatTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**,
 * @property string $id
 * @property string $title
 * @property string $description
 * @property string $status
 * @property int $user_id

 */
class Task extends Model
{
    use ApiFormatTrait;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tasks';

    protected $fillable = ['title', 'description', 'status', 'user_id'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
