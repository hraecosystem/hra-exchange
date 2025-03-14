<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo ">
        <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img class="logo-lg" src="{{ settings()->getFileUrl('logo', asset(env('LOGO'))) }}" alt="">
                <img class="logo-sm" src="{{ settings()->getFileUrl('favicon', asset(env('FAVICON'))) }}" alt="">
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M11.4854 4.88844C11.0081 4.41121 10.2344 4.41121 9.75715 4.88844L4.51028 10.1353C4.03297 10.6126 4.03297 11.3865 4.51028 11.8638L9.75715 17.1107C10.2344 17.5879 11.0081 17.5879 11.4854 17.1107C11.9626 16.6334 11.9626 15.8597 11.4854 15.3824L7.96672 11.8638C7.48942 11.3865 7.48942 10.6126 7.96672 10.1353L11.4854 6.61667C11.9626 6.13943 11.9626 5.36568 11.4854 4.88844Z"
                    fill="currentColor" fill-opacity="0.6"/>
                <path
                    d="M15.8683 4.88844L10.6214 10.1353C10.1441 10.6126 10.1441 11.3865 10.6214 11.8638L15.8683 17.1107C16.3455 17.5879 17.1192 17.5879 17.5965 17.1107C18.0737 16.6334 18.0737 15.8597 17.5965 15.3824L14.0778 11.8638C13.6005 11.3865 13.6005 10.6126 14.0778 10.1353L17.5965 6.61667C18.0737 6.13943 18.0737 5.36568 17.5965 4.88844C17.1192 4.41121 16.3455 4.41121 15.8683 4.88844Z"
                    fill="currentColor" fill-opacity="0.38"/>
            </svg>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    {{--    For sidebar Icons : https://fontawesome.com/search?o=r&s=duotone--}}

    <ul class="menu-inner py-1 pb-lg-0 pb-5">
        <!-- Dashboards -->
        <li class="menu-item">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons fa-duotone fa-house-user"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>
        @if(settings('admin_roles'))
            @can('Admins-read')
                <li class="menu-item">
                    <a href="{{ route('admin.admins.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons fa-duotone fa-user-crown"></i>
                        <div data-i18n="Admins">Admins</div>
                    </a>
                </li>
            @endcan
        @endif
        @can('Members-read')
            <li class="menu-item">
                <a href="{{ route('admin.members.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons fa-duotone fa-users"></i>
                    <div data-i18n="{{ settings('member_name') }}s">{{ settings('member_name') }}s</div>
                </a>
            </li>
        @endcan
        @can('Deposits-read')
            <li class="menu-item">
                <a href="{{ route('admin.deposit.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons fa-duotone fa-money-check-dollar"></i>
                    <div data-i18n="Buy {{ env('APP_CURRENCY') }}">Buy {{ env('APP_CURRENCY') }}</div>
                </a>
            </li>
        @endcan
        @can('P2P Transfers-read')
            <li class="menu-item">
                <a href="{{ route('admin.p2p-transfers.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons fa-duotone fa-money-bill-transfer"></i>
                    <div data-i18n="P2P Transfers">P2P Transfers</div>
                </a>
            </li>
        @endcan
{{--        @can('Euro Wallet-read')--}}
            {{--            <li class="menu-item">--}}
            {{--                <a href="javascript:void(0);" class="menu-link menu-toggle">--}}
            {{--                    <i class="menu-icon tf-icons fa-duotone fa-wallet"></i>--}}
            {{--                    <div data-i18n="Euro Wallet">Euro Wallet</div>--}}
            {{--                </a>--}}

            {{--                <ul class="menu-sub">--}}
            {{--                    <li class="menu-item">--}}
            {{--                        <a href="{{ route('admin.wallet-transactions.index') }}" class="menu-link">--}}
            {{--                            <div data-i18n="Collapsed menu">Transactions</div>--}}
            {{--                        </a>--}}
            {{--                    </li>--}}
            {{--                    <li class="menu-item">--}}
            {{--                        <a href="{{ route('admin.wallet-transactions.create') }}" class="menu-link">--}}
            {{--                            <div data-i18n="Collapsed menu">Credit & Debits</div>--}}
            {{--                        </a>--}}
            {{--                    </li>--}}
            {{--                </ul>--}}
            {{--            </li>--}}
{{--        @endcan--}}
        @can('HRA Wallet-read')
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons fa-duotone fa-rectangle-history-circle-plus"></i>
                    <div data-i18n="{{ env('APP_CURRENCY') }} Wallet">{{ env('APP_CURRENCY') }} Wallet</div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('admin.coin-wallet-transactions.index') }}" class="menu-link">
                            <div data-i18n="Collapsed menu">Transactions</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('admin.coin-wallet-transactions.create') }}" class="menu-link">
                            <div data-i18n="Collapsed menu">Credit & Debits</div>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan
        {{--        <li class="menu-item">--}}
        {{--            <a href="javascript:void(0);" class="menu-link menu-toggle">--}}
        {{--                <i class="menu-icon tf-icons mdi mdi-chart-box-outline"></i>--}}
        {{--                <div data-i18n="Report">Report</div>--}}
        {{--            </a>--}}

        {{--            <ul class="menu-sub">--}}
        {{--                <li class="menu-item">--}}
        {{--                    <a href="{{ route('admin.reports.purchase') }}" class="menu-link">--}}
        {{--                        <div data-i18n="Collapsed menu">ICO Purchase</div>--}}
        {{--                    </a>--}}
        {{--                </li>--}}
        {{--                <li class="menu-item">--}}
        {{--                    <a href="{{ route('admin.reports.purchase-bonus') }}" class="menu-link">--}}
        {{--                        <div data-i18n="Collapsed menu">ICO Bonus</div>--}}
        {{--                    </a>--}}
        {{--                </li>--}}

        {{--            </ul>--}}
        {{--        </li>--}}
        @can('Exports-read')
            <li class="menu-item">
                <a href="{{ route('admin.exports.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons fa-duotone fa-download"></i>
                    <div data-i18n="Exports">Exports</div>
                </a>
            </li>
        @endif
        {{--        @can('Contact Inquiries-read')--}}
        {{--            <li class="menu-item">--}}
        {{--                <a href="{{ route('admin.contactInquires.index') }}" class="menu-link">--}}
        {{--                    <i class="menu-icon tf-icons fa-duotone fa-message-text"></i>--}}
        {{--                    <div data-i18n="Contact Inquiries"> Contact Inquiries</div>--}}
        {{--                    <span class="badge bg-success rounded-pill ms-auto">--}}
        {{--                        {{ \App\Models\Inquiry::whereIsRead(false)->count() }}--}}
        {{--                    </span>--}}
        {{--                </a>--}}
        {{--            </li>--}}
        {{--        @endcan--}}
        @can('Support Ticket-read')
            <li class="menu-item">
                <a href="{{ route('admin.support-ticket.get') }}" class="menu-link">
                    <i class="menu-icon tf-icons fa-duotone fa-comments-question-check"></i>
                    <div data-i18n="Support Ticket"> Support Ticket</div>
                    <div class="badge bg-primary rounded-pill ms-auto">
                        {{ \App\Models\SupportTicketMessage::where('messageable_type',\App\Models\Member::class)->where('is_read',0)->count() }}
                    </div>
                </a>
            </li>
        @endcan
        @can('Website Setting-read')
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons fa-duotone fa-gears"></i>
                    <div data-i18n="Website Setting ">Website Setting</div>
                </a>

                <ul class="menu-sub">
{{--                    <li class="menu-item">--}}
{{--                        <a href="{{ route('admin.settings.features-management') }}" class="menu-link">--}}
{{--                            <div data-i18n="Collapsed menu">Features Management</div>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    @if(settings('logo_changes'))
                        <li class="menu-item">
                            <a href="{{ route('admin.settings.change-logo') }}" class="menu-link">
                                <div data-i18n="Collapsed menu">Change Logo</div>
                            </a>
                        </li>
                    @endif
                    <li class="menu-item">
                        <a href="{{ route('admin.settings.change-background') }}" class="menu-link">
                            <div data-i18n="Collapsed menu">Login Background</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('admin.settings.content') }}" class="menu-link">
                            <div data-i18n="Collapsed menu">Website Content</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('admin.settings.contact-info') }}" class="menu-link">
                            <div data-i18n="Collapsed menu">Contact Info</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('admin.faqs.index') }}" class="menu-link">
                            <div data-i18n="Collapsed menu">FAQs</div>
                        </a>
                    </li>
                    {{--                    <li class="menu-item">--}}
                    {{--                        <a href="{{ route('admin.white-paper.show') }}" class="menu-link">--}}
                    {{--                            <div data-i18n="Collapsed menu">White Paper</div>--}}
                    {{--                        </a>--}}
                    {{--                    </li>--}}
                </ul>
            </li>
        @endif
    </ul>
</aside>
