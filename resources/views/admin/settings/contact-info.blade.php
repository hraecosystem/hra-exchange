@extends('admin.layouts.master')
@section('title','Contact Info')

@section('content')
    @include('admin.breadcrumbs', [
        'crumbs' => [
            'Contact Info'
        ]
   ])
    <form method="post">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-lg-4 mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="form-control" id="company_name" name="company_name"
                                           placeholder="Enter Company Name"
                                           value="{{ old('company_name',settings('company_name')) }}" required>
                                    <label for="company_name" class="required">Company Name</label>
                                </div>
                                @foreach($errors->get('company_name') as $error)
                                    <div class="text-danger font-weight-bold">{{ $error }}</div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-3 mb-3">
                                <small class="text-light fw-semibold d-block required">Social Links</small>
                                <div class="form-check form-check-inline mt-3">
                                    <input class="form-check-input" type="radio" name="social_link"
                                           id="social_link_1"
                                           value="1"
                                           {{ request('social_link') == '1' || settings('social_link') ? 'checked' : '' }}
                                           required>
                                    <label class="form-check-label" for="social_link_1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="social_link"
                                           id="social_link_0"
                                           value="0"
                                           {{ request('social_link') == '0' || !settings('social_link') ? 'checked' : '' }}
                                           required>
                                    <label class="form-check-label" for="social_link_0">No</label>
                                </div>
                                @foreach($errors->get('social_link') as $error)
                                    <span class="text-danger">{{ $error }}</span>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-4 mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="form-control" name="facebook_url" id="facebook_url"
                                           value="{{  old('facebook_url',settings('facebook_url')) }}"
                                           placeholder="Enter Facebook Link">
                                    <label for="facebook_url">Facebook Link</label>
                                </div>
                                @foreach($errors->get('facebook_url') as $error)
                                    <span class="text-danger">{{ $error }}</span>
                                @endforeach
                            </div>
                            <div class="form-group col-lg-4 mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="form-control" name="instagram_url" id="instagram_url"
                                           value="{{ old('instagram_url',settings('instagram_url')) }}"
                                           placeholder="Enter Instagram Link">
                                    <label for="instagram_url">Instagram Link</label>
                                </div>
                                @foreach($errors->get('instagram_url') as $error)
                                    <span class="text-danger">{{ $error }}</span>
                                @endforeach
                            </div>
                            <div class="form-group col-lg-4 mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="form-control" name="youtube_url" id="youtube_url"
                                           value="{{ old('youtube_url',settings('youtube_url')) }}"
                                           placeholder="Enter Youtube Link">
                                    <label for="youtube_url">Youtube Link</label>
                                </div>
                                @foreach($errors->get('youtube_url') as $error)
                                    <span class="text-danger">{{ $error }}</span>
                                @endforeach
                            </div>
                            <div class="form-group col-lg-4 mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="form-control" name="twitter_url" id="twitter_url"
                                           value="{{ old('twitter_url',settings('twitter_url')) }}"
                                           placeholder="Enter Twitter Link">
                                    <label for="twitter_url">Twitter Link</label>
                                </div>
                                @foreach($errors->get('twitter_url') as $error)
                                    <span class="text-danger">{{ $error }}</span>
                                @endforeach
                            </div>
                            <div class="form-group col-lg-4 mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="form-control" name="linkedIn_url" id="linkedIn_url"
                                           value="{{ old('linkedIn_url',settings('linkedIn_url')) }}"
                                           placeholder="Enter LinkedIn Link">
                                    <label for="linkedIn_url">LinkedIn Link</label>
                                </div>
                                @foreach($errors->get('linkedIn_url') as $error)
                                    <span class="text-danger">{{ $error }}</span>
                                @endforeach
                            </div>
                            <div class="form-group col-lg-4 mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="form-control" name="telegram_url" id="telegram_url"
                                           value="{{ old('telegram_url',settings('telegram_url')) }}"
                                           placeholder="Enter Telegram Link">
                                    <label for="telegram_url">Telegram Link</label>
                                </div>
                                @foreach($errors->get('telegram_url') as $error)
                                    <span class="text-danger">{{ $error }}</span>
                                @endforeach
                            </div>
                            <div class="form-group col-lg-4 mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="form-control" name="telegram_group_url"
                                           id="telegram_group_url"
                                           value="{{ old('telegram_group_url',settings('telegram_group_url')) }}"
                                           placeholder="Enter Telegram Group Link">
                                    <label for="telegram_group_url">Telegram Group Link</label>
                                </div>
                                @foreach($errors->get('telegram_group_url') as $error)
                                    <span class="text-danger">{{ $error }}</span>
                                @endforeach
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="uil uil-message me-1"></i> Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('page-javascript')
    <script>
        // 1. Number Key
        function isNumberKey(evt) {
            let charCode = (evt.which) ? evt.which : event.keyCode;
            if (charCode != 46 && charCode != 45 && charCode > 31
                && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }

        // 2. Max Length & Prevent Enter Button to Refresh the Page//
        function max_length(obj, e, max) {
            e = e || event;
            max = max;
            if (e.keyCode === 13) {
                event.preventDefault();
            }
            if (obj.value.length >= max && e.keyCode > 46) {
                return false;
            }
            return true;
        }

        $(document).ready(function () {
            @if (old('state_id', settings('state')))
            getCity('{{ old('state_id', settings('state')) }}');
            @endif
            @if (old('country_id', settings('country')))
            getState('{{ old('country_id', settings('country')) }}');
            @endif
            $('#country').on('change', function () {
                if ($(this).val()) {
                    $.ajax({
                        url: '/admin/get/state/' + $(this).val() + '',
                        success: function (data) {
                            var select = ' <option value="">Select State</option>';
                            $.each(data, function (key, value) {
                                select += '<option value=' + value.id + '>' + value.name + '</option>';
                            });
                            $('#state_id').html(select);

                        }
                    });
                } else {
                    $('#state_id').html('<option value="">Select State</option>');
                }

                $('#city_id').html('<option value="">Select City</option>');
            })
            $('#state_id').on('change', function () {
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

        function getState(idOrName) {
            if (idOrName) {
                $.ajax({
                    url: '/admin/get/state/' + idOrName + '',
                    success: function (data) {
                        var select = ' <option value="">Select State</option>';
                        $.each(data, function (key, value) {
                            select += '<option value="' + value.id + '" ' + (value.id == '{{ old('state_id') }}' || value.name == '{{ settings('state') }}' ? 'selected' : '') + '>' + value.name + '</option>';
                        });
                        $('#state_id').html(select);
                    }
                });

            } else {
                $('#state_id').html('<option value="">Select State</option>');
            }
        }

        function getCity(idOrName) {
            if (idOrName) {
                $.ajax({
                    url: '/admin/get/city/' + idOrName + '',
                    success: function (data) {
                        var select = ' <option value="">Select City</option>';
                        $.each(data, function (key, value) {
                            select += '<option value="' + value.id + '" ' + (value.id == '{{ old('city_id') }}' || value.name == '{{ settings('city') }}' ? 'selected' : '') + '>' + value.name + '</option>';
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
