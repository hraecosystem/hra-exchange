<?php

namespace App\ListBuilders\Admin;

use App\ListBuilders\ListBuilder;
use App\ListBuilders\ListBuilderColumn;
use App\Models\SupportTicket;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SupportTicketListBuilder extends ListBuilder
{
    public static string $name = 'Support Tickets';

    public static string $permissionPrefix = 'Support Tickets';

    public static function query(array $extras = [], ?Request $request = null): Builder
    {
        $query = SupportTicket::with('member.user', 'member');

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
                name: 'Action',
                property: 'action',
                view: 'admin.support-ticket.datatable.action',
                shouldExport: false,
            ),
            new ListBuilderColumn(
                name: 'Status',
                property: 'status',
                filterType: ListBuilderColumn::TYPE_SELECT,
                view: 'admin.support-ticket.datatable.status',
                options: SupportTicket::STATUSES,
                exportCallback: function ($model) {
                    return $model->present()->status();
                }
            ),
            new ListBuilderColumn(
                name: 'Ticket ID',
                property: 'ticket_id',
                filterType: ListBuilderColumn::TYPE_TEXT
            ),
            new ListBuilderColumn(
                name: ''.settings('member_name').' ID',
                property: 'member.code',
                filterType: ListBuilderColumn::TYPE_TEXT,
                canCopy: true,
            ),
            new ListBuilderColumn(
                name: ''.settings('member_name').' Name',
                property: 'member.user.name',
                filterType: ListBuilderColumn::TYPE_TEXT
            ),
            //            new ListBuilderColumn(
            //                name: 'Subject',
            //                property: 'title',
            //                filterType: ListBuilderColumn::TYPE_TEXT,
            //                view: 'admin.support-ticket.datatable.title',
            //            ),
        ];
    }
}
