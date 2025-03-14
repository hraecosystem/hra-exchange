<?php

namespace App\ListBuilders\Member;

use App\ListBuilders\ListBuilder;
use App\ListBuilders\ListBuilderColumn;
use App\Models\CoinWalletTransaction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CoinWalletTransactionListBuilder extends ListBuilder
{
    public static string $name = 'AVS Wallet Transactions';

    public static array $breadCrumbs = [
        'AVS Wallet Transactions',
    ];

    public static function query(array $extras = [], ?Request $request = null): Builder
    {

        return self::buildQuery(
            CoinWalletTransaction::whereMemberId($extras['member_id']),
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
                name: 'Total Amount ('.env('APP_CURRENCY').')',
                property: 'amount',
                filterType: ListBuilderColumn::TYPE_NUMBER_RANGE,
                view: 'member.coin-wallet-transactions.datatable.amount',

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
                view: 'member.coin-wallet-transactions.datatable.type',
                options: CoinWalletTransaction::TYPES,
                exportCallback: function ($model) {
                    return $model->present()->type();
                }
            ),
            new ListBuilderColumn(
                name: 'Remark',
                property: 'comment',
                filterType: ListBuilderColumn::TYPE_TEXT,
                view: 'member.coin-wallet-transactions.datatable.remark',
            ),
        ];
    }
}
