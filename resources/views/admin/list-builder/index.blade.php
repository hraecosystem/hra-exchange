@php use App\ListBuilders\ListBuilderColumn; @endphp
@extends('admin.layouts.master')

@section('title')
    {{ $listBuilderClass::$name }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">{{ $listBuilderClass::$name }}</h5>
                    <div class="heading-elements">
                        @if($listBuilderClass::createUrl())
                            <a href="{{ $listBuilderClass::createUrl() }}" class="btn btn-primary">
                                @if(($listBuilderClass::createButtonName()))
                                    <i class="uil uil-plus"></i>
                                    <span>{{ $listBuilderClass::createButtonName() }}</span>
                                @else
                                    <i class="uil uil-plus"></i>
                                    <span>Create</span>
                                @endif
                            </a>
                        @endif

                        <a data-bs-toggle="collapse" href="#filters" role="button"
                           aria-expanded="{{ Agent::isMobile() ? 'true' : 'false'}}"
                           aria-controls="filters" class="{{ Agent::isMobile() ? 'collapsed' : ''}}">
                            <i class="uil uil-minus"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div id="filters" class="collapse {{ Agent::isMobile() ? '' : 'show'}}">
                        <div class="pt-3">
                            <form action="{{ request()->fullUrl() }}" id="filterForm">
                                <div class="row">
                                    @foreach($listBuilderClass::columns() as $column)
                                        @if($column->filterType && $column->filterType !== ListBuilderColumn::TYPE_NONE)
                                            {!! $column->render() !!}
                                        @endif
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <a href="{{ request()->url() }}"
                                           class="btn btn-outline-danger waves-effect waves-light mb-lg-0 mb-3">
                                            Reset
                                        </a>
                                        <button type="submit" name="filter" value="filter"
                                                onclick="shouldExport = false;"
                                                class="btn btn-outline-primary waves-effect waves-light mb-lg-0 mb-3">
                                            Apply Filter
                                        </button>
                                        <button type="submit" name="export" value="csv" onclick="shouldExport = true;"
                                                class="btn btn-outline-dark waves-effect mb-lg-0 mb-3">
                                            Export
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {!! $listBuilderClass::beforeDataTable() !!}

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped" id="dataTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                @foreach($listBuilderClass::columns() as $column)
                                    {{--                                @if($column->hasPermission($listBuilderClass::$permissionPrefix))--}}
                                    <th>{{ $column->title() }}</th>
                                    {{--                                @endif--}}
                                @endforeach
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-javascript')
    <script>
        var dataTable = $('#dataTable').DataTable({
            ajax: {
                url: '{{ request()->fullUrl() }}',
            },
            columns: [
                {data: 'DT_RowIndex', width: '5%'},
                    @foreach($listBuilderClass::columns() as $column)
                    {{--                    @if($column->hasPermission($listBuilderClass::$permissionPrefix))--}}
                {
                    data: "{{ $column->property }}"
                },
                {{--                @endif--}}
                @endforeach
            ]
        });
        dataTable.on('draw', function () {
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
            });
        });
    </script>
@endpush
