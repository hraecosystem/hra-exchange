<?php

namespace App\ListBuilders\Member;

use App\ListBuilders\ListBuilder;
use App\ListBuilders\ListBuilderColumn;
use App\Models\Deposit;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DepositListBuilder extends ListBuilder
{
    public static string $name = 'Buy HRA';

    public static function query(array $extras = [], ?Request $request = null): Builder
    {
        return self::buildQuery(
            Deposit::whereMemberId($extras['member_id']),
            $request
        );
    }

    public static function createUrl(): ?string
    {
        return route('member.deposit.create');
    }

    public static function createButtonName(): ?string
    {
        return 'Buy';
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
                name: 'From Address',
                property: 'from_address',
                filterType: ListBuilderColumn::TYPE_TEXT,
                viewCallback: function ($model) {
                    if ($model->from_address) {
                        return view('admin.web3-address', [
                            'address' => $model->from_address,
                        ]);
                    } else {
                        return 'N/A';
                    }
                }
            ),
            new ListBuilderColumn(
                name: 'To Address',
                property: 'to_address',
                filterType: ListBuilderColumn::TYPE_TEXT,
                viewCallback: function ($model) {
                    if ($model->to_address) {
                        return view('admin.web3-address', [
                            'address' => $model->to_address,
                        ]);
                    } else {
                        return 'N/A';
                    }
                }
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
                name: 'Transaction Hash',
                property: 'transaction_hash',
                filterType: ListBuilderColumn::TYPE_TEXT,
                view: 'member.deposit.datatable.tx-hash',
            ),
            new ListBuilderColumn(
                name: 'Blockchain Status',
                property: 'blockchain_status',
                filterType: ListBuilderColumn::TYPE_SELECT,
                view: 'member.deposit.datatable.blockchain-status',
                options: Deposit::STATUSES,
                exportCallback: function ($model) {
                    return Deposit::STATUSES[$model->blockchain_status];
                }
            ),
            new ListBuilderColumn(
                name: 'Remark',
                property: 'remark',
                filterType: ListBuilderColumn::TYPE_TEXT,
            ),
        ];
    }
}
