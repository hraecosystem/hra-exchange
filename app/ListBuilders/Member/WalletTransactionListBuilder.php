<?php

namespace App\ListBuilders\Member;

use App\ListBuilders\ListBuilder;
use App\ListBuilders\ListBuilderColumn;
use App\Models\EuroWalletTransaction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class WalletTransactionListBuilder extends ListBuilder
{
    public static string $name = 'Wallet Transactions';

    public static array $breadCrumbs = [
        'Euro Wallet Transactions',
    ];

    public static function query(array $extras = [], ?Request $request = null): Builder
    {

        return self::buildQuery(
            EuroWalletTransaction::whereMemberId($extras['member_id']),
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
                name: 'Total Amount (Euro)',
                property: 'amount',
                filterType: ListBuilderColumn::TYPE_NUMBER_RANGE,
                view: 'member.coin-wallet-transactions.datatable.amount',
            ),
            new ListBuilderColumn(
                name: 'Type',
                property: 'type',
                filterType: ListBuilderColumn::TYPE_SELECT,
                view: 'member.wallet-transactions.datatable.type',
                options: EuroWalletTransaction::TYPES,
                exportCallback: function ($model) {
                    return $model->present()->type();
                }
            ),
            new ListBuilderColumn(
                name: 'Remark',
                property: 'comment',
                filterType: ListBuilderColumn::TYPE_TEXT,
                view: 'member.wallet-transactions.datatable.remark',
            ),
        ];
    }
}
