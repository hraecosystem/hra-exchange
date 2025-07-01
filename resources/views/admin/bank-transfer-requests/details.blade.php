@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <h2>Bank Transfer Request Details (ID: {{ $bankTransferRequest->id }})</h2>

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

        <div class="card mb-4">
            <div class="card-header">
                Request Details
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Requested HRA:</strong> {{ number_format($bankTransferRequest->amount_hra, 8) }}</p>
                        <p><strong>Equivalent Fiat:</strong> {{ number_format($bankTransferRequest->amount_fiat, 2) }} EUR
                            {{-- Adjust currency --}}</p>
                        <p><strong>Bank Name:</strong> {{ $bankTransferRequest->bank_name }}</p>
                        <p><strong>Account Holder Name:</strong> {{ $bankTransferRequest->account_name }}</p>
                        <p><strong>IBAN:</strong> {{ $bankTransferRequest->iban }}</p>
                        <p><strong>SWIFT Code:</strong> {{ $bankTransferRequest->swift_code ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Status:</strong>
                            <span
                                class="badge badge-{{ $bankTransferRequest->status == 'pending' ? 'warning' : ($bankTransferRequest->status == 'approved' ? 'success' : 'danger') }}">
                                {{ ucfirst($bankTransferRequest->status) }}
                            </span>
                        </p>
                        <p><strong>Submitted At:</strong> {{ $bankTransferRequest->created_at->format('Y-m-d H:i') }}</p>
                        @if ($bankTransferRequest->status !== 'pending')
                            <p><strong>Processed At:</strong> {{ $bankTransferRequest->updated_at->format('Y-m-d H:i') }}
                            </p>
                            <p><strong>Admin Notes:</strong> {{ $bankTransferRequest->admin_notes ?? 'N/A' }}</p>
                            @if ($bankTransferRequest->payment_proof)
                                <p><strong>Payment Proof:</strong>
                                    {{-- Assuming payment_proof stores a file path or URL --}}
                                    @if (Storage::exists($bankTransferRequest->payment_proof))
                                        <a href="{{ Storage::url($bankTransferRequest->payment_proof) }}"
                                            target="_blank">View Proof</a>
                                    @else
                                        {{ $bankTransferRequest->payment_proof }} {{-- Display as text if not a file path --}}
                                    @endif
                                </p>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                User Details
            </div>
            <div class="card-body">
                @if ($bankTransferRequest->user)
                    <p><strong>Name:</strong> {{ $bankTransferRequest->user->name }}</p>
                    <p><strong>Email:</strong> {{ $bankTransferRequest->user->email }}</p>
                    @if ($bankTransferRequest->user->member)
                        <p><strong>Member Code:</strong> {{ $bankTransferRequest->user->member->code }}</p>
                        {{-- Display the user's current HRA balance from the Member model --}}
                        <p><strong>Current HRA Balance:</strong>
                            {{ number_format($bankTransferRequest->user->member->coin_wallet_balance ?? 0, 8) }}</p>
                        {{-- Link to user's profile in admin panel if available --}}
                        {{-- <p><a href="{{ route('admin.users.show', $bankTransferRequest->user) }}" class="btn btn-sm btn-secondary">View User Profile</a></p> --}}
                    @else
                        <p>Member details not available.</p>
                    @endif
                @else
                    <p>User details not available.</p>
                @endif
            </div>
        </div>

        {{-- Show Approve/Reject forms only if status is pending --}}
        @if ($bankTransferRequest->status === 'pending')
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            Approve Request
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.bank-transfer-requests.approve', $bankTransferRequest) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="payment_proof">Payment Proof (File or Transaction ID)</label>
                                    {{-- Choose one: file upload or text input for transaction ID --}}
                                    <input type="file" class="form-control-file" id="payment_proof" name="payment_proof">
                                    {{-- OR --}}
                                    {{-- <input type="text" class="form-control" id="transaction_id" name="transaction_id" placeholder="Enter Transaction ID"> --}}
                                    @error('payment_proof')
                                        {{-- Or transaction_id --}}
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="admin_notes_approve">Admin Notes (Optional)</label>
                                    <textarea class="form-control" id="admin_notes_approve" name="admin_notes" rows="3">{{ old('admin_notes') }}</textarea>
                                    @error('admin_notes')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-success">Approve Request</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-danger text-white">
                            Reject Request
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.bank-transfer-requests.reject', $bankTransferRequest) }}"
                                method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="admin_notes_reject">Admin Notes (Reason for Rejection)</label>
                                    <textarea class="form-control" id="admin_notes_reject" name="admin_notes" rows="3" required>{{ old('admin_notes') }}</textarea>
                                    @error('admin_notes')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <input type="text" hidden name="amout_rejected" value="{{$bankTransferRequest->amount_hra}}">
                                <button type="submit" class="btn btn-danger">Reject Request</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="mt-4">
            <a href="{{ route('admin.bank-transfer-requests.index') }}" class="btn btn-secondary">Back to List</a>
        </div>

    </div>
@endsection
