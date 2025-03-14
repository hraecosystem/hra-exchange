@php use App\Models\Member; @endphp
@extends('member.layouts.master')

@section('title','My Profile')

@section('content')
    @include('member.breadcrumbs', [
          'crumbs' => [
              'My Profile'
          ]
     ])
    <div class="row">
        <div class="col-lg-7">
            <form action="{{route('member.profile.update')}}" method="post" class="filePondForm">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">My Profile</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 form-group mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input id="name" type="text" name="name" class="form-control"
                                           placeholder="Enter Name"
                                           value="{{ old('name', $member->user->name) }}" readonly>
                                    <label for="name">Name</label>
                                </div>
                            </div>
                            {{--                            <div class="col-lg-6 form-group mb-3">--}}
                            {{--                                <div class="form-floating form-floating-outline">--}}
                            {{--                                    <input id="mobile" type="text" name="mobile" class="form-control"--}}
                            {{--                                           placeholder="Enter Mobile Number"--}}
                            {{--                                           value="{{ old('mobile', $member->user->mobile) }}" readonly>--}}
                            {{--                                    <label for="mobile">Mobile Number</label>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            <div class="col-lg-6 form-group mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input id="email" type="email" name="email" class="form-control"
                                           placeholder="Enter Email ID"
                                           value="{{ old('email', $member->user->email) }}" readonly>
                                    <label for="email" class="required">Email ID</label>
                                </div>
                                @foreach($errors->get('email') as $error)
                                    <span class="text-danger">{{ $error }}</span>
                                @endforeach
                            </div>
                            <div class="col-lg-6 form-group mb-3">
                                <div class="form-floating form-floating-outline ">
                                    <input id="basic-datepicker" type="text" name="dob" class="form-control"
                                           placeholder="Enter Date Of Birth">
                                    <label for="basic-datepicker">Date Of Birth</label>
                                </div>
                            </div>

                            <div class="col-lg-4 form-group mb-3">
                                <label>Profile Image</label>
                                <input type="file" class="filePondInput" name="profile_image"
                                       data-url="{{ $member->getFirstMediaUrl(\App\Models\Member::MC_PROFILE_IMAGE) }}"
                                       accept="image/*"/>
                            </div>
                            <div class="col-12">
                                <div class="text-center">
                                    <button type="submit" name="profile" class="btn btn-primary">
                                        <i class="uil uil-message me-1"></i> Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-5 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Change Password</h5>
                </div>
                <div class="card-body formContainer">
                    <form action="{{route('member.change-password.update')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="form-floating form-floating-outline">
                                        <div class="form-floating form-floating-outline">
                                            <input type="password" name="old_password"
                                                   class="form-control dz-password-1"
                                                   id="old_password"
                                                   placeholder="Enter Old Password" required>
                                            <label for="old_password" class="required">Old Password</label>
                                        </div>
                                        <span class="show-old-pass-1 eye" onclick="abc(1)">
                                            <i class="fa-duotone fa-eye-slash eye-slash-1"></i>
                                            <i class="fa-duotone fa-eye eye-1"></i>
                                        </span>
                                    </div>
                                    @foreach($errors->get('old_password') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                </div>
                                <div class="form-group formContainer">
                                    <div class="form-floating form-floating-outline">
                                        <div class="form-floating form-floating-outline">
                                            <input type="password" name="password" class="form-control dz-password-2 textPassword"
                                                   id="password"
                                                   placeholder="Enter New Password" required>
                                            <label for="password" class="required">New Password</label>
                                        </div>
                                        <span class="show-pass-2 eye" onclick="abc(2)">
                                            <i class="fa-duotone fa-eye-slash eye-slash-2"></i>
                                            <i class="fa-duotone fa-eye eye-2"></i>
                                        </span>
                                    </div>
                                    <div class="passwordValidator" style="display:none"></div>

                                @foreach($errors->get('password') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <div class="form-floating form-floating-outline">
                                        <div class="form-floating form-floating-outline">
                                            <input type="password" name="password_confirmation"
                                                   class="form-control dz-password-3"
                                                   id="new_confirm_password"
                                                   placeholder="Enter Confirm Password" required>
                                            <label for="new_confirm_password" class="required">Confirm Password</label>
                                        </div>
                                        <span class="show-pass-3 eye" onclick="abc(3)">
                                            <i class="fa-duotone fa-eye-slash eye-slash-3"></i>
                                            <i class="fa-duotone fa-eye eye-3"></i>
                                        </span>
                                    </div>
                                    @foreach($errors->get('password_confirmation') as $error)
                                        <div class="text-danger">{{ $error }}</div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="text-center">
                                    <button type="submit" name="" class="btn btn-primary">
                                        <i class="uil uil-message me-1"></i> Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if(settings('transaction_password'))
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h5 class="card-title mb-0">Change Transaction Password</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('member.financial-change-password.update')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="form-password-toggle">
                                            <div class="input-group input-group-merge">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="password" name="financial_old_password"
                                                           class="form-control"
                                                           id="financial_old_password"
                                                           placeholder="Enter Old Transaction Password" required>
                                                    <label for="financial_old_password" class="required">Old Transaction
                                                        Password</label>
                                                </div>
                                                <span class="input-group-text cursor-pointer"
                                                      id="financial_old_password"><i
                                                        class="mdi mdi-eye-off-outline"></i></span>
                                            </div>
                                        </div>
                                        @foreach($errors->get('financial_old_password') as $error)
                                            <span class="text-danger">{{ $error }}</span>
                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        <div class="form-password-toggle">
                                            <div class="input-group input-group-merge">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="password" name="financial_password"
                                                           class="form-control"
                                                           id="financial_password"
                                                           placeholder="Enter New Transaction Password" required>
                                                    <label for="financial_password" class="required">New Transaction
                                                        Password</label>
                                                </div>
                                                <span class="input-group-text cursor-pointer"
                                                      id="financial_old_password"><i
                                                        class="mdi mdi-eye-off-outline"></i></span>
                                            </div>
                                        </div>
                                        @foreach($errors->get('financial_password') as $error)
                                            <span class="text-danger">{{ $error }}</span>
                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        <div class="form-password-toggle">
                                            <div class="input-group input-group-merge">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="password" name="financial_password_confirmation"
                                                           class="form-control"
                                                           id="financial_password_confirmation"
                                                           placeholder="Enter Confirm Transaction Password" required>
                                                    <label for="financial_password_confirmation" class="required">Confirm
                                                        Transaction Password</label>
                                                </div>
                                                <span class="input-group-text cursor-pointer"
                                                      id="financial_old_password"><i
                                                        class="mdi mdi-eye-off-outline"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="text-center">
                                        <button type="submit" name="" class="btn btn-primary">
                                            <i class="uil uil-message me-1"></i> Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
@push('page-javascript')
    <script src="{{ asset('js/password-validator.js') }}"></script>
    @include('admin.layouts.filepond')

    <script type="text/javascript">
        $("#basic-datepicker").flatpickr({
            maxDate: new Date(),
            dateFormat: "d-m-Y",
            defaultDate: ["{{ old('dob', $member->user->dob ? $member->user->dob->format('d-m-Y') : '') }}"],
        });

        function abc(keyId) {
            if (jQuery('.dz-password-' + keyId).attr('type') == 'password') {
                jQuery('.dz-password-' + keyId).attr('type', 'text');
                $('.eye-' + keyId).show()
                $('.eye-slash-' + keyId).hide()
            } else if (jQuery('.dz-password-' + keyId).attr('type') == 'text') {
                jQuery('.dz-password-' + keyId).attr('type', 'password');
                $('.eye-' + keyId).hide()
                $('.eye-slash-' + keyId).show()
            }
        }

        $(document).ready(function () {
            $('.eye-1').hide()
            $('.eye-2').hide()
            $('.eye-3').hide()
            @if (old('state_id'))
            getCity({{ old('state_id') }});
            @endif

            $('#state').on('change', function () {
                if ($(this).val()) {
                    $.ajax({
                        url: '/admin/get/city/' + $(this).val() + '',
                        success: function (data) {
                            var select = ' <option value="">Select City</option>';
                            $.each(data, function (key, value) {
                                select += '<option value=' + value.id + '>' + value.name + '</option>';
                            });
                            $('#city_id').html(select);

                        }
                    });
                } else {
                    $('#city_id').html('<option value="">Select City</option>');
                }
            })

        });

        function getCity(id) {
            if (id) {
                $.ajax({
                    url: '/admin/get/city/' + id + '',
                    success: function (data) {
                        var select = ' <option value="">Select City</option>';
                        $.each(data, function (key, value) {
                            select += '<option value="' + value.id + '" ' + (value.id == '{{ old('city_id') }}' ? 'selected' : '') + '>' + value.name + '</option>';
                        });
                        $('#city_id').html(select);
                    }
                });

            } else {
                $('#city_id').html('<option value="">Select City</option>');
            }
        }
    </script>
@endpush
