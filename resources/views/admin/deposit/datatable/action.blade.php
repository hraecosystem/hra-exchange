@if($model->status == \App\Models\Deposit::STATUS_PENDING)
    <a href="{{ route('admin.deposit.approve',$model) }}"
       class="btn btn-success btn-sm mb-1">
        <i class="uil uil-check"></i>
        Approve
    </a>
    <a href="{{ route('admin.deposit.reject',$model) }}"
       class="btn btn-danger btn-sm mb-1">
        <i class="uil uil-ban"></i>
        Reject
    </a>
@else
    N/A
@endif
