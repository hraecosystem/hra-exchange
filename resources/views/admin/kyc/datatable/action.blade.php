@if(!$model->isNotApplied())
<div class="btn-group">
    <a href="{{ route('admin.kycs.show', $model) }}">
        <span class="btn btn-primary btn-sm me-2">
           <i class="bx bx-show-alt"></i>
        </span>
    </a>
    <a href="{{ route('admin.kycs.edit', $model) }}">
        <span class="btn btn-danger btn-sm">
           <i class="bx bx-edit"></i>
        </span>
    </a>
</div>
@endif
