@extends('member.layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row match-height">
        <div class="col-xl-8">
            <div class="card bubles">
                <div class="card-body d-flex align-items-center">
                    <div class="d-block">
                        <img src="{{ $member->present()->profileImage() }}" class="avatar avatar-xxl" alt="">
                    </div>
                    <div class="w-100 ps-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="">
                                <h3 class="font-w700">{{ $member->user->name }} -
                                    <button class="btn btn-link p-0 font-18" type="button"
                                            data-clipboard-text="{{ $member->code }}"
                                            data-bs-title="Copied" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    >{{ $member->code }}
                                    </button>
                                </h3>
                            </div>
                            <div class="d-flex">
                                <div class="dropdown ms-auto">
                                    <a href="{{ route('member.profile.show') }}"
                                       class="icon-box icon-box-sm bg-primary-light">
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M27.3925 4.60647C26.1493 3.36576 24.4647 2.66895 22.7083 2.66895C20.9519 2.66895 19.2673 3.36576 18.0241 4.60647L15.5295 7.10101L4.30461 18.3265C4.10055 18.5303 3.96826 18.7948 3.92767 19.0803L2.67994 27.8109C2.65288 28 2.66679 28.1927 2.72072 28.376C2.77465 28.5593 2.86735 28.7289 2.99252 28.8732C3.11769 29.0176 3.27243 29.1333 3.44624 29.2126C3.62005 29.292 3.80888 29.333 3.99994 29.333C4.06311 29.3331 4.12621 29.3287 4.18874 29.3197L12.9199 28.0726C13.2054 28.0313 13.4698 27.8989 13.6738 27.695L27.3938 13.9762C28.0091 13.361 28.4972 12.6307 28.8302 11.8268C29.1632 11.023 29.3346 10.1614 29.3346 9.29134C29.3346 8.42126 29.1632 7.5597 28.8302 6.75586C28.4972 5.95202 28.0091 5.22166 27.3938 4.60647H27.3925ZM12.1022 25.4958L5.57154 26.4281L6.50487 19.8981L16.4726 9.92954L22.0709 15.5274L12.1022 25.4958ZM25.5066 12.0909L23.9559 13.6421L18.3574 8.04394L19.9094 6.49181C20.6635 5.77219 21.6659 5.3707 22.7083 5.3707C23.7507 5.3707 24.753 5.77219 25.5071 6.49181C26.2494 7.2344 26.6664 8.24138 26.6664 9.29134C26.6664 10.3413 26.2494 11.3483 25.5071 12.0909H25.5066Z"
                                                fill="#A098AE"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap pt-4 user-icon-info align-items-center">
                            <div class="d-flex align-items-center pe-4 mb-2">
                                <div class="pe-2">
                                    <i class="fa-duotone fa-envelopes text-warning fs-lg"></i>
                                </div>
                                <h5 class="font-w400 mb-0">{{ $member->user->email }}</h5>
                            </div>
                            {{--                            @if($member->user->mobile)--}}
                            {{--                                <div class="d-flex align-items-center pe-4 mb-2">--}}
                            {{--                                    <div class="pe-2">--}}
                            {{--                                        <i class="fa-duotone fa-phone-volume text-danger"></i>--}}
                            {{--                                    </div>--}}
                            {{--                                    <h5 class="font-w400 mb-0">+{{ $member->user->mobile }}</h5>--}}
                            {{--                                </div>--}}
                            {{--                            @endif--}}
                            <div class="d-flex align-items-center pe-4 mb-2">
                                <div class="pe-2">
                                    <i class="fa-duotone fa-registered text-success"></i>
                                </div>
                                <h5 class="font-w400 mb-0">{{ date('d M Y', strtotime($member->user->created_at)) }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card h-100">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-8">
                            <h4 class="card-title mb-1 d-flex gap-2 flex-wrap">Buy Instantly 🚀</h4>
                            <p class="pb-0">HRA is a global, decentralized network with validators and community members
                                from all around the world.</p>
                            <a href="{{ route('member.deposit.create') }}"
                               class="btn btn-sm btn-primary">Buy {{ env('APP_CURRENCY') }}</a>
                            <a href="{{ route('member.p2p-transfers.create') }}"
                               class="btn btn-sm btn-danger">Send {{ env('APP_CURRENCY') }}</a>
                        </div>
                        <div class="col-lg-4 col-4 text-center">
                            <img class="img-fluid" src="{{ asset('images/coin.png') }}"
                                 alt="view sales">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{ route('member.coin-wallet-transactions.index') }}">
                        <div class="card currency-bx overflow-hidden relative bg-success mb-3">
                            <div class="card-body p-4">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <h5 class="text-white fs-20">{{ env('APP_CURRENCY') }} Balance</h5>
                                        <h1 class="text-white mb-0">
                                            {{ $totalPurchaseCoin }}
                                        </h1>
                                    </div>
                                    <div class="currency-icon">
                                        <i class="fa-duotone fa-wallet text-success"></i>
                                    </div>
                                </div>
                            </div>
                            <img class="bg-img" src="{{ asset('images/icons/wallet.png') }}" alt=""/>
                        </div>
                    </a>
                </div>
                <!--New cards-->
                <div class="col-lg-12">
    <div class="card currency-bx overflow-hidden relative bg-warning mb-3">
        <div class="card-body p-4">
            <div class="media align-items-center">
                <div class="media-body">
                    <h5 class="text-white fs-20">Cold Wallet Balance</h5>
                    <h1 class="text-white mb-0">
                        {{ $totalPurchaseCoin }}
                    </h1>
                </div>
                <div class="currency-icon">
                    <i class="fa-duotone fa-snowflake text-warning"></i>
                </div>
            </div>
        </div>
        <img class="bg-img" src="{{ asset('images/icons/cold-wallet.png') }}" alt=""/>
    </div>
</div>

<div class="col-lg-12">
    <div class="card currency-bx overflow-hidden relative bg-info mb-3">
        <div class="card-body p-4">
            <div class="media align-items-center">
                <div class="media-body">
                    <h5 class="text-white fs-20">HRA Card Balance</h5>
                    <h1 class="text-white mb-0">
                        {{ $totalPurchaseCoin }}
                    </h1>
                </div>
                <div class="currency-icon">
                    <i class="fa-duotone fa-credit-card text-info"></i>
                </div>
            </div>
        </div>
        <img class="bg-img" src="{{ asset('images/hra-card.png') }}" alt=""/>
    </div>
</div>

            </div>
            @if(settings('social_link'))
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card social-icons">
                            <div class="card-body">
                                <h3 class="px-3 py-3">Follow us</h3>
                                <div class="mb-3">
                                    <div class="row">
                                        @if(settings('facebook_url'))
                                            <div class="col-xl col-2">
                                                <a href="{{ settings('facebook_url') }}" target="_blank">
                                                    <img class="img-fluid" src="{{ asset('images/social/1.png') }}"
                                                         alt=""/>
                                                </a>
                                            </div>
                                        @endif
                                        @if(settings('instagram_url'))
                                            <div class="col-xl col-2">
                                                <a href="{{ settings('instagram_url') }}" target="_blank">
                                                    <img class="img-fluid" src="{{ asset('images/social/5.png') }}"
                                                         alt=""/>
                                                </a>
                                            </div>
                                        @endif
                                        @if(settings('twitter_url'))
                                            <div class="col-xl col-2">
                                                <a href="{{ settings('twitter_url') }}" target="_blank">
                                                    <img class="img-fluid" src="{{ asset('images/social/3.png') }}"
                                                         alt=""/>
                                                </a>
                                            </div>
                                        @endif
                                        @if(settings('linkedIn_url'))
                                            <div class="col-xl col-2">
                                                <a href="{{ settings('linkedIn_url') }}" target="_blank">
                                                    <img class="img-fluid" src="{{ asset('images/social/6.png') }}"
                                                         alt=""/>
                                                </a>
                                            </div>
                                        @endif
                                        @if(settings('pinterest_url'))
                                            <div class="col-xl col-2">
                                                <a href="{{ settings('pinterest_url') }}" target="_blank">
                                                    <img class="img-fluid" src="{{ asset('images/social/8.png') }}"
                                                         alt=""/>
                                                </a>
                                            </div>
                                        @endif
                                        @if(settings('telegram_url'))
                                            <div class="col-xl col-2">
                                                <a href="{{ settings('telegram_url') }}" target="_blank">
                                                    <img class="img-fluid" src="{{ asset('images/social/4.png') }}"
                                                         alt=""/>
                                                </a>
                                            </div>
                                        @endif
                                        @if(settings('youtube_url'))
                                            <div class="col-xl col-2">
                                                <a href="{{ settings('youtube_url') }}" target="_blank">
                                                    <img class="img-fluid" src="{{ asset('images/social/9.png') }}"
                                                         alt=""/>
                                                </a>
                                            </div>
                                        @endif
                                        @if(settings('telegram_group_url'))
                                            <div class="col-xl col-2">
                                                <a href="{{ settings('telegram_group_url') }}" target="_blank">
                                                    <img class="img-fluid" src="{{ asset('images/social/4.png') }}"
                                                         alt="Telegram Community"/>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-xl-6 assets-al ">
            <div class="card">
                <div class="card-body text-center">
                    @if($liveICO)
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="mb-0">Current Coin Price</h4>
                                <h1 class="mb-0 text-primary">
                                    1 {{ env('APP_CURRENCY') }} = € {{ $liveICO->price  }}
                                </h1>
                                <!-- <div class="card mt-4">
    <div class="card-body">
        <h4 class="mb-3">Live HRA Coin Price Chart</h4>
        <iframe
            src="https://dexscreener.com/bsc/0x5e64326ce6df66cdfa62f8b154097bf536233451?embed=1"
            frameborder="0"
            width="100%"
            height="300"
            style="border:none;overflow:hidden;border-radius:12px;"
            sandbox="allow-scripts allow-same-origin allow-popups">
        </iframe>
    </div>
</div> -->
                            </div>
                            <div class="mb-0">
                                <h4 class="mb-1"> ICO Details</h4>
                                <span
                                    class="">{{ Carbon\Carbon::parse($liveICO['start_date'])->format('jS M Y')  }} - {{ Carbon\Carbon::parse($liveICO['end_date'])->format('jS M Y')  }}</span>
                            </div>
                            

                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if($icoLists)
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    @foreach($icoLists as $key=>$icoList)
                        @if($key == 0)
                            <div class="col-lg-12">
                                @else
                                    <div class="col-lg-3">
                                        @endif
                                        <div
                                            class="card ribbon-box {{$icoList['statusNumber'] == 2 ? 'bg-white' : ''}}">
                                            <div class="card-body">

                                                <div
                                                    class="ribbon-2 {{$icoList['statusNumber'] == 1 ? 'red' : 'primary'}} {{$icoList['statusNumber'] == 2 ? 'blinking' : ''}}">{{$icoList['status']}}</div>
                                                <div class="ribbon-content">
                                                    <h1 class="text-primary mt-0">
                                                    <span
                                                        class="{{$icoList['statusNumber'] == 2 ? 'text-warning' : ''}}">{{ $icoList['ico_name'] }} at</span> {{ $icoList['rate'] }}
                                                    </h1>
                                                    <p class="mb-0 font-weight-600 {{$icoList['statusNumber'] == 2 ? 'text-dark' : ''}}">
                                                        {{Carbon\Carbon::parse($icoList['start_date'])->format('jS M Y') }}
                                                        - {{ Carbon\Carbon::parse($icoList['end_date'])->format('jS M Y') }}
                                                    </p>
                                                    <div class="progress mt-3">
                                                        <div class="progress-bar progress-animated bg-primary mb-3"
                                                             style="width: {{$icoList['progressBar']}}%; height:14px;"
                                                             role="progressbar">
                                                        <span
                                                            class="sr-only">{{$icoList['progressBar']}}% Complete </span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-between my-2 font-weight-600 {{$icoList['statusNumber'] == 2 ? 'text-dark' : ''}}">

                                                        <small>
                                                            {{ $icoList['totalPurchase'] }}
                                                        </small>
                                                        <small>
                                                            {{ $icoList['supply'] }} Supply
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                            </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@push('page-javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js"></script>
    <script>
        @if($liveICO)
        const daysEl = $('.days');
        const hoursEl = $('.hours');
        const minutesEl = $('.minutes');
        const secondsEl = $('.seconds');
        const launchMoment = moment('{{ $liveICO['end_date'] }}');

        const countDownInterval = setInterval(() => {
            const now = moment(); // Get the current time inside the interval
            let duration = moment.duration(launchMoment.diff(now)); // Subtract current time from launchMoment

            if (duration.asSeconds() <= 0) {
                daysEl.html('0');
                hoursEl.html('0');
                minutesEl.html('0');
                secondsEl.html('0');
                clearInterval(countDownInterval);
            } else {
                let days = Math.floor(duration.asDays());
                let hours = duration.hours();
                let minutes = duration.minutes();
                let seconds = duration.seconds();

                daysEl.html(days);
                hoursEl.html(hours >= 10 ? hours : `0${hours}`);
                minutesEl.html(minutes >= 10 ? minutes : `0${minutes}`);
                secondsEl.html(seconds >= 10 ? seconds : `0${seconds}`);
            }
        }, 1000);

        @endif
    </script>
@endpush
