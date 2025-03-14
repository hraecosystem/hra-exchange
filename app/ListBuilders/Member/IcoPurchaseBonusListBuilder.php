<?php

namespace App\ListBuilders\Member;

use App\ListBuilders\ListBuilder;
use App\ListBuilders\ListBuilderColumn;
use App\Models\IcoBonus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class IcoPurchaseBonusListBuilder extends ListBuilder
{
    public static string $name = 'ICO Bonus';

    public static function query(array $extras = [], ?Request $request = null): Builder
    {
        $query = IcoBonus::with('member.user')
            ->where('member_id', $extras['member_id']);

        return self::buildQuery(
            $query,
            $request
        );
    }

    public static function columns(): array
    {
        return [
            new ListBuilderColumn(
                name: 'Date',
                property: 'created_at',
                filterType: ListBuilderColumn::TYPE_DATE_RANGE,
            ),
            new ListBuilderColumn(
                name: 'Coin Price (Euro)',
                property: 'coin_price',
                filterType: ListBuilderColumn::TYPE_NUMBER_RANGE,
                exportCallback: function ($model) {
                    return $model->coin_price > 0 ? toHumanReadable($model->coin_price) : '0';
                },
            ),
            new ListBuilderColumn(
                name: 'Amount (Euro)',
                property: 'euro_amount',
                filterType: ListBuilderColumn::TYPE_NUMBER_RANGE,
                viewCallback: function ($model) {
                    return $model->euro_amount > 0 ? toHumanReadable($model->euro_amount) : '0';
                },
                exportCallback: function ($model) {
                    return $model->euro_amount > 0 ? toHumanReadable($model->euro_amount) : '0';
                },
            ),
            new ListBuilderColumn(
                name: 'Amount ('.env('APP_CURRENCY').')',
                property: 'amount',
                filterType: ListBuilderColumn::TYPE_NUMBER_RANGE,
                viewCallback: function ($model) {
                    return $model->amount > 0 ? toHumanReadable($model->amount) : '0';
                },
                exportCallback: function ($model) {
                    return $model->amount > 0 ? toHumanReadable($model->amount) : '0';
                },
            ),
        ];
    }
}
