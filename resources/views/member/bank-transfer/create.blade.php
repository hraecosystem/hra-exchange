@extends('member.layouts.master')

@section('title')
    Bank transation
@endsection

@section('content')
    <div class="container">
        <h2>Bank Transfer Request </h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <p class="coin"> Your HRA Coin Balance: {{ number_format($hraBalance, 8) }} </p>
                <p class="coin"> Your HRA Coin Balance in Euro : {{ number_format($totalBalanceDollar, 2) }} <i
                        class="fa-solid fa-euro-sign"></i></p>
            </div>
            <div class="card-body">
                <form action="{{ route('member.bank-transfer.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="bank_name">Bank Name</label>
                        <input type="text" class="form-control" id="bank_name" name="bank_name"
                            value="{{ old('bank_name') }}" required>
                        @error('bank_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="account_name">Account Holder Name</label>
                        <input type="text" class="form-control" id="account_name" name="account_name"
                            value="{{ old('account_name') }}" required>
                        @error('account_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="iban">IBAN</label>
                        <input type="text" class="form-control" id="iban" name="iban" value="{{ old('iban') }}"
                            required>
                        @error('iban')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="swift_code">SWIFT Code (Optional)</label>
                        <input type="text" class="form-control" id="swift_code" name="swift_code"
                            value="{{ old('swift_code') }}">
                        @error('swift_code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="amount_hra">Amount (HRA Coin)</label>
                        <input type="number" step="any" class="form-control" id="amount_hra" name="amount_hra"
                            value="{{ old('amount_hra') }}" required min="0.00000001" max="{{ $hraBalance }}">
                        @error('amount_hra')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-primary">Submit Request</button>
                        <p class="transit"></p>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        // calculate the amount_hra value in Euro and display it
        document.addEventListener('DOMContentLoaded', function() {
            const amountHraInput = document.getElementById('amount_hra');
            const totalBalanceDollar = {{ $totalBalanceDollar }};

            amountHraInput.addEventListener('input', function() {
                const amountHra = parseFloat(amountHraInput.value);
                if (!isNaN(amountHra) && amountHra > 0) {
                    const euroValue = (amountHra / {{ $hraBalance }}) * totalBalanceDollar;
                    document.querySelector('.transit').innerText =
                        `Your HRA Coin Balance in Euro: ${euroValue.toFixed(2)} €`;
                } else {
                    document.querySelector('.transit').innerText =
                        `Your HRA Coin Balance in Euro: ${totalBalanceDollar.toFixed(2)} €`;
                }
            });
        });
    </script>
@endsection
