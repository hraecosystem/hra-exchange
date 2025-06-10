<?php

namespace App\ListBuilders\Admin;

use App\ListBuilders\ListBuilder;
use App\ListBuilders\ListBuilderColumn;
use App\Models\IcoBonus;
use App\Models\IcoPurchase;
use App\Models\Member;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class MemberListBuilder extends ListBuilder
{
    public static string $name = '';

    public static string $defaultSort = 'id';

    public static function query(array $extras = [], ?Request $request = null): Builder
    {
        return self::buildQuery(
            Member::with('userWallet'),
            $request
        );
    }

    public static function columns(): array
    {
        return [
            //            new ListBuilderColumn(
            //                name: 'Activation Date',
            //                property: 'activated_at',
            //                filterType: ListBuilderColumn::TYPE_DATE_RANGE
            //            ),
            new ListBuilderColumn(
                name: settings('member_name') . ' ID',
                property: 'code',
                filterType: ListBuilderColumn::TYPE_TEXT,
                canCopy: true,
            ),
            new ListBuilderColumn(
                name: settings('member_name') . 'name',
                property: 'user.name',
                filterType: ListBuilderColumn::TYPE_TEXT,
            ),
            new ListBuilderColumn(
                name: settings('member_name') . ' Email ID',
                property: 'user.email',
                filterType: ListBuilderColumn::TYPE_TEXT,
            ),
            new ListBuilderColumn(
                name: 'HRA Balance',
                property: 'coin_wallet_balance',
                filterType: ListBuilderColumn::TYPE_NUMBER_RANGE
                //                viewCallback: function ($model) {
                //                    return toHumanReadable(IcoPurchase::where('member_id', $model->id)->sum('amount'));
                //                },
                //                exportCallback: function ($model) {
                //                    return toHumanReadable(IcoPurchase::where('member_id', $model->id)->sum('amount'));
                //                },
            ),
            new ListBuilderColumn(
                name: 'Joining Date',
                property: 'created_at',
                filterType: ListBuilderColumn::TYPE_DATE_RANGE
            ),
            new ListBuilderColumn(
                name: 'Action',
                property: 'action',
                view: 'admin.members.datatable.action',
                shouldExport: false,
            ),
            //            new ListBuilderColumn(
            //                name: 'HRA HOLD BONUS',
            //                property: 'bonusBalance',
            //                viewCallback: function ($model) {
            //                    return toHumanReadable(IcoBonus::where('member_id', $model->id)->sum('amount'));
            //                },
            //                exportCallback: function ($model) {
            //                    return toHumanReadable(IcoBonus::where('member_id', $model->id)->sum('amount'));
            //                },
            //            ),
            //            new ListBuilderColumn(
            //                name: 'Wallet Balance ('.env('APP_CURRENCY').')',
            //                property: 'coin_wallet_balance',
            //                filterType: ListBuilderColumn::TYPE_NUMBER_RANGE,
            //                exportCallback: function ($model) {
            //                    return $model->coin_wallet_balance > 0 ? toHumanReadable($model->coin_wallet_balance) : '0';
            //                },
            //            ),
            //            new ListBuilderColumn(
            //                name: 'Wallet Address',
            //                property: 'userWallet.public_key',
            //                filterType: ListBuilderColumn::TYPE_TEXT,
            //                viewCallback: function ($model) {
            //                    if ($model->userWallet) {
            //                        return view('admin.web3-address', [
            //                            'address' => $model->userWallet->public_key,
            //                        ]);
            //                    } else {
            //                        return 'N/A';
            //                    }
            //                }
            //            ),
            //            new ListBuilderColumn(
            //                name: 'Status',
            //                property: 'status',
            //                filterType: ListBuilderColumn::TYPE_SELECT,
            //                view: 'admin.members.datatable.status',
            //                options: Member::STATUSES,
            //                exportCallback: function ($model) {
            //                    return Member::STATUSES[$model->status];
            //                }
            //            ),
        ];
    }
}
