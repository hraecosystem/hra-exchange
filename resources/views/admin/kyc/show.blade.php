@extends('admin.layouts.master')

@section('title') KYC Details @endsection

@section('content')
    @include('admin.breadcrumbs', [
        'crumbTitle' => function () use ($kyc) {
            if ($kyc->isPending())
                $html = '<span class="btn btn-warning btn-sm">Pending</span>';
            else if ($kyc->isApproved())
                $html = '<span class="btn btn-success btn-sm">Approved</span>';
            else if ($kyc->isRejected())
                $html = '<span class="btn btn-danger btn-sm">Rejected</span>';

             return 'Edit KYC Details ('.$kyc->member->code.'): ' . $html;
        },
        'crumbs' => [
           'KYC Details',
        ]
   ])

    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Identity Information</h5>
                    <div class="form-group mb-3">
                        <div class="form-floating form-floating-outline">
                            <input type="text" class="form-control" value="{{ $kyc->pan_card }}" readonly>
                            <label for="pan" class="required">PAN Card</label>
                        </div>
                        @foreach($errors->get('pan_card') as $error)
                            <span class="text-danger">{{ $error }}</span>
                        @endforeach
                    </div>

                    <div class="form-group mb-3">
                        <div class="form-floating form-floating-outline">
                            <input type="text" class="form-control" value="{{ $kyc->aadhaar_card }}" readonly>
                            <label for="aadhaar" class="required">Aadhaar Card</label>
                        </div>
                        @foreach($errors->get('aadhaar_card') as $error)
                            <span class="text-danger">{{ $error }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="header-title">Bank Information</h5>

                    <div class="row">
                        <div class="form-group col-md-4 mb-3">
                            <div class="form-floating form-floating-outline">
                                <input type="text" class="form-control" value="{{ $kyc->account_name }}" readonly>
                                <label for="Account" class="required">Account Holder Name </label>
                            </div>
                            @foreach($errors->get('account_name') as $error)
                                <span class="text-danger">{{ $error }}</span>
                            @endforeach
                        </div>

                        <div class="form-group col-md-4 mb-3">
                            <div class="form-floating form-floating-outline">
                                <input type="text" class="form-control" value="{{ $kyc->account_number }}" readonly>
                                <label for="account_number" class="required">Account Number</label>
                            </div>
                            @foreach($errors->get('account_number') as $error)
                                <span class="text-danger">{{ $error }}</span>
                            @endforeach
                        </div>

                        <div class="form-group col-md-4 mb-3">
                            <div class="form-floating form-floating-outline">
                                <select class="form-control" disabled>
                                    <option value="1" {{ $kyc->account_type == 1 ? 'selected' : '' }}>
                                        Saving
                                    </option>
                                    <option value="2" {{ $kyc->account_type == 2 ? 'selected' : '' }}>
                                        Current
                                    </option>
                                </select>
                                <label for="account_type">Account Type</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <div class="form-floating form-floating-outline">
                                <input type="text" class="form-control" value="{{ $kyc->bank_ifsc }}" readonly>
                                <label for="bank_ifsc" class="required">IFSC Code</label>
                            </div>
                            @foreach($errors->get('bank_ifsc') as $error)
                                <span class="text-danger backendError">{{ $error }}</span>
                            @endforeach
                        </div>

                        <div class="form-group col-md-4 mb-3">
                            <div class="form-floating form-floating-outline">
                                <input type="text" class="form-control" value="{{ $kyc->bank_name }}" readonly>
                                <label for="bank_name" class="required">Bank Name </label>
                            </div>
                            @foreach($errors->get('bank_name') as $error)
                                <span class="text-danger">{{ $error }}</span>
                            @endforeach
                        </div>

                        <div class="form-group col-md-4 mb-3">
                            <div class="form-floating form-floating-outline">
                                <input type="text" class="form-control" value="{{ $kyc->bank_branch }}" readonly>
                                <label for="bank_branch" class="required">Bank Branch</label>
                            </div>
                            @foreach($errors->get('bank_branch') as $error)
                                <span class="text-danger">{{ $error }}</span>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body kyc">
                    <h5 class="card-title mb-4">Uploaded Documents</h5>

                    <div class="row">
                        @if($panCardImage)
                            <div class="col-lg-3">
                                <label for="" class="my-2">PAN Card Image</label>
                                <a href="{{ $panCardImage }}" class="image-popup" title="PAN Card Image">
                                    <img src="{{ $panCardImage }}" class="img-fluid" alt="">
                                </a>
                            </div>
                        @endif

                        @if($aadhaarCardImage)
                            <div class="col-lg-3">
                                <label for="" class="my-2">Aadhaar Card Front Image</label>
                                <a href="{{ $aadhaarCardImage }}" class="image-popup" title="Aadhaar Card Front Image">
                                    <img src="{{ $aadhaarCardImage }}" class="img-fluid" alt="">
                                </a>
                            </div>
                        @endif

                        @if($aadhaarCardBackImage)
                            <div class="col-lg-3">
                                <label for="" class="my-2">Aadhaar Card Back Image</label>
                                <a href="{{ $aadhaarCardBackImage }}" class="image-popup" title="Aadhaar card Back Image">
                                    <img src="{{ $aadhaarCardBackImage }}" class="img-fluid" alt="">
                                </a>
                            </div>
                        @endif

                        @if($cancelChequeImage)
                            <div class="col-lg-3">
                                <label for="" class="my-2">Cancel Cheque Or Bank PassBook Front Page Image</label>
                                <a href="{{ $cancelChequeImage }}" class="image-popup" title="Cancel Cheque Or Bank PassBook Front Page Image">
                                    <img src="{{ $cancelChequeImage }}" class="img-fluid" alt="">
                                </a>
                            </div>
                        @endif

                        @if($kyc->status == \App\Models\KYC::STATUS_PENDING)
                            <div class="col-12 d-flex justify-content-center my-3">
                                <form action="{{ route('admin.kycs.approve', $kyc) }}" class="me-2" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-success">
                                        <i class="uil uil-check"></i> Approve
                                    </button>
                                </form>
                                <form action="{{ route('admin.kycs.reject', $kyc) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="uil uil-times"></i> Reject
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-javascript')
    <script>
        $(document).ready(function () {
            $(".image-popup").magnificPopup({
                type: "image",
                closeOnContentClick: !1,
                closeBtnInside: !1,
                mainClass: "mfp-with-zoom mfp-img-mobile",
                image: {
                    verticalFit: !0, titleSrc: function (e) {
                        return e.el.attr("title")
                    }
                },
                gallery: {enabled: !0},
                zoom: {
                    enabled: !0, duration: 300, opener: function (e) {
                        return e.find("img")
                    }
                }
            })
        });
    </script>
@endpush
