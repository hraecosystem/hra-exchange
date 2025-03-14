@php use App\Models\CoinWalletTransaction; @endphp
@if($model->type == CoinWalletTransaction::TYPE_CREDIT)
    <b class="text-success">
        + {{ toHumanReadable($model->amount) }}
    </b>
@endif
@if($model->type == \App\Models\CoinWalletTransaction::TYPE_DEBIT)
    <b class="text-danger">
        - {{ toHumanReadable($model->amount) }}
    </b>
@endif
