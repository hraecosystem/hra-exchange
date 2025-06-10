<?php

namespace App\ListBuilders\Admin;

use App\ListBuilders\ListBuilder;
use App\ListBuilders\ListBuilderColumn;
use App\Models\BankTransferRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class RequestsListBuilder extends ListBuilder
{
    public static string $name = '';

    public static string $defaultSort = 'id';

    public static function query(array $extras = [], ?Request $request = null): Builder
    {
        return self::buildQuery(
            BankTransferRequest::query(),
            $request
        );
    }

    public static function columns(): array
    {
        return [
            new ListBuilderColumn(
                name: 'name',
                property: 'user.name',
                filterType: ListBuilderColumn::TYPE_TEXT,
            ),
            // new ListBuilderColumn(
            //     name:'ID',
            //     property: 'code',
            //     filterType: ListBuilderColumn::TYPE_TEXT,
            //     canCopy: true,
            // ),

            new ListBuilderColumn(
                name: 'Bank Account Name',
                property: 'bank_name',
                filterType: ListBuilderColumn::TYPE_TEXT,
            ),
            new ListBuilderColumn(
                name: 'Status',
                property: 'status',
                filterType: ListBuilderColumn::TYPE_TEXT
            ),
            new ListBuilderColumn(
                name: 'Swift Code',
                property: 'swift_code',
                filterType: ListBuilderColumn::TYPE_TEXT
            ),
            new ListBuilderColumn(
                name: 'Dete transation',
                property: 'created_at',
                filterType: ListBuilderColumn::TYPE_DATE_RANGE
            ),
            new ListBuilderColumn(
                name: 'Action',
                property: 'action',
                view: 'admin.bank-transfer-requests.actions',
                shouldExport: false,
            ),
        ];
    }
}
