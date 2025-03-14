@extends('admin.layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    @include('admin.breadcrumbs', [
          'crumbs' => [
              'Dashboard'
          ]
     ])
    <div class="row match-height">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body statics">
                    <div class="row">
                        <div class="col-sm-6 col-xl-3 col-6 mb-lg-0 mb-2">
                            <a href="{{ route('admin.members.index') }}">
                                <div class="text-center">
                                    <i class="fa-duotone fa-users"></i>
                                    <h3 class="my-1"><span data-plugin="counterup">{{ $totalMembers }}</span></h3>
                                    <p class="text-dark font-15 mb-0">Total Users</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-xl-3 col-6 mb-lg-0 mb-2">
                            <a href="{{ route('admin.members.index',['from_created_at' => \Carbon\Carbon::now()->startOfDay()->format('Y-m-d'), 'to_created_at' => \Carbon\Carbon::now()->endOfDay()->format('Y-m-d')]) }}">
                                <div class="text-center">
                                    <i class="fa-duotone fa-user-clock"></i>
                                    <h3 class="my-1"><span
                                            data-plugin="counterup">{{ $last24HoursRegisterMembers }}</span></h3>
                                    <p class="text-dark font-15 mb-0">Users <br><small class="text-muted">(Register In last 24
                                            hours)</small></p>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-xl-3 col-6 mb-lg-0 mb-2">
                            <a href="{{ route('admin.members.index',['from_created_at' => \Carbon\Carbon::now()->subDays(6)->format('Y-m-d'), 'to_created_at' => \Carbon\Carbon::now()->endOfDay()->format('Y-m-d')]) }}">
                                <div class="text-center">
                                    <i class="fa-duotone fa-user-clock"></i>
                                    <h3 class="my-1"><span
                                            data-plugin="counterup">{{ $last7DaysRegisterMembers }}</span></h3>
                                    <p class="text-dark font-15 mb-0">Users <br><small class="text-muted">(Register In last 7
                                            Days)</small></p>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-xl-3 col-6 mb-lg-0 mb-2">
                            <a href="{{ route('admin.members.index',['from_created_at' => \Carbon\Carbon::now()->subDays(29)->format('Y-m-d'), 'to_created_at' => \Carbon\Carbon::now()->endOfDay()->format('Y-m-d')]) }}">
                                <div class="text-center">
                                    <i class="fa-duotone fa-user-clock"></i>
                                    <h3 class="my-1"><span
                                            data-plugin="counterup">{{ $last30DaysRegisterMembers }}</span></h3>
                                    <p class="text-dark font-15 mb-0">Users <br><small class="text-muted">(Register In last 30
                                            Days)</small></p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body statics">
                    <div class="row">
                        <div class="col-sm-6 col-xl-3 col-6 mb-lg-0 mb-2">
                            <a href="{{ route('admin.deposit.index',['from_created_at' => \Carbon\Carbon::now()->subDays(6)->format('Y-m-d'), 'to_created_at' => \Carbon\Carbon::now() , 'status' => \App\Models\Deposit::STATUS_COMPLETED]) }}">
                            <div class="text-center">
                                    <i class="fa-duotone fa-coins text-success"></i>
                                    <h3 class="my-1"><span data-plugin="counterup">{{ toHumanReadable($last24HoursInvestment) }}</span>
                                    </h3>
                                    <p class="text-dark font-15 mb-0">Investment ({{ env('APP_CURRENCY') }}) <br><small class="text-muted">(In last
                                            24 hours)</small></p>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-xl-3 col-6 mb-lg-0 mb-2">
                            <a href="{{ route('admin.deposit.index',['from_created_at' => \Carbon\Carbon::now()->subDays(6)->format('Y-m-d'), 'to_created_at' => \Carbon\Carbon::now()->endOfDay()->format('Y-m-d') , 'status' => \App\Models\Deposit::STATUS_COMPLETED]) }}">
                                <div class="text-center">
                                    <i class="fa-duotone fa-coins text-success"></i>
                                    <h3 class="my-1"><span data-plugin="counterup">{{ toHumanReadable($last7DaysInvestment) }}</span>
                                    </h3>
                                    <p class="text-dark font-15 mb-0">Investment ({{ env('APP_CURRENCY') }})<br><small class="text-muted">(In last
                                            7 Days)</small></p>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-xl-3 col-6 mb-lg-0 mb-2">
                            <a href="{{ route('admin.deposit.index',['from_created_at' => \Carbon\Carbon::now()->subDays(29)->format('Y-m-d'), 'to_created_at' => \Carbon\Carbon::now()->endOfDay()->format('Y-m-d'), 'status' => \App\Models\Deposit::STATUS_COMPLETED]) }}">
                                <div class="text-center">
                                    <i class="fa-duotone fa-coins text-success"></i>
                                    <h3 class="my-1"><span data-plugin="counterup">{{ toHumanReadable($last30DaysInvestment) }}</span>
                                    </h3>
                                    <p class="text-dark font-15 mb-0">Investment ({{ env('APP_CURRENCY') }})<br><small class="text-muted">(In last
                                            30 Days)</small></p>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-xl-3 col-6 mb-lg-0 mb-2">
                            <a href="{{ route('admin.deposit.index') }}">
                                <div class="text-center">
                                    <i class="fa-duotone fa-coins text-success"></i>
                                    <h3 class="my-1"><span data-plugin="counterup">{{ toHumanReadable($lifetimeInvestment) }}</span>
                                    </h3>
                                    <p class="text-dark font-15 mb-0">Investment ({{ env('APP_CURRENCY') }})<br><small class="text-muted">(Lifetime)</small></p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title mb-0 me-2">Last 5 Registration</h5>
                </div>
                <div class="card-body pt-2">
                    <ul class="p-0 m-0">
                        @foreach($lastFiveRegisterMembers as $key => $member)
                            <li class="d-flex mb-3 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="{{ $member->present()->profileImage() }}" alt="avatar" class="rounded">
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-1 fw-semibold">
                                            {{ $member->user->name }}
                                        </h6>
                                        <small class="text-muted">
                                            <i class="mdi mdi-calendar-blank-outline mdi-14px"></i>
                                            <span>{{ $member->created_at->dateFormat() }}</span>
                                        </small>
                                    </div>
                                    <div class="text-end">
                                        <button class="btn btn-link p-0 font-weight-bold" type="button"
                                                data-clipboard-text="{{ $member->code }}"
                                                data-bs-original-title="Click To Copy" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom">
                                            {{ $member->code }}
                                        </button>
                                        <br>
                                        <small>User ID</small>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @if(count($lastFiveInvestments)>0)
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title mb-0 me-2">Last 5 Investments</h5>
                    </div>
                    <div class="card-body pt-2">
                        <ul class="p-0 m-0">
                            @foreach($lastFiveInvestments as $key => $lastFiveInvestment)
                                <li class="d-flex mb-3 pb-1">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <div class="avatar-initial bg-label-primary rounded">
                                            <i class="fa-duotone fa-money-bill-transfer"></i>
                                        </div>
                                    </div>
                                    <div
                                        class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <h6 class="mb-1 fw-semibold">
                                                {{ $lastFiveInvestment->member->user->name }}
                                            </h6>
                                            <small class="text-muted">
                                                <i class="mdi mdi-calendar-blank-outline mdi-14px"></i>
                                                <span>{{ $lastFiveInvestment->created_at->dateFormat() }}</span>
                                            </small>
                                        </div>
                                        <div>
                                            <div class="mb-0">{{ toHumanReadable($lastFiveInvestment->amount) }} (<small
                                                    class="font-weight-normal text-success">Euro {{ toHumanReadable($lastFiveInvestment->euro_amount) }}</small>)
                                            </div>
                                            <button class="btn btn-link p-0 font-weight-bold" type="button"
                                                    data-clipboard-text="{{ $lastFiveInvestment->transaction_hash }}"
                                                    data-bs-original-title="Click To Copy" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom">
                                                {{ substr($lastFiveInvestment->transaction_hash, 0, 5). "..." .substr($lastFiveInvestment->transaction_hash, -5) }}
                                            </button>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body" dir="ltr">
                    <h5 class="header-title mb-3">Days Wise Investment</h5>
                    <canvas id="dailyTurnOverChart" height="350vw" width="500vw"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body" dir="ltr">
                    <h5 class="header-title mb-3">User Registration</h5>
                    <canvas id="dailyJoining" height="350vw" width="500vw"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('page-javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
    <script>
        let ctx = document.getElementById('dailyTurnOverChart');

        ctx.height = 350;

        var dailyTurnOverChart = new Chart(ctx, {
            responsive: true,
            type: 'line',
            data: {
                labels: {!! json_encode($dayWiseInvestment->pluck('day')) !!},
                datasets: [{
                    label: 'Day Wise Investment',
                    data: {!! json_encode($dayWiseInvestment->pluck('amount')) !!},
                    backgroundColor: 'rgba(21, 37, 67, 0.5)',
                    borderColor: 'rgba(21, 37, 67, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Date'
                        },
                        ticks: {
                            major: {
                                fontStyle: 'bold',
                                fontColor: '#FF0000'
                            }
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: function (value) {
                                if (value % 1 === 0) {
                                    return value;
                                }
                            },
                        },
                        scaleLabel: {
                            display: true,
                            labelString: "Amount ({{ env('APP_CURRENCY') }})"
                        }
                    }]
                }
            }
        });

        ctx = document.getElementById('dailyJoining');

        ctx.height = 350;

        var dailyJoining = new Chart(ctx, {
            responsive: true,
            type: 'bar',
            data: {
                labels: {!! json_encode($dayCountMembersJoins->pluck('day')) !!},
                datasets: [{
                    label: 'User Registration',
                    data: {!! json_encode($dayCountMembersJoins->pluck('total_member')) !!},
                    backgroundColor: 'rgba(21, 37, 67, 0.5)',
                    borderColor: 'rgba(21, 37, 67, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Date'
                        },
                        ticks: {
                            major: {
                                fontStyle: 'bold',
                                fontColor: '#FF0000'
                            }
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: function (value) {
                                if (value % 1 === 0) {
                                    return value;
                                }
                            },
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Users'
                        }
                    }]
                }
            }
        });
    </script>
@endpush
