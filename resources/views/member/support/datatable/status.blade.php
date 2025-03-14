@if($model->isOpen())
    <span class="badge light badge-success">
        {{ $model->present()->status() }}
    </span>
@endif
@if($model->isClose())
    <span class="badge light badge-danger">
        {{ $model->present()->status() }}
    </span>
@endif
