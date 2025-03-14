@php use App\Models\CoinWalletTransaction; @endphp
@if($model->type == \App\Models\CoinWalletTransaction::TYPE_CREDIT)
    <span class="badge light badge-success">Credit</span>
@endif
@if($model->type == CoinWalletTransaction::TYPE_DEBIT)
    <span class="badge light badge-danger">Debit</span>
@endif
