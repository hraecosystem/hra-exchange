@extends('member.layouts.master')

@section('title')
    {{$title}}
@endsection

@section('content')
    @include('member.breadcrumbs', [
         'crumbs' => [
           $title
         ]
    ])
    <div class="row">
        @if($deposits->count())
            @foreach($deposits as $deposit)
                <div class="col-xl-6">
                    <div class="card deposit-card">
                        <div class="card-body pb-0">
                            @if($deposit)
                                @if($deposit->status === \App\Models\Deposit::STATUS_PENDING)
                                    <div class="status bg-warning">
                                        {{ \App\Models\Deposit::STATUSES[$deposit->status] }}
                                    </div>
                                @endif
                                @if($deposit->status == \App\Models\Deposit::STATUS_COMPLETED)
                                    <div class="status bg-success">
                                        {{ \App\Models\Deposit::STATUSES[$deposit->status] }}
                                    </div>
                                @endif
                                @if($deposit->status == \App\Models\Deposit::STATUS_FAILED)
                                    <div class="status bg-danger">
                                        {{ \App\Models\Deposit::STATUSES[$deposit->status] }}
                                    </div>
                                @endif
                                @if($deposit->status == \App\Models\Deposit::STATUS_CANCELLED)
                                    <div class="status bg-info">
                                        {{ \App\Models\Deposit::STATUSES[$deposit->status] }}
                                    </div>
                                @endif
                                @if($deposit->status == \App\Models\Deposit::STATUS_EXPIRED)
                                    <div class="status bg-dark text-white">
                                        {{ \App\Models\Deposit::STATUSES[$deposit->status] }}
                                    </div>
                                @endif
                            @endif
                            <div class="row mt-3">
                                <div class="col-md-6 col-6 mb-4">
                                    <div class="d-flex flex-row">
                                        <div>
                                            <i class="fa-duotone fa-calendar-days me-3"></i>
                                        </div>
                                        <div>
                                            <p class="mb-0">Date</p>
                                            <h4 class="mb-0">{{ Carbon\Carbon::parse($deposit->created_at)->format('d-m-Y h:i A') }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-6 mb-4">
                                    <div class="d-flex flex-row">
                                        <div>
                                            <i class="fa-duotone fa-coin me-3"></i>
                                        </div>
                                        <div>
                                            <p class="mb-0">COIN PRICE</p>
                                            <h4 class="mb-0">{{$deposit->coin_price > 0 ? toHumanReadable($deposit->coin_price) : '0' }}
                                                Euro</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-6 mb-4">
                                    <div class="d-flex flex-row">
                                        <div><i class="fa-duotone fa-dollar-sign me-3"></i></div>
                                        <div>
                                            <p class="mb-0">AMOUNT (Euro)</p>
                                            <h4>{{$deposit->euro_amount > 0 ? toHumanReadable($deposit->euro_amount) : '0' }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-6 mb-4">
                                    <div class="d-flex flex-row">
                                        <div><i class="fa-duotone fa-sack-dollar me-3"></i></div>
                                        <div>
                                            <p class="mb-0">AMOUNT ({{ env('APP_CURRENCY') }})</p>
                                            <h4>{{$deposit->amount > 0 ? toHumanReadable($deposit->amount) : '0' }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-12">
                {{ $deposits->links('pagination::bootstrap-5') }}
            </div>
        @else
            <div class="form-input-content text-center error-page">
                <h4 class="error-text fw-bold"><i class="fa fa-exclamation-triangle text-warning"></i></h4>
                <h4 class="text-nowrap">No Data Found..!!</h4>
            </div>
        @endif
    </div>
@endsection

