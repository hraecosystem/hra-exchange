@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
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
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Requested HRA</th>
                            <th>Equivalent Fiat</th>
                            <th>Bank Name</th>
                            <th>IBAN</th>
                            <th>Status</th>
                            <th>Submitted At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($requests as $request)
                            <tr>
                                <td>{{ $request->id }}</td>
                                <td>
                                    @if ($request->user && $request->user->member)
                                        {{ $request->user->name }} ({{ $request->user->member->code }})
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>{{ number_format($request->amount_hra, 8) }}</td>
                                <td>{{ number_format($request->amount_fiat, 2) }} EUR</td> {{-- Assuming EUR, adjust currency --}}
                                <td>{{ $request->bank_name }}</td>
                                <td>{{ $request->iban }}</td>
                                <td>
                                    <span class="badge badge-{{ $request->status == 'pending' ? 'warning' : ($request->status == 'approved' ? 'success' : 'danger') }}">
                                        {{ ucfirst($request->status) }}
                                    </span>
                                </td>
                                <td>{{ $request->created_at->format('Y-m-d H:i') }}</td>
                                <td>
                                    <a href="{{ route('admin.bank-transfer-requests.show', $request) }}" class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">No bank transfer requests found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
