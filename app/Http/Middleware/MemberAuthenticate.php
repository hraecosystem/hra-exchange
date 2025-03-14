<?php

namespace App\Http\Middleware;

use App\ListBuilders\ListBuilder;
use App\Models\Admin;
use App\Models\SupportTicket;
use App\Models\SupportTicketMessage;
use Auth;
use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use View;

class MemberAuthenticate
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if (! Auth::check() || ! Auth::user()->hasRole('member') || Auth::user()->member->isBlocked()) {
            Auth::logout();

            return redirect()->route('member.login.create');

        } else {
            View::share('lastLoginLog', Auth::user()->member->loginLogs()->orderBy('created_at', 'desc')
                ->skip(1)
                ->take(1)
                ->first());

            View::share('supports',
                Auth::user()->member->supportTicket()
                    ->where('status', SupportTicket::STATUS_OPEN)
                    ->get());

            View::share('supportMessagesCount',
                SupportTicketMessage::where('messageable_type', Admin::class)
                    ->whereHas('supportTicket', function (Builder $q) {
                        $q->where('member_id', Auth::user()->member->id)
                            ->where('status', SupportTicket::STATUS_OPEN);
                    })->where('is_read', 0)
                    ->count()
            );

            ListBuilder::$viewPrefix = 'member';

            return $next($request);
        }
    }
}
