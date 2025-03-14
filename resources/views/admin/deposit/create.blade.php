@extends('admin.layouts.master')
@section('title','Create Manual Deposit')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Create Manual Deposit</li>
                    </ol>
                </div>
                <h4 class="page-title">Create Manual Deposit </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.deposit.store') }}" method="POST">
                        @csrf
                        <div class="ribbon-content">
                            <div class="form-group">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="code" name="code" class="form-control transferCodeInput"
                                           placeholder="Enter {{ settings('member_name') }} ID" value="{{old('code')}}" required>
                                    <label for="code" class="required"> {{ settings('member_name') }} ID</label>
                                </div>
                                <div class="text-danger transferName"></div>
                                @foreach($errors->get('code') as $error)
                                    <div class="text-danger code-error">{{ $error }}</div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="transaction_hash" name="transaction_hash" class="form-control"
                                           placeholder="Enter Tx Hash" value="{{old('transaction_hash')}}" required>
                                    <label for="transaction_hash" class="required"> Tx Hash</label>
                                </div>
                                @foreach($errors->get('transaction_hash') as $error)
                                    <span class="text-danger">{{ $error }}</span>
                                @endforeach
                            </div>

                            <div class="col-12 mt-2 text-center">
                                <a href="{{ route('admin.deposit.index') }}" class="btn btn-danger me-2">
                                    <i class="uil uil-sign-out-alt"></i>
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-primary me-2">
                                    <i class="uil uil-message"></i>
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('page-javascript')
    <script>
        $(document).ready(function () {
            let code = $(".transferCodeInput").val();
            if (code) {
                fetchData(code);
            }
        });

        $("body .transferCodeInput").on('input', function () {
            let code = $(".transferCodeInput").val();

            fetchData(code);
        });

        function fetchData(code) {
            if (code.length >= 6) {
                $.ajax({
                    url: route('admin.members.detail', code),
                    data: {code: code},
                    async: false,
                    dataType: 'json',
                    success: function (data) {
                        $('.transferName').html('');
                        $('.code-error').html('');
                        if (data) {
                            $('.transferName').html(
                                '<span class="help-block text-primary font-weight-bold">' + data.name + '</span>'
                            );
                        }
                    },
                    error: function (jqXHR) {
                        $('.transferName').html('');
                        $('.code-error').html('');
                        if (jqXHR.status === 404) {
                            $('.transferName').html(
                                '<span class="help-block text-danger font-weight-bold">Data not found</span>'
                            );
                        } else {
                            $('.transferName').html(
                                '<span class="help-block text-danger font-weight-bold">Something went wrong, please try again</span>'
                            );
                        }
                    },
                });
            } else {
                $('.transferName').html('');
                $('.code-error').html('');
                if (code.length > 0) {
                    $('.transferName').html(
                        '<span class="help-block transferName text-danger font-weight-bold">Data not found</span>'
                    );
                }
            }
        }
    </script>
@endpush
