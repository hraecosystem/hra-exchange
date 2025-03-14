@php use App\Models\EuroWalletTransaction; @endphp
@if($model->type == EuroWalletTransaction::TYPE_CREDIT)
    <b class="text-success">
        + {{ toHumanReadable($model->amount) }}
    </b>
@endif
@if($model->type == \App\Models\EuroWalletTransaction::TYPE_DEBIT)
    <b class="text-danger">
        - {{ toHumanReadable($model->amount) }}
    </b>
@endif
