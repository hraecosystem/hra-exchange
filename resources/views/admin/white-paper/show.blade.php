@extends('admin.layouts.master')
@section('title')
    White Paper
@endsection

@section('content')
    @include('admin.breadcrumbs', [
       'crumbs' => [
           'White Paper'
       ]
   ])
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="" class="filePondForm">
                        @csrf
                        <div class="form-group">
                            <label class="required">Upload PDF File</label>
                            <input type="file" name="white_paper" class="filePondInput"
                                   value="{{  optional($whitePaper)->getFirstMediaUrl(\App\Models\WhitePaper::MC_WHITE_PAPER) ?: '' }}"
                                   required accept="application/pdf">
                            @foreach($errors->get('white_paper') as $error)
                                <span class="text-danger">{{$error}}</span>
                            @endforeach
                        </div>

                        <div class="form-group">
                            <label class="required">Status</label> <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="active"
                                       value="1"
                                       {{ (old('status',optional($whitePaper)->status) == 1 ? 'checked' : '') }} required>
                                <label class="form-check-label" for="active">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inactive"
                                       value="2"
                                       {{ (old('status',optional($whitePaper)->status) == 2 ? 'checked' : '') }} required>
                                <label class="form-check-label" for="inactive">In-Active</label>
                            </div>
                        </div>
                        @foreach($errors->get('status') as $error)
                            <span class="text-danger">{{$error}}</span>
                        @endforeach
                        <div class="form-group  mt-4">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                <i class="uil uil-message me-1"></i> Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('admin.layouts.filepond')
