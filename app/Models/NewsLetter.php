<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\NewsLetter
 *
 * @property int $id
 * @property string $email
 * @property string|null $ip
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|NewsLetter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsLetter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsLetter query()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsLetter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsLetter whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsLetter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsLetter whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsLetter whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class NewsLetter extends Model
{
    use HasFactory;

    protected $guarded = [];
}
