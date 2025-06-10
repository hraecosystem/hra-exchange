<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a href="{{ route('member.dashboard.index') }}" aria-expanded="false">
                    <i class="fa-duotone fa-house-window"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('member.deposit.create') }}" aria-expanded="false">
                    <i class="fa-duotone fa-circle-bolt"></i>
                    <span class="nav-text">Buy {{ env('APP_CURRENCY') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('member.list-requests.list_requests') }}" aria-expanded="false">
                    <i class="fa-duotone fa-circle-bolt"></i>
                    <span class="nav-text">With draw request {{ env('APP_CURRENCY') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('member.deposit.index') }}" aria-expanded="false">
                    <i class="fa-duotone fa-circle-bolt"></i>
                    <span class="nav-text">Orders</span>
                </a>
            </li>
            <li>
                <a href="{{ route('member.p2p-transfers.index') }}" aria-expanded="false">
                    <i class="fa-duotone fa-money-bill-transfer"></i>
                    <span class="nav-text">P2P Transfers</span>
                </a>
            </li>
            <li>
                <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                    <i class="fa-duotone fa-wallet"></i>
                    <span class="nav-text">Wallet</span>
                </a>
                <ul aria-expanded="false">
                    {{--                                <li>--}}
                    {{--                                    <a href="{{ route('member.wallet-transactions.index') }}">--}}
                    {{--                                        Euro--}}
                    {{--                                    </a>--}}
                    {{--                                </li>--}}
                    <li>
                        <a href="{{ route('member.coin-wallet-transactions.index') }}">
                            {{ env('APP_CURRENCY') }}
                        </a>
                    </li>
                </ul>
            </li>

            {{--            <li>--}}
            {{--                <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">--}}
            {{--                    <i class="fa-duotone fa-line-chart"></i>--}}
            {{--                    <span class="nav-text">Reports</span>--}}
            {{--                </a>--}}
            {{--                <ul class="menu-sub">--}}
            {{--                    <li>--}}
            {{--                        <a href="{{ route('member.deposit.index') }}">--}}
            {{--                            Buy {{ env('APP_CURRENCY') }} Details--}}
            {{--                        </a>--}}
            {{--                    </li>--}}
            {{--                    <li>--}}
            {{--                        <a href="{{ route('member.reports.purchase') }}">--}}
            {{--                            ICO Purchase--}}
            {{--                        </a>--}}
            {{--                    </li>--}}
            {{--                    <li>--}}
            {{--                        <a href="{{ route('member.reports.purchase-bonus') }}">--}}
            {{--                            ICO Bonus--}}
            {{--                        </a>--}}
            {{--                    </li>--}}
            {{--                </ul>--}}
            {{--            </li>--}}

            <li>
                <a href="{{ route('member.support.index') }}" aria-expanded="false">
                    <i class="fa-duotone fa-comments-question"></i>
                    <span class="nav-text me-2">Support Ticket</span>
                    <div class="badge bg-danger rounded-pill badge-bell ms-auto">
                        {{ App\Models\SupportTicketMessage::where('messageable_type', App\Models\Admin::class)
                    ->whereHas('supportTicket', function (Illuminate\Database\Eloquent\Builder $q) {
                        $q->where('member_id', Auth::user()->member->id)
                            ->where('status', App\Models\SupportTicket::STATUS_OPEN);
                    })->where('is_read', 0)
                    ->count() }}
                    </div>
                </a>
            </li>

            {{--            <li>--}}
            {{--                <a href="https://lither.gitbook.io/HRA-whitepaper/" aria-expanded="false" target="_blank">--}}
            {{--                    <i class="fa-duotone fa-memo-pad"></i>--}}
            {{--                    <span class="nav-text">WhitePaper</span>--}}
            {{--                </a>--}}
            {{--            </li>--}}

            <li>
                <a href="{{ route('member.exports.index') }}" aria-expanded="false">
                    <i class="fa-duotone fa-download"></i>
                    <span class="nav-text">Export</span>
                </a>
            </li>

        </ul>
    </div>
</div>
