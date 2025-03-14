@if($model->status == \App\Models\Deposit::STATUS_PENDING)
    <div class="btn btn-warning btn-sm">
        {{ \App\Models\Deposit::STATUSES[$model->status] }}
    </div>
@endif
@if($model->status == \App\Models\Deposit::STATUS_COMPLETED)
    <div class="btn btn-success btn-sm">
        {{ \App\Models\Deposit::STATUSES[$model->status] }}
    </div>
@endif
@if($model->status == \App\Models\Deposit::STATUS_FAILED)
    <div class="btn btn-danger btn-sm">
        {{ \App\Models\Deposit::STATUSES[$model->status] }}
    </div>
@endif
@if($model->status == \App\Models\Deposit::STATUS_CANCELLED)
    <div class="btn btn-info btn-sm">
        {{ \App\Models\Deposit::STATUSES[$model->status] }}
    </div>
@endif
@if($model->status == \App\Models\Deposit::STATUS_EXPIRED)
    <div class="btn btn-dark btn-sm">
        {{ \App\Models\Deposit::STATUSES[$model->status] }}
    </div>
@endif
