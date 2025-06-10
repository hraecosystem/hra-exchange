@extends('member.layouts.master')

@section('title')
    List Bank Transfer Requests
@endsection

@section('content')
    <div class="container">
        <h2>Bank Transfer Requests</h2>

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
                Your HRA Coin Balance: {{ number_format($hraBalance, 8) }}
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Bank Name</th>
                            <th>Account Holder Name</th>
                            <th>IBAN</th>
                            <th>SWIFT Code</th>
                            <th>Status</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bankTransferRequests as $request)
                            <tr>
                                <td>{{ $request->id }}</td>
                                <td>{{ $request->bank_name }}</td>
                                <td>{{ $request->account_name }}</td>
                                <td>{{ $request->iban }}</td>
                                <td>{{ $request->swift_code }}</td>
                                <td>{{ $request->status }}</td>
                                <td>{{ $request->created_at->format('Y-m-d H:i:s') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
@endsection
