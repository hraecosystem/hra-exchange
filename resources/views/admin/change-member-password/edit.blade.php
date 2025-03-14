@extends('admin.layouts.master')

@section('title')
    Change Password
@endsection

@section('content')
    @include('admin.breadcrumbs', [
    'crumbs' => [
        'Change Password'
        ]
    ])
    <div class="row match-height">
        <div class="col-lg-5 formContainer">
            <form action="{{route('admin.members.change-password.update', $member)}}" method="post">
                @csrf
                @method('patch')
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-primary">{{ $member->user->name }} | User ID : {{ $member->code }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group col-xl">
                            <div class="form-password-toggle">
                                <div class="input-group input-group-merge">
                                    <div class="form-floating form-floating-outline">
                                        <input type="password" class="form-control textPassword" id="password"
                                               name="password"
                                               required
                                               placeholder="Enter New Password">
                                        <label for="password" class="required">New Password</label>
                                    </div>
                                    <span class="input-group-text cursor-pointer">
                                            <i class="mdi mdi-eye-off-outline"></i>
                                        </span>
                                </div>
                            </div>
                            <div class="passwordValidator" style="display:none"></div>
                            @foreach($errors->get('password') as $error)
                                <div class="text-danger">{{ $error }}</div>
                            @endforeach
                        </div>
                        <div class="form-group col-xl">
                            <div class="form-password-toggle">
                                <div class="input-group input-group-merge">
                                    <div class="form-floating form-floating-outline">
                                        <input type="password" class="form-control" id="password_confirmation"
                                               name="password_confirmation" required
                                               placeholder="Enter Confirm Password">
                                        <label for="password_confirmation" class="required">Confirm Password</label>
                                    </div>
                                    <span class="input-group-text cursor-pointer">
                                            <i class="mdi mdi-eye-off-outline"></i>
                                        </span>
                                </div>
                                @foreach($errors->get('password_confirmation') as $error)
                                    <div class="text-danger">{{ $error }}</div>
                                @endforeach
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary"><i class="uil uil-message me-1"></i>
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @if(settings('transaction_password'))
            <div class="col-lg-5">
                <form action="{{route('admin.members.transaction-change-password.update', $member)}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-primary">Change Transaction Password </h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group col-xl">
                                <div class="form-password-toggle">
                                    <div class="input-group input-group-merge">
                                        <div class="form-floating form-floating-outline">
                                            <input type="password" id="transaction_password" class="form-control"
                                                   name="transaction_password"
                                                   placeholder="Enter New Transaction Password" required>
                                            <label for="transaction_password">New Transaction Password</label>
                                        </div>
                                        <span class="input-group-text cursor-pointer">
                                            <i class="mdi mdi-eye-off-outline"></i>
                                        </span>
                                    </div>
                                </div>
                                @foreach($errors->get('transaction_password') as $error)
                                    <div class="text-danger">{{ $error }}</div>
                                @endforeach
                            </div>
                            <div class="form-group col-xl">
                                <div class="form-password-toggle">
                                    <div class="input-group input-group-merge">
                                        <div class="form-floating form-floating-outline">
                                            <input type="password" id="transaction_password_confirmation"
                                                   class="form-control textConfirmPassword"
                                                   name="transaction_password_confirmation"
                                                   placeholder="Enter Confirm Transaction Password" required>
                                            <label for="transaction_password_confirmation">Confirm Transaction
                                                Password</label>
                                        </div>
                                        <span class="input-group-text cursor-pointer">
                                            <i class="mdi mdi-eye-off-outline"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="uil uil-message me-1"></i>
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        @endif
    </div>
@endsection
@push('page-javascript')
    <script src="{{ asset('js/password-validator.js') }}"></script>
@endpush
