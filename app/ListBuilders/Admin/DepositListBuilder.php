<?php

namespace App\ListBuilders\Admin;

use App\ListBuilders\ListBuilder;
use App\ListBuilders\ListBuilderColumn;
use App\Models\Deposit;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DepositListBuilder extends ListBuilder
{
    public static string $name = 'Buy';

    public static function query(array $extras = [], ?Request $request = null): Builder
    {
        $query = Deposit::with('member.user');

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
                filterType: ListBuilderColumn::TYPE_DATE_RANGE
            ),
            new ListBuilderColumn(
                name: 'Status',
                property: 'status',
                filterType: ListBuilderColumn::TYPE_SELECT,
                view: 'admin.deposit.datatable.status',
                options: Deposit::STATUSES,
                exportCallback: function ($model) {
                    return Deposit::STATUSES[$model->status];
                },
            ),
            new ListBuilderColumn(
                name: settings('member_name').' ID',
                property: 'member.code',
                filterType: ListBuilderColumn::TYPE_TEXT,
                canCopy: true,
            ),

            new ListBuilderColumn(
                name: settings('member_name').'name',
                property: 'member.user.name',
                filterType: ListBuilderColumn::TYPE_TEXT
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
                exportCallback: function ($model) {
                    return $model->euro_amount > 0 ? toHumanReadable($model->euro_amount) : '0';
                },
            ),
            new ListBuilderColumn(
                name: 'Amount ('.env('APP_CURRENCY').')',
                property: 'amount',
                filterType: ListBuilderColumn::TYPE_NUMBER_RANGE,
                exportCallback: function ($model) {
                    return $model->amount > 0 ? toHumanReadable($model->amount) : '0';
                },
            ),
            new ListBuilderColumn(
                name: 'Payment Gateway ID',
                property: 'pg_id',
                filterType: ListBuilderColumn::TYPE_TEXT,
                view: 'admin.deposit.datatable.pg-id',
            ),
        ];
    }
}
