<?php

namespace App\ListBuilders\Admin;

use App\ListBuilders\ListBuilder;
use App\ListBuilders\ListBuilderColumn;
use App\Models\CoinWalletTransaction;
use App\Models\EuroWalletTransaction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CoinWalletTransactionListBuilder extends ListBuilder
{
    public static string $name = 'Wallet Transactions';

    public static function query(array $extras = [], ?Request $request = null): Builder
    {
        $query = CoinWalletTransaction::with('member.user');

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
                name: settings('member_name').' ID',
                property: 'member.code',
                filterType: ListBuilderColumn::TYPE_TEXT,
                canCopy: true
            ),
            new ListBuilderColumn(
                name: settings('member_name').'name',
                property: 'member.user.name',
                filterType: ListBuilderColumn::TYPE_TEXT
            ),
            new ListBuilderColumn(
                name: 'Total Amount ('.env('APP_CURRENCY').')',
                property: 'amount',
                filterType: ListBuilderColumn::TYPE_NUMBER_RANGE,
            ),
            //            new ListBuilderColumn(
            //                name: 'Total Amount ($)',
            //                property: 'euro_amount',
            //                filterType: ListBuilderColumn::TYPE_NUMBER_RANGE,
            //            ),
            //            new ListBuilderColumn(
            //                name: 'Service Charge ('.env('APP_CURRENCY').')',
            //                property: 'service_charge',
            //                filterType: ListBuilderColumn::TYPE_NUMBER_RANGE,
            //            ),
            //            new ListBuilderColumn(
            //                name: 'Net Amount ('.env('APP_CURRENCY').')',
            //                property: 'total',
            //                filterType: ListBuilderColumn::TYPE_NUMBER_RANGE,
            //            ),
            new ListBuilderColumn(
                name: 'Type',
                property: 'type',
                filterType: ListBuilderColumn::TYPE_SELECT,
                view: 'admin.coin-wallet-transactions.datatable.type',
                options: EuroWalletTransaction::TYPES,
                exportCallback: function ($model) {
                    return $model->present()->type();
                }
            ),
            new ListBuilderColumn(
                name: 'Remark',
                property: 'comment',
                filterType: ListBuilderColumn::TYPE_TEXT,
                view: 'admin.coin-wallet-transactions.datatable.remark',
            ),
        ];
    }
}
