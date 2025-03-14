<?php

namespace App\ListBuilders\Admin;

use App\ListBuilders\ListBuilder;
use App\ListBuilders\ListBuilderColumn;
use App\Models\P2PTransfer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class P2PTransferListBuilder extends ListBuilder
{
    public static string $name = 'P2P Transfers';

    public static function query(array $extras = [], ?Request $request = null): Builder
    {
        $query = P2PTransfer::with(['fromMember.user', 'toMember.user']);

        return self::buildQuery(
            $query,
            $request
        );
    }

    public static function createUrl(): ?string
    {
        return route('admin.p2p-transfers.create');
    }

    public static function createButtonName(): ?string
    {
        return 'Send '.env('APP_CURRENCY');
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
                name: 'From ID',
                property: 'fromMember.code',
                filterType: ListBuilderColumn::TYPE_TEXT,
                canCopy: true,
            ),
            new ListBuilderColumn(
                name: 'From Email',
                property: 'fromMember.user.email',
                filterType: ListBuilderColumn::TYPE_TEXT,
                canCopy: true,
            ),
            new ListBuilderColumn(
                name: 'To ID',
                property: 'toMember.code',
                filterType: ListBuilderColumn::TYPE_TEXT,
                canCopy: true,
            ),
            new ListBuilderColumn(
                name: 'To Email',
                property: 'toMember.user.email',
                filterType: ListBuilderColumn::TYPE_TEXT,
                canCopy: true,
            ),
            new ListBuilderColumn(
                name: 'Amount ('.env('APP_CURRENCY').')',
                property: 'amount',
                filterType: ListBuilderColumn::TYPE_NUMBER_RANGE,
                exportCallback: function ($model) {
                    return $model->amount > 0 ? toHumanReadable($model->amount) : '0';
                },
            ),
        ];
    }
}
