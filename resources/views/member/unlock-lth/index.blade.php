@extends('member.layouts.master')

@section('title')
    Unlock LTH
@endsection

@section('content')
    @include('member.breadcrumbs', [
                   'crumbs' => [
                       'Unlock LTH'
                   ]
              ])
    <div class="row justify-content-center">
        <div class="col-xl-6">
            <div class="row">
                <div class="col-xl-12">
                    <div class="widget-stat card bg-success">
                        <div class="card-body  p-4">
                            <div class="media">
                    <span class="me-3">
                        <i class="fa-duotone fa-hands-holding-dollar"></i>
                    </span>
                                <div class="media-body text-white">
                                    <p class="mb-1">Balance LTH</p>
                                    <h3 class="text-white">{{$totalPurchaseCoin}}</h3>
                                    <div class="progress mb-2 bg-secondary">
                                        <div class="progress-bar progress-animated bg-white" style="width: 80%"></div>
                                    </div>
                                    <small></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="widget-stat card bg-danger">
                        <div class="card-body  p-4">
                            <div class="media">
                    <span class="me-3">
                       <i class="fa-duotone fa-hand-holding-hand"></i>
                    </span>
                                <div class="media-body text-white">
                                    <p class="mb-1">Hold LTH</p>
                                    <h3 class="text-white">{{ $totalIcoBonus }}</h3>
                                    <div class="progress mb-2 bg-secondary">
                                        <div class="progress-bar progress-animated bg-white" style="width: 80%"></div>
                                    </div>
                                    <small></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body py-0">
                    <ul class="list-group list-group-flush">
                        @for($i=1; $i<=10 ; $i++)
                        <li class="list-group-item d-flex px-0 justify-content-between align-items-center">
                            <img class="img-fluid" width="42" height="42" src="{{ asset('images/favicon.png') }}" alt="">
                            <div class="w-100 ms-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-0 text-black font-w600">{{ $i.nthNumber($i) }} Month</p>
                                    <span class="ms-auto fs-15 mb-0  text-primary font-w600">{{$totalIcoBonus * 10/100}} LTH</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-success">10%</small>
                                </div>
                            </div>
                        </li>
                        @endfor
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('page-javascript')

@endpush
