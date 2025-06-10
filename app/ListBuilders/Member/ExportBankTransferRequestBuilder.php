<?php

namespace App\ListBuilders\Member;

use App\ListBuilders\ListBuilder;
use App\ListBuilders\ListBuilderColumn;
use App\Models\BankTransferRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ExportBankTransferRequestBuilder extends ListBuilder
{
    public static string $name = 'Bank Transfer Requests';


    public static function query(array $extras = [], ?Request $request = null): Builder
    {
        $query = BankTransferRequest::where('user_id', $extras['user_id']);

        return self::buildQuery(
            $query,
            $request
        );
    }

    public static function columns(): array
    {
        return [
         
            new ListBuilderColumn(
                name: 'Bank Name',
                property: 'bank_name',
                filterType: ListBuilderColumn::TYPE_TEXT
            ),
            new ListBuilderColumn(
                name: 'Account Holder Name',
                property: 'account_name',
                filterType: ListBuilderColumn::TYPE_TEXT,
            ),
            new ListBuilderColumn(
                name: 'IBAN',
                property: 'iban',
                filterType: ListBuilderColumn::TYPE_TEXT,
            ),
            new ListBuilderColumn(
                name: 'Swift Code',
                property: 'swift_code',
                filterType: ListBuilderColumn::TYPE_TEXT,
            ),
            new ListBuilderColumn(
                name: 'Status',
                property: 'status',
                filterType: ListBuilderColumn::TYPE_TEXT,
            ),
               new ListBuilderColumn(
                name: 'Date Requested',
                property: 'created_at',
                filterType: ListBuilderColumn::TYPE_DATE_RANGE
            ),
            // new ListBuilderColumn(
            //     name: 'Link',
            //     property: 'link',
            //     view: 'member.exports.datatable.link',
            //     shouldExport: false,
            // ),
            // new ListBuilderColumn(
            //     name: 'Status',
            //     property: 'status',
            //     filterType: ListBuilderColumn::TYPE_SELECT,
            //     view: 'member.exports.datatable.status',
            //     options: BankTransferRequest::STATUSES,
            //     exportCallback: function ($model) {
            //         return $model->present()->status();
            //     }
            // ),
        ];
    }
}
