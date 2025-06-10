<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\CoinWalletTransaction;
use App\Models\Deposit;
use App\Models\Member;
use App\Models\SupportTicket;
use DB;
use Illuminate\Contracts\Support\Renderable;

class DashboardController extends Controller
{
    public function index(): Renderable
    {
        $lastFiveRegisterMembers = Member::with('user', 'media')->take(5)->latest('id')->get();
        $lastFiveInvestments = Deposit::whereStatus(Deposit::STATUS_COMPLETED)
            ->with('member.user')
            ->take(5)
            ->latest('id')
            ->get();

        $last24HoursRegisterMembers = Member::where('created_at', '>=', now()->subHours(24))->count();
        $last7DaysRegisterMembers = Member::whereBetween('created_at', [today()->subDays(6), now()])->count();
        $last30DaysRegisterMembers = Member::whereBetween('created_at', [today()->subDays(29), now()])->count();

        $last24HoursInvestment =
            Deposit::where('created_at', '>=', now()->subHours(24))
                ->where('status', Deposit::STATUS_COMPLETED)
                ->sum('amount')
            +
            CoinWalletTransaction::whereType(CoinWalletTransaction::TYPE_CREDIT)
                ->whereResponsibleType(Admin::class)
                ->where('created_at', '>=', now()->subHours(24))
                ->sum('total')
            -
            CoinWalletTransaction::whereType(CoinWalletTransaction::TYPE_DEBIT)
                ->whereResponsibleType(Admin::class)
                ->where('created_at', '>=', now()->subHours(24))
                ->sum('total');

        $last7DaysInvestment =
            Deposit::whereBetween('created_at', [today()->subDays(6), now()])->where('status', Deposit::STATUS_COMPLETED)->sum('amount')+
            CoinWalletTransaction::whereType(CoinWalletTransaction::TYPE_CREDIT)
                ->whereResponsibleType(Admin::class)
                ->whereBetween('created_at', [today()->subDays(6), now()])
                ->sum('total')
            -
            CoinWalletTransaction::whereType(CoinWalletTransaction::TYPE_DEBIT)
                ->whereResponsibleType(Admin::class)
                ->whereBetween('created_at', [today()->subDays(6), now()])
                ->sum('total');

        $last30DaysInvestment =
            Deposit::whereBetween('created_at', [today()->subDays(29), now()])
                ->where('status', Deposit::STATUS_COMPLETED)
                ->sum('amount')
            +
            CoinWalletTransaction::whereType(CoinWalletTransaction::TYPE_CREDIT)
                ->whereResponsibleType(Admin::class)
                ->whereBetween('created_at', [today()->subDays(29), now()])
                ->sum('total')
            -
            CoinWalletTransaction::whereType(CoinWalletTransaction::TYPE_DEBIT)
                ->whereResponsibleType(Admin::class)
                ->whereBetween('created_at', [today()->subDays(29), now()])
                ->sum('total');

        $lifetimeInvestment =
            Deposit::where('status', Deposit::STATUS_COMPLETED)
                ->sum('amount')
            +
            CoinWalletTransaction::whereType(CoinWalletTransaction::TYPE_CREDIT)
                ->whereResponsibleType(Admin::class)
                ->sum('total')
            -
            CoinWalletTransaction::whereType(CoinWalletTransaction::TYPE_DEBIT)
                ->whereResponsibleType(Admin::class)
                ->sum('total');

        $dayCountMembersJoins = collect();
        $dayWiseInvestment = collect();
        for ($i = 6; $i >= 0; $i--) {
            $date = today()->subDays($i);
            $totalMember = Member::select(DB::raw('count(*) as total_members'))
                ->whereBetween('created_at', [$date->clone()->startOfDay(), $date->clone()->endOfDay()])
                ->first();

            $amount =
                Deposit::whereBetween('created_at', [$date->clone()->startOfDay(), $date->clone()->endOfDay()])
                    ->where('status', Deposit::STATUS_COMPLETED)
                    ->sum('amount')
                +
                CoinWalletTransaction::whereType(CoinWalletTransaction::TYPE_CREDIT)
                    ->whereResponsibleType(Admin::class)
                    ->whereBetween('created_at', [$date->clone()->startOfDay(), $date->clone()->endOfDay()])
                    ->sum('total')
                -
                CoinWalletTransaction::whereType(CoinWalletTransaction::TYPE_DEBIT)
                    ->whereResponsibleType(Admin::class)
                    ->whereBetween('created_at', [$date->clone()->startOfDay(), $date->clone()->endOfDay()])
                    ->sum('total');

            $dayCountMembersJoins->push([
                'day' => $date->format('d-m-Y'),
                'total_member' => $totalMember->total_members,
            ]);
            $dayWiseInvestment->push([
                'day' => $date->format('d-m-Y'),
                'amount' => $amount,
            ]);
        }

        return view('admin.dashboard', [
            'totalMembers' => Member::count(),
            'openSupportTickets' => SupportTicket::open()->count(),
            'lastFiveRegisterMembers' => $lastFiveRegisterMembers,
            'lastFiveInvestments' => $lastFiveInvestments,
            'last24HoursRegisterMembers' => $last24HoursRegisterMembers,
            'last7DaysRegisterMembers' => $last7DaysRegisterMembers,
            'last30DaysRegisterMembers' => $last30DaysRegisterMembers,
            'last24HoursInvestment' => ($last24HoursInvestment),
            'last7DaysInvestment' => $last7DaysInvestment,
            'last30DaysInvestment' => $last30DaysInvestment,
            'lifetimeInvestment' => $lifetimeInvestment,
            'dayCountMembersJoins' => $dayCountMembersJoins,
            'dayWiseInvestment' => $dayWiseInvestment,
        ]);
    }
}
