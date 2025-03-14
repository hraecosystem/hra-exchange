@if($model->isPending())
    <span class="btn btn-xs btn-warning">
        Pending
    </span>
@endif
@if($model->isCompleted())
    <span class="btn btn-xs btn-success">
        Completed
    </span>
@endif
@if($model->isFailed())
    <span class="btn btn-xs btn-danger">
        Failed
    </span>
@endif
