@extends('admin.layouts.master')

@section('title')
    Features Management
@endsection

@section('content')
    @include('admin.breadcrumbs', [
         'crumbs' => [
             'Features Management'
         ]
    ])
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Control {{ env('APP_CURRENCY') }} Price</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('admin.settings.control-price')}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="form-floating form-floating-outline">
                                <input id="amount" type="text" name="coin_price" required
                                       class="form-control"
                                       placeholder="Enter Price ( Euro )"
                                       oninput="validateNumber(this);"
                                       oninput="validity.valid||(value='');"
                                       value="{{old('coin_price',settings('coin_price'))}}">
                                <label for="amount" class="required">Price</label>
                            </div>
                            @foreach($errors->get('coin_price') as $error)
                                <span class="text-danger">{{ $error }}</span>
                            @endforeach
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                <i class="uil uil-message me-1"></i> Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-javascript')
    <script>
        var validNumber = new RegExp(/^\d*\.?\d*$/);
        var lastValid = document.getElementById("amount").value;

        function validateNumber(elem) {
            if (validNumber.test(elem.value)) {
                lastValid = elem.value;
            } else {
                elem.value = lastValid;
            }
        }
    </script>
@endpush
