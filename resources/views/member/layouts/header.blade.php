@php $member = Auth::user()->member; @endphp
<div class="nav-header">
    <a href="{{ route('member.dashboard.index') }}" class="brand-logo">
        <img src="{{ settings()->getFileUrl('logo', asset(env('LOGO'))) }}"
             alt="{{ settings('company_name') }}" class="logo-color">
    </a>
    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
            <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="22" y="11" width="4" height="4" rx="2" fill="var(--primary)"/>
                <rect x="11" width="4" height="4" rx="2" fill="var(--primary)"/>
                <rect x="22" width="4" height="4" rx="2" fill="var(--primary)"/>
                <rect x="11" y="11" width="4" height="4" rx="2" fill="var(--primary)"/>
                <rect x="11" y="22" width="4" height="4" rx="2" fill="var(--primary)"/>
                <rect width="4" height="4" rx="2" fill="var(--primary)"/>
                <rect y="11" width="4" height="4" rx="2" fill="var(--primary)"/>
                <rect x="22" y="22" width="4" height="4" rx="2" fill="var(--primary)"/>
                <rect y="22" width="4" height="4" rx="2" fill="var(--primary)"/>
            </svg>
        </div>
    </div>
</div>
<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    {{--                    <div class="dashboard_bar">--}}
                    {{--                        Dashboard--}}
                    {{--                    </div>--}}
                </div>
                <div class="navbar-nav header-right">

                    <div class="dz-side-menu">

                        <div class="sidebar-social-link ">
                            <ul>
                                <li class="nav-item dropdown notification_dropdown">
                                    <a class="nav-link" href="javascript:void(0);" role="button"
                                       data-bs-toggle="dropdown">
                                        <svg width="24" height="23" viewBox="0 0 24 23" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M18.7071 8.56414C18.7071 9.74035 19.039 10.4336 19.7695 11.2325C20.3231 11.8211 20.5 12.5766 20.5 13.3963C20.5 14.215 20.2128 14.9923 19.6373 15.6233C18.884 16.3798 17.8215 16.8627 16.7372 16.9466C15.1659 17.0721 13.5937 17.1777 12.0005 17.1777C10.4063 17.1777 8.83505 17.1145 7.26375 16.9466C6.17846 16.8627 5.11602 16.3798 4.36367 15.6233C3.78822 14.9923 3.5 14.215 3.5 13.3963C3.5 12.5766 3.6779 11.8211 4.23049 11.2325C4.98384 10.4336 5.29392 9.74035 5.29392 8.56414V8.16515C5.29392 6.58996 5.71333 5.55995 6.577 4.55164C7.86106 3.08114 9.91935 2.19922 11.9558 2.19922H12.0452C14.1254 2.19922 16.2502 3.12359 17.5125 4.65728C18.3314 5.64484 18.7071 6.63146 18.7071 8.16515V8.56414ZM9.07367 19.1136C9.07367 18.642 9.53582 18.426 9.96318 18.3336C10.4631 18.2345 13.5093 18.2345 14.0092 18.3336C14.4366 18.426 14.8987 18.642 14.8987 19.1136C14.8738 19.5626 14.5926 19.9606 14.204 20.2134C13.7001 20.5813 13.1088 20.8143 12.4906 20.8982C12.1487 20.9397 11.8128 20.9407 11.4828 20.8982C10.8636 20.8143 10.2723 20.5813 9.76938 20.2125C9.37978 19.9606 9.09852 19.5626 9.07367 19.1136Z"
                                                  fill="#130F26"/>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <div id="DZ_W_Notification1" class="widget-media dz-scroll p-3"
                                             style="height:380px;">
                                            <ul class="timeline">
                                                @if(count($supports) > 0)
                                                    @foreach($supports as $supportTicket)
                                                        <a href="{{ route('member.support.ticket',$supportTicket) }}">
                                                            <li>
                                                                <div class="timeline-panel mb-2">
                                                                    <div class="media me-2 media-success">
                                                                        <i class="fa-duotone fa-comments-question"></i>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <h6 class="mb-1">{{ $supportTicket->title }}
                                                                            <span
                                                                                class="badge bg-danger rounded-pill ms-auto">
                                                                            {{ App\Models\SupportTicketMessage::where('messageable_type', App\Models\Admin::class)
                                                                                ->where('support_ticket_id',$supportTicket->id)->where('is_read', 0)
                                                                            ->count() }} </span>
                                                                        </h6>
                                                                        <small class="d-block">
                                                                            {{ $supportTicket->created_at }}
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </a>

                                                    @endforeach
                                                @else
                                                    <li>
                                                        <div class="timeline-panel">
                                                            <div class="media-body">
                                                                <h6 class="mb-1">No Data Found !</h6>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                        <a class="all-notification" href="{{ route('member.support.index') }}">
                                            See all notifications <i class="ti-arrow-end"></i>
                                        </a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown notification_dropdown">
                                    <a class="nav-link" href="{{ route('member.login.destroy') }}">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill="#130F26"
                                                  d="M10.21,6.21l.79-.8V10a1,1,0,0,0,2,0V5.41l.79.8a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-2.5-2.5a1,1,0,0,0-.33-.21,1,1,0,0,0-.76,0,1,1,0,0,0-.33.21l-2.5,2.5a1,1,0,0,0,1.42,1.42ZM18,7.56A1,1,0,1,0,16.56,9,6.45,6.45,0,1,1,7.44,9,1,1,0,1,0,6,7.56a8.46,8.46,0,1,0,12,0Z"></path>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <ul>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                    <img src="{{ Auth::user()->member->present()->profileImage() }}" alt="">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" style="">
                                    <a href="{{ route('member.profile.show') }}" class="dropdown-item ai-icon ">
                                        <i class="fa-duotone fa-user"></i>
                                        <span class="ms-2">Profile </span>
                                    </a>
                                    <a href="{{ route('member.login.destroy') }}" class="dropdown-item ai-icon">
                                        <i class="fa-duotone fa-arrow-right-from-bracket"></i>
                                        <span class="ms-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>




