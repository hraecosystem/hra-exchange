@extends('admin.layouts.master')

@section('title', 'Create P2P Transfer')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Create P2P Transfer</li>
                    </ol>
                </div>
                <h4 class="page-title">Create P2P Transfer </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.p2p-transfers.store') }}" method="POST">
                        @csrf
                        <div class="ribbon-content">
                            <div class="form-group">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="from_email_code" name="from_email_code" class="form-control"
                                           placeholder="Enter From Email Or Code" value="{{ old('from_email_code') }}" required>
                                    <label for="from_email_code" class="required"> From Email Or Code</label>
                                </div>
                                <div class="text-danger transferName"></div>
                                @foreach($errors->get('from_email_code') as $error)
                                    <div class="text-danger code-error">{{ $error }}</div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="to_email_code" name="to_email_code" class="form-control"
                                           placeholder="Enter To Email Or Code" value="{{ old('to_email_code') }}" required>
                                    <label for="to_email_code" class="required"> To Email Or Code</label>
                                </div>
                                <div class="text-danger transferName"></div>
                                @foreach($errors->get('to_email_code') as $error)
                                    <div class="text-danger code-error">{{ $error }}</div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <div class="form-floating form-floating-outline">
                                    <input type="number" id="amount" name="amount" class="form-control"
                                           placeholder="Enter Amount ({{ env('APP_CURRENCY') }})" value="{{ old('amount') }}" required>
                                    <label for="amount" class="required"> Amount ({{ env('APP_CURRENCY') }})</label>
                                </div>
                                @foreach($errors->get('amount') as $error)
                                    <span class="text-danger">{{ $error }}</span>
                                @endforeach
                            </div>

                            <div class="col-12 mt-2 text-center">
                                <a href="{{ route('admin.p2p-transfers.index') }}" class="btn btn-danger me-2">
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
