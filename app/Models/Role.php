<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon as SupportCarbon;

/**
 * App\Models\Role
 *
 * @method static EloquentBuilder|Role newModelQuery()
 * @method static EloquentBuilder|Role newQuery()
 * @method static EloquentBuilder|Role query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $role_name
 * @property SupportCarbon|null $created_at
 * @property SupportCarbon|null $updated_at
 * @method static EloquentBuilder|Role whereCreatedAt($value)
 * @method static EloquentBuilder|Role whereId($value)
 * @method static EloquentBuilder|Role whereRoleName($value)
 * @method static EloquentBuilder|Role whereUpdatedAt($value)
 */
class Role extends Model
{
    use HasFactory;
}
