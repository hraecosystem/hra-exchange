@extends('member.layouts.master')

@section('title')
    Create P2P Transfer
@endsection

@section('content')
    @include('member.breadcrumbs', [
         'crumbs' => [
             'Create P2P Transfer'
         ]
    ])
    <form method="post" action="{{ route('member.p2p-transfers.store') }}">
        @csrf
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="text-red">
                                    Current {{ env('APP_CURRENCY') }} Balance: {{ $coinBalance }}
                                </p>
                                <div class="form-group">
                                    <div class="form-floating form-floating-outline">
                                        <input type="text" name="to_email_code" class="form-control"
                                               placeholder="Enter To Email Or Code" required>
                                        <label for="code" class="required">To Email Or Code</label>
                                    </div>
                                    @foreach($errors->get('to_email_code') as $error)
                                        <div class="text-danger">{{ $error }}</div>
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <div class="form-floating form-floating-outline">
                                        <input type="number" name="amount" class="form-control"
                                               placeholder="Enter Amount ({{ env('APP_CURRENCY') }})" required>
                                        <label for="code" class="required">Amount ({{ env('APP_CURRENCY') }})</label>
                                    </div>
                                    @foreach($errors->get('amount') as $error)
                                        <div class="text-danger">{{ $error }}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="subButton" class="btn btn-primary waves-effect waves-light">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
