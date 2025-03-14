@php use App\Models\Deposit; @endphp
@if($model->blockchain_status == \App\Models\Deposit::STATUS_PENDING)
    <span
        class="btn btn-xs btn-warning"> {{ \App\Models\Deposit::STATUSESBLOCKCHAIN_STATUSES[$model->blockchain_status] }}</span>
@endif

@if($model->blockchain_status == \App\Models\Deposit::STATUS_COMPLETED)
    <span
        class="btn btn-xs btn-success"> {{ \App\Models\Deposit::STATUSES[$model->blockchain_status] }}</span>
@endif

@if($model->blockchain_status == \App\Models\Deposit::STATUS_FAILEDBLOCKCHAIN_STATUS_FAILED)
    <span
        class="btn btn-xs btn-danger"> {{ Deposit::STATUSES[$model->blockchain_status] }}</span>
@endif

{{--@if($model->status == \App\Models\PurchaseCoin::STATUS_IN_PROGRESS)--}}
{{--    <span class="btn btn-sm btn-warning"> {{ \App\Models\PurchaseCoin::STATUSES[$model->status] }}</span>--}}
{{--@endif--}}

{{--@if($model->status == \App\Models\PurchaseCoin::STATUS_SUCCESS)--}}
{{--    <span class="btn btn-sm btn-success"> {{ \App\Models\PurchaseCoin::STATUSES[$model->status] }}</span>--}}
{{--@endif--}}

{{--@if($model->status == \App\Models\PurchaseCoin::STATUS_FAILED)--}}
{{--    <span class="btn btn-sm btn-danger"> {{ \App\Models\PurchaseCoin::STATUSES[$model->status] }}</span>--}}
{{--@endif--}}

{{--@if($model->status == \App\Models\PurchaseCoin::STATUS_EXPIRED)--}}
{{--    <span class="btn btn-sm btn-info"> {{ \App\Models\PurchaseCoin::STATUSES[$model->status] }}</span>--}}
{{--@endif--}}
