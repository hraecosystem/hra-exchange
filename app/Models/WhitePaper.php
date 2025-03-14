<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * App\Models\WhitePaper
 *
 * @property int $id
 * @property int $status 1: Active, 2: In-Active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|WhitePaper newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WhitePaper newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WhitePaper query()
 * @method static \Illuminate\Database\Eloquent\Builder|WhitePaper whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhitePaper whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhitePaper whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhitePaper whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class WhitePaper extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    const MC_WHITE_PAPER = 'white_paper';

    protected $guarded = [];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(self::MC_WHITE_PAPER)
            ->singleFile();
    }
}
