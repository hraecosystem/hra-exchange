<?php

namespace App\Models;

use App\Presenters\WebSettingPresenter;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\WebSetting
 *
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 *
 * @method static Builder|WebSetting newModelQuery()
 * @method static Builder|WebSetting newQuery()
 * @method static Builder|WebSetting query()
 *
 * @mixin Eloquent
 */
class WebSetting extends Model implements HasMedia
{
    use InteractsWithMedia, PresentableTrait;

    const MC_LOGO = 'logo';

    const MC_WHITE_LOGO = 'logo';

    const MC_FAVICON = 'favicon';

    const MC_ADMIN_BACKGROUND = 'Admin-Background';

    const MC_MEMBER_BACKGROUND = 'Member-Background';

    protected $guarded = [];

    protected string $presenter = WebSettingPresenter::class;
}
