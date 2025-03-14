@if($model->pg_id)
    <button class="btn btn-info btn-sm shadow-none" type="button" data-clipboard-text="{{ $model->pg_id }}"
            data-bs-toggle="tooltip" data-bs-placement="bottom"
            data-bs-original-title="Click To Copy">
        @if(strlen($model->pg_id) > 20)
            {{ substr($model->pg_id, 0, 7). "..." .substr($model->pg_id, -7) }}
        @else
            {{ $model->pg_id }}
        @endif
    </button>
@else
    N/A
@endif
