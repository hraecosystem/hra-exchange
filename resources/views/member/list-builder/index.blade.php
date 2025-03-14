@extends('member.layouts.master')

@section('title')
    {{ $listBuilderClass::$name }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">{{ $listBuilderClass::$name }}</h4>
                    <div class="heading-elements">
                        @if($listBuilderClass::createUrl())
                            <a href="{{ $listBuilderClass::createUrl() }}"
                               class="btn btn-sm btn-rounded btn-outline-primary me-4">
                                @if(($listBuilderClass::createButtonName()))
                                    <i class="fa-duotone fa-plus"></i>
                                    <span>{{ $listBuilderClass::createButtonName() }}</span>
                                @else
                                    <i class="fa-duotone fa-plus"></i>
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
                <div id="filters" class="collapse {{ Agent::isMobile() ? '' : 'show'}}">
                    <div class="card-body mt-2">
                        <form action="{{ request()->fullUrl() }}" id="filterForm">
                            <div class="row">
                                @foreach($listBuilderClass::columns() as $column)
                                    @if($column->filterType)
                                        {!! $column->render() !!}
                                    @endif
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <a href="{{ request()->url() }}"
                                       class="btn btn-rounded btn-outline-danger mb-lg-0 mb-3">
                                        <i class="fa-duotone fa-arrow-rotate-right me-1"></i> Reset
                                    </a>
                                    <button type="submit" name="filter" value="filter"
                                            onclick="shouldExport = false;"
                                            class="btn btn-rounded btn-outline-primary mb-lg-0 mb-3 mx-2">
                                        <i class="fa-duotone fa-filters  me-1"></i> Apply Filter
                                    </button>
                                    <button type="submit" name="export" value="csv"
                                            onclick="shouldExport = true;"
                                            class="btn btn-rounded btn-outline-dark mb-lg-0 mb-3">
                                        <i class="fa-duotone fa-download me-1"></i> Export
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    {!! $listBuilderClass::beforeDataTable() !!}
                    <div class="table-responsive">
                        <table class="table display dataTable" id="dataTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                @foreach($listBuilderClass::columns() as $column)
                                    <th>{{ $column->title() }}</th>
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
            language: {
                paginate: {
                    next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                    previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
                }
            },
            columns: [
                {data: 'DT_RowIndex', width: '5%'},
                    @foreach($listBuilderClass::columns() as $column)
                {
                    data: "{{ $column->property }}"
                },
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
